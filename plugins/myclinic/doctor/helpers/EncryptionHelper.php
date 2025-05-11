<?php

use Illuminate\Support\Str;

define('SECRET_KEY', 'Easy-Booking-App');

function encryptData($data) {
    try {
        // Generate a fixed IV for consistent results (16 bytes)
        $iv = '1234567890123456'; 

        // Encrypt the data using AES-128-CBC
        $encryptedData = openssl_encrypt($data, 'aes-128-cbc', SECRET_KEY, OPENSSL_RAW_DATA, $iv);

        // First Base64 encode (similar to CryptoJS output)
        $base64EncryptedData = base64_encode($encryptedData);

        // Second Base64 encode, as in the Angular code
        return base64_encode($base64EncryptedData);
    } catch (Exception $e) {
        return '';
    }
}

