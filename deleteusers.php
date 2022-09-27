<?php
include 'config.php';
$id=$_GET['id'];

$deletequery ="delete from users where id=$id";
$query=mysqli_query($conn, $deletequery);
if($query){
    header('location: usersdb.php');
?>

    <script>
        alert('deleted sucessfully!');
    </script>

   <?php
}
else{
    header('location: usersdb.php');
    ?>
    <script>
        alert('deleted sucessfully!');
    </script>
    <?php
}

?>