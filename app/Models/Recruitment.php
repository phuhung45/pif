<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;
    protected $table = "pif_recruitment";

    protected $fillable = [
        'title',
        'introtext',
        'fulltext',
        'images',
    ];
}
