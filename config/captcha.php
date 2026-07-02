<?php

$gitCaBundle = 'C:\Program Files\Git\mingw64\etc\ssl\certs\ca-bundle.crt';
$defaultVerify = PHP_OS_FAMILY === 'Windows' && file_exists($gitCaBundle) ? $gitCaBundle : true;
$verifyCert = env('NOCAPTCHA_VERIFY_CERT');

return [
    'secret' => env('NOCAPTCHA_SECRET'),
    'sitekey' => env('NOCAPTCHA_SITEKEY'),
    'options' => [
        'timeout' => 30,
        'verify' => $verifyCert ?: $defaultVerify,
    ],
];
