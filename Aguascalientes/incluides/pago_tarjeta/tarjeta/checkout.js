// Esta es una clave API de prueba de muestra pública.
// No envíe ninguna información de identificación personal en las solicitudes realizadas con esta clave.
// Inicie sesión para ver su propia clave API de prueba integrada en ejemplos de código.
const stripe = Stripe("pk_test_51NpgDJGgSyexLtDthbmn62Oagipj6IIIdsHZjsvHMXLDd7xsLCw00qkIuJC6CAWhyir6LlTWslMM9ER6BDcVQiuF00046OYNkE");

// Los artículos que el cliente quiere comprar
const items = [{ id: "xl-tshirt" }];

let elements;

initialize();
checkStatus();

document
  .querySelector("#payment-form")
  .addEventListener("submit", handleSubmit);

let emailAddress = '';
// Obtiene una intención de pago y captura el secreto del cliente
async function initialize() {

  const urlParams = new URLSearchParams(window.location.search);
  const cantidad = parseInt(urlParams.get('dinero'));
  console.log(cantidad);
  const { clientSecret } = await fetch("create.php?dinero=" + cantidad, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ items }),
  }).then((r) => r.json());

  elements = stripe.elements({ clientSecret });

  const linkAuthenticationElement = elements.create("linkAuthentication");
  linkAuthenticationElement.mount("#link-authentication-element");

  const paymentElementOptions = {
    layout: "tabs",
  };

  const paymentElement = elements.create("payment", paymentElementOptions);
  paymentElement.mount("#payment-element");
}

async function handleSubmit(e) {
  e.preventDefault();
  setLoading(true);

  const { error } = await stripe.confirmPayment({
    elements,
    confirmParams: {
      // Asegúrate de cambiar esto a tu página de finalización de pago
      return_url: "https://www.google.com/",
      receipt_email: emailAddress,
    },
  });

  // Este punto sólo se alcanzará si hay un error inmediato al
  // confirmando el pago. De lo contrario, su cliente será redirigido a
  // tu `return_url`. Para algunos métodos de pago como iDEAL, su cliente
  // ser redirigido a un sitio intermedio primero para autorizar el pago, luego
  // redirigido a `return_url`.
  if (error.type === "card_error" || error.type === "validation_error") {
    showMessage(error.message);
  } else {
    showMessage("An unexpected error occurred.");
  }

  setLoading(false);
}

// Obtiene el estado de la intención de pago después del envío del pago
async function checkStatus() {
  const clientSecret = new URLSearchParams(window.location.search).get(
    "payment_intent_client_secret"
  );

  if (!clientSecret) {
    return;
  }

  const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

  switch (paymentIntent.status) {
    case "succeeded":
      showMessage("Payment succeeded!");
      window.opener.postMessage("Pago exitoso")
      break;
    case "processing":
      showMessage("Your payment is processing.");
      break;
    case "requires_payment_method":
      showMessage("Your payment was not successful, please try again.");
      break;
    default:
      showMessage("Something went wrong.");
      break;
  }
}

// ------- Ayudantes de UI -------

function showMessage(messageText) {
  const messageContainer = document.querySelector("#payment-message");

  messageContainer.classList.remove("hidden");
  messageContainer.textContent = messageText;

  setTimeout(function () {
    messageContainer.classList.add("hidden");
    messageContainer.textContent = "";
  }, 4000);
}

// Mostrar una rueda giratoria al enviar el pago
function setLoading(isLoading) {
  if (isLoading) {
    // Deshabilita el botón y muestra una ruleta
    document.querySelector("#submit").disabled = true;
    document.querySelector("#spinner").classList.remove("hidden");
    document.querySelector("#button-text").classList.add("hidden");
  } else {
    document.querySelector("#submit").disabled = false;
    document.querySelector("#spinner").classList.add("hidden");
    document.querySelector("#button-text").classList.remove("hidden");
  }
}