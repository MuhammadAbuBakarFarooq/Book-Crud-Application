<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\AccountApproval;
use App\Notifications\AccountRejection;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNull('approved_at')->get();

        return view('users', compact('users'));
    }

    public function approve($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['approved_at' => now()]);

        $user->notify(new AccountApproval($user));
        
        return redirect()->route('admin.users.index')->withMessage('User approved successfully');
    }
    public function reject($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();

        $user->notify(new AccountRejection($user));

        return redirect()->route('admin.users.index')->withMessage('User Rejected');
    }
}
