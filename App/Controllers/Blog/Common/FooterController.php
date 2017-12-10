<?php

namespace App\Controllers\Blog\Common;

use System\Controller;

class FooterController extends Controller
{
    public function index()
    {
        $data['user'] = $this->load->model('Login')->user();

        return $this->view->render('blog/common/footer', $data);
    }
}