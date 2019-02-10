<?php
session_start();
$_SESSION['test'] = 'Kizako';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>

    <header>
        <div class="para1">
            <h2>Bienvenue <?php
            if (isset($_GET['user']))
            {
                echo $_GET['user'];
            }    
            ?>
            </h2>

        </div>
        <div class="para2">
            <nav>
                <ul> <?php 
                    if (isset($_GET['user'])) //$_SESSION
                    {
                       echo '<li><a href="view/frontend/deconnexion.php">Deconnexion</a></li>'; 
                    }
                    else
                    {
                        echo '<li><a href="view/frontend/inscription.php">Inscription</a></li>'; 
                        echo '<li><a href="view/frontend/connexion.php">Connexion</a></li>';
                    }
                    ?>         
                </ul>
            </nav>
        </div>
    </header>
        
    <body>        
        <?= $content ?>
    </body>
    
</html>