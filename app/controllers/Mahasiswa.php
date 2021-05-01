<?php
class Mahasiswa extends Controller{
    public function index() {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();

        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id) {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);

        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        // jalankan method didalam model namanya tambah data mahasiswa
        if( $this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ) {
            // set flash massage
            Flasher::setflash('berhasil', 'ditambahkan', 'success');

            // redirect
            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        } else {
            // set flash massage
            Flasher::setflash('gagal', 'ditambahkan', 'danger');

            // redirect
            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id) {
        // jalankan method didalam model namanya tambah data mahasiswa
        if( $this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0 ) {
            // set flash massage
            Flasher::setflash('berhasil', 'dihapus', 'success');

            // redirect
            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        } else {
            // set flash massage
            Flasher::setflash('gagal', 'dihapus', 'danger');

            // redirect
            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function getEdit() {
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }
}


?>
