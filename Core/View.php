<?php 

namespace Core; 

/**
 * View
 */
class View 
{

    /**
     * Render a view file 
     * 
     * Extract the variables array passed as the query string
     * argument into simple variables.
     * 
     * @param string $view the view file 
     * 
     * @return void
     */
    public static function render($view, $args = []) 
    {
        extract($args, EXTR_SKIP);

        $file = "../App/Views/$view";

        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception("$file not found");
        }
    }

    /**
     * Render view template using Twig
     *
     * @param string $template - The template file
     * @param array array $args Associative array of data to display in the view (optional)
     * 
     * @return void
     */
    public static function renderTemplate($template, $args = []) 
    {
        static $twig = null;

        if ($twig == null) {
            $loader = new \Twig\Loader\FilesystemLoader('../App/Views');
            $twig = new \Twig\Environment($loader, [
                'debug' => true,
                'charset' => 'utf-8',
                'cache' => '../App/cache',
                'optimizations' => 1,
            ]); 

            echo $twig->render($template, $args);
        }
    }
}