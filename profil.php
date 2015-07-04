<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style/header.css">
        <link rel="stylesheet" type="text/css" href="style/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="style/profil.css">
        <link rel="stylesheet" type="text/css" href="style/style.css">

        <script src="./script/jquery-2.1.4.min.js"></script>
        <script src="./script/custom.js"></script>
        <script src="./plugins/bootstrap.js"></script>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    </head>
        <body>
            <?php include(dirname(__FILE__)."/header.php");
        
                if(isset($_SESSION['pseudo'])) {
            ?>
            <div id="profilZone">
                <div id="description">Bienvenue <?php echo($_SESSION['pseudo'])?></div>
            </div>
            <script>
                $("#description").fadeIn(1000);
            </script>
            
            <?php
                } else {
            ?>
                <div id="profilZone">
                    <div id="description">Erreur : Vous n'êtes pas connectez, vous ne pouvez pas accéder à cette page</div>
                </div>
                <script>
                    $("#description").fadeIn(1000)
                                     .css("height","42");
                </script>

            <?php
                }
            ?>
        </body>
</html>