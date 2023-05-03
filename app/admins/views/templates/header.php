<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Админская</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="/app/admins/assets/css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/app/admins/tables/users/users.php">
            <h5>Пользователи</h5>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/app/admins/tables/shedules/shedule.php">
            <h5>Расписание</h5>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/app/admins/tables/orders/orders.php">
            <h5>Записи</h5>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/app/admins/tables/services/services.php">
            <h5>Услуги</h5>
          </a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link" href="/app/admins/tables/specs/specs.php">
            <h5>Специалисты</h5>
          </a>
        </li>
        <?php if ($_SESSION["privilege"]) : ?>
          <li class="nav-item">
            <a class="nav-link" href="/app/admins/tables/auths/insert.php">
              <h5>Создание админа</h5>
            </a>
          </li>
        <?php endif ?>
        <li class="nav-item">
          <div class="nav-link">
            <h5><?= $_SESSION["loginAdmin"] ?? "" ?></h5>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/app/admins/tables/auths/logaut.php">
            <h5>Выйти</h5>
          </a>

        </li>
      </ul>

    </div>
  </nav>