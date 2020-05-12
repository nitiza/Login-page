<?php namespace App\Controllers;

use App\Models\UserModel;


class users extends BaseController
{
	public function index()
	{
        $data = [];
        helper(['form']);

        if($this->request->getMethod() == 'post'){
            $rules = [ 
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email, password]',

            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Email or Password don\'t match'
                ]

            ];
            if(! $this->validate($rules,$errors)){
                $data['validation'] = $this->validator;
            }else{
                
                $model = new UserModel();
                
                $user = $model->where('email', $this->request->getVar('email'))
                            ->first();
                
                $this->setUserSession($user);
                //$session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('NitishaProject/login/public/dashboard');
                
                
            }
        }

        echo view('layout/header',$data);
        echo view('login');
        echo view('layout/footer');
    }
    
    private function setUserSession($user){
        $data = [
            //'id' => $user['id'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'isLoggedIn' => true, 

        ];

        session()->set($data);
        return true;
    }


    public function register(){

        $data = [];
        helper(['form']);
        
        if($this->request->getMethod() == 'post'){
            //Let's do the validation here
            $rules = [ 
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];
            if(! $this->validate($rules)){
                $data['validation'] = $this->validator;
            }else{
                
                $model = new UserModel();

                $newData = [
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('NitishaProject/login/public/index');
                
                
            }
        }

        echo view('layout/header',$data);
        echo view('register');
        echo view('layout/footer');

    }

	//--------------------------------------------------------------------

}