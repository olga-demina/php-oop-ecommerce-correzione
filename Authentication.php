<?php

trait Authentication {
    public $name;
    public $email;


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
}
