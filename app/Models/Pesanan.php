<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "kode",
        'numInvoice',
        "tanggal",
        "mulai",
        "berakhir",
        "durasi",
        "lapangan",
        "harga",
        "status",
    ];


    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
    
}
