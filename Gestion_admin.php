<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Joueurs - Quiz App</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #fff;
        }

        th {
            background-color: #2ecc71;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #3498db;
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: #2ecc71;
            padding: 5px 10px;
            border-radius: 5px;
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
        <h1>Gestion des Joueurs</h1>
    </header>
    <main>
        <section>
            <table>
                <tr>
                    <th>Nom d'utilisateur</th>
                    <th>Rôle</th>
                </tr>
                <?php foreach($users as $user): ?>
                <tr>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </main>
    <footer>
        <p><a href="Accueil_Admin.php">Retour</a></p>
        <p>&copy; 2024 Quiz App. Tous droits réservés.</p>
    </footer>
</body>
</html>
