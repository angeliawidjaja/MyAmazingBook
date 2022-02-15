<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function index() {
        return view('pages.signup');
    }

    public function register(Request $request) {
        $data =  $request->validate([
            'first_name' => ['required', 'alpha_num', 'max:25'],
            'middle_name'=> ['alpha_num', 'max:25'],
            'last_name'=> ['required', 'alpha_num', 'max:25'],
            'gender' => ['required', 'in:Male,Female'],
            'email' => ['required', 'email', 'unique:users'],
            'role' => ['required', 'in:User,Admin'],
            'password' => ['required', 'alpha_num', 'min:8'],
            'display_picture_link.*' => ['required', 'mimes:jpeg,jpg,png,svg']
        ]);

        $role = Role::where('role_desc', $data['role'])->first();
        $gender = Gender::where('gender_desc', $data['gender'])->first();
        $file = $request->file('display_picture_link');
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $imageName);
        $imagePath = 'images/' . $imageName;
        User::create([
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'display_picture_link' => $imagePath,
            'role_id' => $role->id,
            'gender_id' => $gender->id
        ]);
        Session::flash('success', 'Registration successfull!');
        return redirect()->to('/login');
    }
}
