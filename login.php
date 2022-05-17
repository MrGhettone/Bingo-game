<?php

$login = true;

session_start();

if (isset($_SESSION["user"])) {
  header("Location: index.php");
}

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=bingo', 'root', '');
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$email = "";
$psw = "";
$errors = [];

if($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $email = htmlspecialchars($_POST["email"]);
  $psw = htmlspecialchars($_POST["password"]);

  if(empty($email)) $errors["email"] = "Inserire l' E-mail";
  if(empty($psw)) $errors["password"] = "Inserire la Password";

  if(empty($errors)) {
    $statement = $pdo->prepare("SELECT id FROM `users` WHERE email LIKE :email AND psw = :psw");
  
    $statement->bindValue(':email', $email);
    $statement->bindValue(':psw', $psw);
  
    $statement->execute();
  
    $_SESSION["user"] = $statement->fetch(PDO::FETCH_ASSOC);
  
    header("Location: index.php");
  }
}

?>


<!DOCTYPE html>
<html lang="en">
  <?php include_once "views/head.php"; ?>
  <body>
    <?php include_once "views/header.php"; ?>
    <section class="py-3">
      <div class="container text-center">
        <h1>BENTORNATO IN BINGO BETA</h1>
        <p>Accedi al tuo account per giocare e buona fortuna!!</p>
      </div>
      <div class="container d-flex justify-content-center">
        <form action="login.php" method="post" class="text-center my-3">

          <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email ?>">
            <?php
              if(isset($errors["email"])) echo '<div class="alert alert-danger" role="alert">
              ' . $errors["email"] . '
              </div>' 
            ?>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <?php
              if(isset($errors["password"])) echo '<div class="alert alert-danger" role="alert">
              ' . $errors["password"] . '
              </div>' 
            ?>
          </div>

          <button type="submit" class="btn btn-primary">Login</button>

        </form>
      </div>
    </section>
    
    <?php include_once "views/footer.php"; ?>
  </body>
</html>