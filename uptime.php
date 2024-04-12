
<?php

    //Função de Verificação do Ping.
    function checkPing($host, $name)
    {
        //Atribuído o valor do comando ping na variável $command.
        $command = "ping -n 1 $host";

        //Array que receberá e posicionará a resposta do comando Ping.
        $output = [];

        //Executa o comando do Ping.
        exec($command, $output);

        //Condicional: Ver se informações no $output[8] e considerar somente números e atribuir a variável $ping.
        //Se não houver informações, a variável $ping recebe o valor de null.
        $ping = isset($output[8]) ? preg_replace('/\D/', '', substr($output[8], 38)) : '#';

        //Condicional: Verifica se a variável $ping contém número.
        if (is_numeric($ping))
        {
            return $name . ':' . $ping . ' ';

        } else {
            return $name . ':' . $ping . ' ';
        }
    }

  date_default_timezone_set("America/Sao_Paulo");
  $dateHours = date('d-m-Y H:i');

  $result = '';
  $result .= checkPing('8.8.8.8', 'Google');
  $result .= checkPing('1.1.1.1', 'Cloudflare');
  $result .= checkPing('8.8.8.7', 'Generic');
  $result .= checkPing('192.168.0.1', 'Local');

  //echo $dateHours . ' ' .  $result;



  //Criação de o txt com as informações da média dos Ping.
  $document = 'relatorio.txt';
  $write = fopen($document, 'a');
  fwrite($write, $dateHours);
  fwrite($write, $result . "\n");
  fclose($write);

  //header('Refresh:5');

?>
