<?php

require_once '../../vendor/autoload.php';
require_once '../secrets.php';

$stripe = new \Stripe\StripeClient($stripeSecretKey);

function calculateOrderAmount(array $items): int
{
    // Reemplaza esta constante con un cálculo del monto del pedido
    // Calcula el total del pedido en el servidor para evitar
    // personas que manipulen directamente el importe del cliente
    return 1400;
}

header('Content-Type: application/json');

try {
    // recuperar JSON del cuerpo POST
    $jsonStr = file_get_contents('php://input');
    $jsonObj = json_decode($jsonStr);

    // Crea un PaymentIntent con monto y moneda
    $paymentIntent = $stripe->paymentIntents->create([
        'amount' => calculateOrderAmount($jsonObj->items),
        'currency' => 'mxn',
        // En la última versión de la API, especificar el parámetro `automatic_paid_methods` es opcional porque Stripe habilita su funcionalidad de forma predeterminada.
        'automatic_payment_methods' => [
            'enabled' => true,
        ],
    ]);

    $output = [
        'clientSecret' => $paymentIntent->client_secret,
    ];

    echo json_encode($output);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}