<?php

$reg = true;

session_start();

if (isset($_SESSION["user"])) {
  header("Location: index.php");
}

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=bingo', 'root', '');
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$name = "";
$surname = "";
$email = "";
$psw = "";
$errors = [];


if($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST["name"]);
  $surname = htmlspecialchars($_POST["surname"]);
  $email = htmlspecialchars($_POST["email"]);
  $psw = htmlspecialchars($_POST["password"]);
  $balance = 10.00;

  if(empty($name)) $errors["name"] = "Inserire il Nome";
  if(empty($surname)) $errors["surname"] = "Inserire il Cognome";
  if(empty($email)) $errors["email"] = "Inserire l' E-mail";
  if(empty($psw)) $errors["password"] = "Inserire la Password";
  
  if(empty($errors)) {
    $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
  
    $statement->bindValue(':email', $email);
  
    $statement->execute();
  
    $userSelected = $statement->fetch(PDO::FETCH_ASSOC);
  
    if(empty($userSelected)) {
      $statement = $pdo->prepare("INSERT INTO users (name, surname, email, psw, balance) 
      VALUES (:name, :surname, :email, :psw, :balance)");
    
      $statement->bindValue(':name', $name);
      $statement->bindValue(':surname', $surname);
      $statement->bindValue(':email', $email);
      $statement->bindValue(':psw', $psw);
      $statement->bindValue(':balance', $balance);
    
      $statement->execute();
      
      header("Location: login.php");
    } else {
      $errors["email-esist"] = "email gia esistente!!";
    }
  }
}


?>


<!DOCTYPE html>
<html lang="en">
  <?php include_once "views/head.php"; ?>
  <body>
    <?php include_once "views/header.php"; ?>  
    <section class="py-5">
      <div class="container text-center">
        <h1>BENVENUTO IN BINGO BETA</h1>
        <p>Registrati per ricevere 10 &euro; di benvenuto!!</p>
      </div>
      <div class="container d-flex flex-column flex-md-row justify-content-center h-100">
        <form action="register.php" method="post" class="text-center mx-5">

          
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Nome" name="name" value="<?php echo $name ?>">
            <?php
              if(isset($errors["name"])) echo '<div class="alert alert-danger" role="alert">
              ' . $errors["name"] . '
              </div>' 
            ?>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Cognome" name="surname" value="<?php echo $surname ?>">
            <?php
              if(isset($errors["surname"])) echo '<div class="alert alert-danger" role="alert">
              ' . $errors["surname"] . '
              </div>' 
            ?>
          </div>
        

        
          <div class="form-group">
            <input type="email" class="form-control" placeholder="E-mail" name="email" value="<?php echo $email ?>">
            <?php
              if(isset($errors["email"])) echo '<div class="alert alert-danger" role="alert">
              ' . $errors["email"] . '
              </div>' 
            ?>
            <?php
              if(isset($errors["email-esist"])) echo '<div class="alert alert-danger" role="alert">
              ' . $errors["email-esist"] . '
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
        

          <button type="submit" class="btn btn-primary">Registrati</button>

        </form>
        <div class="img mx-5">
          <img src="assets/images/register.png" alt="" style="width: 200px">
        </div>
      </div>
    </section>

    <?php include_once "views/footer.php"; ?>
  </body>
</html>