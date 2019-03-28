<?php include ROOT . "/views/layouts/header.php" ?>

    <div class="form">
      <h3>Редактирование данных</h3>
      <form action="#" method="post">
        <input type="text" name="surname" placeholder="Фамилия" value="<?php echo $abiturient->surname; ?>"/>
        <input type="text" name="name" placeholder="Имя" value="<?php echo $abiturient->name; ?>"/>
        <input type="text" name="middleName" placeholder="Отчество" value="<?php echo $abiturient->middleName; ?>"/>
        <label for="sex">Пол:</label>
        <select name="sex" id="sex">
          <option <?php if($abiturient->sex==0) echo "selected"; ?> value="Женский">Женский</option>
          <option <?php if($abiturient->sex==1) echo "selected"; ?> value="Мужской">Мужской</option>
        <select/>
        <input type="text" name="groupNumber" placeholder="Номер группы" value="<?php echo $abiturient->groupNumber; ?>"/>
        <input type="number" name="mark" placeholder="Оценка" value="<?php echo $abiturient->mark; ?>"/>
        <input type="date" name="birthDate" placeholder="Дата рождения" value="<?php echo $abiturient->birthDate; ?>"/>
        <label for="hostel">Нуждается в общежитии</label>
        <input type="checkbox" name="hostel" id="hostel" <?php if($abiturient->hostel==1) echo "checked"; ?>/>
        <input type="submit" name="submit" value="Редактировать"/>
      </form>
    </div>
  </body>
</html>