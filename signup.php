<?php
    session_start();
    
    include("db_config.php");
    
    $conn = mysqli_connect("$DB_host","$DB_login","$DB_pass","$DB_name") or die("Error " . mysqli_error($conn)); 
    $conn->set_charset('utf8');
   
    
    //vérification si un des champs est vide
    if(strlen($_POST['pseudo']) > 0 && strlen($_POST['mdp']) > 0 ){
        
        $pseudo = mysqli_real_escape_string($conn, $_POST['pseudo']);
        $mdp    = mysqli_real_escape_string($conn, $_POST['mdp']);
        
        
        $SQL    = "SELECT * FROM rpg_user WHERE pseudo='$pseudo' && mdp='$mdp'" or die("Error in the consult.." . mysqli_error($conn));
        $result = mysqli_query($conn, $SQL);
        $row    = mysqli_fetch_array($result);
        
        if($row > 0){
            
            $_SESSION['auth'] = $row['type'];
            $_SESSION['pseudo'] = $pseudo;
            
            header('Location: profil.php');
            exit;
        }else{
            header('Location: connexion.php?error=1');
            exit;
        }
    }else{
        header('Location: connexion.php?error=2');
        exit;
    }
?>