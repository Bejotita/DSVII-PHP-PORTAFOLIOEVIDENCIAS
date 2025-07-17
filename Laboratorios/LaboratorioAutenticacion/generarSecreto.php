<?php
require_once 'phpqrcode/qrlib.php'; // ruta a tu librería
include("clases/mysql.inc.php");
$db= new mod_db();
require 'vendor/autoload.php'; //Librería Composer

use Sonata\GoogleAuthenticator\GoogleAuthenticator;
use Sonata\GoogleAuthenticator\GoogleQrUrl;
$g = new GoogleAuthenticator();
$secret = $g->generateSecret();
//guardarSecretEnBaseDeDatos($usuario_id, $secret); // Implementa esta función
$correo = 'usuario@ejemplo.com';
$app = 'MiSistema';
$url = GoogleQrUrl::generate($correo, $secret, $app);
$qr_url = 'https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=' . $url;
echo '<img src="' . $qr_url . '" alt="Escanea este QR con Google Authenticator">'
?>