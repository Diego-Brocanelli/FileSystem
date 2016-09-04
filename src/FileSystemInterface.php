<?php

namespace FileSystem;

interface FileSystemInterface
{
    /**
     * Set path name.
     *  
     * @param $path path name
     */
    public function setPathName($pathName);
    
    /**
     * Return path name.
     * 
     * @return strung return path name.
     */
    public function getPathName();
}