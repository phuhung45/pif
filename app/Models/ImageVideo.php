<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageVideo extends Model
{
    use HasFactory;
    protected $table = "pif_news";
    protected $dateFormat = 'd-m-Y';
    protected $fillable = [
        'title',
        'content',
        'sub_content',
        'created_user',
        'created_user_name',
        'thumbnail',
        'slug',
        'category',
        'created_at',
    ];
}
