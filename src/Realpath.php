<?php

namespace Roave\Realpath;

class Realpath
{
    /**
     * Cleverer replacement for realpath()
     *
     * @param string $path
     * @return string
     * @throws Exception\PathDoesNotExist
     */
    public static function get($path)
    {
        if (!file_exists($path)) {
            throw Exception\PathDoesNotExist::fromPath($path);
        }

        $realpath = realpath($path);

        return $realpath;
    }
}
