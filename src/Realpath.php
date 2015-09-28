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
        $realpath = realpath($path);

        if (false === $realpath) {
            throw Exception\PathDoesNotExist::fromPath($path);
        }

        return $realpath;
    }

    /**
     * Simple check to see if a path exists
     *
     * @param string $path
     * @return bool
     */
    public static function exists($path)
    {
        try {
            self::get($path);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}
