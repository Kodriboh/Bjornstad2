<?php 

namespace App\Controllers;

use \Core\View;
/**
 * Pages controller
 */
class Pages extends \Core\Controller
{
    /**
     * Before filter
     * 
     * Returning false will prevent execution of the method, 
     * good for checking permissions or if a user has logged in
     *
     * @return void
     */
    protected function before()
    {
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
    }

    /**
     * Show the index page
     */
    public function indexAction()
    {
        View::renderTemplate('Pages/index.html', [
            'name' => 'Luke',
            'colors' => ['red', 'blue', 'green']
        ]);
    }
}