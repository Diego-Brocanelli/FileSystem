<?php

require_once __DIR__.'/../vendor/autoload.php';

use FileSystem\Directory\Dir;
use PHPUnit\Framework\TestCase;

class DirectoryTests extends TestCase
{
    const BASE_PATH = __DIR__ . '/../dir_teste/';

    protected $directory;

    public function setUp()
    {
        $this->createDirectoryCopy();

        $directoryName = 'dir_'.date('H_i_s');
        $path          = self::BASE_PATH.$directoryName;

        $this->directory = new Dir();

        $this->directory->setPathName($path);
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
        $this->assertEquals( true, $this->directory->exist() );
    }

    public function testDirectoryNotExist()
    {
        $directory = new Dir();

        $directory->setPathName(__DIR__.'/dir_not_found');

        $this->assertEquals(false , $directory->exist() );    
    }

    public function testIsDir()
    {
        $this->assertEquals( true, $this->directory->isDir() );
    }

    /**
     * @expectedException FileSystem\Exception\Directory
     * @expectedExceptionMessage Directory not found
     */
    public function testIsNotDir()
    {
        $directory = new Dir();

        $directory->setPathName(__DIR__.'/dir_not_found');

        $directory->isDir();   
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
        $directory = new Dir();

        $directory->setPathName(__DIR__.'/dir_not_found');

        $directory->delete();
    }

    public function testMoveDirectory()
    {
        $directoryName = 'dir_'.date('H_i_s');
        $path          = self::BASE_PATH.$directoryName;

        $this->directory = new Dir();
        $this->directory->setPathName($path);
        $this->directory->create();

        $destinyPath = self::BASE_PATH.'copy/'.$directoryName;

        $this->assertEquals(true, $this->directory->move( $destinyPath ) );    
    }

    /**
     * @expectedException FileSystem\Exception\Directory
     * @expectedExceptionMessage Directory not found
     */
    public function testeMoveDirectoryOriginNotFound()
    {
        $directoryName = 'dir_'.date('H_i_s');
        $path          = self::BASE_PATH.$directoryName;

        $this->directory = new Dir();
        $this->directory->setPathName($path);

        $destinyPath = self::BASE_PATH.'copy/'.$directoryName;

        $this->directory->move( $destinyPath );
    }

    /**
     * @expectedException FileSystem\Exception\IOException
     * @expectedExceptionMessage Directory already exists in the designated destination.
     */
    public function testMoveDirectoryDestinyNotOverwrite()
    {
        $directoryName = 'dir_'.date('H_i_s');
        $path          = self::BASE_PATH.$directoryName;

        $this->directory = new Dir();
        $this->directory->setPathName($path);
        $this->directory->create();

        $destinyPath = self::BASE_PATH.'copy/'.$directoryName;

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