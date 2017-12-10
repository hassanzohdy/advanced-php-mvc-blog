<?php

namespace App\Controllers\Admin\Common;

use System\Controller;
use System\View\ViewInterface;

class LayoutController extends Controller
{
    /**
    * Render the layout with the given view Object
    *
    * @param \System\View\ViewInterface $view
    */
    public function render(ViewInterface $view)
    {
        $data['content'] = $view;
        $data['header'] = $this->load->controller('Admin/Common/Header')->index();
        $data['sidebar'] = $this->load->controller('Admin/Common/Sidebar')->index();
        $data['footer'] = $this->load->controller('Admin/Common/Footer')->index();

        return $this->view->render('admin/common/layout', $data);
    }
}