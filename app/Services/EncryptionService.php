<?php 
namespace App\Services;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Config;

class EncryptionService
{
    /**
     * Get the salt from the environment file.
     *
     * @return string
     */
    private static function getSalt()
    {
        return Config::get('app.salt');
    }

    /**
     * Encrypt a given value with salt.
     *
     * @param string $value
     * @return string
     */
    public static function encryptWithSalt($value)
    {
        $salt = self::getSalt();

        // Combine the value with salt
        $valueWithSalt = $value . $salt;

        // Encrypt the value
        return Crypt::encryptString($valueWithSalt);
    }

    /**
     * Decrypt a given value with salt.
     *
     * @param string $encryptedValue
     * @return stringEncryptionService
     */
    public static function decryptWithSalt($encryptedValue)
    {
        $salt = self::getSalt();

        // Decrypt the value
        $valueWithSalt = Crypt::decryptString($encryptedValue);

        // Remove the salt from the decrypted value
        // Assuming you know the salt length or structure
        return rtrim($valueWithSalt, $salt);
    }
}
