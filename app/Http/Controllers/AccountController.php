<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index() {
        $users = User::all();
        return view('pages.account', ['users' => $users]);
    }

    public function updateRoleIndex($id) {
        $user = User::find($id);
        return view('pages.updateRole', ['user' => $user]);
    }

    public function updateUserRole(Request $request, $id) {
        $data =  $request->validate([
            'role' => ['required', 'in:User,Admin']
        ]);
        $user = User::find($id);
        $role = Role::where('role_desc', $data['role'])->first();
        User::where('id', $user->id)->update([
            'role_id' => $role->id
        ]);
        $users = User::all();
        return view('pages.account', ['users' => $users]);
    }

    public function destroy($id) {
        $previousData = User::find($id);
        if ($previousData) {
            $previousData->delete();
        }
        return redirect()->back()->with('alert','Successfully Remove User');
    }
}
