<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengalamanModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pengalaman';
    protected $guard = 'pengalaman';

    protected $fillable = ['nama_pt', 'posisi', 'lokasi', 'mulai', 'file'];
}
