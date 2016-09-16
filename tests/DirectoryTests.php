<?php

require_once __DIR__.'/../vendor/autoload.php';

use FileSystem\Directory\Directory;
use FileSystem\FileSystem;
use PHPUnit\Framework\TestCase;

class DirectoryTests extends TestCase
{
    const BASE_PATH = __DIR__ . '/../dir_teste/';

    protected $directory;

    public function setUp()
    {
        $this->createDirectoryCopy();

        $name = 'dir_'.date('H_i_s');

        $fileSystem = new FileSystem($name, self::BASE_PATH);
        
        $this->directory = new Directory($fileSystem);
    }
    
    public function testCreateDir()
    {
        $this->assertEquals( true, $this->directory->create() );
    }

    /**
     * @expectedException FileSystem\Exception\Directory
     * @expectedExceptionMessage Directory already exists
     */
    public function testCreateDirExisting()
    {
        $this->directory->create();
    }

    public function testDirectoryExist()
    {
        $this->assertEquals( true, $this->directory->exists() );
    }

    public function testDirectoryNotExist()
    {
        $fileSystem = new FileSystem('dir_not_found', __DIR__.'/dir_not_found');
        
        $directory = new Directory($fileSystem);

        $this->assertEquals(false , $directory->exists() );    
    }

    public function testIsDir()
    {
        $this->assertEquals( true, $this->directory->isDir() );
    }

    public function testIsNotDir()
    {
        $fileSystem = new FileSystem('dir_not_found', __DIR__);
        $directory  = new Directory($fileSystem);

        $this->assertEquals( false, $directory->isDir() );
    }

    public function testDeleteDirectory()
    {
        $this->assertEquals( true, $this->directory->delete() );
    }

    /**
     * @expectedException FileSystem\Exception\Directory
     * @expectedExceptionMessage Directory not found
     */
    public function testeDeleteDirectoryThatDoesNotExist()
    {
        $fileSystem = new FileSystem('dir_not_found', __DIR__);
        $directory = new Directory($fileSystem);

        $directory->delete();
    }

    public function testMoveDirectory()
    {
        $name = 'dir_'.date('H_i_s');
        $path = self::BASE_PATH;

        $fileSystem = new FileSystem($name, $path);
        
        $this->directory = new Directory($fileSystem);
        $this->directory->create();

        $destinyPath = self::BASE_PATH.'copy/'.$name;

        $this->assertEquals(true, $this->directory->move( $destinyPath ) );    
    }

    /**
     * @expectedException FileSystem\Exception\Directory
     * @expectedExceptionMessage Directory not found
     */
    public function testeMoveDirectoryOriginNotFound()
    {
        $name = 'dir_'.date('H_i_s');
        $path = self::BASE_PATH.$name;

        $fileSystem = new FileSystem($name, $path);
        
        $this->directory = new Directory($fileSystem);

        $destinyPath = self::BASE_PATH.'copy/'.$name;

        $this->directory->move( $destinyPath );
    }

    /**
     * @expectedException FileSystem\Exception\IOException
     * @expectedExceptionMessage Directory already exists in the designated destination.
     */
    public function testMoveDirectoryDestinyNotOverwrite()
    {
        $name = 'dir_'.date('H_i_s');
        $path = self::BASE_PATH;

        $fileSystem = new FileSystem($name, $path);

        $this->directory = new Directory($fileSystem);
        $this->directory->create();

        $destinyPath = self::BASE_PATH.'copy/'.$name;

        $this->directory->move( $destinyPath );

        $this->directory->move( $destinyPath, true );
    }

    /**
     * Create the copy directory for testing.
     * 
     * @return void
     */
    private function createDirectoryCopy()
    {
        $path = self::BASE_PATH.'copy';
        
        if( !file_exists( $path ) ){
            $directory = new Dir();
            $directory->setPathName( $path );
            $directory->create();
        }
    }
}