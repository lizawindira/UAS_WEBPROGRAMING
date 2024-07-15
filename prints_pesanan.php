<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

$conn_1 = mysqli_connect("localhost","root","","shop_db");

if(!isset($admin_id)){
   header('location:admin_login.php');
}
function query($query){
    global $conn_1;
    $result = mysqli_query($conn_1, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

$orders = query("SELECT * FROM orders");


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>prints reports</title>
   <link rel="stylesheet" href="../components/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body >

<body>
    <div class="container">
      <div class="row">
        <div class="col-md-10 mx-auto mt-5">
          <div class="text-center">
            <h3>Laporan Transaksi Penjualan</h3>
            <h5>FILIZ Water</h5>
            <p>WA : 083194698529 | Alamat : Jl. Pegangsangan No. 74 Surabaya</p>
          </div>
          <div class="card">
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Id Order</th>
                    <th>Pelanggan</th>
                    <th>Tanggal Transaksi</th>
                    <th>Total</th>
                    <th>Diskon</th>
                    <th>Total (Diskon)</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1;
                  foreach ($orders as $row) :?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td>GlN00<?= $i++; ?></td>
                      <td><?= $row['name'] ?></td>
                      <td><?= $row['placed_on'] ?></td>
                      <td>Rp. <?= $row['total_price'] ?></td>
                      <td>0%</td>
                      <td>Rp. <?= $row['total_price'] ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      window.print();
    </script>
  </body>










<script src="../components/bootstrap/js/bootstrap.bundle.min.js"></>
<script src="../js/admin_script.js"></script>
   
</body>
</html>