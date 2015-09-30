<?php

namespace Roave\Realpath\Exception;

class PathDoesNotExist extends \Exception
{
    /**
     * Generic "path does not exist" message
     *
     * @param string $path
     * @return PathDoesNotExist
     */
    public static function fromPath($path)
    {
        return new self(
            sprintf('Specified path "%s" does not exist', $path)
        );
    }
}
