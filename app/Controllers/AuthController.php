<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class AuthController extends BaseController
{
    protected $AuthModel;
    protected $session;

    public function __construct()
    {
        $db = db_connect();
        $this->AuthModel = new AuthModel($db);
        $this->session = session();
    }

    // Login page
    public function index()
    {
        return view('auth/login');
    }

    // Register page
    public function register()
    {
        return view('auth/register');
    }

    // Register user
    public function save()
    {
        if ($this->request->getMethod() == 'post') {

            $formdatas = $this->request->getPost();

            $hashedPassword = password_hash($formdatas['password'], PASSWORD_DEFAULT);

            $userdatas = [
                'name'      => $formdatas['name'],
                'email'     => $formdatas['email'],
                'password'  => $hashedPassword,
                'roll'      => 0,
                'status'    => 0,
                'added_by'  => 1,
            ];

            // Insert user
            $this->AuthModel->insert_to_tb('tbl_users', $userdatas);

            // Get inserted user ID
            $userId = $this->AuthModel->insertID();

            // Success message
            session()->setFlashdata('success', 'Account created successfully!');

            // Set session
            $this->session->set([
                'user_id'    => $userId,
                'username'   => $formdatas['name'],
                'role'       => 'User',
                'isLoggedIn' => true
            ]);

            return redirect()->to('/');
        }

        return view('auth/register');
    }

    // Login check
    public function check()
    {
        if ($this->request->getMethod() == 'post') {

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $details = $this->AuthModel->select_data(
                'tbl_users',
                '*',
                ['email' => $email]
            );

            if (!empty($details)) {

                $user = $details[0];

                if (password_verify($password, $user['password'])) {

                    $this->session->set([
                        'user_id' => $user['id'],
                        'username' => $user['name'],
                        'role' => 'User',
                        'isLoggedIn' => true
                    ]);

                    return redirect()->to('/dashboard');

                } else {

                    session()->setFlashdata('error', 'Invalid email or password.');
                    return redirect()->to('/');
                }

            } else {

                session()->setFlashdata('error', 'User not found.');
                return redirect()->to('/');
            }
        }
    }
    // Logout
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }
}
