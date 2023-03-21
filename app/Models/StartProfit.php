<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StartProfit extends Model
{
    use HasFactory;
    protected $table = "pif_nav_char";

    protected $fillable = [
        'created_at',
        'amount',
    ];
}
