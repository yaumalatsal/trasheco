<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Withdraw;
use App\User;
use App\Rules\MatchOldPassword;
use Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Spatie\Activitylog\Models\Activity;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            return $this->indexAdmin();
        }
        if (auth()->user()->role == 'admin_cabang') {
            return $this->indexAdminCabang();
        }
    }

    public function indexAdmin()
    {
        $rawUser = User::select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name', 'day')
            ->orderBy('day')
            ->get();
        $resUser[] = ['Name', 'Number'];
        foreach ($rawUser as $key => $value) {
            $resUser[++$key] = [$value->day_name, $value->count];
        }

        $rawProduct = Product::select('title')
            ->selectSub(function ($query) {
                $query->selectRaw('SUM(order_details.qty)')
                    ->from('order_details')
                    ->whereColumn('order_details.product_id', 'products.id');
            }, 'count')
            ->havingRaw('count IS NOT NULL')
            ->get();
        $resProduct[] = ['Name', 'Number'];

        foreach ($rawProduct as $key => $value) {
            $resProduct[++$key] = [$value->title, intval($value->count)];
        }

        $rawFaculty = Faculty::select('faculties.name')
            ->selectSub(function ($query) {
                $query->selectRaw('SUM(orders.total_amount)')
                    ->from('orders')
                    ->join('users', 'orders.user_id', '=', 'users.id')
                    ->whereColumn('users.faculty_id', 'faculties.id');
            }, 'count')
            ->havingRaw('count IS NOT NULL')
            ->get();

        $resFaculty[] = ['Name', 'Number'];
        foreach ($rawFaculty as $key => $value) {
            $resFaculty[++$key] = [$value->name, intval($value->count)];
        }

        return view('backend.index')
            ->with('users', json_encode($resUser))
            ->with('faculty', json_encode($resFaculty))
            ->with('product', json_encode($resProduct));
    }

    public function indexAdminCabang()
    {
        $rawUser = User::select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->where('faculty_id', auth()->user()->faculty_id)
            ->groupBy('day_name', 'day')
            ->orderBy('day')
            ->get();
        $resUser[] = ['Name', 'Number'];
        foreach ($rawUser as $key => $value) {
            $resUser[++$key] = [$value->day_name, $value->count];
        }

        $rawProduct = Product::select('title')
            ->selectSub(function ($query) {
                $query->selectRaw('SUM(order_details.qty)')
                    ->from('order_details')
                    ->join('orders', 'orders.id', '=', 'order_details.order_id')
                    ->join('users', 'orders.user_id', '=', 'users.id')
                    ->whereColumn('order_details.product_id', 'products.id')
                    ->where('faculty_id', auth()->user()->faculty_id);
            }, 'count')
            ->havingRaw('count IS NOT NULL')
            ->get();
        $resProduct[] = ['Name', 'Number'];

        foreach ($rawProduct as $key => $value) {
            $resProduct[++$key] = [$value->title, intval($value->count)];
        }

        $rawFaculty = Faculty::select('faculties.name')
            ->selectSub(function ($query) {
                $query->selectRaw('SUM(orders.total_amount)')
                    ->from('orders')
                    ->join('users', 'orders.user_id', '=', 'users.id')
                    ->whereColumn('users.faculty_id', 'faculties.id')
                    ->where('faculty_id', auth()->user()->faculty_id);
            }, 'count')
            ->havingRaw('count IS NOT NULL')
            ->get();

        $resFaculty[] = ['Name', 'Number'];
        foreach ($rawFaculty as $key => $value) {
            $resFaculty[++$key] = [$value->name, intval($value->count)];
        }

        return view('backend.index')
            ->with('users', json_encode($resUser))
            ->with('faculty', json_encode($resFaculty))
            ->with('product', json_encode($resProduct));
    }

    public function profile()
    {
        $profile = Auth()->user();
        // return $profile;
        return view('backend.users.profile')->with('profile', $profile);
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

    public function settings()
    {
        $data = Settings::first();
        return view('backend.setting')->with('data', $data);
    }

    public function settingsUpdate(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'short_des' => 'required|string',
            'description' => 'required|string',
            'photo' => 'required',
            'logo' => 'required',
            'address' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);
        $data = $request->all();
        // return $data;
        $settings = Settings::first();
        // return $settings;
        $status = $settings->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'Setting successfully updated');
        } else {
            request()->session()->flash('error', 'Please try again');
        }
        return redirect()->route('admin');
    }

    public function changePassword()
    {
        return view('backend.layouts.changePassword');
    }
    public function changPasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => FacadesHash::make($request->new_password)]);

        return redirect()->route('admin')->with('success', 'Password successfully changed');
    }
}
