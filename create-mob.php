<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style/create-object.css">
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <link rel="stylesheet" type="text/css" href="style/header.css">
        <link rel="stylesheet" type="text/css" href="style/bootstrap.css">
        <script src="./script/jquery-2.1.4.min.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    </head>
        <body>
            <?php include(dirname(__FILE__)."/header.php");
            if(isset($_SESSION['pseudo']))
            {
            ?>
                <form method="post" action="createmob.php" id="createmob" onsubmit="return confirm('Etes vous sur de vouloir créer ce mob ?')">
                        <div id="createObjectZone">
                            <input type="text" name="name" placeholder="Nom" class="textBox" charset=utf-8 >
                            <textarea name="description" form="createmob" placeholder="Description" class="textBox" charset=utf-8 ></textarea>
                            
                            <div id = "caracMob">
                                <b>Coup Critique: <span id="slider1Value" class="sliderValue"></span> </b></br>
                                <input type="range" id="slider1" min="0" max="1" step="0.1" onchange="OnSliderChanged (this)" />
                                <input type="hidden" name="cc" value="" />
                                
                                <input type="number" name="strength" placeholder="Force" class="textBox">
                                <input type="number" name="agility" placeholder="Agilité" class="textBox">
                                <input type="number" name="vitality" placeholder="Vitalité" class="textBox">
                             
                            </div>
                            <input type="submit" value="Créer" class="btn">    
                        <div id="description"></div>
                    </div>
                </form>
                <script>
                    
                    var slider = document.getElementById ("slider1");
                    OnSliderChanged (slider);
                    
                    function OnSliderChanged (slider) {
                        var sliderValue = document.getElementById (slider.id + "Value");
                        
                        
                        if(slider.value < 0.10) {
                            sliderValue.innerHTML = "Extremement Rare ( " + slider.value+" )" ;
                        }else if (slider.value >= 0.10 && slider.value < 0.20){
                            sliderValue.innerHTML = "Tres rare ( " + slider.value+" )" ;
                        }else if (slider.value >= 0.20 && slider.value < 0.40){
                            sliderValue.innerHTML = "rare ( " + slider.value+" )";
                        }else if (slider.value >= 0.40 && slider.value < 0.70){
                            sliderValue.innerHTML = "Normal ( " + slider.value +" )";
                        }else{
                            sliderValue.innerHTML = "Commun ( " + slider.value +" )";
                        }
                        
                        document.getElementById('createmob').cc.value = parseFloat(slider1.value);
                    }
                    
                    
                    if (form.attachEvent) {
                        form.attachEvent("submit", processForm);
                    } else {
                        form.addEventListener("submit", processForm);
                    }
                    
                    function processForm(e) {
                        if (e.preventDefault) e.preventDefault();
                        document.getElementById('createmob').submit();
                    }
                    
                </script>
            <?php
            }else{
                
            }
            ?>
        </body>
</html>