<?php

namespace FileSystem;

abstract class AbstractFileSystem
{
    /**
     * @var string
     */
    private $pathName;

    /**
     * Set path name.
     *  
     * @param $path path name
     */
    public function setPathName($pathName)
    {
        $this->pathName = $pathName;
    }
    
    /**
     * Return path name.
     * 
     * @return strung return path name.
     */
    public function getPathName()
    {
        return $this->pathName;
    }
}