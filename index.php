<?php
    require __DIR__.'/vendor/autoload.php';

        //DEPENDENCIAS
    use \App\WebService\ViaCep;

    $dadosCEP = ViaCEP::consultarCEP("85854489");

    print_r($dadosCEP);

?>