<!doctype html>
<html>
    <head>
        <title>Prestachope</title>
    </head>
    <body>
        <form action="" method="post"> 
            <p> Création d'un compte </p>
            <input type="text" name="prenom" placeholder="*Prénom" required />
            <input type="text" name="nom" placeholder="*Nom" required />
            <input type="email" name="email" placeholder="*Email" required />
            <input type="text" name="adresse" placeholder="*Adresse" required />
            <input type="password" name="mdp" placeholder="*Mot de passe" required />
             <input type="password" name="conf_mdp" placeholder="*Confirmation mot de passe" required />
            <input type="submit" value="S'inscrire">
            <p> *Champs obligatoires </p>
        </form>
        <a href="index.php?page=connexion"  value="connexion" >Déja client ? Connectez-vous</a>
    </body>
</html>
