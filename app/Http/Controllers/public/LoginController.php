<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterModel;
use App\Models\HomeModel;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        $user = User::first();
        $home = HomeModel::first();
        $footer = FooterModel::first();

        return view('auth.public.login', compact('footer', 'user', 'home'));
    }
}
