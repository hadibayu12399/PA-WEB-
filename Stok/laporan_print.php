<html>
<head>
 <title>PRINT DOCUMENT</title>
    <link href="../../assets/css/style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
  <h3 align="center" style="color:#000;">APLIKASI INVENTARIS SARANA DAN PRASANA </h3>
      <h4 align="center">DATA STOK</h4>  
    <table class="table" border="1" align="center">
    <tr>
      <td class="q">Barang</td>
      <td class="q">Jumlah Barang Masuk</td>
      <td class="q">Jumlah Barang Keluar</td>
      <td class="q">Total Barang Tersedia</td>
      <td class="q">Keterangan</td>
    </tr>
    <?php
    include "../../koneksi.php";
    $tampil = "SELECT * FROM v_stok";
    $query =$dbh->query($tampil);
    foreach ($query as $data) {
    ?>
    <tr>
      <td><?php echo $data['kode_barang']. ' | '.$data['nama_barang'] ?></td>
      <td><?php echo $data['jml_masuk']?></td>
      <td><?php echo $data['jml_barang_keluar']?></td>
      <td><?php echo $data['jml_total']?></td>
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
<style type="text/css">
  .q{
    font-weight: bold;
  }
</style>