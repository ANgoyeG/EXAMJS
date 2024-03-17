<?php
$questions = array(
    array(
        'ID' => 1,
        'question_text' => 'Question 1: Quelle est la capitale de la France?',
        'choice1' => 'Paris',
        'choice2' => 'Londres',
        'choice3' => 'Berlin',
        'correct_answer' => 1 
    ),
    array(
        'ID' => 2,
        'question_text' => 'Question 2: Combien de planètes y a-t-il dans notre système solaire?',
        'choice1' => '7',
        'choice2' => '8',
        'choice3' => '9',
        'correct_answer' => 2 
    ),
    array(
        'ID' => 3,
        'question_text' => 'Question 3: Quelle est la couleur du ciel par temps clair?',
        'choice1' => 'Rouge',
        'choice2' => 'Vert',
        'choice3' => 'Bleu',
        'correct_answer' => 3 
    ),
    array(
        'ID' => 4,
        'question_text' => 'Question 4: Quel est le plus grand océan du monde?',
        'choice1' => 'Océan Atlantique',
        'choice2' => 'Océan Arctique',
        'choice3' => 'Océan Pacifique',
        'correct_answer' => 3 
    ),
    array(
        'ID' => 5,
        'question_text' => 'Question 5: Quel est le plus haut sommet du monde?',
        'choice1' => 'Mont Everest',
        'choice2' => 'Mont Kilimandjaro',
        'choice3' => 'Mont Fuji',
        'correct_answer' => 1 
    )
);

$message = '';

if(isset($_POST['selected_question'])) {
    $selected_question_id = $_POST['selected_question'];

    if(isset($_POST['answer'])) {
        $selected_answer = $_POST['answer'];

        $selected_question = null;
        foreach($questions as $question) {
            if($question['ID'] == $selected_question_id) {
                $selected_question = $question;
                break;
            }
        }

        if($selected_answer == $selected_question['correct_answer']) {
            $message = 'Bonne réponse!';
        } else {
            $message = 'Mauvaise réponse. La réponse correcte est : ' . $selected_question['choice' . $selected_question['correct_answer']];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz - Quiz App</title>
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
        }

        form {
            margin-top: 20px;
        }

        .question {
            margin-bottom: 20px;
        }

        .question p {
            margin-bottom: 10px;
        }

        .choices {
            margin-left: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #2ecc71; 
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
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
        <h1>Quizz</h1>
    </header>
    <main>
        <section>
            <h2>Choisissez une question du Quizz</h2>
            <form action="Quizz.php" method="POST">
                <select name="selected_question">
                    <?php foreach($questions as $question): ?>
                        <option value="<?php echo $question['ID']; ?>"><?php echo $question['question_text']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Choisir</button>
            </form>
 <?php if(isset($_POST['selected_question'])): ?>
                <form action="Quizz.php" method="POST">
                    <?php
                    $selected_ID = $_POST['selected_question'];
                    $selected_question = null;
                    foreach($questions as $question) {
                        if($question['ID'] == $selected_ID) {
                            $selected_question = $question;
                            break;
                        }
                    }
                    if($selected_question): ?>
                        <h3><?php echo $selected_question['question_text']; ?></h3>
                        <input type="hidden" name="selected_question" value="<?php echo $selected_question['ID']; ?>">
                        <label>
                            <input type="radio" name="answer" value="1">
                            <?php echo $selected_question['choice1']; ?>
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="answer" value="2">
                            <?php echo $selected_question['choice2']; ?>
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="answer" value="3">
                            <?php echo $selected_question['choice3']; ?>
                        </label>
                        <br>
                        <button type="submit">Répondre</button>
                    <?php endif; ?>
                </form>
            <?php endif; ?>


            <p><?php echo $message; ?></p>
        </section>
    </main>
    <footer>
    <br>
    <button type="submit">
    <a href="Accueil.php">RETOUR ACCUEIL</a>
     </button>

        <p>&copy; 2024 Quiz App. Tous droits réservés.</p>
    </footer>
    
</body>
</html>
CODE15                                                                                                                                                                                                                                                                                                                                                                           <?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: Connexion.php");
    exit();
}

$servername = "localhost";
$db_username = "marie";
$db_password = "juin123";
$dbname = "examjs";
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$answers = $_POST;

$wrong_answers_count = 0;

foreach ($answers as $ID => $user_answer) {
    $sql = "SELECT correct_answer FROM questions WHERE ID = $ID";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $correct_answer = $row['correct_answer'];

        if ($user_answer != $correct_answer) {
            $wrong_answers_count++;
        }
    }
}

if ($wrong_answers_count >= 2) {
    echo "Vous avez eu deux mauvaises réponses. Voici la réponse correcte :";
    foreach ($answers as $ID => $user_answer) {
        $sql = "SELECT correct_answer FROM questions WHERE ID = $ID";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "Question $ID : " . $row['correct_answer'] . "<br>";
        }
    }
} else {
    echo "Félicitations ! Vous avez répondu correctement à toutes les questions.";
}

$conn->close();
?>