<?php

namespace App\Controllers;

class Image extends BaseController
{
    public function index()
    {
        //form helper for the form validation rules
        //no need to specify like image_helper, just the front part
        helper(['form', 'image']);

        $data = [];

        if ($this->request->getMethod() == 'post') {
            //Define rulesfor the validation
            $rules = [

                'theFile' => [
                    'rules' => 'uploaded[theFile.0]|is_image[theFile]', //file size in KB
                    'label' => 'The file',
                ]
            ];
            if ($this->validate($rules)) {

                $path = './uploads/images/manipulated/';
                $files = $this->request->getFiles();

                $imageService = service('image');
                //Same thing as above
                $imageService = \Config\Services::image();


                foreach ($files['theFile'] as $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        //move create directory even if no exist
                        $file->move($path);
                        $fileName = $file->getName();
                        $data['image'] = $fileName;


                        $this->imageManipulation($path, 'thumbs', $fileName, $imageService);
                        $data['folders'][] = 'thumbs';
                        $this->imageManipulation($path, 'flip', $fileName, $imageService);
                        $data['folders'][] = 'flip';
                        $this->imageManipulation($path, 'rotate', $fileName, $imageService);
                        $data['folders'][] = 'rotate';
                    }
                }

                //then do database insertion/login user/anything
            } else {
                //this->validator provide list of error have been created during validation failure
                $data['validation'] = $this->validator;
            }
        }
        return view('image', $data);
    }

    private function imageManipulation($path, $folder, $fileName, $imageService)
    {
        $savePath = $path . '/' . $folder;
        if (!file_exists($savePath))
            mkdir($savePath, 755);

        $imageService->withFile(src($fileName));

        switch ($folder) {
            case 'thumbs':
                $imageService->fit(150, 150);
                break;
            case 'flip':
                //can combine multiple image manipulation properties
                $imageService->flip('horizontal');
                $imageService->fit(160, 90);
                break;
            case 'rotate':
                $imageService->rotate(90);
                break;
        }
        return $imageService->save($savePath . '/' . $fileName);
    }
}
