<?php

namespace WOH\Core;


class PathFinder
{
    private $viewsPath;

    private $srcPath;

    private $assetsUrl;

    public function __construct()
    {
        $this->viewsPath = plugin_dir_path(dirname(__FILE__, 5)) . 'src/Views/';
        $this->srcPath = plugin_dir_path(dirname(__FILE__, 5)) . 'src/';
        $this->blocksPath = plugin_dir_path(dirname(__FILE__, 5)) . 'src/Views/Blocks/';
        $this->assetsUrl = plugin_dir_url(dirname(__FILE__, 5)) . 'assets/';
    }

    /**
     * @return string
     */
    public function getViewsPath()
    {
        return $this->viewsPath;
    }

    /**
     * @return string
     */
    public function getSrcPath()
    {
        return $this->srcPath;
    }


    /**
     * @return mixed
     */
    public function getAssetsUrl()
    {
        return $this->assetsUrl;
    }
}
