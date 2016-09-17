<?php

namespace FileSystem\Directory;

use FileSystem\ActionInterface;
use FileSystem\FileSystem;
use FileSystem\Exception\Directory;
use FileSystem\Exception\IOException;

/**
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
abstract class AbstractAction implements ActionInterface
{
    const MSG_DIRECTORY_NOT_FOUND = 'Directory not found';

    /**
     * @var \FileSystem\FileSystem
     */
    protected $fileSystem;
    
    /**
     * @param \FileSystem\FileSystem $fileSytem
     */
    public function __construct(FileSystem $fileSystem)
    {
        $this->fileSystem = $fileSystem;
    }
    
    /**
     * Create 
     * 
     * @param $mode      default 0777
     * @param $recursive default FALSE
     * 
     * @return int
     */
    public function create($mode = 0777, $recursive = false)
    {
        if($this->exists()){
            throw new Directory('Directory already existss');
        }

        return mkdir($this->fileSystem->getAbsolutePath(), $mode, $recursive);
    }
    
    /**
     * Delete
     * 
     * @param string $dirName
     * 
     * @return bolean
     */
    public function delete()
    {
        if(!$this->exists()){
            throw new Directory(self::MSG_DIRECTORY_NOT_FOUND);
        }

        return rmdir($this->fileSystem->getAbsolutePath());
    }
    
    /**
     * Copy fileSystem.
     * 
     * $overwrite DEFAULT FALSE
     * 
     * @param $destiny   Destination where the fileSystem will be moved
     * @param $overwrite If you allow overwriting data or not. 
     * 
     * @return Boolean
     */
    public function move($destiny, $overwrite = false)
    {
        if( !$this->exists() ){
            throw new Directory(self::MSG_DIRECTORY_NOT_FOUND);
        }

        if( !$overwrite && file_exists( $destiny ) ){
            throw new IOException('Directory already exists in the designated destination.');
        }

        return rename($this->fileSystem->getAbsolutePath(), $destiny);
    }

    /**
     * Verify exists
     * 
     * @return boolean
     */
    public function exists()
    {
       return file_exists( $this->fileSystem->getAbsolutePath() ); 
    }
}
