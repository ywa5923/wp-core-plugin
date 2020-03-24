<?php

namespace WOH\Core;

use WOH\File\ScanDirectory;
use ReflectionClass;


class ActionsLoader
{

    public function loadAllActions($namespace)
    {

        $actionsDir = plugin_dir_path(dirname(__FILE__, 2)) . 'Actions';

        $scan = new ScanDirectory($actionsDir);

        foreach ($scan->by('php') as $file) {
            $isAction = strpos($file, 'Action');

            if ($isAction !== 0 && $isAction !== FALSE) {

                $obj = $this->makeObject($namespace, $file);

                if ($obj instanceof ActionInterface) {
                    $obj->init();
                }
            }
        }
    }

    /**
     * @param string $classString A string which contains class name without namespace
     * @return ActionInterface
     */
    public function makeObject($namespace, $classString)
    {
        $fullClassName = $namespace . $classString;

        return new $fullClassName();
    }
}
