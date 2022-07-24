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
                //-----> RULES FOR FORM VALIDATION <---------//
                // 'email' =>
                // [
                //     'rules' => 'required|valid_email',
                //     'label' => 'Email address',
                //     'errors' => [
                //         'required' => 'Hey, this is required',
                //         'valid_email' => 'Oh man! Really?'
                //     ]
                // ],
                // 'password' => 'required|min_length[8]',
                // 'category' => 'in_list[Student, Teacher]',
                // 'date' => [
                //     'rules' => 'required|check_date',
                //     'label' => 'Date',
                //     'errors' => [
                //         'required' => 'Isi tarikh ni woi',
                //         'check_date' => 'Isi tarikh arini, dok pon esok luso'
                //     ]
                // ]

                //-----> RULES FOR FILE UPLOAD <---------//
                'theFile' => [
                    'rules' => 'uploaded[theFile.0]|max_size[theFile,5056]', //file size in KB
                    'label' => 'The file',
                ]
            ];
            if ($this->validate($rules)) {
                // $file = $this->request->getFile('theFile');
                // if ($file->isValid() && !$file->hasMoved()) {
                // Create const name for file--->'testName.' . $file->getExtension()
                // Create random name for file
                // $file->move('./uploads/images', $file->getRandomName());
                // }

                $files = $this->request->getFiles();
                foreach ($files['theFile'] as $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        echo $file->getName() . '- Real name <br>';
                        $file->move('./uploads/images/multiple');
                        echo $file->getName() . '- New name <br> <hr>';
                    }
                }

                exit();
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
