<?php

namespace App\Controllers\Blog\Common;

use System\Controller;

class SidebarController extends Controller
{
    public function index()
    {
        $data['categories'] = $this->load->model('Categories')->getEnabledCategoriesWithNumberOfTotalPosts();

        $data['ads'] = $this->load->model('Ads')->enabled();

        return $this->view->render('blog/common/sidebar', $data);
    }
}