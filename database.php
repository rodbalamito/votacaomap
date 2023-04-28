<?php
// Define as informações de conexão ao banco de dados
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'revistaq_csgo');
define('DB_PASSWORD', '3526viniWar');
define('DB_NAME', 'revistaq_csgo');

// Conecta-se ao banco de dados
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verifica a conexão com o banco de dados
if($conn === false){
    die("Erro de conexão: " . mysqli_connect_error());
}
?>