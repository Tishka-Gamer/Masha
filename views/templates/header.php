<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>КЕА</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
  
  <div class="absolute width100">
    <nav class="navbar navbar-expand">
      <div class="logo-adress">
        <!-- логотип -->
        <a class="navbar-brand" href="/">
          <h1>КЕА <img class="logo" src="/assets/img/logo.png" alt=""></h1>
        </a>
        <div class="nav-item">
          <h5>(351)49-555-25 </h5>
          <h7>Челябинск ул.Пушкина 37</h7>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Переключатель навигации">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">


          <li class="nav-item">
            <a class="nav-link" href="/app/tables/orders/order.php">
              <h5>Запись</h5>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/app/tables/services/servicesTypes.php">
              <h5>Услуги</h5>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/app/tables/specialists/specialists.php">
              <h5>Специалисты</h5>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/app/tables/recommends.php">
              <h5>Советы по уходу</h5>
            </a>
          </li>
          <?php if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) : ?>
            <li class="nav-item">
              <a class="nav-link" href="/app/tables/users/auth.php">
                <h5>Войти</h5>
              </a>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="/app/tables/users/profile.php">
                <h5><?= $_SESSION["loginUs"] ?></h5>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/app/tables/users/logaut.php">
                <h5>Выйти</h5>
              </a>
            </li>
          <?php endif ?>
        </ul>

      </div>
    </nav>
  </div>