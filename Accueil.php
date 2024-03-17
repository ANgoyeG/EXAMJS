<?php
session_start();

if(isset($_SESSION['username'])) {
    echo '<a href="Deconnexion.php">Déconnexion</a>';
} else {
    echo '<a href="Connexion.html">Connexion</a>';
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Quiz App</title>
    <style>
        body {
            background-color: #3498db; 
            color: #fff; 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            text-align: center;
            padding: 20px 0;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        section {
            background-color: #2980b9; 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); 
            margin-bottom: 20px; 
        }

        ul {
            list-style-type: none; 
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: #2ecc71; 
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #27ae60;
        }

        footer {
            text-align: center;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenue sur Quiz App</h1>
    </header>
    <main>
        <section>
            <h2>Description du quizz</h2>
            <p>Bienvenue sur Quiz App, une plateforme interactive de questions-réponses sur divers sujets. Que vous soyez un joueur passionné ou un administrateur, vous trouverez ici un environnement stimulant pour tester vos connaissances et gérer vos questions.</p>
            <p>Pour commencer, veuillez vous inscrire ou vous connecter en tant qu'administrateur ou joueur.</p>
        </section>
        <section>
            <h2>Inscription et Connexion</h2>
            <ul>
                <li><a href="Inscription.html">Inscription</a></li>
                <li><a href="Connexion.html">Connexion</a></li>
            </ul>
        </section>
       
    </main>
    <footer>
        <p>&copy; 2024 Quiz App. Tous droits réservés.</p>
    </footer>
</body>
</html>
