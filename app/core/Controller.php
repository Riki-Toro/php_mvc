<?php

class Controller {
    public function view($view, $data = []) {
        // panggil folder view
        require_once '../app/views/' . $view . '.php';
    }
}

?>
