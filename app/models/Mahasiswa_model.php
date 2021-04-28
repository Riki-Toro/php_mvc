<?php
class Mahasiswa_model {
    private $tabel = 'mahasiswa';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllMahasiswa() {
        $this->db->query('SELECT * FROM ' . $this->tabel);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id) {
        $this->db->query('SELECT * FROM ' . $this->tabel . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}



?>
