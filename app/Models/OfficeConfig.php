<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "kontak_wa",
        "alamat",
        "harga_sewa",
        "payment_name1",
        "payment_name2",
        "payment_name3",
        "payment_logo1",
        "payment_logo2",
        "payment_logo3",
    ];
}
