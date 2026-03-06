<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\NewModel;

class Auth extends BaseController
{

    public function __construct()
    {
        $db = db_connect();
        $this->NewModel = new NewModel($db);

    }
    public function index()
    {
        return view('auth/login');
    }
    public function register()
    {
        return view('auth/register');
    }

    //login  ========================================
    public function check()
    {
        if ($this->request->getMethod() == 'post') {
            $formdatas = $this->request->getPost();
            $details = $this->NewModel->select_data('reg_users', 'email,password', ['email' => $formdatas['email']]);
            //dd($details);
            if ($details ) {
                session()->setFlashdata('success', 'login successfull successfully!');
                return redirect()->to('/dashboard');
            } else {
                session()->setFlashdata('error', 'Invalid email or password.');
                return redirect()->to('/');
            }

        }
    }


    //register=================================================

    public function save()
    {

        if ($this->request->getMethod() == 'post') {
            $formdatas = $this->request->getPost();
            $hashedPassword = password_hash($formdatas['password'], PASSWORD_DEFAULT);
            $userdatas = [
                'added_by' => 1,
                'username' => $formdatas['username'],
                'fullname' => $formdatas['fullname'],
                'email' => $formdatas['email'],
                'password' => $hashedPassword,
                'phone' => $formdatas['phone'],
                'gender' => $formdatas['gender'],
                'address' => $formdatas['address'],
                // 'cpassword'=>$formdatas['cpassword'],
                'status' => 0,

            ];
            // print_r(userdatas);
            $this->NewModel->insert_to_tb('reg_users', $userdatas);
            session()->setFlashdata('success', 'Account created successfully!');
            return redirect()->to('/');
        } else {

            return view('/reg');
        }
    }








}
