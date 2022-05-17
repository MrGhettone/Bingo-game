<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Bingo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item <?php if(isset($login)) echo "active" ?>">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item <?php if(isset($reg)) echo "active" ?>">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <?php if(isset($index) && isset($_SESSION["user"])) : ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?logout=true">Log Out</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
</header>