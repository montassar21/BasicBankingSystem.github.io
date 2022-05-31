<?php include('nav.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="users.css">
</head>
<body>
<?php $sql ="select * from users";
$res=mysqli_query($conn,$sql);
?>
<div class="row">
               
               <table class="table" style="border-color:black;">
                   <thead>
                       <tr>
                       <th  class="py-2">Id</th>
                       <th  class="py-2">Name</th>
                       <th  class="py-2">E-Mail</th>
                       <th  class="py-2">Balance</th>
                       <th  class="py-2">Operation</th>
                       </tr>
                   </thead>
                   <?php
echo "<tbody>";
        while($row = mysqli_fetch_assoc($res)){
        echo '
            <tr>
              <td>'.$row['id'].'</td>
              <td>'.$row['name'].'</td>
              <td>'.$row['email'].'</td>
              <td>'.$row['balance'].'</td>
              <td>
              <button class="bu"><a href="trans.php?reads='.$row['id'].'">Transfer</a></button></td>
            </tr>';
    }
    
    echo "</tbody>";
     ?>    
      
               </table>
             
</div>
</body>
</html>
<?php include('footer.php')?>