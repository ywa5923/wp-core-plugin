<?php

namespace WOH\Core;

use WOH\File\ScanDirectory;

class ActionsLoader
{

    public function loadAllActions($baseNamespace)
    {

        $actionsDir = plugin_dir_path(dirname(__FILE__, 5)) . 'src/Actions';

        $scan = new ScanDirectory($actionsDir);

        foreach ($scan->by('php') as $file) {

            $obj = $this->makeObject($baseNamespace, $file);

            if ($obj instanceof ActionInterface) {
                $obj->init();
            }

            /*$isAction = strpos($file, 'Action');

            if ($isAction !== 0 && $isAction !== FALSE) {

                $obj = $this->makeObject($baseNamespace . "Actions\\", $file);

                if ($obj instanceof ActionInterface) {
                    $obj->init();
                }
            }*/
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
