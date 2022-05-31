<?php include('nav.php')?>
<?php include('config.php')?>

<?php if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $balance=$_POST['balance'];
    $sql1="select id from users where id='{$id}'";
    $res1 = mysqli_query($conn,$sql1);
    if($res1->num_rows==0){
    $sql ="insert into users(id,name,email,balance) values ('{$id}','{$name}','{$email}','{$balance}')";
    $res = mysqli_query($conn,$sql);
    if($res){
        echo "<script>alert('Hurray ! User created .');
        window.location='users.php';</script>
        ";
       

    }
}
else if($res1->num_rows!=0){
    echo "<script>alert('user in table');
    window.location='createUser.php';</script>";
}
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="http://localhost/server/task11/createUser.php" />

    <title>Document</title>
    <link rel="stylesheet" href="creeuser.css">
    <link rel="stylesheet" href="https://fontawesome.com/docs/web/">
</head>
<body>
<div class="user">
    <h2>Create user</h2>
    <div class="us">
    <form action="" method="post">
    <span>User id :</span>
    <br>
        <input type="number" name="id" placeholder="id" required>
        <br>
       <span>User name :</span>
       <br>
        <input type="text" name="name" placeholder="Name" required>
        <br>
        <span>Email :</span>
        <br>
        <input type="text" name="email" placeholder="Email" required>
        <br>
        <span>Balance :</span>
        <br>
        <input type="number" name="balance" placeholder="Balance" required>
        <div class="b">
        <input class="butto" type="submit" value="Create" name="submit">
        <input class="butto" type="reset" value="Reset" name="reset">
</div>
    </form>
    <img src="images/use.png" alt="user">
    </div>
</div> 
</body>
</html>
<?php include('footer.php')?>