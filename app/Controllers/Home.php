<?php

namespace App\Controllers;

use App\Models\CommonModel;
use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
    use ResponseTrait;
    private $model;

    public function __construct()
    {
        $this->model = new CommonModel();
    }
    public function index()
    {

        $user_details = 'user_details';
        try {

            $fetchRecord = $this->model->selectRecords($user_details);
            $result = [
                "status" => '201',
                "data" => $fetchRecord
            ];
            return $this->respond($result)
                ->setHeader('Access-Control-Allow-Origin', '*')
                ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
                ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $this->failServerError('Internal Server Error');
        }
    }
}
