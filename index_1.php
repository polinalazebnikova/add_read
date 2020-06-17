<meta charset="utf-8">
<?php

    // Svistunova
    // https://php-study1-gossoudarev.c9users.io/students/Svistunova/logf/index.php
    echo "<link rel='stylesheet' href='style.css'>";
    
    if ($_SERVER['REQUEST_METHOD']==='POST') {
        $r = htmlentities($_POST['flname'].'^'.$_POST['mail'].'^'.$_POST['message']);
        
        $f = fopen('log.txt', 'a');
        fwrite($f, $r);
        fwrite($f, "\n");
        fclose($f);
        
        $f .= '<div class="right"><h2>Добавить еще один отзыв...</h2></div>';
        echo '<h3 style="color:green">Данные успешно добавлены, спасибо!</h3>';
    }
    //echo $f;
    echo "<div>";
    echo "<h2>Форма для заполнения </h2>";
    echo "<form class=\"box\" method=\"post\" action=\"//{$_SERVER['SERVER_NAME']}{$_SERVER['SCRIPT_NAME']}\" >";
    echo <<<_END
              <input id="flname" name="flname" required="required" type="text" placeholder="ФИО">
              <input id="mail" name="mail" required="required" type="text" placeholder="Электронная почта">
              <textarea id="message" name="message" required="required" type="text" placeholder="Отзыв"></textarea>
              <button type="submit">Оставить отзыв</button>
_END;
     echo "<h2>Список отзывов </h2>\n";
     echo require_once ('list.php');
     echo "</form></div>";