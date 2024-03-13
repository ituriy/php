<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Формы</title>
    <link rel="stylesheet" href="css.css" type="text/css">
  </head>

    <?php
    
        session_start();

        $size = 3;
        $index=1;
        $round=1;
        if(!empty($_SESSION['round'])){
        $round=$_SESSION['round'];}
        $_SESSION['round']=$round;

        $bot=rand(1,9);
        
        $array_id = array(1,2,3,4,5,6,7,8,9) ;
        if(!empty($_SESSION['$array'])){
        $array_id = $_SESSION['$array'];
        }
        $_SESSION['$array']=$array_id;
        
        function win(){
          if($_SESSION['$array'][0]=='x'&&$_SESSION['$array'][4]=='x'&&$_SESSION['$array'][8]=='x'
            ||$_SESSION['$array'][0]=='x'&&$_SESSION['$array'][1]=='x'&&$_SESSION['$array'][2]=='x'
            ||$_SESSION['$array'][3]=='x'&&$_SESSION['$array'][4]=='x'&&$_SESSION['$array'][5]=='x'
            ||$_SESSION['$array'][6]=='x'&&$_SESSION['$array'][7]=='x'&&$_SESSION['$array'][8]=='x'
            ||$_SESSION['$array'][6]=='x'&&$_SESSION['$array'][4]=='x'&&$_SESSION['$array'][2]=='x'
            ||$_SESSION['$array'][0]=='x'&&$_SESSION['$array'][3]=='x'&&$_SESSION['$array'][6]=='x'
            ||$_SESSION['$array'][2]=='x'&&$_SESSION['$array'][5]=='x'&&$_SESSION['$array'][8]=='x'
            ||$_SESSION['$array'][1]=='x'&&$_SESSION['$array'][4]=='x'&&$_SESSION['$array'][7]=='x'){
            echo "win";
          }
        }
        function winBot(){
          if($_SESSION['$array'][0]=='o'&&$_SESSION['$array'][4]=='o'&&$_SESSION['$array'][8]=='o'
            ||$_SESSION['$array'][0]=='o'&&$_SESSION['$array'][1]=='o'&&$_SESSION['$array'][2]=='o'
            ||$_SESSION['$array'][3]=='o'&&$_SESSION['$array'][4]=='o'&&$_SESSION['$array'][5]=='o'
            ||$_SESSION['$array'][6]=='o'&&$_SESSION['$array'][7]=='o'&&$_SESSION['$array'][8]=='o'
            ||$_SESSION['$array'][6]=='o'&&$_SESSION['$array'][4]=='o'&&$_SESSION['$array'][2]=='o'
            ||$_SESSION['$array'][0]=='o'&&$_SESSION['$array'][3]=='o'&&$_SESSION['$array'][6]=='o'
            ||$_SESSION['$array'][2]=='o'&&$_SESSION['$array'][5]=='o'&&$_SESSION['$array'][8]=='o'
            ||$_SESSION['$array'][1]=='o'&&$_SESSION['$array'][4]=='o'&&$_SESSION['$array'][7]=='o'){
            echo "winBot";
          }

        
        }

        function rounds(){
          if($_SESSION['round']==1){
            $_SESSION['round']=2;
          }
          else{
            $_SESSION['round']=1;
          }
        }
        
    ?>

   <body>

   <form action="index2.php" method="post">

    <?php 
    if(empty($_POST['contact'])){
      $_POST['contact']=0;
    }
   
    echo '<table style="border: 5px solid black">';
    if($_SESSION['round']==1){
        for ($i=0; $i<$size; $i++) {
            echo '<tr>';
            for ($j=0; $j<$size; $j++) {
              
                
                      if($index==$_POST['contact']){

                          echo '<td>'.'<p>x</p>'.'</td>';
                          $_SESSION['$array'][$index-1]="x";
                          $index++;
                      
                      }
                      else{
                        if($index!=$array_id[$index-1]){
                            if($array_id[$index-1]=='x'){
                              echo '<td>'.'<p>x</p>'.'</td>';
                              $index++;
                            }else{
                                echo '<td>'.'<p>o</p>'.'</td>';
                                $index++;
                            }
                          }
                          else{  
                            echo '<td>'.'<input type="radio" name="contact" value="'.$index.'">'.'</td>';
                            $index++;
                          }
                    
                      } 
                  
            }  
          
            echo '</tr>';
        }
      
    }
    else{
      for ($i=0; $i<$size; $i++) {
        echo '<tr>';
        for ($j=0; $j<$size; $j++) {
          
            if($array_id[$index-1]==$bot){

              echo '<td>'.'<p>o</p>'.'</td>';
              $_SESSION['$array'][$index-1]="o";
              $index++;
        
            }
            else{
              if($index!=$array_id[$index-1]){
                if($array_id[$index-1]=='x'){
                  echo '<td>'.'<p>x</p>'.'</td>';
                  $index++;
                }else{
                    echo '<td>'.'<p>o</p>'.'</td>';
                    $index++;
                }
              }
              else{  
                echo '<td>'.'<input type="radio" name="contact" value="'.$index.'">'.'</td>';
                $index++;
              }
          
            } 
              
        }  
      
        echo '</tr>';
    }
 
    }

    
    
    echo '</table>';
    rounds();
    win();
    winBot();
    
    echo '<input class="btn"  type="submit" value="сходить">';

   
   
    
    $destroySession = filter_input(INPUT_POST, 'destroySession');
        if ($destroySession == 1) {
          session_destroy();
        }
    ?>
    </form>
      <form action="" method="POST">
      <input type="hidden" name="destroySession" value="1">
      <input type="submit" value="сбросить" />
    </form>
   </body>

</html>