<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AuthModel;

class AuthController extends BaseController
{

    public function __construct()
    {
        $db = db_connect();
        $this->AuthModel = new AuthModel($db);
        $this->session=session();

    }

    //login
    public function index()
    {
       
        return view('auth/login');
    }

    //register
    public function register()
    {
        // dd('register page');
        // session()->setFlashdata('error', 'This is a test error message!');
        return view('auth/register');
    }

    //register entering
    public function save()
    {
        if ($this->request->getMethod() =='post'){
            $formdatas = $this->request->getPost();
            $hashedPassword = password_hash($formdatas['password'],PASSWORD_DEFAULT);
            $userdatas =[
                'name'      => $formdatas['name'],
                'email'     => $formdatas['email'],
                'password'  => $hashedPassword,
                'roll'      => 0,
                'status'    => 0,
                'added_by'  => 1, 
            ];
             $userId = $this->AuthModel->insertID();
            // dd($userdatas);
            $this->AuthModel->insert_to_tb('tbl_users',$userdatas);
            session()->setFlashdata('success','Account created successfully!');
            session()->set('lgoin',1);
             $this->session->set([
            'user_id'    => $userId,
            'username'   => $formdatas['name'],
            'role'       => 'User',
            'isLoggedIn' => true
        ]);
        dd($this->session->get());

            return redirect()->to('/');
        }else{
            return view('/register');
        }        
    }
    //login check
    public  function check()
    {
        if ($this->request->getMethod()=='post'){
            $logdatas = $this->request->getPost();
            $details = $this->AuthModel->select_data('tbl_users','email,password',['email'=>$logdatas['email']]);
            // dd($details);
               if ($details && password_verify($logdatas['password'], $details[0]['password'])) {
                session()->setFlashdata('success', 'login successfull successfully!');
                return redirect()->to('/dashboard');
            } else {
                session()->setFlashdata('error', 'Invalid email or password.');
                return redirect()->to('/');
            }   
        }
    }
    //logout
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/'); 
    }
}
