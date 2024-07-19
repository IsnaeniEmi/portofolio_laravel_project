<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactUsModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'response';
    protected $guard = 'response';

    protected $fillable = ['nama_lengkap', 'telepon', 'email', 'pesan'];
}
