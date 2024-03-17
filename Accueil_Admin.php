<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Administrateur - Quiz App</title>
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
        <?php if(isset($_SESSION['username']) && $_SESSION['role'] == 'admin'): ?>
            <section>
                <h2>Gérer les joueurs</h2>
                <a href="gestion_joueurs.php">Gérer les joueurs</a>
            </section>
        <?php else: ?>
            <p>Accès non autorisé. Veuillez vous connecter en tant qu'administrateur.</p>
        <?php endif; ?>
    </main>
    <footer>
        <?php if(isset($_SESSION['username'])): ?>
            <p><a href="Deconnexion.php">Déconnexion</a></p>
        <?php endif; ?>
        <p>&copy; 2024 Quiz App. Tous droits réservés.</p>
    </footer>
</body>
</html>
