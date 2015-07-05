<?php
    session_start();
    
    include("db_config.php");
    
    $conn = mysqli_connect("$DB_host","$DB_login","$DB_pass","$DB_name") or die("Error " . mysqli_error($conn)); 
    
    //vérification si un des champs est vide
    if (strlen($_POST['name']) > 0 && strlen($_POST['description']) > 0 && !empty($_POST['ratio']) && strlen($_POST['type']) > 0){
        $name       = mysqli_real_escape_string($conn, $_POST['name']);
        $desc       = mysqli_real_escape_string($conn, $_POST['description']);
        $ratio      = floatval($_POST['ratio']);
        $type       = mysqli_real_escape_string($conn, $_POST['type']);
        
        $SQL    = "SELECT name FROM rpg_object WHERE name LIKE '$name'" or die("Error in the consult.." . mysqli_error($conn));;
        $result = mysqli_query($conn, $SQL);
        $row    = mysqli_fetch_array($result);
        
        if($row > 0){
            header('Location: create-object.php?error=1');
            exit;
        }
        
        
        if ($type == "tool"){
            
            if(!empty($_POST['cc']) && !empty($_POST['damage'])){
                $cc         = floatval($_POST['cc']);
                $damage     = intval($_POST['damage']);
                $defense    = intval($_POST['defense']);
                $strength   = intval($_POST['strength']);
                $chance     = intval($_POST['chance']);
                $agility    = intval($_POST['agility']);
                $vitality   = intval($_POST['vitality']);
                
                $SQL2    = "INSERT INTO rpg_object(name,description,ratio,type,cc,damage,defense,strength,chance,agility,vitality) VALUES ('$name','$desc','$ratio','$type','$cc','$damage','$defense','$strength','$chance','$agility','$vitality')" or die("Error in the consult.." . mysqli_error($conn));
                
            }else{
                header('Location: create-object.php?error=2');
                exit;
            }
            
        }else{
            $SQL2    = "INSERT INTO rpg_object(name,description,ratio,type) VALUES ('$name','$desc','$ratio','$type')" or die("Error in the consult.." . mysqli_error($conn));;   
        }
        
        $result2 = mysqli_query($conn, $SQL2);
        
        $result = mysqli_query($conn, $SQL);
        $row    = mysqli_fetch_array($result);
        
        if($row > 0){
            header('Location: create-object.php?success=1');
            exit;
        }else{
            header('Location: create-object.php?error=3');
            exit;
        }
        
    }else{
        header('Location: create-object.php?error=2');
        exit;
    }
?>