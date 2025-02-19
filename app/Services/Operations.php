<?php

namespace App\Services;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class Operations{
    public static function decryptID($value)
    {
        try{
        $value = Crypt::decrypt($value);
        }catch(DecryptException $e){
            return redirect()->route('home');
            echo 'erro na "descriptação"';

        }
        return $value;
    }

}
