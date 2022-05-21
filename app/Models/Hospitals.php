<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospitals extends Model
{
    use HasFactory;

    protected $fillable = [
        'hospital_name',
        'address',
        'state',
        'image_link',
        'phone',
    ];
}
