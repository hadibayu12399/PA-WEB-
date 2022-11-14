<html>
<head>
 <title>PRINT DOCUMENT</title>
    <link href="../../assets/css/style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
  <h3 align="center" style="color:#000;">APLIKASI INVENTARIS SARANA DAN PRASANA </h3>
      <h4 align="center">DATA BARANG</h4>  
  <table class="table" border="1" align="center">
    <tr>
      <td class="td-md">Kode Barang</td>
      <td class="td-md">Nama Barang</td>
      <td class="td-md">Spesifikasi</td>
      <td class="td-md">Lokasi Barang</td>
      <td class="td-md">Kategori</td>
      <td class="td-md">Jumlah</td>
      <td class="td-md">Kondisi</td>
      <td class="td-md">Jenis Barang</td>
      <td class="td-md">Sumber Dana</td>
    </tr>
    <?php
    include "../../koneksi.php";
    $tampil = "SELECT * FROM tb_barang";
    $query = $dbh->query($tampil);
    foreach ($query as $data ){
    ?>
    <tr>
      <td><?php echo $data['kode_barang']?></td>
      <td><?php echo $data['nama_barang']?></td>
      <td><?php echo $data['spesifikasi']?></td>
      <td><?php echo $data['lokasi_barang']?></td>
      <td><?php echo $data['kategori']?></td>
      <td><?php echo $data['jml_barang']?></td>
      <td><?php echo $data['kondisi']?></td>
      <td><?php echo $data['jenis_barang']?></td>
      <td><?php echo $data['sumber_dana']?></td>
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
  .td-md{
    font-weight: bold;
  }
</style>