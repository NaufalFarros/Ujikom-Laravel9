<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_komentar',
        'isi_komentar',
        'email'
    ];

    public function detail()
    {
        return $this->hasMany(detail::class);
    }
}
