<?php include ROOT . "/views/layouts/header.php" ?>

    <div class="form">
      <h3>Регистрация</h3>
      <form action="#" method="post">
        <input type="email" name="email" placeholder="E-mail"/>
        <input type="password" name="password" placeholder="Пароль"/>
        <input type="text" name="surname" placeholder="Фамилия"/>
        <input type="text" name="name" placeholder="Имя"/>
        <input type="text" name="middleName" placeholder="Отчество"/>
        <label for="sex">Пол:</label>
        <select name="sex" id="sex">
          <option disabled>Пол</option>
          <option value="Женский">Женский</option>
          <option value="Мужской">Мужской</option>
        <select/>
        <input type="text" name="groupNumber" placeholder="Номер группы"/>
        <input type="number" name="mark" placeholder="Оценка"/>
        <input type="date" name="birthDate" placeholder="Дата рождения"/>
        <label for="hostel">Нуждается в общежитии</label>
        <input type="checkbox" name="hostel" id="hostel"/>
        <input type="submit" name="submit" value="Регистрация"/>
      </form>
    </div>
  </body>
</html>
