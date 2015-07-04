<?php
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style/connexion.css">
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <link rel="stylesheet" type="text/css" href="style/header.css">
        <link rel="stylesheet" type="text/css" href="style/bootstrap.css">
        <script src="./script/jquery-2.1.4.min.js"></script>
        <script src="./script/custom.js"></script>
        <script src="./plugins/bootstrap.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    </head>
        <body>
            <?php include(dirname(__FILE__)."/header.php");?>
            <?php
                
                if(!isset($_SESSION['pseudo'])) {
            ?>
            <form method="post" action="signup.php"></br>
		    <div id="loginZone">
                <input type="text" name="pseudo" placeholder="Pseudo" class="textBox" id="textBoxLogin">
                <input type="password" name="mdp" placeholder="Mot de passe" class="textBox" id="textBoxPassword">
                <input type="submit" value="Connexion" class="btn">
                <div id="description"></div>
            </div>
	    </form>
            <?php
		} else {
		    ?>
    			<div id="loginZone">
                    <div id="description">Vous etes deja connécté sur le compte : <?php echo($_SESSION['pseudo']); ?></div>
                </div>
                <script>
                    $("#description").fadeIn(1000);
                </script>
		    <?php
		}

        if(isset($_GET["error"])){
           $error = $_GET["error"];
            if($error == 1) {
                 ?>
                    <script>
                        $("#description").text("Erreur : Le mot de passe ou le nom de compte ne correspondent pas.")
                                         .fadeIn(1000)
                                         .css("height","42");
                    </script>
                <?php
            } else if ($error == 2) {
                ?>
                    <script>
                        $("#description").text("Erreur : un des champs est vide.")
                                         .fadeIn(1000);
                    </script>
                <?php
            }
        }
        ?>
        </body>
</html>