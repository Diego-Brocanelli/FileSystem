<?php

namespace FileSystem;

abstract class AbstractFileSystem
{
    /**
     * @var string
     */
    protected $name;
    
    /**
     * @var string
     */
    protected $path;

    /**
     * Set name directory.
     * 
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * Return name directory.
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set path.
     * 
     * @param type $path
     * @return void
     */
    public function setPath($path)
    {
        $this->path = $path;
    }
    
    /**
     * Return path.
     * 
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
    
    /**
     * Return absolute path.
     * 
     * @return string
     */
    public function getAbsolutePath()
    {
        return $this->getPath().'/'.$this->getName();
    }
}