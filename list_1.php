<?php
  // Svistunova
  $f = fopen('log.txt', 'r');
  $list = '';
  $list .= '<table>';
  $list .= '<tr><th>ФИО</th><th>Электронная почта</th><th>Отзыв</th></tr>';
  function wrap($x1, $x2, $x3){
      return '<tr><td>'.$x1.'</td><td>'.$x2.'</td><td>'.$x3.'</td></tr>';
  }
  while (($line = fgets($f)) !== false) {
    list($name, $mail, $message) = explode("^", $line);
    $list .= wrap($name, $mail, $message);
  }
  fclose($f);
  $list .= '</table>';
  return $list;