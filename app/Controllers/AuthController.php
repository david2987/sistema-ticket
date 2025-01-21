<?php

namespace App\Controllers;

use App\Models\UserModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthController extends BaseController
{
    public function register()
    {
        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'username' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ];


        if ($this->request->getMethod() === 'POST') {


            if (!$this->validate($rules)) {
                return view('auth/register', ['validation' => $this->validator]);
            }

            $userModel = new UserModel();
            $userModel->save([
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
            ]);


            return redirect()->to('/login')->with('success', 'Registro exitoso. Por favor, inicia sesión.');
        }

        return view('auth/register');
    }


    public function profile($id)
    {

        $userModel = new UserModel();
        $user = $userModel->where('id', $id)->first();

        if(!$user){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Usuario no encontrado.');
        }
       
        if ($this->request->getMethod() === 'POST') {

            helper(['form']);
            $validation = \Config\Services::validation();
                    
            $rules = [
                'username' => 'required|min_length[3]|max_length[50]',               
                'password' => 'required|min_length[6]',
            ];

            if (!$this->validate($rules)) {
                return view('auth/profile', ['validation' => $this->validator, 'user' => $user]);
            }
            
            $userModel->update($id,[
                'username' => $this->request->getPost('username'),                
                'password' => $this->request->getPost('password'),
            ]);


            return view('auth/profile', ['success' => 'Usuario Editado Exitosamente!',  'user' => $user]);
        }

        return view('auth/profile',compact('user'));
    }

    public function login()
    {
        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ];

        if ($this->request->getMethod() === 'POST') {


            if (!$this->validate($rules, [])) {
                return view('auth/login', ['validation' => $this->validator]);
            }

            $userModel = new UserModel();
            $user = $userModel->where('email', $this->request->getPost('email'))->first();

            if (!$user || !password_verify($this->request->getPost('password'), $user['password'])) {
                return view('auth/login', ['error' => 'Error de Usuario / Contraseña']);
            }

            $key = getenv('JWT_SECRET');
            $iat = time(); // Tiempo actual
            $exp = $iat + 3600; // 1 hora de expiración

            $payload = [
                'iat' => $iat,
                'exp' => $exp,
                'uid' => $user['id'],
            ];

            $jwt = JWT::encode($payload, $key, 'HS256');

            // Si las credenciales son correctas
            $session = session();
            $session->set('isLoggedIn', true);
            $session->set('userId', $user['id']); // También puedes guardar otros datos del usuario
            $session->set('userName', $user['username']); // También puedes guardar otros datos del usuario


            return redirect()->to('/dashboard')->with('token', $jwt);
        }

        return view('auth/login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
