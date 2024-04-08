<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use DateTime;
use DateTimeZone;

class Controller extends ResourceController
{
    protected $modelName = 'App\Models\Message';
    protected $format = "json";
    
    public function rectangle()
    {
        $length = $this->request->getVar("length");
        $height = $this->request->getVar("height");

        $response = [
            "message" => "success",
            "data" => $length * $height
        ];

        return $this->respond($response, 200);
    }

    public function now()
    {
        $date = new DateTime("now", new DateTimeZone('Asia/Jakarta') );
        $now = $date->format('Y-m-d H:i:s');

        $response = [
            "message" => "success",
            "data" => $now
        ];

        return $this->respond($response, 200);
    }

    public function name()
    {

        $name = $this->request->getGet("name");
        $response = [
            "message" => "success",
            "data" => "Hello " . $name
        ];

        return $this->respond($response, 200);
    }

    public function createMessage()
    {
        $rules =  $this->validate([
            "pesan" => "required",
        ]);

        if (!$rules) {
            $response = [
                "message" => $this->validator->getErrors()
            ];
            return $this->failValidationErrors($response);
        };

        $data = $this->model->insert([
            "message" => esc($this->request->getVar("pesan"))
        ]);

        $response = [
            "message" => "success",
            "data" => esc($this->request->getVar("pesan")),
        ];

        return $this->respondCreated($response);
    }

    public function getMessage()
    {
        $data = [
            "message" => "success",
            "data" => $this->model->findAll()
        ];

        return $this->respond($data, 200);
    }
}
