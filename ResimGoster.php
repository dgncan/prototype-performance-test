<?php
/**
 * Created by PhpStorm.
 * User: dogancan
 */

class ResimGoster
{
    public $resimobj;

    function __construct(ResimUret $resimUret)
    {
        $this->resimobj = $resimUret;
    }

}