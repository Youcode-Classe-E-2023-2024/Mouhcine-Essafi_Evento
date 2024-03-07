<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'location',
        'date',
        'time',
        'price',
        'nbr_place',
        'description',
        'reservation_type',
        'image',
        'creator',
        'category_id'
    ];
}
