Rapport sur le Projet de Gestion de Bibliothèque avec Laravel (MikeBookcase)
1. Introduction
Ce projet MikeBookcase vise à offrir une solution web permettant de gérer une collection de livres, en offrant des fonctionnalités essentielles telles que l'affichage, l'ajout, la recherche, la consultation et la suppression des livres. Ce projet a été développé en utilisant le framework Laravel, un outil populaire et puissant pour le développement d'applications web en PHP. Il est réalisé dans le cadre d’un cours de laravel et a pour objectif pédagogique de mettre en pratique les principes de l'architecture MVC (Modèle-Vue-Contrôleur) et de développer des fonctionnalités permettant aux utilisateurs de gérer efficacement une bibliothèque en ligne.
Le projet offre aussi des options supplémentaires comme "Contacter Nous" qui permet à un utilisateur d’envoyer un message à la direction de la bibliothèque, "Nouveautés" qui permet de consulter les livres ajoutes depuis un moment donne et "Messages" qui permet de lire les messages des utilisateurs. Tout ceci permet d'enrichir l'interactivité du site et de faciliter la communication avec les utilisateurs.

2. Architecture et Technologies Utilisées
L'architecture MVC (Modèle-Vue-Contrôleur) est au cœur du développement de ce projet. Elle permet de séparer les préoccupations et de structurer le code de manière modulaire et maintenable.
•	Modèle (Model) : Dans un tel projet le modèle devrait être là pour interagir avec la base de données. Il devrait entre autres gérer les données de l'application, notamment les livres et les messages envoyés via le formulaire de contact. Il interagirait directement avec la base de données pour effectuer des opérations telles que la création, la lecture, la mise à jour et la suppression des livres, ainsi que la gestion des messages. Puisqu’ici on utilise des fichiers json pour stocker ces les livres et les messages et non une base de données, j’ai mis la logique des modèles dans les contrôleurs pour avoir moins de fichiers a livrer.
•	Vue (View) : La vue est responsable de la présentation des données à l'utilisateur. Dans ce projet, Laravel Blade est utilisé pour générer les pages HTML dynamiquement. Blade permet de créer des templates réutilisables et d'afficher les informations issues des modèles.
•	Contrôleur (Controller) : Le contrôleur gère la logique de l'application. Il reçoit les requêtes HTTP des utilisateurs, devrait interagir avec les modèles pour obtenir ou manipuler les données, puis renvoie la réponse appropriée à la vue. Ce qu’il ne fait pas puisqu’il interagit directement aux fichiers json jouant ainsi le rôle du modèle. Il est également responsable de la gestion des routes et des actions à effectuer.
En ce qui a trait aux technologies on a utilisé les suivantes :
•	Laravel : Etant réalisé dans le cadre d’un cours de laravel, on a utilisé évidemment un Framework PHP qui fournit une structure robuste pour le développement web. Il permet de gérer facilement les routes, les contrôleurs, et la base de données avec un ORM (Eloquent) pour interagir avec les modèles. Même si on n’a pas eu besoin de cette dernière fonctionnalité.
•	Blade : Moteur de templates intégré à Laravel, utilisé pour générer des vues dynamiques.
•	HTML, CSS, JavaScript : Technologies standards du web pour l'interface utilisateur.

