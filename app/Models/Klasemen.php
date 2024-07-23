<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasemen extends Model
{
    use HasFactory;

    protected $table = "klasemen";
    protected $fillable = [
        'klub_id',
        'bertanding',
        'menang',
        'draw',
        'kalah',
        'jumlah_goal',
        'jumlah_kebobolan',
        'point'
    ];

    public function klub()
    {
        return $this->hasOne(Klub::class, "id", "klub_id");
    }
}
