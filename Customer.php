<?php

require_once __DIR__ . "/Authentication.php";

class Customer {
    use Authentication;

    public $cart = [];
    public $paymentMethod;

    /**
     * Aggiunge un oggetto di tipo prodotto al carrello. Può lanciare un eccezzione se l'argomento non è del tipo Product
     * @param mixed $product
     * 
     * @return void
     */
    public function addProductToCart($product) {
        // Controllare se è prodotto
        if (get_parent_class($product) !== "Product") {
            throw new Exception("Stai aggiungendo nel carrello qualcosa che non è un prodotto");
        }
        if (!$product->available) {
            throw new Exception("Prodotto non è disponibile");
        }
        $this->cart[] = $product;
    }

    /**
     * Calcola prezzo totale dei rodotti nel carrello, applico 20% di sconto se l'utente è registrato
     * @return [float] numero che rappresenta il prezzo totale
     */
    public function getTotalPrice() {
        $total_price = 0;
        foreach ($this->cart as $cartProduct) {
            $total_price += $cartProduct->price;
        }
        if($this->isRegistered()) {
            $total_price = $total_price * 0.8;
        }
        return $total_price;
    }

  
    /**
     * @param mixed $_paymentMethod
     * 
     * @return [type]
     */
    public function setPaymentMethod($_paymentMethod) {
        $this->paymentMethod = $_paymentMethod;
    }

    /**
     * Se la carta è valida, allora procede al pagamento
     * @return [string] "Hai pagato" se paga, "Errore di pagamento" altrimenti
     */
    public function pay() {
        if ($this->paymentMethod->isValid()) {
            return "Hai pagato";
        } else {
            return "Errore di pagamento";
        }
    }
}
