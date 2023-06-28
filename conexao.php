<?php
$conexao=MYSQLI_connect('Localhost','root','','canil');

   if (!$conexao){
      die('Não foi possivel conectar');
    }
