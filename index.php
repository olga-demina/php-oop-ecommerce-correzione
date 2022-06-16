<?php
// Oggi pomeriggio provate ad immaginare quali sono le classi necessarie per creare uno shop online con le seguenti caratteristiche.
// L'e-commerce vende prodotti per gli animali.
// I prodotti saranno oltre al cibo, anche giochi, cucce, etc.
// L'utente potrà sia comprare i prodotti senza registrarsi, oppure iscriversi e ricevere il 20% di sconto su tutti i prodotti.
// Il pagamento avviene con la carta di credito, che non deve essere scaduta.
// BONUS:
// Alcuni prodotti (es. antipulci) avranno la caratteristica che saranno disponibili solo in un periodo particolare (es. da maggio ad agosto).

require_once __DIR__ . "/Food.php";
require_once __DIR__ . "/Toy.php";
require_once __DIR__ . "/Cosmetics.php";
require_once __DIR__ . "/Customer.php";
require_once __DIR__ . "/CreditCard.php";
require_once __DIR__ . "/Supplier.php";

// Aggiunta di supplier
$tuttoPerGatti = new Supplier();
$tuttoPerGatti->register("Tutto per gatti", "tuttopergatti@gmail.com");

var_dump($tuttoPerGatti->isRegistered());
var_dump($tuttoPerGatti);

// Creazione di prodotti
$cat_food = new Food("Royal Canin extra pack", "Royal Canin", "Cibo per i gatti", 9, 500, "chicken");
// var_dump($cat_food);
echo $cat_food->printProductInfo();

$mouse = new Toy("Mouse", "Toys for Cat", "Topo di peluche", 4.99);
$mouse->color = "grey";
$mouse->material = "peluche";
// var_dump($mouse);
echo $mouse->printProductInfo();

$cat_shampoo = new Cosmetics("Cat Shampoo", "My cat", "Shampoo per i gatti", 3.50, false);
// var_dump($cat_shampoo);
echo $cat_shampoo->printProductInfo();

// Customer sta facendo la spesa
$olga = new Customer();

try {
    $olga->addProductToCart($cat_food);
} catch (Exception $e) {
    echo "<br>" . $e->getMessage() . "<br>";
}

try {
    $olga->addProductToCart($cat_shampoo);
} catch (Exception $e) {
    echo  "<br>" .  $e->getMessage() . "<br>";
}

// Provo a lanciare l'eccezzione
try {
    $olga->addProductToCart($tuttoPerGatti);
} catch (Exception $e) {
  echo $e->getMessage();  
}

var_dump($olga);

// Registrazione e pagamento
$olga->register("olga", "olga@gmail.com");

$olga->setPaymentMethod(new CreditCard(2340294209482, "02/25", 345));

echo $olga->pay();


?>

<?php if ($olga->isRegistered()) { ?>
    <h1>Ciao <?php echo $olga->name; ?></h1>
<?php } ?>

<h2>Il tuo carrello</h2>
<ul>
    <?php foreach ($olga->cart as $cartProduct) { ?>
        <li><?php echo $cartProduct->printProductInfo(); ?></li>
    <?php } ?>
</ul>
<h3>Prezzo totale: € <?php echo $olga->getTotalPrice(); ?></h3>