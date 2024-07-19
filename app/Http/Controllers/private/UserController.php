<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\FooterModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getById($id)
    {
        return User::where('id', $id)->first();
    }

    public function getWithPaginate()
    {
        return User::paginate(10);
    }

    public function index()
    {
        $user = User::first();
        $footer = FooterModel::first();

        return view('pages.private.user', compact('user', 'footer'));
    }

    public function edit($id)
    {
        $user = User::first();
        $footer = FooterModel::first();
        $user = $this->getById($id);

        return view('pages.private.update_user', compact('user', 'user', 'footer'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = $request->password;
        $user->telepon = $request->telepon;
        $user->agama = $request->agama;
        $user->status = $request->status;
        $user->alamat = $request->alamat;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tanggal_lahir;

        $user->save();

        return redirect()->route('admin_user')->with('success', 'Data berhasil diperbarui.');
    }
}
