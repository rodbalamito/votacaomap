<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['submit'])) {
    $team1_id = $_POST['team1_id'];
    $team2_id = $_POST['team2_id'];

    // Salva os IDs dos times selecionados na sessão
    $_SESSION['team1_id'] = $team1_id;
    $_SESSION['team2_id'] = $team2_id;

    // Redireciona para a página de votação de mapa
    header('Location: vote.php');
    exit;
}

// Obtém a lista de times
$conn = mysqli_connect('localhost', 'revistaq_csgo', '3526viniWar', 'revistaq_csgo');
$query = "SELECT id, name FROM teams";
$result = mysqli_query($conn, $query);
$teams = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Selecionar Times</title>
</head>
<body>
    <h1>Selecionar Times</h1>

    <form method="post">
        <div>
            <label for="team1_id">Time 1:</label>
            <select id="team1_id" name="team1_id" required>
                <?php foreach ($teams as $team): ?>
                    <option value="<?= $team['id'] ?>"><?= $team['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="team2_id">Time 2:</label>
            <select id="team2_id" name="team2_id" required>
                <?php foreach ($teams as $team): ?>
                    <option value="<?= $team['id'] ?>"><?= $team['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <input type="submit" name="submit" value="Selecionar">
        </div>
    </form>

</body>
</html>
