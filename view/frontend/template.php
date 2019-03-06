<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="./public/css/style.css" rel="stylesheet" /> 
    </head>

    <header>
        <div class="para1">
            <h2>Bienvenue <?php
            if (isset($_SESSION['user']))
            {
                echo $_SESSION['user'];
            }

            if (isset($_COOKIE['user']))
            {
                echo 'Bonjour '.$_COOKIE['user'];
            }

            ?>
            </h2>

        </div>
        <div class="para2">
            <nav>
                <ul> <?php
                	echo '<li><a href="index.php">Accueil</a></li>';
                    if (isset($_SESSION['user']))
                    {
                       //echo '<li><a href="view/frontend/deconnexion.php">Deconnexion</a></li>';
                        echo '<li><a href="index.php?action=deconnexion">Deconnexion</a></li>';
                       //renvois à l'index qui sous condition doit renvoyer à la bonne page
                    }
                    else
                    {
                        //echo '<li><a href="view/frontend/inscription.php">Inscription</a></li>';
                        echo '<li><a href="index.php?action=inscription">Inscription</a></li>';
                        //renvois à l'index qui sous condition doit renvoyer à la bonne page
                        //index.php?action=inscription
                        //echo '<li><a href="view/frontend/connexion.php">Connexion</a></li>';
                        echo '<li><a href="index.php?action=connexion">Connexion</a></li>';
                        //renvois à l'index qui sous condition doit renvoyer à la bonne page
                    }
                    ?>         
                </ul>
            </nav>
        </div>
    </header>
        
    <body>        
        <?= $content ?>        

        <script type="text/javascript" src="public/js/jquery.js"></script>
        <script type="text/javascript" src="public/plugin/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="public/plugin/tinymce/init-tinymce.js"></script>
    </body>
    
</html>