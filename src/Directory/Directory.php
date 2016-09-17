<?php

namespace FileSystem\Directory;

use FileSystem\Directory\Action;
use FileSystem\FileSystem;

/**
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
class Directory extends Action
{
    /**
     * @param \FileSystem\FileSystem $fileSsytem
     */
    public function __construct(FileSystem $fileSsytem)
    {
        parent::__construct($fileSsytem);
    }
}