<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use App\Models\HomeModel;
use App\Models\FooterModel;
use App\Models\User;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index ()
    {
        $user = User::first();
        $home = HomeModel::first();
        $footer = FooterModel::first();

        return view('pages.public.home', compact('home', 'footer', 'user', 'home'));
    }
}
