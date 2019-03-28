<!DOCTYPE html>
<html lang="en">
<head>
  <link type="text/css" rel="stylesheet" href="/styles/style.css"/>
  <meta charset="UTF-8">
  <title><?php echo $pageName; ?></title>
</head>
<body>
  <div id="header">
    <div id="main">
      <ul class="menu">
        <li><a href=".">Главная</a></li>
      </ul>
    </div>
    <div id="user">
      <ul class="menu">
        <?php if (isset($_SESSION["id"])): ?>
        <li><?php echo $user["name"] . " " . $user["surname"]; ?></li>
        <li><a href="cabinet">Личный кабинет</a></li>
        <li><a href="logout">Выход</a></li>
        <?php else: ?>
        <li><a href="login">Вход</a>
        <li><a href="register">Регистрация</a>
        <?php endif; ?>
      </ul>
    </div>
  </div>
