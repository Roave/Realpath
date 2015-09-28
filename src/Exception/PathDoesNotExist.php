<?php

namespace Roave\Realpath\Exception;

class PathDoesNotExist extends \Exception
{
    public static function fromPath($path)
    {
        return new self(
            sprintf("Specified path '%' does not exist", $path)
        );
    }
}
