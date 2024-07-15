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

$id = $_GET["id"];

$order = query("SELECT * FROM orders WHERE id = $id")[0];


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>print order</title>
   <link rel="stylesheet" href="../components/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body >

<body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6 mx-auto" style="border: 1px solid #000;">
          <h4 class="text-center mt-2"><span class="mt-3">FILIZ Water</span></h4>
          <hr>
          <div class="row mt-3">
            <div class="col-md-6">
              TANGGAL : <?= $order['placed_on'] ?><br>
              NO ORDER : GlN001
            </div>
            <div class="col-md-6">
              Member : <?= $order['name'] ?>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-4">
                Keterangan  : 
            </div>
            <div class="col-md-8">
             <?= $order['total_products'] ?>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-4 text-left">Subtotal</div>
            <div class="col-md-8 text-left">Rp. <?= $order['total_price'] ?></div>
          </div>
          <div class="row">
            <div class="col-md-4 text-left">Diskon</div>
            <div class="col-md-8 text-left">0%</div>
          </div>
          <div class="row">
            <div class="col-md-4 text-left">Total</div>
            <div class="col-md-8 text-left">Rp. <?= $order['total_price'] ?></div>
          </div>
          <div class="row">
            <div class="col-md-4 text-left">Tunai</div>
            <div class="col-md-8 text-left">Rp. <?= $order['total_price'] ?></div>
          </div>
          <div class="row">
            <div class="col-md-4 text-left">Kembalian</div>
            <div class="col-md-8 text-left">Rp. 0,00</div>
          </div>
          <hr>
          <div class="row">
            <div class="col text-center">
              <p>
                Terima Kasih <br> Atas Kunjungan Anda
              </p>
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