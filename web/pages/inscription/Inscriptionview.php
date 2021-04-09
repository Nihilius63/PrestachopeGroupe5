<!doctype html>
<html>
    <head>
        <title>Prestachope</title>
    </head>
    <body>
        <form action="index.php?pages=inscription" method="post"> 
            <p> Création d'un compte </p>
            <input type="text" name="prenom" placeholder="*Prénom" required />
            <input type="text" name="nom" placeholder="*Nom" required />
            <input type="text" name="email" placeholder="*Email" required />
            <input type="text" name="adresse" placeholder="*adresse" required />
            <input type="password" name="mdp" placeholder="*Mot de passe" required />
            <input type="password" name="confirm_mdp" placeholder="*Confirmation de mot de passe" required />
            <input type="submit" value="S'inscrire">
            <p> *Champs obligatoires </p>
        </form>
        <a href="index.php?pages=connexion"  value="connexion" >Déja client ? Connectez-vous</a>
    </body>
</html>


