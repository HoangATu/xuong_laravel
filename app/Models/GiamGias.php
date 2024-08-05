<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GiamGias extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'code', 
        'discount_amount',
        'expiry_date',
    ];
}
