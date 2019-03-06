<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Inscription</title>
        <link href="public/css/style2.css" rel="stylesheet" />   


    </head>
  

    <body>

     <h1>Inscription</h1>
    
    <form action="index.php?action=inscriptionpost" method="post">  
  
        <p><label>Pseudo</label></br><input type ="text" name="user" value="" size="40"/></p>
          <p><label>Mot de passe</label></br><input type ="password" name="pass" value="" size="40"/></p>
          <p><label>Retapez votre mot de passe</label></br><input type ="password" name="pass2" value="" size="40"/></p>
          <p><label>Adresse email</label></br><input type ="text" name="email" value="" size="40"/></p>  
          <p><label></label><input type="submit" value="Valider" id="send_button"/></p>
    
    </form>

   
    </body>
</html>