<?php

namespace FileSystem;

interface FileSystemInterface
{
    public function setName();
    public function getName();
    public function setPath();
    public function getPath();
    public function getFullPath();
}