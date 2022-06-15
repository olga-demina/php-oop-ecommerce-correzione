<?php
class CreditCard {
    public $card_number;
    public $expiration;
    public $cvc;

    function __construct($_card_number, $_expiration, $_cvc ) {
        $this->card_number = $_card_number;
        $this->expiration = $_expiration;
        $this->cvc = $_cvc;
    }

    /**
     * Controlla se la data di scadenza è maggiore della data di oggi
     * @return [boolean] true se expiration date è maggiore di oggi, false altrimenti
     */
    public function isValid() {
        $today = new \DateTime('midnight');
        $expiration_datetime = \DateTime::createFromFormat("m/y", $this->expiration);
        return $today < $expiration_datetime;
    }
}
