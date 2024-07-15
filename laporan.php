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
   <title>reports</title>
   <link rel="stylesheet" href="../components/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="dashboard">

   <h1 class="heading mb-1">Reports</h1>

</section>


<div class="container" style="font-size: 15px;" >
<div class="card p-2 mt-2 mx-auto">
  <div class="card-header"  >
    <h5 style="font-size: 18px;" >Data Pemesanan</h5>
  </div>
  <div class="card-title">
    <button class="btn btn-sm btn-primary" style="width: 250px;"><a href="prints_pesanan.php" class="text-decoration-none text-light" target="_blank" >Prints Report</a></button>
  </div>
  <div class="card-body">
  <div >
<table  class="table table-bordered table-striped table-hover">
    <thead>
        <tr class="text-center" >
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Tanggal Transaksi</th>
            <th scope="col">Method</th>
            <th scope="col">Total Products</th>
            <th scope="col">Harga</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($orders as $data ) : ?> 
            <tr>
                <td scope="row"><?= $i ?></td>
                <td><?= $data["name"]?></td>
                <td><?= $data["address"]?></td>
                <td><?= $data["placed_on"]?></td>
                <td><?= $data["method"]?></td>
                <td><?= $data["total_products"]?></td>
                <td><?= $data["total_price"]?></td>
                <td>
                    <button class="btn btn-sm btn-success"><a href="print_order.php?id=<?= $data["id"];?>" class="text-light text-decoration-none" target="_blank" >Print</a></button>
                </td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
    </div>
  </div>
</div>











<script src="../components/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../js/admin_script.js"></script>
   
</body>
</html>