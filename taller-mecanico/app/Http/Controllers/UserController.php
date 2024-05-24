<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function index()
    {
        $user = DB::table('users')->get();
        return view('admin.users.index')->with(['user' => $user]);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return response()->json(['success' => true]);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['success' => true]);
    }

    public function change_password(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response()->json(['success' => true]);
    }
}
