<?php
session_start();
    
    include("db_config.php");
    
    $conn = mysqli_connect("$DB_host","$DB_login","$DB_pass","$DB_name") or die("Error " . mysqli_error($conn)); 
    $conn->set_charset('utf8');
    
    //vérification si un des champs est vide
    if(strlen($_POST['pseudo']) > 0 && strlen($_POST['mdp']) > 0 && strlen($_POST['mdpverif']) > 0 && strlen($_POST['email']) >0 ){
        
        $pseudo = mysqli_real_escape_string($conn, $_POST['pseudo']);
        $mdp1   = mysqli_real_escape_string($conn, $_POST['mdp']);
        $mdp2   = mysqli_real_escape_string($conn, $_POST['mdpverif']);
        $email  = mysqli_real_escape_string($conn, $_POST['email']);
        
        //vérification si les deux mdp ne corréspondent pas
        if($mdp1 != $mdp2){
            header('Location: inscription.php?error=1');
            exit;
        }
        if(strlen($pseudo) > 20 ){
            header('Location: inscription.php?error=4');
            exit;
        }
        if(strlen($mdp1) > 30 ){
            header('Location: inscription.php?error=5');
            exit;
        }
        if(strlen($email) > 50 ){
            header('Location: inscription.php?error=6');
            exit;
        }
        
        $SQL    = "SELECT pseudo,email FROM rpg_user WHERE pseudo='$pseudo' || email='$email'" or die("Error in the consult.." . mysqli_error($conn));
        $result = mysqli_query($conn, $SQL);
        $row    = mysqli_fetch_array($result);
        
        if($row < 1){
            $SQL2    = "INSERT INTO rpg_user(pseudo,mdp,email) VALUES ('$pseudo','$mdp1','$email')" or die("Error in the consult.." . mysqli_error($conn));
            $result2 = mysqli_query($conn, $SQL2);
           
            $result = mysqli_query($conn, $SQL);
            $row    = mysqli_fetch_array($result);
            
            //Vérification si le compte à bien été créé en BDD
            if($row > 0){
                
                $_SESSION['auth'] = 0;
                $_SESSION['pseudo'] = $pseudo;
                
                header('Location: create-hero.php');
                exit;
                
            }else{
                header('Location: inscription.php?error=3');
                exit;
            }
        }else{
            header('Location: inscription.php?error=2');
            exit;
        }
    }else{
        header('Location: inscription.php?error=7');
        exit;
    }
    
    
    
?>