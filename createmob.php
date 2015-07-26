<?php
    session_start();
    
    include("db_config.php");
    
    $conn = mysqli_connect("$DB_host","$DB_login","$DB_pass","$DB_name") or die("Error " . mysqli_error($conn)); 
    $conn->set_charset('utf8');
    
    //vérification si un des champs est vide
    if (strlen($_POST['name']) > 0 && strlen($_POST['description']) > 0 && isset($_POST['cc']) && !empty($_POST['strength']) && !empty($_POST['agility']) && !empty($_POST['vitality'])){
        
        $name       = mysqli_real_escape_string($conn, $_POST['name']);
        $desc       = mysqli_real_escape_string($conn, $_POST['description']);
        $cc         = floatval($_POST['cc']);
        $strength   = intval($_POST['strength']);
        $agility    = intval($_POST['agility']);
        $vitality   = intval($_POST['vitality']);
        
        $SQL    = "SELECT name FROM rpg_mob WHERE name LIKE '$name'" or die("Error in the consult.." . mysqli_error($conn));;
        $result = mysqli_query($conn, $SQL);
        $row    = mysqli_fetch_array($result);
        
        if($row > 0){
            header('Location: create-mob.php?error=1');
            exit;
        }else{
            $SQL2    = "INSERT INTO rpg_mob(name,description,cc,strength,agility,vitality) VALUES ('$name','$desc','$cc','$strength','$agility','$vitality')" or die("Error in the consult.." . mysqli_error($conn));
            $result2 = mysqli_query($conn, $SQL2);
            
            $result = mysqli_query($conn, $SQL);
            $row    = mysqli_fetch_array($result);
            
            if($row > 0){
            header('Location: create-mob.php?success=1');
            exit;
            }else{
                header('Location: create-mob.php?error=3');
                exit;
            }
        }
        
    }else{
        header('Location: create-mob.php?error=2');
        exit;
    }
?>