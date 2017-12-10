<?php

namespace App\Controllers\Admin\Common;

use System\Controller;

class FooterController extends Controller
{
    public function index()
    {
        $data['user'] = $this->load->model('Login')->user();

        return $this->view->render('admin/common/footer', $data);
    }
}