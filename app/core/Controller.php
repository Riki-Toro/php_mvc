<?php

class Controller {
    public function view($view, $data = []) {
        // panggil folder view
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model; //harus di instansiasi dulu
    }
}

?>
