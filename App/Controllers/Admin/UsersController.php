<?php

namespace App\Controllers\Admin;

use System\Controller;

class UsersController extends Controller
{
    /**
    * Display Users  List
    *
    * @return mixed
    */
    public function index()
    {
        $this->html->setTitle('Users ');

        $data['users'] = $this->load->model('Users')->all();

        $data['success'] = $this->session->has('success') ? $this->session->pull('success') : null;

        $view = $this->view->render('admin/users/list', $data);

        return $this->adminLayout->render($view);
    }

    /**
    * Open Users  Form
    *
    * @return string
    */
    public function add()
    {
        return $this->form();
    }

    /**
    * Submit for creating new user
    *
    * @return string | json
    */
    public function submit()
    {
        $json = [];

        if ($this->isValid()) {
            // it means there are no errors in form validation
            $this->load->model('Users')->create();

            $json['success'] = 'User Has Been Created Successfully';

            $json['redirectTo'] = $this->url->link('/admin/users');
        } else {
            // it means there are errors in form validation
            $json['errors'] = $this->validator->flattenMessages();
        }

        return $this->json($json);
    }

     /**
     * Display Edit Form
     *
     * @param int $id
     * @return string
     */
    public function edit($id)
    {
        $usersModel = $this->load->model('Users');

        if (! $usersModel->exists($id)) {
            return $this->url->redirectTo('/404');
        }

        $user = $usersModel->get($id);

        return $this->form($user);
    }

     /**
     * Display Form
     *
     * @param \stdClass $user
     */
    private function form($user = null)
    {
        if ($user) {
            // editing form
            $data['target'] = 'edit-user-' . $user->id;

            $data['action'] = $this->url->link('/admin/users/save/' . $user->id);

            $data['heading'] = 'Edit ' . $user->first_name . ' ' . $user->last_name;
        } else {
            // adding form
            $data['target'] = 'add-user-form';

            $data['action'] = $this->url->link('/admin/users/submit');

            $data['heading'] = 'Add New User';
        }

        $user = (array) $user;

        $data['first_name'] = array_get($user, 'first_name');
        $data['last_name'] = array_get($user, 'last_name');
        $data['status'] = array_get($user, 'status', 'enabled');
        $data['users_group_id'] = array_get($user, 'users_group_id');
        $data['email'] = array_get($user, 'email');
        $data['gender'] = array_get($user, 'gender');

        $data['birthday'] = '';
        $data['image'] = '';

        if (! empty($user['birthday'])) {
            $data['birthday'] = date('d-m-Y', $user['birthday']);
        }

        if (! empty($user['image'])) {
            // default path to upload user image : public/images
            $data['image'] = $this->url->link('public/images/' . $user['image']);
        }

        $data['users_groups'] = $this->load->model('UsersGroups')->all();

        return $this->view->render('admin/users/form', $data);
    }

    /**
    * Submit for creating new user
    *
    * @return string | json
    */
    public function save($id)
    {
        $json = [];

        if ($this->isValid($id)) {
            // it means there are no errors in form validation
            $this->load->model('Users')->update($id);

            $json['success'] = 'Users  Has Been Updated Successfully';

            $json['redirectTo'] = $this->url->link('/admin/users');
        } else {
            // it means there are errors in form validation
            $json['errors'] = $this->validator->flattenMessages();
        }

        return $this->json($json);
    }

     /**
     * Delete Record
     *
     * @param int $id
     * @return mixed
     */
    public function delete($id)
    {
        $usersModel = $this->load->model('Users');

        if (! $usersModel->exists($id) OR $id == 1) {
            return $this->url->redirectTo('/404');
        }

        $usersModel->delete($id);

        $json['success'] = 'User Has Been Deleted Successfully';

        return $this->json($json);
    }

     /**
     * Validate the form
     *
     * @param int $id
     * @return bool
     */
    private function isValid($id = null)
    {
        $this->validator->required('first_name', 'First Name is Required');
        $this->validator->required('last_name', 'Last Name is Required');
        $this->validator->required('email')->email('email');
        $this->validator->unique('email', ['users', 'email', 'id', $id]);

        if (is_null($id)) {
            // if the id is null
            // then this method is called to create new user
            // so we will validate the password as it should be required
            // and the image as well
            $this->validator->required('password')->minLen('password', 8)->match('password', 'confirm_password', 'Confirm Password Should Match Password');
            $this->validator->requiredFile('image')->image('image');
        } else {
            $this->validator->image('image');
        }

        return $this->validator->passes();
    }
}