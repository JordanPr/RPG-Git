<?php

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style/inscription.css">
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <link rel="stylesheet" type="text/css" href="style/header.css">
        <link rel="stylesheet" type="text/css" href="style/bootstrap.css">
        <script src="./script/jquery-2.1.4.min.js"></script>
        <script src="./script/custom.js"></script>
        <script src="./plugins/bootstrap.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    </head>

    <body>
        <?php include(dirname(__FILE__)."/header.php");         
	if(!isset($_SESSION['pseudo']))
	{
        ?>
            <form method="post" action="signin.php">
    		    <div id="registerZone">
                    <input type="text" name="pseudo" placeholder="Pseudo" class="textBox" id="textBoxLogin">
                    <input type="password" name="mdp" placeholder="Mot de passe" class="textBox" id="textBoxPassword">
                    <input type="password" name="mdpverif" placeholder="Confirmer le mot de passe" class="textBox" id="textBoxPassword">
                    <input type="email" name="email" placeholder="exemple@gmail.com" class="textBox" id="textBoxMail">
                    <input type="submit" value="Inscription" class="btn">
                    <div id="description"></div>
                </div>
            </form>
        <?php
	} else {
        ?>
            <div id="registerZone">
                <div id="description">Vous etes deja connécté sur le compte : <?php echo($_SESSION['pseudo']); ?></div>
            </div>
             <script>
                $("#description").fadeIn(1000);
            </script>
	    <?php
	}

    if(isset($_GET["error"])) {
       $error = $_GET["error"];
        if($error == 1) {
            ?>
                <script>
                    $("#description").text("Erreur : Vos deux mot de passe ne correspondent pas.")
                                     .fadeIn(1000)
                                     .css("height","42");
                </script>
            <?php
        } else if ($error == 2) {
            ?>
                <script>
                    $("#description").text("Erreur : un utilisateur possède deja ce pseudo ou cette email.")
                                     .fadeIn(1000)
                                     .css("height","40");
                </script>
            <?php
        } else if ($error == 3) {
            ?>
                <script>
                    $("#description").text("Erreur : Le serveur a rencontré un probleme.")
                                     .fadeIn(1000)
                </script>
            <?php
        } else if ($error == 4) {
            ?>
                <script>
                    $("#description").text("Erreur : Votre pseudo est trop long.")
                                     .fadeIn(1000);
                </script>
            <?php
        } else if ($error == 5) {
            ?>
                <script>
                    $("#description").text("Erreur : Le mot de passe est trop long.")
                                     .fadeIn(1000);
                </script>
            <?php
        } else if ($error == 6) {
            ?>
                <script>
                    $("#description").text("Erreur : Votre email est trop long")
                                     .fadeIn(1000);
                </script>
            <?php
        } else if ($error == 7) {
            ?>
                <script>
                    $("#description").text("Erreur : Un des champ est vide")
                                     .fadeIn(1000);
                </script>
            <?php
        }
    }
        ?>
    </body>
</html>