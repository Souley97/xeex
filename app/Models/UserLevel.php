<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class UserLevel extends Model
{
    protected $fillable = ['level_name', 'points_required'];
}

