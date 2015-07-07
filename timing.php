<?php
    session_start();
    include("db_config.php");
    
    $pseudo = $_SESSION['pseudo'];
    
    $timerEnergy = 10;
    $timerGold   = 10;
    
    $energyMax   = 1000;
    
    $conn = mysqli_connect("$DB_host","$DB_login","$DB_pass","$DB_name") or die("Error " . mysqli_error($conn));
    $conn->set_charset('utf8');
    
    $UPDATE    = "SELECT energy,timer FROM rpg_hero INNER JOIN rpg_user WHERE (rpg_user.pseudo and rpg_hero.pseudo) = '$pseudo'" or die("Error in the consult.." . mysqli_error($conn));
    $result1   = mysqli_query($conn, $UPDATE);
    $row1      = mysqli_fetch_array($result1);
    
    $UPDATE2    = "UPDATE rpg_hero SET energy = energy + 1  WHERE pseudo = '$pseudo'";
    $UPDATE3    = "UPDATE rpg_hero SET gold = gold + 1  WHERE pseudo = '$pseudo'";
    
    if ($row1 > 0){
        
        $count = time() - $row1['timer'];

        // Cette fonction est tres lourde si le joueur ne s'est pas conn�ct� depuis un long moment
        // il faudrait trouver un moyen de cr�er un chargement
        
        function update($a,$c1,$c2,$d1 = null, $d2 = null ){
            global $count;
            
            $countSave = $count;
            
           if($d1 != null)$countEnergy = $d1;
           
            while($countSave > $a){
                
                if($d1 != null && $countEnergy >= $d2)return;
                
                $result2 = mysqli_query($c2, $c1);
                
                if($result2){
                    
                    if($d1 != null){
                        
                        $countEnergy += 1;
                    }
                    
                    $countSave -= $a;
                }
            }
            
        }
        
        update($timerEnergy,$UPDATE2,$conn,$row1['energy'],$energyMax);
        
        update($timerGold,$UPDATE3,$conn);
        
        $timeNow = time();
        $UPDATE4    = "UPDATE rpg_user SET timer = '$timeNow'  WHERE pseudo = '$pseudo'";
        $result4 = mysqli_query($conn, $UPDATE4);
        
    }
    

?>