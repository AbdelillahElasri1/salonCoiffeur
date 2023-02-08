<?php

    class Api extends Controller 
    {
        // properties
        private $headers;
        private $appointement;
        private $client;
        private $test = 'Appointement';

        // method
        public function __construct()
        {
            $this->appointement = $this->model('Appointement');
        }

        public function createClient()
        {
            $this->headers->init("POST");
            $data = json_decode(file_get_contents("php://input"));
            $this->client->createClient();
            //$this->header->status(201, "Created");
            echo json_encode([
                "message" => "client created",
            ]);
        }

        public function updateClient()
        {
            $this->headers->init("PUT");
            $data = json_decode(file_get_contents("php://input"));
            $this->client->updateClient();
            echo json_encode([
                "message" => "client updated",
            ]);
        }
        
        public function addAppointement()
        {
            $this->headers->init("POST");
            $data = json_decode(file_get_contents("php://input"));
            $this->appointement->createAppointement();
            echo json_encode([
                "message" => "appointement created",
            ]);
        }

        public function updateAppointement()
        {
            $this->headers->init("PUT");
            $data = json_decode(file_get_contents("php://input"));
            $this->appointement->updateAppointement();
            echo json_encode([
                "message" => "appointement updated",
            ]);
        }

        public function deleteAppointement()
        {
            $this->headers->init("DELETE");
            $this->appointement->deleteAppointement();
            echo json_encode([
                "message" => "appointement deleted",
            ]);
        }

        public function getAll()
        {
           $this->appointement->getAppoint();
            echo json_encode([
                "message" => "all Appointement for clients",
            ]);
        }
    }