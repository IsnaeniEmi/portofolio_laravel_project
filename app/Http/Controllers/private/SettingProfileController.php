<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PendidikanModel;
use App\Models\PengalamanModel;
use App\Models\FooterModel;
use App\Models\SkillModel;
use App\Models\User;

class SettingProfileController extends Controller
{
 public function index()
    {
        $user = User::first();
        $footer = FooterModel::first();
        $pendidikan = PendidikanModel::all();
        $pengalaman = PengalamanModel::all();
        $skill = SkillModel::all();

        return view('pages.private.profile', compact('pendidikan', 'pengalaman', 'user', 'footer', 'skill'));
    }
}
