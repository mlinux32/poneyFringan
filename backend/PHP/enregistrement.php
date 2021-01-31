<?php
// récupérer les données d'enregistrement : pseudo, email, mot de passe (confirmé)
$pseudo = $_POST['pseudo']; 
$email = $_POST['email'];
$password = $_POST['password'];
$confirmation = $_POST['password-confirmation'];

// valider les données d'enregistrement 
// TODO : vérifier le format de l'email (merci Nassera, on va gagner beaucoup de temps )
// On utilise la fonction filter_var : https://www.php.net/manual/fr/function.filter-var.php
// Avec le filtre de validation des emails
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Le format de l'adresse est incorrect"; 
    exit; 
}

// vérifier le nombre maximal de caractères par rapport aux types renseigné lors de la création de la BDD
if(strlen($pseudo) > 255 || strlen($email) > 255) {
    // TODO : renvoyer une erreur et quitter ce programme
    echo "Le pseudo ou le mail est trop long"; 
    exit; 
}
// vérifier la présence des mots de passe et l'égalité de mdp et de sa confirmation
if( $password != $confirmation) {
    // TODO : renvoyer une erreur et quitter ce programme
    echo "Les mots de passes sont différents"; 
    exit; 
}

// Arrivé ici, c'est que pour l'instant tout va bien (normalement)
try {
    // = sql, donc pareil qu'en dessous
    // insertion des données dans la base de données

    // connexion à la base
    include_once('bdd.php');
    $connexion = new PDO('mysql:host='. $db_url . ';dbname=' . $db_name, $db_user, $db_pass);
    // configuration (pour les exceptions)
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // TODO : on vérifie que l'utlisateur (son pseudo où son email) n'existe pas déjà

    // On écrit la requête de recherche de l'utliisateur 
    $rqt = "SELECT * FROM utilisateurs WHERE pseudo=:pseudo OR email=:email";
    // on prépare la requête
    $requetePreparee = $connexion->prepare($rqt);
    // on associe les valeurs (du formulaire) aux paramètres de notre requête préparée (ceux qui commencent pas `:` dans notre requête)
    $requetePreparee->bindParam(':pseudo', $pseudo);
    $requetePreparee->bindParam(':email', $email);
    // on execute la requête
    $requetePreparee->execute();
  
    // Si on a un résultat (ou plus), ça veut dire que le pseudo ou l'email est déjà pris
    if($requetePreparee->fetch() != false) {
        // TODO : message d'erreur mail ou pseudo déjà pris, 
        // on quitte
        echo "Email ou pseudo déjà pris"; 
        exit;
    }

    // Si on arrive ici, on est prêt à insérer l'utilisateur dans la base de données
    // hashage du mot de passe
    $hash = password_hash($password, PASSWORD_DEFAULT); 

    // on écrit la requête d'insertion
    $rqt = "INSERT INTO utilisateurs(email, pseudo, password) VALUES(:email, :pseudo, :password)";
    // on prépare la requête
    $requetePreparee = $connexion->prepare($rqt);
    // on associe les valeurs (du formulaire) aux paramètres de notre requête préparée (ceux qui commencent pas `:` dans notre requête)
    $requetePreparee->bindParam(':pseudo', $pseudo);
    $requetePreparee->bindParam(':email', $email);
    $requetePreparee->bindParam(':password', $hash);

    // on execute la requête
    $requetePreparee->execute();
    // on vérifie le nombre de ligne insérée (1 normalement)
    $nbLignesModifiee = $requetePreparee->rowCount();
    if($nbLignesModifiee != 1) {
        // TODO : a problème, message, quitte
        echo "Problème lors de l'enregistrement";
        exit;
    } else {
        // TODO : tout ok, message, 
        // TODO : Quitte ? redirige ? je ne sais pas ce qu'on fait...
        echo "Hey $pseudo, tu es maintenant enregistré, et je connais ton adresse (mail)";
    }

} catch(Exception $e) { // Si on "attrape" exception, c'est qu'il y a eu un problème 
    // On affiche le message d'erreur et on quitte
    echo $e->getMessage(); //:waring: :attention: :achtung: On ne fait pas un sur du code en production !!!!!
}
