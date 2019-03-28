<?php include ROOT . "/views/layouts/header.php" ?>

  <h2>Личный кабинет абитуриента <?php echo $user["name"] . " " . $user["surname"]; ?></h2>
  <p>Ваш id: <?php echo $_SESSION["id"]; ?> </p>
  <p><a href="edit">Редактировать данные</a>
</body>
</html>