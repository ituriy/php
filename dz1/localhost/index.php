<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Формы</title>
    <link rel="stylesheet" href="css.css" type="text/css">
  </head>
  <body>
    
    <form action="display.php" method="post">
        <p>Введите имя: <input type="text" name="first_name" ></p>
        <p>Введите фамилию: <input type="text" name="last_name"></p>
        <p>Введите значение строк : <input type="number" name="row"> => Введите значение столбцов : <input type="number" name="col"></p>
       
        <input class="btn"  type="submit" value="Отправить">
        
     
   </body>
    </form>
    
</html>