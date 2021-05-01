// baris javascript yg akan dijalankan ketika halamannya sudah siap // untuk menggantikan method ready()
$(function() {

    // untuk tampilan tombol tambah agar tidak sama dengan edit
    $('.tombolTambahData').on('click', function() {
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });

    // buat even ketika tombol edit di klik
    $('.tampilModalEdit').on('click', function() {
        // ubah nama label
        $('#formModalLabel').html('Edit Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Edit Data');

        // ambil data yg ada
        // ambil id dari tiap-tiap data yg ada
        const id = $(this).data('id');
        
        // jalankan ajax
        $.ajax({
            url: 'http://localhost/11.phpmvc/public/mahasiswa/getEdit',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#jurusan').val(data.jurusan);
            }
        });

    });
});
