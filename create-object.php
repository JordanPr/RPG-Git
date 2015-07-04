<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style/inscription.css">
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
                <form method="post" action="createobject.php" id="createobject">
                        <div id="registerZone">
                            <input type="text" name="name" placeholder="Nom" class="textBox" >
                            <textarea name="description" form="createobject" placeholder="Description" class="textBox" ></textarea>
                             
                            <b>Rareté: <span id="slider1Value" class="sliderValue"></span> </b></br>
                            <input type="range" id="slider1" min="0" max="1" step="0.01" onchange="OnSliderChanged (this)" />
                             
                            <input type="radio" name="type" value="tool" id="toolCheck" >  Tool
                            <input type="radio" name="type" value="object" id="objectCheck" checked>  Object
                            
                            <div id = "caracTool" style = "display:none">
                                <b>Coup Critique: <span id="slider2Value" class="sliderValue"></span> </b></br>
                                <input type="range" id="slider2" min="0" max="1" step="0.1" onchange="OnSliderChanged (this)" />
                                
                                <input type="number" name="damage" placeholder="Degât" class="textBox">
                                <input type="number" name="defense" placeholder="Defense" class="textBox">
                                <input type="number" name="strength" placeholder="Force" class="textBox">
                                <input type="number" name="agility" placeholder="Agilité" class="textBox">
                                <input type="number" name="vitality" placeholder="Vitalité" class="textBox">
                                <input type="number" name="chance" placeholder="Chance" class="textBox">
                            </div>
                            <input type="submit" value="Inscription" class="btn">
                        <div id="description"></div>
                    </div>
                </form>
                <script>
                    $("#toolCheck").click(function()
                    { 
                        $("#caracTool").fadeIn();
                    });
                    $("#objectCheck").click(function()
                    { 
                        $("#caracTool").fadeOut();
                    });
                    
                    var slider = document.getElementById ("slider1");
                    OnSliderChanged (slider);
                    
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
                            sliderValue.innerHTML = "Normal ( " + slider.value+" )";
                        }else{
                            sliderValue.innerHTML = "Commun ( " + slider.value+" )";
                        }
                        
                    }
                </script>
            <?php
            }else{
                
            }
            ?>
        </body>
</html>