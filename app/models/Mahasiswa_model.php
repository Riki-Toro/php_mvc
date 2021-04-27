<?php
class Mahasiswa_model {
    // private $mhs = [
    //     [
    //         "nama" => "Riki Widiantoro",
    //         "nim" => "111111",
    //         "jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //         "nama" => "Eren Yeager",
    //         "nim" => "222222",
    //         "jurusan" => "Teknik Industri"
    //     ],
    //     [
    //         "nama" => "Uchiha Sasuke",
    //         "nim" => "333333",
    //         "jurusan" => "Sistem Informasi"
    //     ]
    // ];

    // koneksi ke database menggunakan PDO (php data object) lebih simpel kedepannya >> dengan pdo akan lebih mudah dibandingkan driver nya mysqli
    private $dbh; // database handler
    private $stmt; // untuk menyimpan query

    // koneksi ke database dengan method construct
    public function __construct() {
        // data source name = koneksi ke database
        $dsn = 'mysql:host=localhost;dbname=phpmvc';

        try {
            $this->dbh = new PDO($dsn, 'root', ''); // jika berhasil masuk database
        } catch( PDOException $e ) {
            die($e->getMessage()); // jika error hentikan program lalu kasih pesan error
        }
    }

    public function getAllMahasiswa() {
        // untuk mendapatkan nya kita butuh query
        $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa'); // jalanin query
        $this->stmt->execute(); // eksekusi query
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}



?>
