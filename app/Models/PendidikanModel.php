<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendidikanModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pendidikan';
    protected $guard = 'pendidikan';

    protected $fillable = ['nama_institusi', 'jenjang', 'angkatan', 'jurusan', 'file'];
}
