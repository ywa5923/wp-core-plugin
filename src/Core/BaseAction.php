<?php

namespace WOH\Core;


class BaseAction
{

    public $template;
    public function __construct()
    {
        $this->template = new TemplateLoader(new PathFinder);
    }
}
