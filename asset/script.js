const data_benar = $('.data-benar').data('benar');
if(data_benar){
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: data_benar
      });
}

const data_salah = $('.data-salah').data('salah');
if(data_salah){
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: data_salah
      });
}

$('.btn-delete').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Untuk menghapus data ini secara permanen",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus!'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })
});


$('.add-kelas').on('click', function(){
    $('#exampleModalLabel').html('Tambah Data Kelas');
    $('#form').attr('action','/tabungan/masterdata/add_kelas/');
});

$('.edit-kelas').on('click', function(){
    $('#exampleModalLabel').html('Edit Data Kelas');
    $('#form').attr('action','/tabungan/masterdata/edit_Kelas/');

    const id_kelas = $(this).data('id');
    
    $.ajax({
        url: '/tabungan/masterdata/get_kelas_id/',
        method : 'POST',
        data : {id : id_kelas},
        dataType : 'JSON',
        success : function(data){
            $('#kelas').val(data.nama_kelas);
            $('#idkelas').val(id_kelas);
        }
    });

});

$('.add-siswa').on('click', function(){
  const nisn = $(this).data('id');
  
  $.ajax({
    url : '/tabungan/masterdata/get_siswa_join_kelas_by_nisn/',
    data : {nisn : nisn},
    method : 'POST',
    dataType : 'JSON',
    success : function(d){
      $('#namasiswa').val(d.nama);
      $('#namakelas').val(d.nama_kelas);
      $('#nisn').val(d.nisn);
      $('#saldo').val(d.saldo);
    }
  });

});


$('#gen_pdf_transaksi').on('click', function(){
  $('#formGenerate').attr('action','/tabungan/masterdata/pdf_transaksi/');
});
$('#gen_pdf_penarikan').on('click', function(){
  $('#formGenerate').attr('action','/tabungan/masterdata/pdf_penarikan/');
});
$('#gen_excel_transaksi').on('click', function(){
  $('#formGenerate').attr('action','/tabungan/masterdata/excel_transaksi/');
});
$('#gen_excel_penarikan').on('click', function(){
  $('#formGenerate').attr('action','/tabungan/masterdata/excel_penarikan/');
});