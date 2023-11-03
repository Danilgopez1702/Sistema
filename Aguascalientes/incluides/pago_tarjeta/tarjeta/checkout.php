<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="checkout.css" />
  <script src="https://js.stripe.com/v3/"></script>
  <script src="checkout.js" defer></script>
</head>

<body>
  <!-- Mostrar un formulario de pago -->
  <form id="payment-form">
    <div id="link-authentication-element">
      <!--Stripe.js inyecta el elemento de autenticación de enlace-->
    </div>
    <div id="payment-element">
      <!--Stripe.js inyecta el elemento de pago-->
    </div>
    <button id="submit">
      <div class="spinner hidden" id="spinner"></div>
      <span id="button-text">Pagar</span>
    </button>
    <div id="payment-message" class="hidden"></div>
  </form>
</body>