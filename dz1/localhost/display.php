<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Формы</title>
    
  </head>
  <body>
  <?php
    $nam=$_POST['first_name'];
    $nam2=$_POST['last_name'];
    $font_size = 16;
    $color_nam2 = ["red","blue","lime"];
    $col=$_POST['col'];
    $row=$_POST['row'];
    
    for ($i=0; $i <strlen($nam); $i++) { 
        echo "<span style = 'font-size:".$font_size."px'>".$nam[$i]."</span>";
        $font_size+=4;
    }
    echo "<br>";

    for ($i=0; $i <strlen($nam2) ; $i++) { 
        echo "<span style = 'color:".$color_nam2[rand(0,2)]."'>".$nam2[$i]."</span>";
    }

    echo "<br>";echo "<br>";echo "<br>";

    echo '<table style="border: 5px solid black">';
    for ($i=0; $i<$row; $i++) {
        echo '<tr>';
        for ($j=0; $j<$col; $j++) {
            echo '<td>'.($i*3+$j).'</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    
  ?>
   </body>
</html>