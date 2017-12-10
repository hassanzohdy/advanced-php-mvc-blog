<?php

namespace App\Controllers\Admin\Common;

use System\Controller;

class SidebarController extends Controller
{
    public function index()
    {
        return $this->view->render('admin/common/sidebar');
    }
}