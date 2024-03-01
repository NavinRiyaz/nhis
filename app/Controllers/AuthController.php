<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class AuthController extends BaseController
{

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        helper(['url', 'form', 'text']);
    }

    public function index()
    {
        $data = [];

        if ($this->request->getMethod() == 'post')
        {
            $rules = [
                'username' => 'required|min_length[4]',
                'password' => 'required|min_length[4]|validateUser[username, password]'
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Username or Password didn't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('auth/login', [
                    "validation" => $this->validator,
                ]);

            } else {
                $model = new UserModel();

                $user = $model->where('username', $this->request->getVar('username'))
                    ->first();

                $this->setUserSession($user);

                if($user['role'] == "ADMIN"){
                    return redirect()->to(base_url('admin'));
                }

                if($user['role'] == "UIIC"){
                    return redirect()->to(base_url('uiic'));
                }

                if($user['role'] == "HIGH"){
                    return redirect()->to(base_url('high'));
                }

                if($user['role'] == "STATE"){
                    return redirect()->to(base_url('state'));
                }

                if($user['role'] == "DISTRICT"){
                    return redirect()->to(base_url('district'));
                }

                if($user['role'] == "SUPER"){
                    return redirect()->to(base_url('super'));
                }
            }

        }
        return view('auth/login');
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'device_id' => $user['device_id'],
            'status' => $user['status'],
            'role' => $user['role'],
            'isLoggedIn' => true,
        ];
        session()->set($data);
        return true;
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url(''));
    }
}
