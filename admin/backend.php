<?php
include '../connection.php';
if (isset($_POST['stream_id'])) {
	$query = "SELECT * FROM semesters where streams_id=".$_POST['stream_id'];
	$result = mysqli_query($conn,$query);
	if (mysqli_num_rows($result) > 0 ) {
			echo '<option selected disabled>Select Semester</option>';
		 while ($row = mysqli_fetch_assoc($result)) {
		 	echo '<option value='.$row['id'].'>'.$row['sem'].'</option>';
		 }
	}else{

		echo '<option>No Semester Found!</option>';
	}

}
else{
    if(isset($_POST['student-reg'])){
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $stream = $_POST['stream'];
    $sem = $_POST['sem'];
    if($stream==1)
        $stream="BCA";
    else if($stream==2)
        $stream="BBA";
    else if($stream==3)
        $stream="MCA";
    else if($stream==4)
        $stream="MSC";
    if($sem==1||$sem==7||$sem==13||$sem==17)
        $sem="First Semester";
    else if($sem==2||$sem==8||$sem==14||$sem==18)
        $sem="Second Semester";
    else if($sem==3||$sem==9||$sem==15||$sem==19)
        $sem="Third Semester";
    else if($sem==4||$sem==10||$sem==16||$sem==20)
        $sem="Fourth Semester";
    else if($sem==5||$sem==11)
        $sem="Fifth Semester";
    else if($sem==6||$sem==12)
        $sem="Sixth Semester";


    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $sql = "select * from login where email='$email'";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query)>0){
        echo '<script>alert("User Already Exists");
        history.back();
        </script>';
        // header('location:index.php');
    }
    $sql = "INSERT INTO `students`( `name`, `roll`, `stream`, `sem`, `dob`, `email`, `phone`, `password`) VALUES ('$name','$roll','$stream','$sem','$dob','$email','$phone','$password')";
    $query = mysqli_query($conn,$sql);
    $sql = "INSERT INTO `login`(`email`, `password`, `role`) VALUES ('$email','$password','student')";
    $query = mysqli_query($conn,$sql);
    if($query){
        echo '<script>alert("Student Registered");</script>';
    }else{
        echo '<script>alert("Error occured");</script>';
    }
}
else 
if(isset($_POST['teacher-reg'])){
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $sql = "select * from login where email='$email'";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query)>0){
        echo '<script>alert("User Already Exists");</script>';
        echo '<script>history.back();</script>';
    }
    $sql = "INSERT INTO `teachers`( `name`, `designation`, `dob`, `email`, `phone`, `password`) VALUES ('$name','$designation','$dob','$email','$phone','$password')";
    $query = mysqli_query($conn,$sql);
    $sql = "INSERT INTO `login`(`email`, `password`, `role`) VALUES ('$email','$password','teacher')";
    $query = mysqli_query($conn,$sql);
    if($query){
        echo '<script>alert("Teacher Registered");</script>';
    }else{
        echo '<script>alert("Error occured");</script>';
    }
}

echo '<script>history.back();</script>';
}

// header('Refresh: 2; URL=index.php');
// header('location:index.php');




?>