3. Fonctionnalités du Site
On a pensé notre projet de bibliothèque autour des trois fonctionnalités qui correspondent aux besoins pratiques :
Gestion des Livres
Le cœur de l'application repose sur la gestion des livres. Voici les principales fonctionnalités associées :
•	Liste des Livres : L'utilisateur peut consulter la liste de tous les livres de la bibliothèque. Chaque livre est affiché avec ses informations clés telles que : titre, auteur, année de publication, résumé et prix. Cela permet une vue d'ensemble des livres disponibles.
•	Ajout d'un Livre : Un formulaire est proposé pour ajouter un nouveau livre à la bibliothèque. Il est visible en tout temps à la page qui affiche les livres et inclut les champs suivants : titre, auteur, année de publication, résumé et prix. La date de création est automatique générée lors de l'ajout des informations.
•	Détails d'un Livre : Lorsque l'utilisateur clique sur le bouton Details d’un livre, une page détaillée s'affiche avec toutes les informations du livre.
•	Suppression d'un Livre : Chaque livre affiché sur la liste dispose d'une option de suppression. Cette fonctionnalité permet de retirer.
•	Recherche de Livres : L'application permet à l'utilisateur de rechercher des livres dans la bibliothèque à l'aide de filtres tels que le titre du livre ou le nom de l’auteur (nom ou prénom).
Cela permet une navigation plus rapide et précise dans la bibliothèque.
Section 'Contacter Nous'
Cette section permet aux utilisateurs de contacter la bibliothèque via un formulaire en ligne. Le formulaire contient les champs suivants : nom, courriel et message. Les utilisateurs peuvent ainsi poser des questions ou demander des informations spécifiques.
Section 'Nouveautés'
La page des nouveautés affiche les livres récemment ajoutés à la bibliothèque. Par exemple, cette section peut afficher les livres ajoutés dans les dix derniers jours, permettant ainsi aux utilisateurs de découvrir rapidement les nouveaux titres disponibles.
Section 'Messages'
Cette page permet de consulter les messages envoyés par les utilisateurs via le formulaire de contact. Les administrateurs peuvent ainsi répondre ou gérer les demandes de manière centralisée.

4. Exigences d'Architecture des Écrans
L’application a globalement trois parties, l’entête qui contient le logo et la navigation, le corps de chaque page qui contient le contenu approprié et le pied de page qui contient les mentions légales et les liens de redirection vers les réseaux sociaux de la bibliothèque. Il est à noter que l’entête et le pied de page sont communs à toutes les pages.
En-tête
L'en-tête du site contient les éléments suivants :
•	Liens de navigation : Accueil, Contacter Nous, Chercher, Messages.
•	Design : Un style cohérent avec une navigation claire et simple, permettant à l'utilisateur de se repérer facilement sur le site.
Corps de la Page
Le corps de la page est composé de différentes pages fonctionnelles :
•	Page d'Accueil : Affiche la liste des livres disponibles avec un petit rectangle vertical a gauche servant de menu et ayant deux champs, l’un pour ajouter un livre et l’autre pour en rechercher un.
•	Page 'Contacter Nous' : Inclut un formulaire de contact que l’utilisateur peut utiliser pour laisser un message.
•	Page 'Nouveautés' : Affiche les livres ajoutés récemment.
•	Page ‘Messages’ : Page qui affiche les messages laisses par les utilisateurs.
Ergonomie et Accessibilité
Le site est conçu pour être intuitif et facile à naviguer. Les formulaires sont simples à remplir, et la structure de navigation permet aux utilisateurs de trouver rapidement ce qu'ils recherchent. La mise en page est claire, avec des boutons et des liens bien définis, et le site est conçu pour être accessible sur différents appareils.

5. Conclusion et Perspectives
Le projet de gestion de bibliothèque est une application web fonctionnelle qui permet aux utilisateurs de gérer efficacement une collection de livres. Grâce à Laravel et à l'architecture MVC, le projet offre une base solide pour l'ajout, la suppression, et la recherche de livres. Les sections supplémentaires comme "Contacter Nous", "Nouveautés" et "Messages" ajoutent des fonctionnalités intéressantes pour les utilisateurs et facilitent la gestion des demandes.
L’application MikeBookcase est finement réalisée. Toutefois, des améliorations peuvent être envisagées pour la rendre soit plus esthétique, plus complète ou plus sécuritaire. On parle, entre autres, de l’utilisation d’une base de données pour stocker les livres, les informations des utilisateurs ainsi que leurs messages, de l'ajout d'une fonctionnalité de gestion des utilisateurs (authentification), de la possibilité de prêter des livres, ou encore l'amélioration de l'interface utilisateur pour rendre le site encore plus interactif et agréable à utiliser, etc. Ceci dit, pour un projet réalisé dans le cadre d’un cours, il est déjà d’un niveau plus que satisfaisant.

