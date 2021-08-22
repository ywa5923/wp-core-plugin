<?php

namespace WOH\Core;

class TemplateLoader
{
    public static $VIEWS_PATH;



    public function __construct(PathFinder $locator)
    {
        self::$VIEWS_PATH = $locator->getViewsPath();
    }

    public function display($view, array $args)
    {
        $template = $this->resolveTemplateName($view);
        if (file_exists($template)) {
            ob_start();
            extract($args);
            include $template;
            return ob_get_clean();
        } else {
            throw new \Exception('no template file ' . $template . ' present in directory ' . $this->template_dir);
        }



        //include self::$VIEWS_PATH . $view . '.php';
    }

    public function resolveTemplateName($view)
    {
        return self::$VIEWS_PATH . $view . '.php';
    }
}
