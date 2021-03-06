<!-- L'e-commerce vende prodotti per gli animali.
I prodotti saranno oltre al cibo, anche giochi, cucce, etc.
L'utente potrà sia comprare i prodotti senza registrarsi, oppure iscriversi e ricevere il 20% di sconto su 
tutti i prodotti.
Il pagamento avviene con la carta di credito, che non deve essere scaduta. 
-->

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
require_once __DIR__ . "/product.php";
require_once __DIR__ . "/user.php";
require_once __DIR__ . "/food.php";
require_once __DIR__ . "/toy.php";
require_once __DIR__ . "/transport.php";
require_once __DIR__ . "/CreditCard.php";

//New product
$dogFood = new Food("Crocchette di pollo", "4.99", "Italy", "Cani", "13/11/2022");
$catFood = new Food("Carne in scatola", "3.99", "Italy", "Gatti", "01/12/2022");
$catToy = new Toy("Corda per gatti", "2.99", "China", "Gatti", "sisal");
$dogBone = new Toy("Osso giocattolo per cani", "7.99", "Italy", "Cani", "plastica");
$transporCage = new Transport("Cuccia da trasporto", "39.99", "Germany","medium", "Nero");
$transportBag = new Transport("Borsa per trasporto", "19.99", "Germany", "large", "blu");

//New User
$Michele = new User("Michele", "Mikael@lao.it", "true");
$Giovanni = new User("Giovanni","Gio_giu@tu.com", "false");//Utente non registrato con dati di pagamento non validi

$Michele->setPaymentMethod(new CreditCard(123454321, "03/26", 219));
$Giovanni->setPaymentMethod(new CreditCard(12674321, "03/21", 129));

//Prodotti scelti dall'utente e aggiunti al carrello
/*$Giovanni*/$Michele->addToCart($dogBone);
/*$Giovanni*/$Michele->addToCart($catToy);
$catToy->disponibile = false;
try {
  $Michele->checkProductCart($catToy);
} catch (Exception $e) {
  // Mandare messaggio d'errore
  echo "E' avvenuto un errore inaspettato";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
  <!-- stampa provvisoria -->
  <div class="d-flex flex-wrap w-100 mt-2 px-5 text-light text-center">
    <div class="card bg-dark mx-5 w-25 mb-1 p-2 text-center">
      <?php echo $dogFood -> printProduct(); ?>
      <button class="rounded-pill w-50 mx-auto my-2 bg-info border-info text-light">Acquista</button>
      <?php echo $dogFood -> printFormat(); ?>
    </div>
    <div class="card bg-dark w-25 mx-5 mb-1 p-2">
      <?php echo $catFood -> printProduct(); ?>
      <button class="rounded-pill w-50 mx-auto my-2 bg-info border-info text-light">Acquista</button>
      <?php echo $catFood -> printFormat(); ?>
    </div>
    <div class="card bg-dark w-25 mx-5 mb-1 p-2">
      <?php echo $catToy -> printProduct(); ?>
      <button class="rounded-pill w-50 mx-auto my-2 bg-info border-info text-light">Acquista</button>
    </div>
    <div class="card bg-dark w-25 mx-5 mb-1 p-2">
      <?php echo $dogBone -> printProduct();?>
      <button class="rounded-pill w-50 mx-auto my-2 bg-info border-info text-light">Acquista</button>
    </div>
    <div class="card bg-dark w-25 mx-5 mb-1 p-2">
      <?php echo $transporCage -> printProduct(); ?>
      <button class="rounded-pill w-50 mx-auto my-2 bg-info border-info text-light">Acquista</button>
    </div>
    <div class="card bg-dark w-25 mx-5 mb-1 p-2">
      <?php echo $transportBag -> printProduct(); ?>
      <button class="rounded-pill w-50 mx-auto my-2 bg-info border-info text-light">Acquista</button>
    </div>
    
    <div class="w-75 mx-auto px-5 py-2 mt-4 text-dark">
      <h1 class="fas fa-shopping-cart"></h1>
    
      <?php foreach($Michele->cart as $cartItem) { ?>
        <div>
          <?php echo $cartItem->nome; ?>
          <?php echo $cartItem->prezzo; ?> $
        </div>
      <?php } ?>

      <h3>Totale: $<?php echo $Michele->getTotalPrice(); ?></h3>
      <?php echo $Michele->payamentMethod_result(); ?>
      <button class="rounded-pill w-50 mx-auto my-2 bg-dark border-white text-light">Completa l'ordine</button>
    </div>
  </div>
</body>
</html>
