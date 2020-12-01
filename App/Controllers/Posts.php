<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Post;
/**
 * Posts controller
 */
class Posts extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $posts = Post::getAll();

        View::renderTemplate('Posts/index.html', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the add new page
     *
     * @return void
     */
    public function addNewAction()
    {
    }

    /**
     * Show the edit page
     * 
     * @return void
     */
    public function editAction()
    {
    }
}
