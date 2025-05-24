<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MInuman extends Model
{
    protected $table = 'minumans'; // ini penting!

    protected $fillable = ['nama', 'deskripsi', 'harga', 'foto'];
}
