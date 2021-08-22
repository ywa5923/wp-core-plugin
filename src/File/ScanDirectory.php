<?php

namespace WOH\File;


class ScanDirectory
{

    protected $dirPath;
    public function __construct($dirPath)
    {
        $this->dirPath = $dirPath;
    }
    public function by(string $extension)
    {


        $actionsDirectory = new \RecursiveDirectoryIterator($this->dirPath);
        $iterator = new \RecursiveIteratorIterator($actionsDirectory);

        $actionClassNames = array();
        foreach ($iterator as $info) {
            //When looping through the RecursiveDirectoryIterator , the results use  SplFileInfo
            if ($info->getExtension() === $extension) {

                ///var/www/html/wp-content/plugins/wp-oop-plugin/src/Actions/Activation/Activate.php
                //extract the classname substring without extension: ex Actions/Activation/Activate

                $actionsPosition = strpos($info->getPathname(), "Actions");
                $className = substr($info->getPathname(), $actionsPosition, -4);


                $actionClassNames[] =  str_replace('/', '\\', $className);
            }
        }


        return $actionClassNames;
    }
}
