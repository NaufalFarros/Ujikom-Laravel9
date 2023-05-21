<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'artikel_id',
        'komentar_id'
    ];

    public function artikel()
    {
        return $this->belongsTo(Artikel::class);
    }
    public function komentar(){
        return $this->belongsTo(Komentar::class);
    }
}
