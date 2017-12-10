<?php

namespace App\Controllers\Blog\Common;

use System\Controller;

class HeaderController extends Controller
{
    public function index()
    {
        $data['title'] = $this->html->getTitle();

        $loginModel = $this->load->model('Login');

        $data['user'] = $loginModel->isLogged() ? $loginModel->user() : null;

        $data['categories'] = $this->load->model('Categories')->getEnabledCategoriesWithNumberOfTotalPosts();

        return $this->view->render('blog/common/header', $data)->getOutput();
    }
}