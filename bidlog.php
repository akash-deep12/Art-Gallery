<?php require_once ("dbconnection/db.php");
include_once("header/header.php") ?>
<head>  
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script>
$(document).ready(function(){
    $('#demoTable').dataTable();
});
</script>
<script type="text/javascript">
  $('#myModal').modal('hide');
</script>
</head>

   

  <body>  
<div class="container"> 
    <div class="container mt-5"><?php
    $id = $_GET['id'];
    $pname = mysqli_query($conn,"SELECT * FROM products WHERE product_id='$id'")or die(mysqli_error());
    $pnamea = mysqli_fetch_array($pname);
  ?>
   <a href="artists.php?id=4"><button type="button" class="btn btn-grey text-info">Back</button></a>
              <center><h5><?php echo $pnamea['prod_name']; ?> Bidding Log</h5></center>
                           <div id="bodycon">
                          <table id="demoTable" class="table table-striped">
        <thead>
                <?php echo '<tr>';
                        echo '<th sort="index">Bidder</th>';
                        echo '<th sort="date">Date of Bid Placed</th>';
                        echo '<th sort="description">Amount</th>';
                        
                echo'</tr>'; ?>
        </thead>

           <tbody>
          <?php 
        $prodid = $_GET['id'];
        $query = mysqli_query($conn,"SELECT * FROM bidreport LEFT JOIN login ON login.id = bidreport.bidder LEFT JOIN products ON products.product_id = bidreport.productid WHERE products.product_id = '$prodid'") or die(mysqli_error());
        while ($prod = mysqli_fetch_array($query)){
          echo 
          "<tr>
                        <td>".$prod['name']."</td>
                        <td>".$prod['biddatetime']."</td>
                        <td>$".$prod['bidamount']."</td>
          </tr>";
        }
      ?>

        </tbody>
      </table>
    </div>
  </div>
  
  </body>
<!-- /.modal-content -->
  <!-- /.modal -->