<?php
// jalankan session
if( !session_id() ) {
    session_start();
}

require_once '../app/init.php'; //teknik bootstraping cuma memanggil file init dan init akan memanggil seluruh file app

$app = new App;


?>
