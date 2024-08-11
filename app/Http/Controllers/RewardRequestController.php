<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use App\Models\RewardRequest;
use App\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RewardRequestController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $rewardRequests = RewardRequest::with('reward', 'user')->paginate(10);
        }
        if (auth()->user()->role == 'admin_cabang') {
            $rewardRequests = RewardRequest::with('reward', 'user')
                ->whereHas('user', function ($query) {
                    $query->where('faculty_id', auth()->user()->faculty_id);
                })
                ->paginate(10);
        }
        return view('backend.reward_requests.index', compact('rewardRequests'));
    }

    public function create()
    {
        if (auth()->user()->role == 'admin') {
            $users = User::where('status', 'active')->where('role', 'user')->get();
        }
        if (auth()->user()->role == 'admin_cabang') {
            $users = User::where('status', 'active')->where('role', 'user')->where('faculty_id', auth()->user()->faculty_id)->get();
        }
        $rewards = Reward::where('status', 'active')->where('stock', '>', 0)->get();
        return view('backend.reward_requests.create', compact('users', 'rewards'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reward_id' => 'required|exists:rewards,id',
            'user_id' => 'required|exists:users,id',
            'qty' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $reward = Reward::find($request->reward_id);
        $user = User::find($request->user_id);
        $totalPrice = $reward->price * $request->qty;

        if ($user->balance < $totalPrice) {
            return redirect()->back()->with('error', 'Insufficient balance.');
        }

        if ($reward->stock < $request->qty) {
            return redirect()->back()->with('error', 'Insufficient stock.');
        }

        // Reduce user balance
        $user->balance -= $totalPrice;
        $user->save();

        // Reduce reward stock
        $reward->stock -= $request->qty;
        $reward->save();

        // Create reward request
        RewardRequest::create([
            'reward_id' => $request->reward_id,
            'user_id' => $request->user_id,
            'qty' => $request->qty,
            'status' => 'pending'
        ]);

        return redirect()->route('reward_requests.index')->with('success', 'Reward request created successfully.');
    }


    public function approve($id)
    {
        $rewardRequest = RewardRequest::find($id);
        $rewardRequest->status = 'approved';
        $rewardRequest->save();

        return redirect()->route('reward_requests.index')->with('success', 'Reward request approved successfully.');
    }


    public function decline($id)
    {
        $rewardRequest = RewardRequest::find($id);
        $user = $rewardRequest->user;
        $reward = $rewardRequest->reward;
        $totalPrice = $reward->price * $rewardRequest->qty;

        // Restore user balance
        $user->balance += $totalPrice;
        $user->save();

        // Restore reward stock
        $reward->stock += $rewardRequest->qty;
        $reward->save();

        $rewardRequest->status = 'declined';
        $rewardRequest->save();

        return redirect()->route('reward_requests.index')->with('success', 'Reward request declined successfully.');
    }

    public function exportPdf()
    {
        // Fetch the reward requests with related user and reward data
        if (auth()->user()->role == 'admin') {
            $rewardRequests = RewardRequest::with('reward', 'user')->get();
        }
        if (auth()->user()->role == 'admin_cabang') {
            $rewardRequests = RewardRequest::with('reward', 'user')
                ->whereHas('user', function ($query) {
                    $query->where('faculty_id', auth()->user()->faculty_id);
                })
                ->get();
        }

        // Share data with the view
        $pdf = Pdf::loadView('backend.reward_requests.pdf', compact('rewardRequests'));

        // Return the PDF file as a download
        return $pdf->download('reward_requests.pdf');
    }
}
