<?php

namespace App\Controllers\Admin;

use System\Controller;

class PostsController extends Controller
{
    /**
    * Display Posts  List
    *
    * @return mixed
    */
    public function index()
    {
        $this->html->setTitle('Posts');

        $data['posts'] = $this->load->model('Posts')->all();

        $data['success'] = $this->session->has('success') ? $this->session->pull('success') : null;

        $view = $this->view->render('admin/posts/list', $data);

        return $this->adminLayout->render($view);
    }

    /**
    * Open Posts  Form
    *
    * @return string
    */
    public function add()
    {
        return $this->form();
    }

    /**
    * Submit for creating new post
    *
    * @return string | json
    */
    public function submit()
    {
        $json = [];

        if ($this->isValid()) {
            // it means there are no errors in form validation
            $this->load->model('Posts')->create();

            $json['success'] = 'Post Has Been Created Successfully';

            $json['redirectTo'] = $this->url->link('/admin/posts');
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
        $postsModel = $this->load->model('Posts');

        if (! $postsModel->exists($id)) {
            return $this->url->redirectTo('/404');
        }

        $post = $postsModel->get($id);

        return $this->form($post);
    }

     /**
     * Display Form
     *
     * @param \stdClass $post
     */
    private function form($post = null)
    {
        if ($post) {
            // editing form
            $data['target'] = 'edit-post-' . $post->id;

            $data['action'] = $this->url->link('/admin/posts/save/' . $post->id);

            $data['heading'] = 'Edit ' . $post->title;
        } else {
            // adding form
            $data['target'] = 'add-post-form';

            $data['action'] = $this->url->link('/admin/posts/submit');

            $data['heading'] = 'Add New Post';
        }

        $post = (array) $post;

        $data['title'] = array_get($post, 'title');
        $data['category_id'] = array_get($post, 'category_id');
        $data['status'] = array_get($post, 'status', 'enabled');
        $data['details'] = array_get($post, 'details');
        $data['tags'] = array_get($post, 'tags');
        $data['id'] = array_get($post, 'id');

        $data['image'] = '';
        $data['related_posts'] = [];

        if ($post['related_posts']) { // change this condition
            // to if (! empty($post['related_posts'])
            $data['related_posts'] = explode(',', $post['related_posts']);
        }

        if (! empty($post['image'])) {
            // default path to upload post image : public/images
            $data['image'] = $this->url->link('public/images/' . $post['image']);
        }

        $data['categories'] = $this->load->model('Categories')->all();

        $data['posts'] = $this->load->model('Posts')->all();

        return $this->view->render('admin/posts/form', $data);
    }

    /**
    * Submit for creating new post
    *
    * @return string | json
    */
    public function save($id)
    {
        $json = [];

        if ($this->isValid($id)) {
            // it means there are no errors in form validation
            $this->load->model('Posts')->update($id);

            $json['success'] = 'Posts  Has Been Updated Successfully';

            $json['redirectTo'] = $this->url->link('/admin/posts');
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
        $postsModel = $this->load->model('Posts');

        if (! $postsModel->exists($id)) {
            return $this->url->redirectTo('/404');
        }

        $postsModel->delete($id);

        $json['success'] = 'Post Has Been Deleted Successfully';

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
        $this->validator->required('title');
        $this->validator->required('details');
        $this->validator->required('tags');

        if (is_null($id)) {
            $this->validator->requiredFile('image')->image('image');
        } else {
            $this->validator->image('image');
        }

        return $this->validator->passes();
    }
}