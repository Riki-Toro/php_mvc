<?php

class App {
    public function __construct() {
        $url = $this->parseURL();
        var_dump($url);
    }

    public function parseURL() {
        if( isset($_GET['url']) ) {
            // membersihkan atau menghilangkan tanda '/' diakhir url dengan fungsi rtrim()
            $url = rtrim($_GET['url'], '/');

            // membersihkan url dari karakter yang ngaco/dihack
            $url = filter_var($url, FILTER_SANITIZE_URL);

            // pecah url berdasarkan tanda '/' dengan fungsi explode()
            $url = explode('/', $url);
            return $url;
        }
    }
}

?>
