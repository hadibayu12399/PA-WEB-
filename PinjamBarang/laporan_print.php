<html>
<head>
 <title>PRINT DOCUMENT</title>
    <link href="../../assets/css/style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
  <h3 align="center" style="color:#000;">APLIKASI INVENTARIS SARANA DAN PRASANA </h3>
      <h4 align="center">DATA PINJAM BARANG</h4>  
   <table class="table" border="1" align="center">
    <tr>
      <td class="q">No Pinjam</td>
      <td class="q">Tanggal Pinjam</td>
      <td class="q">Barang</td>
      <td class="q">Jumlah</td>
      <td class="q">Peminjam</td>
      <td class="q">Tanggal Kembali</td>
      <td class="q">Keterangan</td>
    </tr>
    <style type="text/css">
      .q{
        font-weight: bold;
      }
    </style>
    <?php
    include "../../koneksi.php";
    $tampil = "SELECT * FROM tb_pinjam_barang a JOIN tb_barang b ON a.kode_barang = b.kode_barang";
    $query =$dbh->query($tampil);
    foreach ($query as $data) {
    ?>
    <tr>
      <td><?php echo $data['no_pinjam']?></td>
      <td><?php echo $data['tgl_pinjam']?></td>
      <td><?php echo $data['kode_barang']. ' | '.$data['nama_barang']?></td>
      <td><?php echo $data['jml_pinjam']?></td>
      <td><?php echo $data['peminjam']?></td>
      <td><?php echo $data['tgl_kembali']?></td>
      <td><?php echo $data['keterangan']?></td>
    </tr>
    <?php
    }
    ?>
  </table>
  
<script>
  window.load = print_d();
  function print_d(){
   window.print();
  }
 </script>

</body>
</html>