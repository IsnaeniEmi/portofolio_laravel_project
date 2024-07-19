<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SkillModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'skill';
    protected $guard = 'skill';

    protected $fillable = ['nama_skill', 'tingkat_kemahiran'];
}
