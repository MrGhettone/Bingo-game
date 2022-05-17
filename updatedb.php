<?php 

session_start();

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=bingo', 'root', '');
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST["balance"])) {
    $statement = $pdo->prepare("UPDATE users SET balance = :balance WHERE id = :id;");

    $statement->bindValue(':balance', $_POST["balance"]);
    $statement->bindValue(':id', $_SESSION["user"]["id"]);

    $statement->execute();
    unset($_POST["balance"]);
  }
  if(isset($_POST["bet"]) && isset($_POST["win"])) {
    $result = 0;

    if($_POST["win"] > 0) {
      $result = 1;
    }

    $statement = $pdo->prepare("INSERT INTO games (user_id, bet, win, result) VALUES (:id, :bet, :win, :result);");

    $statement->bindValue(':bet', $_POST["bet"]);
    $statement->bindValue(':win', $_POST["win"]);
    $statement->bindValue(':result', $result);
    $statement->bindValue(':id', $_SESSION["user"]["id"]);

    $statement->execute();
    unset($_POST["bet"]);
    unset($_POST["win"]);
    unset($_POST["result"]);
  }
}

?>