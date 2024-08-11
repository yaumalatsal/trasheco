<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Order;
use App\Models\ProductReview;
use App\Models\PostComment;
use App\Models\Product;
use App\Models\Reward;
use App\Models\RewardRequest;
use App\Models\Withdraw;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $userId = auth()->user()->id;

        // Fetch product data
        $rawProduct = Product::select('products.title')
            ->selectSub(function ($query) use ($userId) {
                $query->selectRaw('SUM(order_details.qty)')
                    ->from('order_details')
                    ->whereColumn('order_details.product_id', 'products.id')
                    ->whereExists(function ($query) use ($userId) {
                        $query->selectRaw(1)
                            ->from('orders')
                            ->whereColumn('orders.id', 'order_details.order_id')
                            ->where('orders.user_id', $userId);
                    });
            }, 'count')
            ->havingRaw('count IS NOT NULL')
            ->get();
        $resProduct[] = ['Name', 'Number'];
        foreach ($rawProduct as $key => $value) {
            $resProduct[++$key] = [$value->title, intval($value->count)];
        }

        // Fetch withdrawal and income data
        $withdrawSum = Withdraw::where('status', 'submit')
            ->where('user_id', $userId)
            ->sum('amount');
        $incomeSum = Order::where('user_id', $userId)
            ->sum('total_amount');

        $resMoney = [
            ['Name', 'Number'],
            ['Withdraw', intval($withdrawSum)],
            ['Income', intval($incomeSum)],
        ];

        return view('user.index')
            ->with('money', json_encode($resMoney))
            ->with('product', json_encode($resProduct));
    }

    public function profile()
    {
        $profile = Auth()->user();
        // return $profile;
        return view('user.users.profile')->with('profile', $profile);
    }

    public function profileUpdate(Request $request, $id)
    {
        // return $request->all();
        $user = User::findOrFail($id);
        $data = $request->all();
        $status = $user->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'Successfully updated your profile');
        } else {
            request()->session()->flash('error', 'Please try again!');
        }
        return redirect()->back();
    }

    // Order
    public function orderIndex()
    {
        $orders = Order::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->paginate(10);
        return view('user.order.index')->with('orders', $orders);
    }

    public function rewardIndex()
    {
        $latestRewardRequests = DB::table('reward_requests as rr1')
            ->select('rr1.*')
            ->whereRaw("rr1.id = (SELECT rr2.id FROM reward_requests as rr2 WHERE rr2.reward_id = rr1.reward_id AND rr2.user_id = '" . auth()->user()->id . "' ORDER BY rr2.created_at DESC LIMIT 1)");

        $rewards = DB::table('rewards')
            ->leftJoinSub($latestRewardRequests, 'latest_reward_requests', function ($join) {
                $join->on('rewards.id', '=', 'latest_reward_requests.reward_id');
            })
            ->select(
                'rewards.id',
                'rewards.name',
                'rewards.description',
                'rewards.price',
                'rewards.status',
                'latest_reward_requests.status as request_status',
                'latest_reward_requests.user_id'
            )
            ->where('rewards.status', 'active') // Only active rewards
            ->orderBy('rewards.name', 'DESC') // Order by reward name descending
            ->paginate(10); // Paginate with 10 items per page
        return view('user.reward.index')->with('rewards', $rewards);
    }

    public function requestReward(Request $request, $id)
    {
        $reward = Reward::find($id);
        $user = User::find(auth()->user()->id);
        $totalPrice = $reward->price * 1;

        if ($user->balance < $totalPrice) {
            return redirect()->back()->with('error', 'Insufficient balance.');
        }

        if ($reward->stock < 1) {
            return redirect()->back()->with('error', 'Insufficient stock.');
        }

        // Reduce user balance
        $user->balance -= $totalPrice;
        $user->save();

        // Reduce reward stock
        $reward->stock -= 1;
        $reward->save();

        // Create reward request
        RewardRequest::create([
            'reward_id' => $id,
            'user_id' => auth()->user()->id,
            'qty' => 1,
            'status' => 'pending'
        ]);


        return back();
    }

    public function changePassword()
    {
        return view('user.layouts.userPasswordChange');
    }
    public function changPasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => FacadesHash::make($request->new_password)]);

        return redirect()->route('user')->with('success', 'Password successfully changed');
    }
}
