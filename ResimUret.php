<?php
/**
 * Created by PhpStorm.
 * User: dogancan
 */

abstract class ResimUret
{
    public $resimPath;
    public $resim;

    function __construct($resimPath)
    {
        $this->resimPath = __DIR__.'/'.$resimPath;
        $this->resim = file_get_contents($this->resimPath);
    }

    abstract function __clone();

}