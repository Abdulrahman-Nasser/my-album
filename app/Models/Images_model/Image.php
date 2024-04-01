<?php

namespace App\Models\Images_model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $filable = [
        'name',
        'albumId',
        'image'
    ];
}
