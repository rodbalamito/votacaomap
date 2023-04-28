<?php
session_start();

if (isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $team_id = $_POST['team_id'];

    // Insere o usuário no banco de dados
    $conn = mysqli_connect('localhost', 'revistaq_csgo', '3526viniWar', 'revistaq_csgo');
    $query = "INSERT INTO users (username, password, team_id) VALUES ('$username', '$password', $team_id)";
    mysqli_query($conn, $query);

    // Redireciona para a página de login
    header('Location: login.php');
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
    <title>Registro de Jogador</title>
</head>
<body>
    <h1>Registro de Jogador</h1>

    <form method="post">
        <div>
            <label for="username">Nome de Usuário:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="team_id">Time:</label>
            <select id="team_id" name="team_id" required>
                <?php foreach ($teams as $team): ?>
                    <option value="<?= $team['id'] ?>"><?= $team['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <input type="submit" name="submit" value="Registrar">
        </div>
    </form>

</body>
</html>
