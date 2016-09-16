<?php

namespace FileSystem;

use FileSystem\AbstractFileSystem;

/**
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
class FileSystem extends AbstractFileSystem
{
    /**
     * Set configuration.
     * 
     * @param string $name
     * @param string $path
     */
    public function __construct($name, $path)
    {
        $this->setName($name);
        $this->setPath($path);
    }
}
