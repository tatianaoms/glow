<?php

$secreto = "MiClaveSecretaGlow2026";

$hubSignature = $_SERVER['HTTP_X_HUB_SIGNATURE'] ?? '';
if (empty($hubSignature)) {
    die('No signature');
}

list($algo, $hash) = explode('=', $hubSignature, 2);
$payload = file_get_contents('php://input');
$payloadHash = hash_hmac($algo, $payload, $secreto);

if ($hash !== $payloadHash) {
    die('Firma inválida');
}


echo "Iniciando despliegue de Glow...\n";
chdir('/var/www/html');

echo shell_exec('git pull origin main 2>&1');
echo shell_exec('php artisan migrate --force 2>&1');
echo shell_exec('npm run build 2>&1');

echo "¡Despliegue finalizado con éxito para Tatiana!";
