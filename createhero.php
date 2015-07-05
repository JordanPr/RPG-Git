<?php
    session_start();
    
    include("db_config.php");
    
    $conn = mysqli_connect("$DB_host","$DB_login","$DB_pass","$DB_name") or die("Error " . mysqli_error($conn)); 
    $conn->set_charset('utf8');
    
    //vérification si un des champs est vide
    if(isset($_POST['force']) && isset($_POST['agilite']) && isset($_POST['chance']) && isset($_SESSION['pseudo']) && isset($_POST['point']) && isset($_POST['sexe'])){
        
        $pseudo     = mysqli_real_escape_string($conn, $_SESSION['pseudo']);
        $force      = intval($_POST['force']);
        $chance     = intval($_POST['chance']);
        $agilite    = intval($_POST['agilite']);
        $point      = intval($_POST['point']);
        $sexe       = intval($_POST['sexe']);
        
        //vérification si le nombre de point correspond
        if($point != 10 ){
            header('Location: create-hero.php?error=1');
            exit;
        }
        
        $SQL    = "SELECT pseudo FROM rpg_hero WHERE pseudo='$pseudo'" or die("Error in the consult.." . mysqli_error($conn));;
        $result = mysqli_query($conn, $SQL);
        $row    = mysqli_fetch_array($result);
        
        if($row > 0){
            header('Location: create-hero.php?error=2');
            exit;
        }else{
            
            $SQL2    = "INSERT INTO rpg_hero(pseudo,strength,chance,agility,sexe) VALUES ('$pseudo','$force','$chance','$agilite','$sexe')" or die("Error in the consult.." . mysqli_error($conn));;
            $result2 = mysqli_query($conn, $SQL2);
            
            $result =  mysqli_query($conn, $SQL);
            $row    = mysqli_fetch_array($result);
            
            if($row > 0){
                header('Location: profil.php');
                exit;
            }else{
                header('Location: create-hero.php?error=3');
                exit;
            }
            
        }
    }else{
        
        header('Location: create-hero.php?error=4');
        exit;
    }
    
?>