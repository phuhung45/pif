<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Management extends Model
{
    use HasFactory;
    protected $table = "pif_management";

    protected $fillable = [
        'name',
        'manage_type',
        'position',
        'biography',
        'avatar',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
