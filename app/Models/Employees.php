<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Employees extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi
    protected $table = 'employees';

    // Tentukan kolom yang dapat diisi (fillable)
    protected $fillable = [
        'user_id',
        'depart_id',
        'address',
        'place_of_birth',
        'dob',
        'religion',
        'sex',
        'phone',
        'salary',
        'photo',
    ];

    // Tentukan kolom yang harus diperlakukan sebagai tanggal
    protected $dates = ['dob']; // Menambahkan ini

    // Hubungan dengan model lain jika diperlukan (misal dengan User dan Departments)
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function department() {
        return $this->belongsTo(Departments::class, 'depart_id');
    }
}
