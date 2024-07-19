<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FooterModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'footer';
    protected $guard = 'footer';

    protected $fillable = ['footer'];
}
