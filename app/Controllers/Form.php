<?php

namespace App\Controllers;

class Form extends BaseController
{
    public function index()
    {
        helper(['form']);

        $data = [];
        $data['categories'] = [
            'Student',
            'Teacher',
            'Principle'
        ];



        if ($this->request->getMethod() == 'post') {
            //Define rulesfor the validation
            $rules = [
                //required : check if empty or not
                'email' =>
                [
                    'rules' => 'required|valid_email',
                    'label' => 'Email address',
                    'errors' => [
                        'required' => 'Hey, this is required',
                        'valid_email' => 'Oh man! Really?'
                    ]
                ],
                'password' => 'required|min_length[8]',
                'category' => 'in_list[Student, Teacher]',
                'date' => [
                    'rules' => 'required|check_date',
                    'label' => 'Date',
                    'errors' => [
                        'required' => 'Isi tarikh ni woi',
                        'check_date' => 'Isi tarikh arini, dok pon esok luso'
                    ]
                ]
            ];
            if ($this->validate($rules)) {
                return redirect()->to('/form/success');
                //then do database insertion/login user/anything
            } else {
                //this->validator provide list of error have been created during validation failure
                $data['validation'] = $this->validator;
            }
        }
        return view('form', $data);
    }

    function success()
    {
        return 'Hey, you have passed the validation';
    }
}
