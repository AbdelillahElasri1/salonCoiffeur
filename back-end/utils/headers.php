<?php
    class headers{
        public function init($method){
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: $method');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
        }

        public function status($code, $message){
            header("HTTP1.1 $code $message");
        }
    }
?>