<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style/inscription.css">
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <link rel="stylesheet" type="text/css" href="style/header.css">
        <link rel="stylesheet" type="text/css" href="style/bootstrap.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    </head>
        <body>
            <?php include(dirname(__FILE__)."/header.php");
            if(isset($_SESSION['pseudo']))
            {
            ?>
                <form method="post" action="createobject.php">
                        <div id="registerZone">
                            <input type="text" name="name" placeholder="pseudo" class="textBox" id="textBoxLogin">
                            <input type="text" name="mdp" placeholder="Mot de passe" class="textBox" id="textBoxPassword">
                            <input type="password" name="mdpverif" placeholder="Confirmer le mot de passe" class="textBox" id="textBoxPassword">
                            <input type="text" name="email" placeholder="exemple@gmail.com" class="textBox" id="textBoxMail">
                            <input type="submit" value="Inscription" class="btn">
                        <div id="description"></div>
                    </div>
                </form>
            <?php
            }else{
                
            }
            ?>
        </body>
</html>