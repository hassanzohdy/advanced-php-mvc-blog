<?php

namespace App\Controllers\Admin;

use System\Controller;

class ProfileController extends Controller
{
    /**
    * Submit for creating new user
    *
    * @return string | json
    */
    public function update()
    {
        $json = [];

        // We Will get the current user object from the login model
        // to get his id

        $user = $this->load->model('Login')->user();

        if ($this->isValid($user->id)) {
            // it means there are no errors in form validation
            $this->load->model('Users')->update($user->id, $user->users_group_id);

            $json['success'] = 'User Has Been Updated Successfully';

            $json['redirectTo'] = $this->request->referer() ?: $this->url->link('/admin');
        } else {
            // it means there are errors in form validation
            $json['errors'] = $this->validator->flattenMessages();
        }

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

        if ($this->request->post('password')) {
            $this->validator->required('password')->minLen('password', 8)->match('password', 'confirm_password', 'Confirm Password Should Match Password');
        }

        $this->validator->image('image');

        return $this->validator->passes();
    }
}