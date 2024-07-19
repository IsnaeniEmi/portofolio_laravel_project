<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'home';
    protected $guard = 'home';

    protected $fillable = ['judul_besar', 'deskripsi_judul', 'deskripsi_about', 'file'];
}
