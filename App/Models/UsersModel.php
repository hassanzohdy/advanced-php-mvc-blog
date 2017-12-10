<?php

namespace App\Models;

use System\Model;

class UsersModel extends Model
{
     /**
     * Table name
     *
     * @var string
     */
    protected $table = 'users';

    /**
    * Get All Users
    *
    * @return array
    */
    public function all()
    {
        return $this->select('u.*', 'ug.name AS `group`')->from('users u')
                    ->join('LEFT JOIN users_groups ug ON u.users_group_id=ug.id')
                    ->fetchAll();
    }

     /**
     * Create New User
     *
     * @return void
     */
    public function create()
    {
        $image = $this->uploadImage();

        if ($image) {
            $this->data('image', $image);
        }

        $this->data('first_name', $this->request->post('first_name'))
             ->data('last_name', $this->request->post('last_name'))
             ->data('users_group_id', $this->request->post('users_group_id'))
             ->data('email', $this->request->post('email'))
             ->data('password', password_hash($this->request->post('password'), PASSWORD_DEFAULT))
             ->data('status', $this->request->post('status'))
             ->data('gender', $this->request->post('gender'))
             ->data('birthday', strtotime($this->request->post('birthday')))
             ->data('ip', $this->request->server('REMOTE_ADDR'))
             ->data('created', $now = time())
             ->data('code', sha1($now . mt_rand()))
             ->insert('users');
    }

     /**
     * Upload User Image
     *
     * @return string
     */
     private function uploadImage()
     {
         $image = $this->request->file('image');

         if (! $image->exists()) {
             return '';
         }

         return $image->moveTo($this->app->file->toPublic('images'));
     }

     /**
     * Update Users Record By Id
     *
     * @param int $id
     * @param int $usersGroupId
     * @return void
     */
    public function update($id, $usersGroupId = null)
    {
        $image = $this->uploadImage();

        if ($image) {
            $this->data('image', $image);
        }

        $password = $this->request->post('password');

        if ($password) {
            $this->data('password', password_hash($password, PASSWORD_DEFAULT));
        }

        if (is_null($usersGroupId)) {
            $usersGroupId = $this->request->post('users_group_id');
        }

        $this->data('first_name', $this->request->post('first_name'))
             ->data('last_name', $this->request->post('last_name'))
             ->data('users_group_id', $usersGroupId)
             ->data('email', $this->request->post('email'))
             ->data('status', $this->request->post('status'))
             ->data('gender', $this->request->post('gender'))
             ->data('birthday', strtotime($this->request->post('birthday')))
             ->where('id=?' , $id)
             ->update('users');
    }
}