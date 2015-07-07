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
                //$("#hud").load("header.php");
                
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

        <div id="btnCreateHero">
            <form method="post" action="create-hero.php"></br>
                <input type="submit" value="Création" class="btn">
            </form>
        </div>

        <div id="hud">
        <?php
            $pseudo = $_SESSION['pseudo'];
            
            $SQL    = "SELECT xp,gold,energy,level,pdv FROM rpg_hero WHERE pseudo='$pseudo'" or die("Error in the consult.." . mysqli_error($conn));
            $result = mysqli_query($conn, $SQL);
            $row    = mysqli_fetch_array($result);
            
            if ($row > 1){
            ?>
                <script>
                    $("#btnCreateHero").hide();
                    $("#hud").show();
                </script>

                <ul class="nav navbar-nav">

                    <li class="hudElement">
                        <div id='gold'>Or : <?php echo($row['gold'])?> gold</div>
                        </br >
                    </li>

                    </br >

                    <!-- Passer cette valeur autre qu'en brut (conversion en pourcentage) -->
                    <li class="hudElement">
                        <div id='energy'>Energie :</div>
                        <div id="energyBar">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%; background-color: #0101DF;">
                                   100%
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>

                <ul class="nav navbar-nav">
                    <li class="hudElement">
                        <div id='lvl'><?php echo($row['level'])?></div>
                    </li>
                </ul>

                <ul class="nav navbar-nav">
                    <li class="hudElement">
                        <div id='pdv'>Vie : </div>
                        <div id="hpBar">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo($row['pdv'])?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo($row['pdv'])?>%; background-color: #FA5858;">
                                    <?php echo($row['pdv'])?>%
                                </div>
                            </div>
                        </div>
                    </li>

                    </br >

                    <li class="hudElement">
                        <div id='xp'>Expérience :</div>
                        <div id="xpBar">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo($row['xp'])?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo($row['xp'])?>%; background-color: #04B404;">
                                    <?php echo($row['xp'])?>%
                                </div>
                            </div>
                        </div>
                    </li>

                    <?php
                        if(isset($_SESSION['auth']) && $_SESSION['auth'] == 2 ){
                    ?>
                    <li><a href="#">Panel</a></li>
                    <?php
                    }
                    ?>
                </ul>
            <?php
            }else{
                ?>
                    <script>
                        $("#btnCreateHero").show();
                        $("#hud").hide();
                    </script>
                <?php
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