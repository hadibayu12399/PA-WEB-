<html>
<head>
 <title>PRINT DOCUMENT</title>
    <link href="../../assets/css/style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
  <h3 align="center" style="color:#000;">APLIKASI INVENTARIS SARANA DAN PRASANA </h3>
      <h4 align="center">DATA KELUAR BARANG</h4>  
  <table class="table" border="1" align="center">
    <tr>
      <td class="q">ID Keluar Barang</td>
      <td class="q">Barang</td>
      <td class="q">Tanggal Keluar</td>
      <td class="q">Penerima</td>
      <td class="q">Jumlah Keluar</td>
      <td class="q">Keperluan</td>
    </tr>
    <style type="text/css">
      .q{
        font-weight: bold;
      }
    </style>
    <?php
    include "../../koneksi.php";
    $tampil = "SELECT * FROM tb_keluar_barang a JOIN tb_barang b ON a.kode_barang = b.kode_barang";
    $query =$dbh->query($tampil);
    foreach ($query as $data) {
    ?>
    <tr>
      <td><?php echo $data['id_brg_keluar']?></td>
      <td><?php echo $data['kode_barang']. ' | '.$data['nama_barang']?></td>
      <td><?php echo $data['tgl_keluar']?></td>
      <td><?php echo $data['penerima']?></td>
      <td><?php echo $data['jml_brg_keluar']?></td>
      <td><?php echo $data['keperluan']?></td>
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