<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restok extends Model
{
    protected $fillable = [
        'user_id',
        'barang_id',
        'jumlah',
        'tanggal',
        'keterangan',
    ];

    protected $casts = [
        'jumlah' => 'integer',
        'tanggal' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
