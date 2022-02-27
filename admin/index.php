<?php
session_start();
ob_start();
require '../connection.php';
if($_SESSION['login'] && $_SESSION['admin']){
    $sql = "select * from students";
    $total_students = mysqli_query($conn,$sql);
    $sql = "select * from teachers";
    $total_teachers = mysqli_query($conn,$sql);
    $sql = "select * from topic";
    $total_topics = mysqli_query($conn,$sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../teacher/style.css">
    <link rel="icon" type="image/x-icon" href="../images/svg.svg">
    <?php
        include '../link.php';
    ?>
    

</head>
<body>
    <?php
        include 'navbar.php';
    ?>
    <div class="container" id="content">
        <?php
            include 'users.php';
        ?>
    </div>
  
</body>
</html>
<?php
}
else{
    header('location:../index.php');
}


?>