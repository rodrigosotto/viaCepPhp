<?php 
    
    namespace App\WebService;
    
    
    class ViaCEP
    {
        //metodo vai ser estatico porque nao precisa da instancia para funcionar

        /**
         * Metodo responsavel por consultar um cep no VIACEP
         *
         * @param string $cep
         * @return array
         */
        public static function consultarCEP($cep)
        {
            //iniciar o curl
            $curl = curl_init();

            //configuracoes do curl
            curl_setopt_array($curl, [
                CURLOPT_URL             =>'https://viacep.com.br/ws/'.$cep.'/json/',
                CURLOPT_RETURNTRANSFER  =>true,
                CURLOPT_CUSTOMREQUEST   => 'GET'
            ]);

            //RESPONSE
            $response = curl_exec($curl);

            //fecha a conexao aberta
            curl_close($curl);

            //converte JSON para ARRAY
            $responseArray = json_decode($response, true);

            //retornar o conteudo em array com um tambem tem um tratamento de erro

            return isset($responseArray['cep']) ? $responseArray : "Algum erro com cep inserido";
        }
    }
?>