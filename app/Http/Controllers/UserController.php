<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userView()
    {
        $userData = User::all();

        return view('users.user', compact('userData'));
    }

    public function userAdd(Request $request, User $user)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user->create($data);

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Berhasil membuat user baru');

        return redirect()->route('user.view');
    }

    public function userEdit(Request $request, User $user)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ];

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        $request->session()->flash('status', 'warning');
        $request->session()->flash('message', 'Berhasil update data user');

        return redirect()->route('user.view');
    }

    public function userDelete(Request $request, User $user)
    {
        $user->delete();

        $request->session()->flash('status', 'danger');
        $request->session()->flash('message', 'Berhasil hapus data user');

        return redirect()->route('user.view');
    }
}