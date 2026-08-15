<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('admin_logged_in')) {
            return redirect()->to(base_url('admin/dashboard'));
        }

        return view('admin/login');
    }

    public function loginProcess()
    {
        $email    = trim($this->request->getPost('email'));
        $password = trim($this->request->getPost('password'));

        $db   = \Config\Database::connect();
        $user = $db->table('users')->where('email', $email)->where('role', 'admin')->get()->getRowArray();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'admin_logged_in' => true,
                'admin_id'        => $user['id'],
                'admin_name'      => $user['name'],
                'admin_email'     => $user['email'],
            ]);

            return redirect()->to(base_url('admin/dashboard'))->with('success', 'Welcome back, ' . $user['name'] . '!');
        }

        // Fallback default admin check
        if ($email === 'admin@kagziventures.com' && $password === 'admin123') {
            session()->set([
                'admin_logged_in' => true,
                'admin_id'        => 1,
                'admin_name'      => 'Kagzi Admin',
                'admin_email'     => 'admin@kagziventures.com',
            ]);

            return redirect()->to(base_url('admin/dashboard'))->with('success', 'Welcome back, Kagzi Admin!');
        }

        return redirect()->to(base_url('admin/login'))->with('error', 'Invalid email address or password.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('admin/login'))->with('info', 'You have been logged out.');
    }
}
