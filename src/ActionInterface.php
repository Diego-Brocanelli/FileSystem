<?php

namespace FileSystem;

/**
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
interface ActionInterface
{
    public function create($mode = 0777, $recursive = false);
    public function delete();
    public function move($destiny, $overwrite = false);
    public function exists();
}
