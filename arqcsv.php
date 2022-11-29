<?php
// Exemplo de scrip para exibir os nomes obtidos no arquivo CSV de exemplo

$delimitador = ',';
$cerca = '"';

// Abrir arquivo para leitura
$f = fopen('demo.csv', 'r');
if ($f) { 

    // Ler cabecalho do arquivo
    $cabecalho = fgetcsv($f, 0, $delimitador, $cerca);

    // Enquanto nao terminar o arquivo
    while (!feof($f)) { 

        // Ler uma linha do arquivo
        $linha = fgetcsv($f, 0, $delimitador, $cerca);
        if (!$linha) {
            continue;
        }

        // Montar registro com valores indexados pelo cabecalho
        $registro = array_combine($cabecalho, $linha);

        // Obtendo o nome
       // {
       //     name: 'Speedway Mini Mart',
       //     address: '5100 Hwy 95, 86426 Bullhead City, United States',
       //     location: {lat: -33.749771, lng: 25.405823},
       //   },
        
        echo "{\n";
        echo "name: '" .$registro['title']."',".PHP_EOL;
        echo "address: '" .$registro['street'] ."," .$registro['zip'] ." " .$registro['city'] ." " .$registro['state'] ." " .$registro['country']."',".PHP_EOL; 
        echo "location: {lat:" .$registro['lat'] .", lng: ".$registro['lng']."}," .PHP_EOL; 
        echo "},".PHP_EOL; 
    }
    fclose($f);
}