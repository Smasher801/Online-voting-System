<?php

session_start();
include("connect.php");
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$role = $_POST['role'];

$check = mysqli_query($connect,"SELECT * FROM user WHERE mobile='$mobile' && password='$password' && role='$role' ");
if(mysqli_num_rows($check)>0){
       
    $userData = mysqli_fetch_array($check);
    $groups = mysqli_query($connect,"SELECT * FROM user WHERE role=2");
    $groupsdata = mysqli_fetch_all($groups,MYSQLI_ASSOC);
    $_SESSION['userdata'] = $userData;
    $_SESSION['groupsdata'] = $groupsdata;


    echo '
    <script>

        
         window.location =  "../Routes/dashboard.php" ;

   </script>

';



}

else {


    echo '
    <script>

        alert("Invalid Credentials or User not Found");
         window.location =  "../" ;

   </script>

';

}


?>