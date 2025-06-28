<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //
    public function index()
    {
        // Logic to display the profile page
        return view('admin.profile.index');
    }

    public function update(Request $request)
    {
        // Logic to update the profile
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|string|max:100|min:6',
            'email' => 'required|email|max:255',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = auth()->user();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
