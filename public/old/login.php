<?php

include_once 'dbh.php';


$user = $_POST['user'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM login;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

if ($row['user']==$user && $row['pass']==$pass){
    header("Location: Employes.html?signup=success");;
}
else
    {header("Location: Login.html");
        }

//if ($resultCheck > 0) {
//while ($row = mysqli_fetch_assoc($result)){
//
//
//
// " < br>";}}



?>