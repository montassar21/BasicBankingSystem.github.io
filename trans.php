<?php include('nav.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="trans.css">
</head>
<body>
<?php 
if(isset($_POST['Send'])){
$seId=$_POST['seId'];
$reId=$_POST['reId'];
$amou=$_POST['amount'];
$sql="select balance from users where id='$seId'";
$res=mysqli_query($conn,$sql);
$ava_blc=mysqli_fetch_assoc($res)['balance'];
if($ava_blc>=$amou ){
    $sql1 = "update users set balance=balance-'$amou' where id='$seId'";
    $sql2 = "update users set balance=balance+'$amou' where id='$reId'";
    $res1= mysqli_query($conn,$sql1);
    $res2= mysqli_query($conn,$sql2);
    if($res1 && $res2 && $reId != $seId){
        echo "<script>
        alert('Amount Transfered Successfully!');
        </script>";
        $sqltra= "insert into transactionshis(sender,receiver,amount,statut) values('$seId','$reId','$amou','succeed')";
        $restr= mysqli_query($conn,$sqltra);
    }
    else{
        echo "<script>
        alert('Something went wrong !');
        </script>";
        $sqltra= "insert into transactionshis(sender,receiver,amount,statut) values('$seId','$reId','$amou','failed')";
        $restr= mysqli_query($conn,$sqltra); 
    }
}
else{
    echo "<script>
    alert('Not Sufficient Balance in Account!');
    </script>";
    $sqltra= "insert into `transactionshis` (sender,receiver,amount,statut) values('$seId','$reId','$amou','failed')";
    $restr= mysqli_query($conn,$sqltra); 
}

}
?>
<div class="send">
    <h2>Send money</h2>
    <div class="se">
    <form action="trans.php" method="post">
    <span>Sender id :</span>
    <br>
        <input type="number" name="seId" placeholder="Sender id" value="<?php if(isset($_GET['reads'])){ echo $_GET['reads'];}?>">
        <br>
       <span>Receiver id :</span>
       <br>
        <input type="number" name="reId" placeholder="Receiver id" required>
        <br>
        <span>Balance :</span>
        <br>
        <input type="number" name="amount" placeholder="Amount" required>
        <div class="b">
        <input class="butto" type="submit" value="Send" name="Send">
</div>
    </form>
    </div>
</body>
</html>
<?php include('footer.php')?>
