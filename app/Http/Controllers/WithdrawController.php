<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function index()
    {
        $withdraws = Withdraw::latest()->paginate(10); // Fetch all withdraws, adjust as needed

        return view('backend.withdraw.index', compact('withdraws'));
    }

    public function create()
    {
        $users = User::where('role', 'user')->get();

        return view('backend.withdraw.create')->with('users', $users);;
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'amount' => 'required|integer|min:1',
        ]);

        // Fetch the user from the database to get the latest balance
        $user = User::find($request->user_id);

        // Ensure sufficient balance before proceeding with the withdrawal
        if ($user->balance >= $request->amount) {
            $newBalance = $user->balance - $request->amount;

            // Update user's balance using update method
            $user->update(['balance' => $newBalance]);

            Withdraw::create([
                'user_id' => $request->user_id,
                'amount' => $request->amount,
                'created_by' => auth()->user()->id,
                'status' => 'submit', // Example status, adjust as needed
            ]);

            return redirect()->route('withdraw.index')->with('success', 'Withdrawal request submitted.');
        } else {
            return back()->with('error', 'Insufficient balance.');
        }
    }

    public function cancel($id)
    {
        $withdrawal = Withdraw::findOrFail($id);
        $user = $withdrawal->user;

        $user->balance += $withdrawal->amount;
        $user->save();

        $withdrawal->status = 'canceled';
        $withdrawal->save();

        return redirect()->route('withdraw.index')->with('success', 'Withdrawal request canceled and balance refunded.');
    }
}
