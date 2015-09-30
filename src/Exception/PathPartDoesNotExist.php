<?php

namespace Roave\Realpath\Exception;

class PathPartDoesNotExist extends \Exception
{
    /**
     * Realpath identified that a particular part of a path (identified by
     * `$subPath`) does not exist when trying to locate the `$fullPath`.
     *
     * @param string $subPath
     * @param string $fullPath
     * @return PathPartDoesNotExist
     */
    public static function fromSubPath($subPath, $fullPath)
    {
        return new self(sprintf(
            'Could not find parent path "%s" whilst trying to locate full path "%s"',
            $subPath,
            $fullPath
        ));
    }
}
