<?php
    session_start();
    
    include("db_config.php");
    
    $conn = mysqli_connect("$DB_host","$DB_login","$DB_pass","$DB_name") or die("Error " . mysqli_error($conn));
    $conn->set_charset('utf8');
    
?>
<section class="header">       
    <?php
        if(isset($_SESSION['pseudo'])){
    ?>
    
    <script>
    $(function() {
        setInterval(update,5000);
       
       function update(){
            $.get( "timing.php",function() {
            }).done(function() {
                $(".hud").load("header.php")
            });
       }
    });
    </script>
    
    <div class="navbar navbar-inverse navbar-fixed-top" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">LEJEUKIPAIZE</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="deconnexion.php">Déconnexion</a></li>
                    <li><a href="profil.php">Profil</a></li>
                    <li><a href="inventaire.php">Inventaire</a></li>
                    <?php
                        if(isset($_SESSION['auth']) && $_SESSION['auth'] == 2 ){
                    ?>
                    <li><a href="#">Panel</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="hud">
        <?php
            $pseudo = $_SESSION['pseudo'];
            
            $SQL    = "SELECT xp,gold,energy,level,pdv FROM rpg_hero WHERE pseudo='$pseudo'" or die("Error in the consult.." . mysqli_error($conn));
            $result = mysqli_query($conn, $SQL);
            $row    = mysqli_fetch_array($result);
            
            if ($row > 1){
            ?>
                <div id='pdv'> PDV : <?php echo($row['pdv'])?></div>
                <div id='gold'> Gold : <?php echo($row['gold'])?></div>
                <div id='energy'> Energy : <?php echo($row['energy'])?></div>
                <div id='lvl'> Level : <?php echo($row['level'])?></div>
                <div id='xp'> XP : <?php echo($row['xp'])?></div>
            <?php
            }else{
                ?><a href="create-hero.php">CREER UN HERO</a><?php
            }
            
            ?>
        </div>
    </div>
    
    <?php
        } else {
            ?>
                <div class="navbar navbar-inverse navbar-fixed-top" >
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">LEJEUKIPAIZE</a>
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="index.php">Accueil</a></li>
                                <li><a href="connexion.php">Connexion</a></li>
                                <li><a href="inscription.php">Inscription</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            <?php
        }
    ?>
    
</section>