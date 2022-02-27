<?php
session_start();
ob_start();
require '../connection.php';
if($_SESSION['login'] && $_SESSION['teacher']){
    $sql = "select * from topic";
    $total_topics = mysqli_query($conn,$sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="../images/svg.svg">
    <?php
        include '../link.php';
    ?>
    

</head>
<body>
    <div class="navbar">
        <h2>Welcome, <?php echo $_SESSION['user']['name']; ?></h2>
        <div class="logout">
            <a href="../logout.php"><button class="btn btn-danger">Logout</button></a>
        </div>
    </div>
    <div class="container" id="content">
        <?php
            include 'topic.php';
        ?>
    </div>
  
    <script type="text/javascript">
        function add_topic(){
            $.ajax({
                url:'add-topic.php',
                type:'post',
                success: function(result){
                    $('#content').html(result);
                }
            });
        }
    </script>

</body>
</html>
<?php
}
else{
    header('location:../index.php');
}


?>