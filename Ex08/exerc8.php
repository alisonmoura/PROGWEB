<?php
  $titulo = 'Minhas Frutas Favoritas';
  $tipos = array('Cítricas', 'Tropicais', 'Exóticas', 'Afrodisíacas');
  $usuarios = array(
    'Jão da Silva' => 'Cítricas',
    'Maria da Silva' => 'Tropicais',
    'Zé da Silva' => NULL,
    'Pafúncio da Silva' => 'Exóticas',
    'Ecrislâine da Silva' => 'Afrodisíacas'
  )
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $titulo ?></title>
</head>
<body>
  <h1><?=$titulo ?></h1>
  
  <h2>As frutas podem ser:</h2>
  <div>
    <ul>
      <? for( $i = 0; $i < count($tipos); $i++) { ?>
        <li><?= $tipos[$i] ?></li>
      <? } ?>
    </ul>
  </div>

  <h2>Usuários:</h2>
  <div>
    <ul>
      <?
        $i = 0; 
        while( $i < count(array_keys($usuarios)) ) { 
          echo '<li>' . array_keys($usuarios)[$i] . '</li>';
          $i++; 
        } 
      ?>
    </ul>
  </div>

  <h2>Usuários e frutas:</h2>
  <div>
    <ul>
      <?
        foreach ($usuarios as $key => $value)
        if($value == NULL) echo '<li><strong>' . $key . '</strong> não tem preferência</li>';
        else echo '<li><strong>' . $key . '</strong> prefere: ' . $value . '</li>';
      ?>
    </ul>
  </div>
</body>
</html>