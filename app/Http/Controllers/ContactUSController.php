<?php

namespace App\Http\Controllers;

use App\Models\ContactUS;
use Illuminate\Http\Request;

class ContactUSController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        ContactUS::create($request->all());

        return redirect()->back()->with('success', 'Thank you for contacting us!');
    }
}
