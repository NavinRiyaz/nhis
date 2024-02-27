<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class UIICController extends BaseController
{

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        helper(['url', 'text', 'form']);
    }

    public function index()
    {
        return view('uiic/dashboard');
    }

    public function reimbursementEntry()
    {
        $data = [];

        return view('uiic/reimbursement');
    }

    public function paymentEntry()
    {
        $data = [];

        return view('uiic/payment');
    }
}
