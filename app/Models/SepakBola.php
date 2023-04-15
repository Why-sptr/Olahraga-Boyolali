<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SepakBola extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $guarded = [];
    protected $table = "sepak_bolas";
    protected $dates = ['deleted_at'];
}
