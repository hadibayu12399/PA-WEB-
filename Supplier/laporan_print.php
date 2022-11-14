<html>
<head>
 <title>PRINT DOCUMENT</title>
    <link href="../../assets/css/style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
  <h3 align="center" style="color:#000;">APLIKASI INVENTARIS SARANA DAN PRASANA </h3>
      <h4 align="center">DATA SUPPLIER</h4>  
    <table class="table" border="1" align="center">
    <tr>
      <td class="q">Kode Supplier</td>
      <td class="q">Nama Supplier</td>
      <td class="q">Alamat Supplier</td>
      <td class="q">Telepon</td>
      <td class="q">Kota Supplier</td>
    </tr>
    <?php
    include "../../koneksi.php";
    $tampil = "SELECT * FROM tb_supplier";
    $query =$dbh->query($tampil);
    foreach ($query as $data) {
    ?>
    <tr>
      <td align="center"><?php echo $data['kode_supplier']?></td>
      <td><?php echo $data['nama_supplier']?></td>
      <td><?php echo $data['alamat_supplier']?></td>
      <td><?php echo $data['telp_supplier']?></td>
      <td><?php echo $data['kota_supplier']?></td>
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