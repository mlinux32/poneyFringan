# poney-fringan
Assoication, annuaire interne avec l'humour en prime

## CAHIER DES CHARGES

### Définition fonctionnelle du besoin
> fonctionnalités implémentées pour répondre à la demande du client

* **`Création  d'un compte utilisateur`**

    * N° adhérent pour chaque membre à renseigner pour la création de compte
    * N° adh-2045-...
    * vérifier si le numéro de l'utilisateur est bien conforme et non présente dans la bdd
    * formulaire d'inscription :

        * toutes les informations en bdd
        * sauf celles liées au profil
    
* **`Saisie des informations du profil (sécurisé)`**

    * `1ère connexion` :

        * renseigner les informations de profil
        * choix de 3 à 8 centres d'intérêts parmi une liste prédéfinie
        * pas de validation de formulaire si la contrainte n'est pas respectée

    * `choix de téléverser une image de profil :`

        * pas plus de 1 mo
        * type PNG, JPG ou GIF
        * pas d'obligation de fournir une image

* **`Connexion et déconnexion`**

    * l'utilisateur ne peut consulter que la page de connexion et/ou de création de compte
    * classique : login/mot de passe
    * possibilité de connection avec mail ou N° adhérent
    * si le profil n'est pas renseigné, redirection sur le formulair saisie profil
    * persistance de la connexion
    * déconnection depuis n'importe quelle page

* **`Affichage de la liste des adhérents (sécurié)`**

    * pseudo
    * prénom
    * nombre de jours d'adhésion
    * si le profil n'est pas encore renseigné, le faire apparaître grisé
    * le profil est consultable en cliquant dessus
    * si le profil n'a pas d'image, mettre une image par défaut ou initial sous forme d'avatar :

        * [avatar](https://avatars.oxro.io/)

    * pagination 50 membres/page
    * navigation "précédent/suivant"
    * page responsive

* **`Recherche de membres par nom (sécurisé)`**

    * recherche insensible à la casse :

        * nom
        * pseudo
        * login
        * émail

    * fonctionnalité disponible lorsque l'utilisateur est sur la liste des membres
    * si l'affichage est paginée, le conserver
    * les recherches :

        * soit par nom
        * soit par centre d'intérêt

* **`Recherche de membres par centre d'intérêt (sécurisé)`**

    * sélectionner un centre d'intérêt dans une liste
    * retourne toutes les personnes avec ce centre d'intérêt
    * génération de liste d'intérêt dynamiquement en fonction de la bdd
    * recherche : 

        * soit par nom
        * soit par centre d'intérêt

* **`Expérience utilisateur`**

    * site consultable sur mobile et sur ordi
    * interface responsive
    * design conforme à la palette de couleur

        * palette : https://coolors.co/)

    * interface saisie avec un profil épuré
    * interface sélection des centres d'intérêts dynamique
    * ne pas rafraîchir la page avant la soumission définitive du formulaire

* **`Définition technique du besoin`**

    * Maquettage

        * les livrables :

            * accès wireframes et maquettes

        * toutes les pages = un wireframe
        * maquette minima :

            * page de connexion ou création de compte
            * page de consultation profil membre
            * page statistiques

        * Frontend

            * HTML5 = spécification W3C
            * CSS3 = spécification W3C :

                * fichier dédié à chaque thème
                * fichier dédié aux variables CSS
                * fonts utilisées référencées comme fonts (http://fonts.google.com/)

            * JavaScript valide ES2015 (utilisation ESlint par exemple)

                * utilisation possible :

                    * Vue.js
                    * React
                    * Svelte
                    * Angular

                * utilisation possible de Node
                * ``` pas de JQuery ```
                * utilisation possible des librairies AJAX comme Axios
                * utilisation possible des librairies de création graphique comme chart.js

        * Backend

            * PHP7 et plus
            * utilisation possible de frameworks :

                * Laravel
                * Symfony

            * implémentation possible en POO
            * création et utilisation d'un fichier de configuration de connexion de base :

                * Hôte
                * port
                * identifiant
                * mot de passe
                * nom de la bdd

            * fichier .sql de création bdd [annexe2]() + un utilisateur par défaut, non root
            * utilisation PDO fortement encouragée
            * se prémunir des injections SQL
            * les mots de passe non vus par qui que ce soit
            * les informations sensibles pas par voie URL

        * *`Annexe 1 - Liste des centres d'intérêts`*

            > Sport, Musique, Jeux Vidéos, Lecture, Informatique, Sorties, Cuisine, Aviation, Mécanique, Licornes, Joaillerie, Agriculture, Cinéma, Politique, Couture, Animaux, Science, Histoire, SVT, Physique - Chimie, Taxidermie, Philatélie

        * *`Annexe 2 - Modèle logique bdd`*

            bdd = voir image bdd.png

            * adhérent = 1 profil max
            * profil = 1 seul adhérent
            * adhérent = plusieurs centres d'intérêts
            * plusieurs adhérents = 1 même centre d'intérêt
            * les centres d'intérêts renseignés à la création de la base et évolution dans le temps

# Ce qui est effectué 

    * le wireframe prêt en un jour le 7 janvier 2021
    * la maquette prête en un jour le 8 janvier 2021

# Ce qui est en cours

    * la bdd en cours le 8 janvier 2021

# Ce sur ce que je bloque

    * 

# Les liens

    * [lien Marvel](https://marvelapp.com/project/5273634/design/75823135)
    
# Les outils utilisés

    * utilisation de Svelte en framework js
    * utilisation de mariadb pour la bdd
    * utilisation de PHP ? ou Laravel ?
    * utilisation de Marvel pour les wireframes et les maquettes
    * utilisation de chart.js pour les statistiques
    * utilisation HTML - CSS/Sass
    * 

***`NB`***
Pour ce brief, c'est normal de trouver des éléments qui sont de travers... C'est un annuaire de membres sur l'humour !