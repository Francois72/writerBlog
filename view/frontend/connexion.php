<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Connexion</title>
        <link href="public/css/style2.css" rel="stylesheet" />        
    </head>  

    <body>

        <a href="index.php">retour</a>

        <h1>Connexion</h1>

        <form action="index.php?action=connexionpost" method="post">
            <p><label>Pseudo: </label></br><input type ="text" name="user" value="" size="40" required/></p>
            <p><label>Mot de passe: </label></br><input type ="password" name="pass" value="" size="40" required/></p>                
            <p><label></label><input type="submit" id="send_button" value="Se connecter" /></p>    
        </form>
   
    </body>
</html>