<html>
    <head>
        <script src="./script/jquery-2.1.4.min.js"></script>
        <script src="./script/custom.js"></script>
        <script src="./plugins/bootstrap.js"></script>

        <link rel="stylesheet" type="text/css" href="style/header.css">
        <link rel="stylesheet" type="text/css" href="style/bootstrap.css">

        <link rel="stylesheet" type="text/css" href="style/create-hero.css">
        <link rel="stylesheet" type="text/css" href="style/style.css">

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    </head>
        <body>
            <?php
            include(dirname(__FILE__)."/header.php");
            
            include("db_config.php");
            
            if(!isset($_SESSION['pseudo']))
            {
            ?>
                <div>

                <b>Vous devez vous connecter pour acceder à cette page</b></br>
                
            <?php
                //test pour savoir si il a deja créer un personnage à faire
            } else {
                $conn = mysqli_connect("$DB_host","$DB_login","$DB_pass","$DB_name") or die("Error " . mysqli_error($conn)); 
                $conn->set_charset('utf8');
                
                $pseudo = $_SESSION['pseudo'];
                
                $SQL    = "SELECT pseudo FROM rpg_hero WHERE pseudo='$pseudo'" or die("Error in the consult.." . mysqli_error($conn));
                $result = mysqli_query($conn, $SQL); 
                $row    = mysqli_fetch_array($result);
                
                if($row > 0){
                    ?>
                    <SCRIPT LANGUAGE="JavaScript"> document.location.href="index.php?error=1";</SCRIPT> 
                    <?php
                }
            ?>
                <div id="createheroZone">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>Pseudo : <?php echo($_SESSION['pseudo'])?></h4> 
                        </div>

                        <div class="panel-body">                            
                            <div id="pointRestant" class="carract">
                            </div>

                            <div id="force" class="carract">
                                <strong>Force</strong>
                                <input type="range" id="slider1" min="0" max="5" step="1" onchange="OnSliderChanged (this)" />
                                <span id="slider1Value" class="sliderValue"></span>
                            </div>

                            <div id="agilite" class="carract">
                                <strong>Agilite</strong> 
                                <input type="range" id="slider2" min="0" max="5" step="1" onchange="OnSliderChanged (this)" />
                                <span id="slider2Value" class="sliderValue"></span>
                            </div>

                            <div id="chance" class="carract">
                                <strong>Chance</strong>
                                <input type="range" id="slider3" min="0" max="5" step="1" onchange="OnSliderChanged (this)" />
                                <span id="slider3Value" class="sliderValue"></span>
                            </div>

                             <form id="createHero" action="createhero.php" method="post" class="carract">
                                <input id="radio1" type="radio" name="sexe" value="0" checked/> Homme
                                <input id="radio2" type="radio" name="sexe" value="1"/> Femme
                                
                                <input type="hidden" name="force" value="" />
                                <input type="hidden" name="agilite" value="" />
                                <input type="hidden" name="chance" value="" />
                                <input type="hidden" name="point" value="" />

                                <input type="submit" value="Créer" class="btn" id="btnCreate">
                            </form>
                        </div>

                        <div class="panel-footer" id="description">
                            Veuillez créer votre personnage.
                        </div>
                    </div>
            </br>
                </div><!-- End of createheroZone -->
                
                <script>
                    var pointAdd;
                    var point       = 10;
                    var locked      = false;
                    var form = document.getElementById('createHero');
                    
                    Init();
                    
                    function OnSliderChanged (slider) {
                        var sliderValue = document.getElementById (slider.id + "Value");
                        var ptnRest = document.getElementById ("pointRestant");
                        
                        sliderValue.innerHTML = slider.value;
                        
                        pointAdd = 0;
                        
                        for (var i = 1 ; i < 4 ; i++){
                            var lSlide = $('#slider'+i).val();
                            pointAdd += parseInt(lSlide);
                        }
                        
                        ptnRest.innerHTML = "Points restants = " + (point - pointAdd);
                        
                        if (pointAdd != point) {
                            locked = true;
                            $("#description").text("Erreur : Vous n'avez pas dépenser la totalité de vos points.")
                                             .css("color","red");
                        } else {
                            locked = false;
                            $("#description").text("Valide, vous pouvez désormais créer votre personnage !")
                                             .css("color","#04B404");
                        }
                        
                        document.getElementById('createHero').force.value = parseInt(slider1.value) ;
                        document.getElementById('createHero').agilite.value = parseInt(slider2.value);
                        document.getElementById('createHero').chance.value = parseInt(slider3.value);
                        document.getElementById('createHero').point.value = pointAdd;
                    }
                    
                    if (form.attachEvent) {
                        form.attachEvent("submit", processForm);
                    } else {
                        form.addEventListener("submit", processForm);
                    }
                    
                    function processForm(e) {
                        if (e.preventDefault) e.preventDefault();
                        if(!locked)document.getElementById('createHero').submit();
                    }
                    
                    function Init () {
                        var slider = document.getElementById ("slider1");
                        OnSliderChanged (slider);
                        var slider = document.getElementById ("slider2");
                        OnSliderChanged (slider);
                        var slider = document.getElementById ("slider3");
                        OnSliderChanged (slider);
                    }
                    
                </script>
                <?php
                }
                ?>
        </body>
</html>