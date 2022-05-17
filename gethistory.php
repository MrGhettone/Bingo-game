<?php 

session_start();

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=bingo', 'root', '');
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_SESSION["user"])) {
    $statement = $pdo->prepare("SELECT bet, win, created_at FROM games WHERE user_id = :id");

    $statement->bindValue(':id', $_SESSION["user"]["id"]);

    $statement->execute();

    $response = $statement->fetchAll(PDO::FETCH_ASSOC);

    $response = json_encode($response);

    echo $response;
  }
}

?>