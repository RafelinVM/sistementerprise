<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    // Tentukan nama tabel jika berbeda dari nama model secara default
    protected $table = 'payrolls';

    // Tentukan kolom-kolom yang boleh diisi (fillable)
    protected $fillable = [
        'user_id',
        'salary',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}