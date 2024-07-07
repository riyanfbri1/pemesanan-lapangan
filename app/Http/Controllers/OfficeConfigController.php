<?php

namespace App\Http\Controllers;

use App\Models\OfficeConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfficeConfigController extends Controller
{

    public function ChekImage($req , $officeConfig ){
        if($req->payment_logo1 == null){
            $payment_logo1 = $officeConfig->payment_logo1;
        }
        else{
            $payment_logo1 = $req->file('payment_logo1')->store('Logo-Payment');
            
        }
        if($req->payment_logo2 == null){
            $payment_logo2 = $officeConfig->payment_logo2;
        }
        else{
            $payment_logo2 = $req->file('payment_logo2')->store('Logo-Payment');
        }

        if($req->payment_logo3 == null){
            $payment_logo3 = $officeConfig->payment_logo3;
        }
        else{
            $payment_logo3 = $req->file('payment_logo3')->store('Logo-Payment');
        }

        return [$payment_logo1,$payment_logo2,$payment_logo3];
    }

    public function EditOfficeConfig(Request $req)
    {
        $officeConfig =  OfficeConfig::all()->first();

        $image = $this->ChekImage($req, $officeConfig);
        $officeConfig->update([
            "payment_logo1" => $image[0],
            "payment_logo2" => $image[1],
            "payment_logo3" => $image[2]
        ]);

        $validate = $req->validate([
            "name" => 'required',
            "email" => 'required',
            "kontak_wa" => 'required',
            "alamat" => 'required',
            "harga_sewa" => 'required',
            "payment_name1" => 'required',
            "payment_name2" => 'required',
            "payment_name3" => 'required',
        ]);

        
        $officeConfig->update($validate);

        return back()->with('BerhasilUpdate','Data berhasil di Update');
    }
}
