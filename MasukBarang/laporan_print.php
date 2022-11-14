<html>
<head>
 <title>PRINT DOCUMENT</title>
    <link href="../../assets/css/style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
  <h3 align="center" style="color:#000;">APLIKASI INVENTARIS SARANA DAN PRASANA </h3>
      <h4 align="center">DATA MASUK BARANG</h4>  
    <table class="table" border="1" align="center">
    <tr>
      <td class="td-md">ID MASUK BARANG</td>
      <td class="td-md">Barang</td>
      <td class="td-md">Tanggal Masuk</td>
      <td class="td-md">Jumlah Masuk</td>
      <td class="td-md">Supplier</td>
    </tr>
    <?php
    include "../../koneksi.php";
    $tampil = "SELECT * FROM tb_masuk a JOIN tb_barang b ON a.kode_barang = b.kode_barang JOIN tb_supplier c ON a.kode_supplier = c.kode_supplier";
    $query =$dbh->query($tampil);
    foreach ($query as $data) {
    ?>
    <tr>
     <td><?php echo $data['id_msk_brg']?></td>
      <td><?php echo $data['kode_barang']. ' | ' . $data['nama_barang']?></td>
      <td><?php echo $data['tgl_masuk']?></td>
      <td><?php echo $data['jml_masuk']?></td>
      <td><?php echo $data['kode_supplier'] . ' | ' . $data['nama_supplier']?></td>
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