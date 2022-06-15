<?php

class User {
    public $name;
    public $email;
    public $cart = [];
    public $paymentMethod;

    /**
     * Aggiunge un oggetto di tipo prodotto al carrello
     * @param mixed $product
     * 
     * @return [boolean] True se aggiunge al carrello, false altrimenti
     */
    public function addProductToCart($product) {
        // Controllare se è prodotto
        if (get_parent_class($product) === "Product") {
            $this->cart[] = $product;
            return true;
        }
        return false;
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

    /** Controlla se l'utente è registrato
     * @return [boolean] Ritorna true se l'utente è registrato, false altrimenti
     */
    public function isRegistered() {
        if ($this->email && $this->name) {
            return true;
        }
        return false;
    }

 
    /**
     * @param string $_name
     * @param string $_email
     * 
     * @return void
     */
    public function register($_name, $_email) {
        $this->name = $_name;
        $this->email = $_email;
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
