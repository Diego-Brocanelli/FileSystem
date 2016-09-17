<?php

namespace FileSystem\Directory;

use FileSystem\Directory\AbstractAction;
use FileSystem\FileSystem;

/**
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
class Action extends AbstractAction
{
    /**
     * @param \FileSystem\FileSystem $fileSsytem
     */
    public function __construct(FileSystem $fileSsytem)
    {
        parent::__construct($fileSsytem);
    }
    
    /**
     * Verify is dir.
     * 
     * @return boolean
     */
    public function isDir()
    {
        return is_dir( $this->fileSystem->getAbsolutePath() );
    }
}
