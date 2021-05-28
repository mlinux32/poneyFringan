
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('connexion.php'); // inclut le fichier que s'il n'a pas déjà été inclut

// récupérer les données du formulaire avec la méthode POST
$headers = getallheaders(); // récupération de tous les éléments dans un tableau associatif
$pseudo = $_POST['identifiant'];
$password = $_POST['password'];
try {
    // connexion à la base connexion
    $connexionSQL = new PDO('mariadb:host'. $db_url .';dbname='. $db_name, $db_user, $db_password);
    $connexionSQL->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // préparation de la requête
    $rqt = "SELECT pseudo, password FROM adherents WHERE identifiant = :identifiant LIMIT1";
    



    $resultat = $requetPreparee->fetch(PDO:FETH_ASSOC);
    var_dump($resultat);
} catch (Exception $e) {
    echo $e->getMessage();
    $ok = password_verify($password, $hash);
}

if($ok) {
    echo "Ravi de te voir";
} else {
    echo "Recommence, tu vas y arriver !";

    if(!empty($headers['Accept']) && $headers['Accept'] == 'application/json') {
        header('Content-Type: application/json');
        if('$ok') {
            echo json_encode("Ravi de te voir");
        } else {
            echo json_decode("Recommence, tu vas y arriver !");
        }
    } else {
        header('Content-Type : text/html');
        if($ok) {
            echo "Ravi de te voir";
        } else {
            echo "Recommence, tu vas y arriver !";
        }
    }
}