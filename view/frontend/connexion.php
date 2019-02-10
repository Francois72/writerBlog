<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Connexion</title>        
    </head>
    
    <style>
    body
    {
        background: black;
        color: white;
    }    

    form, h1
    {
        text-align: center; 
    }

    p
    {
        font-size: 18px;
    }

    label, #bouton_envoyer
    {
        
        font:bold 16px Arial;   
    }

    input
    {
        font-size: 16px;
       
       
        padding: 5px 0px 5px 5px;
    }

    #send_button
    {
        padding:5px 0 5px 0;
        
        background:white;
        color:#555;
        border-radius:5px;
        width:120px;
        border:1px solid #ccc;
        box-shadow:1px 1px 3px #999;    
    }
    </style>

    <body> 

    <h1>Connexion</h1>
      
    <form action="connexion_post.php" method="post">
        <p><label>Pseudo: </label></br><input type ="text" name="user" value="" size="40" required/></p>
        <p><label>Mot de passe: </label></br><input type ="password" name="pass" value="" size="40" required/></p> 
        <p><label>Connexion automatique </label></br><input type ="checkbox" name="coAuto"/></p>         
        <p><label></label><input type="submit" id="send_button" value="Se connecter" /></p>    
    </form>
   
    </body>
</html>