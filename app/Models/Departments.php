<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;

    // Nama tabel, secara default Laravel menganggap nama tabel plural dari nama model
    protected $table = 'departments';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'name',          // Nama department
        'description',   // Deskripsi department
    ];
}
