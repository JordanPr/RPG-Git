<?php
    session_start();
    
    include("db_config.php");
    
    $conn = mysqli_connect("$DB_host","$DB_login","$DB_pass","$DB_name") or die("Error " . mysqli_error($conn)); 
    
    //vérification si un des champs est vide
    if(isset($_POST['$name']) && isset($_POST['$desc']) && isset($_POST['$damage']) && isset($_POST['$defense']) && isset($_POST['$ratio']) && isset($_POST['$cc']) && isset($_POST['$force']) && isset($_POST['$agilite']) && isset($_POST['$type'])){
        
        $name       = mysqli_real_escape_string($conn, $_POST['name']);
        $desc       = mysqli_real_escape_string($conn, $_POST['description']);
        $damage     = intval($_POST['damage']);
        $defense    = intval($_POST['defense']);
        $ratio      = intval($_POST['ratio']);
        $cc         = intval($_POST['cc']);
        $force      = intval($_POST['strength']);
        $chance     = intval($_POST['chance']);
        $agility    = intval($_POST['agility']);
        $vitality   = intval($_POST['vitality']);
        $type       = intval($_POST['type']);
        
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
            
            if($row > 1){
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