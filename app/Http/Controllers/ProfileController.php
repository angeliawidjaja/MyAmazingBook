<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index() {
        $user = User::find(Auth::user()->id);
        $role = Role::find($user->role_id);
        $gender = Gender::find($user->gender_id);
        return view('pages.profile', ['user' => $user, 'role' => $role, 'gender' => $gender]);
    }

    public function update(Request $request) {
        $data =  $request->validate([
            'first_name' => ['required', 'alpha_num', 'max:25'],
            'middle_name'=> ['alpha_num', 'max:25'],
            'last_name'=> ['required', 'alpha_num', 'max:25'],
            'gender' => ['required', 'in:Male,Female'],
            'email' => ['required', 'email'],
            'password' => ['required', 'alpha_num', 'min:8'],
            'display_picture_link' => ['required'],
            'display_picture_link.*' => ['required', 'mimes:jpeg,jpg,png,svg']
        ]);

        $user = Auth::user();

        $file = $request->file('display_picture_link');
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $imageName);
        $imagePath = 'images/' . $imageName;
        if(Hash::check($request->password, $user->password)) {
            $user->password = Hash::make($request->password);
        }

        $gender = Gender::where('gender_desc', $data['gender'])->first();

        session([
            'session' => [$data['email'], $data['password']],
            'user' => $user
        ]);

        User::where('id', $user->id)->update([
            'first_name' => $data['first_name'], 
            'middle_name' => $data['middle_name'], 
            'last_name' => $data['last_name'], 
            'email' => $data['email'],
            'display_picture_link' => $imagePath,
            'gender_id' => $gender->id
        ]);
        
        Session::flash('success', 'Update Profile successfull!');
        return view('pages.saved', ['linkToHome' => true, 'showNavBar' => false]);
    }
}
