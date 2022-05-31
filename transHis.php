<?php include('nav.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions History</title>
    <link rel="stylesheet" href="his.css">
</head>
<body>
<?php $sql ="select * from transactionshis";
$res=mysqli_query($conn,$sql);
?>
<div class="row">
               
               <table class="table" style="border-color:black;">
                   <thead>
                       <tr>
                       <th  class="py-2">sender</th>
                       <th  class="py-2">Receiver</th>
                       <th  class="py-2">Amount</th>
                       <th  class="py-2">Statut</th>
                       </tr>
                   </thead>
                   <?php
echo "<tbody>";
        while($row = mysqli_fetch_assoc($res)){
        echo '
            <tr>
              <td>'.$row['sender'].'</td>
              <td>'.$row['receiver'].'</td>
              <td>'.$row['amount'].'</td>
              <td>'.$row['statut'].'</td>
            </tr>';
    }
    
    echo "</tbody>";
     ?>    
      
               </table>
             
</div>
</body>
</html>
<?php include('footer.php')?>