<?php include ROOT . "/views/layouts/header.php" ?>

  <div>
    <table border="1">
      <caption><h3>Cписок поступающих</h3></caption>
      <tr>
        <th>№</th>
        <th>Имя</th>
        <th>Группа</th>
        <th>Баллы</th>
      </tr>
      <?php foreach ($abiturientsList as $row): ?>
      <tr>
        <?php foreach ($row as $name => $cell): ?>
        <td><?php echo $cell; ?></td>
        <?php endforeach; ?>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</body>
</html>