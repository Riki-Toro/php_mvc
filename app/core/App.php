<?php

class App {
    protected   $controller = 'Home',
                $method = 'index',
                $params = [];

    public function __construct() {
        $url = $this->parseURL();
        
        // controller
        // cek dulu apakah ada file didalam folder controller yg namanya home
        if( file_exists('../app/controllers/' . $url[0] . '.php') ) {
            // jika ada kita timpa properti controller di atas dengan perperti yg baru 
            $this->controller = $url[0];

            // hilangkan controller nya dari elemen array
            unset($url[0]);
        }
        require_once '../app/controllers/' . $this->controller . '.php'; // panggil controller nya
        $this->controller = new $this->controller; //di instansiasi


        // method
        // cek dulu kalau ada,, kalau kosong pakai method default home
        if( isset($url[1]) ) {
            // cek ada atau tidak methodnya
            if( method_exists($this->controller, $url[1]) ){
                // kalau ada ditimpa
                $this->method = $url[1];
                unset($url[1]);
            }
        }


        // params
        // cek dulu ada atau tidak parameternya
        if( !empty($url) ) {
            // ambil datanya dengan fungsi array_values()
            // properti params di isi dengan valuesnya
            $this->params = array_values($url);
        }


        // jalankan controller & method, serta kirimkan params jika ada >> menggunakan function call_user_func_array()
        call_user_func_array([$this->controller, $this->method], $this->params);

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
