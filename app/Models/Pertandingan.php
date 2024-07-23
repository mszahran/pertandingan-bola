<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertandingan extends Model
{
    use HasFactory;

    protected $table = "pertandingan";

    protected $fillable = [
        "klub_id_1",
        "klub_id_2",
        "skor_klub_1",
        "skor_klub_2"
    ];
}
