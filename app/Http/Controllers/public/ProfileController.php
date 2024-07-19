<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use App\Models\PendidikanModel;
use App\Models\PengalamanModel;
use App\Models\FooterModel;
use App\Models\SkillModel;
use App\Models\User;
use App\Models\HomeModel;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::first();
        $home = HomeModel::first();
        $pendidikan = PendidikanModel::all();
        $pengalaman = PengalamanModel::all();
        $skill = SkillModel::all();
        $footer = FooterModel::first();

        return view('pages.public.profile', compact('pendidikan', 'pengalaman', 'footer', 'skill', 'user', 'home'));
    }
}
