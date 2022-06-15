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

//New product
$dogFood = new Food("Crocchette di pollo", "4.99", "Italy", "Cani", "13/11/2022");
$catFood = new Food("Carne in scatola", "3.99", "Italy", "Gatti", "01/12/2022");
$catToy = new Toy("Corda per gatti", "2.99", "China", "Gatti", "sisal");
$dogBone = new Toy("Osso giocattolo per cani", "7.99", "Italy", "Cani", "plastica");
$transporCage = new Transport("Cuccia da trasporto", "39.99", "Germany","medium", "Nero");
$transportBag = new Transport("Borsa per trasporto", "19.99", "Germany", "large", "blu");

//New User
$Michele = new User("Michele", "Mikael@lao.it", "20/09/2023", "true");

//Prodotti scelti dall'utente
$Michele->addToCart($dogBone);
$Michele->addToCart($catToy);
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
  <h1 class="bg-info">Scegli qui i prodotti che fanno per te ed inizia ad acquistare! Per gli utenti registrati il 20% di sconto, cosa stai aspettando?</h1>
  
  <div class="d-flex flex-wrap w-100 mt-5 px-5 text-light text-center">
    <div class="card bg-dark mx-5 w-25 mb-1 p-2 text-center">
      <?php echo $dogFood -> printProduct(); ?>
      <button class="rounded-pill w-50 mx-auto my-2 bg-info border-info text-light">Acquista</button>
    </div>
    <div class="card bg-dark w-25 mx-5 mb-1 p-2">
      <?php echo $catFood -> printProduct(); ?>
      <button class="rounded-pill w-50 mx-auto my-2 bg-info border-info text-light">Acquista</button>
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
      <button class="rounded-pill w-25 mx-auto my-2 bg-dark border-white text-light">Completa l'ordine</button>
    </div>
  </div>
</body>
</html>
