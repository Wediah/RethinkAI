<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function makeAdmin(User $user)
    {
        // Prevent modifying yourself
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot modify your own admin status.');
        }

        $user->update(['is_admin' => true]);

        return back()->with('success', "{$user->name} has been granted admin privileges.");
    }

    public function removeAdmin(User $user)
    {
        // Prevent modifying yourself
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot remove your own admin privileges.');
        }

        $user->update(['is_admin' => false]);

        return back()->with('success', "Admin privileges have been removed from {$user->name}.");
    }

}
