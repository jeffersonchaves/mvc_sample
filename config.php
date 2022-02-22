<?php 

    require_once __DIR__ . "/vendor/autoload.php";

    use Dotenv\Dotenv;

    class Config {

        function __construct(){

        }

        /**
         * Define as variaveis de ambiente
         * retorna void, mas seta as variáveis
         *
         * @return void 
         */
        public static function loadEnviroment(): array {

            $dotenv = Dotenv::createImmutable(__DIR__);
            $dotenv->load();

            $enviroment = "DEV_JEFFERSON"; #DEV_IF, DEV_LUIS
            $enviromentData = array();
            
            if ($enviroment == "DEV_JEFFERSON") {
        
                $enviromentData['BASE_URL'] = $_ENV['JEFFERSON_BASE_URL'];
                $enviromentData['DB_USER']  = $_ENV['JEFFERSON_DB_USER'];
                $enviromentData['DB_PASS']  = $_ENV['JEFFERSON_DB_PASS'];
        
            } else if ($enviroment == "LUIS_CASA") {
               
                $enviromentData['BASE_URL'] = $_ENV['JEFFERSON_BASE_URL'];
                $enviromentData['DB_USER']  = $_ENV['JEFFERSON_DB_USER'];
                $enviromentData['DB_PASS']  = $_ENV['JEFFERSON_DB_PASS'];
        
            }

            return $enviromentData;
        }
    }

    $env = Config::loadEnviroment();

    print_r($env);