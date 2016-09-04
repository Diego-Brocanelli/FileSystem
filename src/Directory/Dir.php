<?php

namespace FileSystem\Directory;

use FileSystem\AbstractFileSystem;
use FileSystem\Exception\Directory;
use FileSystem\Exception\IOException;

class Dir extends AbstractFileSystem
{
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
        if($this->exist()){
            throw new Directory('Directory already exists');
        }

        return mkdir($this->getPathName(), $mode, $recursive);
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
        if(!$this->exist()){
            throw new Directory('Directory not found');
        }

        return rmdir($this->getPathName());
    }
    
    /**
     * Copy directory.
     * 
     * $overwrite DEFAULT FALSE
     * 
     * @param $destiny   Destination where the directory will be moved
     * @param $overwrite If you allow overwriting data or not. 
     * 
     * @return Boolean
     */
    public function move($destiny, $overwrite = false)
    {
        if( !$this->exist() ){
            throw new Directory('Directory not found.');
        }

        if( !$overwrite && file_exists( $destiny ) ){
            throw new IOException('Directory already exists in the designated destination.');
        }

        return rename($this->getPathName(), $destiny);
    }
    
    /**
     * Verify exist
     * 
     * @return boolean
     */
    public function exist()
    {
        return ( is_dir( $this->getPathName() ) );
    }

    /**
     * Verify if is a directory
     * 
     * @return boolean
     */
    public function isDir()
    {
        if( !$this->exist( $this->getPathName() ) ){
            throw new Directory('Directory not found');
        }

        return is_dir( $this->getPathName() );
    }
}