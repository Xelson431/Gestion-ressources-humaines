<?php
include_once 'dbh.php';
$first = $_POST['prenom'];
$last = $_POST['nom'];
$email = $_POST['email'];
$adress = $_POST['adress'];
$DateNaissance = $_POST['DateNaissance'];
$titre = $_POST['titre'];
$tel = $_POST['tel'];
$DateEmbauche = $_POST['DateEmbauche'];
$Salaire = $_POST['Salaire'];



$sql1= "CREATE SEQUENCE seq start with 100 increment by 1 minvalue 0 cycle;";
mysqli_query($conn, $sql1);


$sql = "INSERT INTO Personnel (First_Name, Last_Name, email, address, D_Naissance, titre, tel, D_Embauche, Salaire) VALUES ('$first', '$last', '$email', '$adress', '$DateNaissance', '$titre', '$tel', '$DateEmbauche', '$Salaire');";
mysqli_query($conn, $sql);



header("Location: Employes.html?signup=success");

?>