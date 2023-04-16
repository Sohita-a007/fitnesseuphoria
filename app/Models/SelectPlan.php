<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'selected_plan', 'user_id'
    ];
}
