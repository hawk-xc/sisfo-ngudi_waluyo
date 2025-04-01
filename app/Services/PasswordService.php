<?php

namespace App\Services;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Encryption\EncryptException;
use Illuminate\Support\Facades\Crypt;

class PasswordService
{
    public static function encrypt($password)
    {
        try {
            return Crypt::encryptString($password);
        } catch (EncryptException $e) {
            return null;
        }
    }

    public static function decrypt($encryptedPassword)
    {
        try {
            return Crypt::decryptString($encryptedPassword);
        } catch (DecryptException $e) {
            return null;
        }
    }
}
