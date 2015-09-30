<?php

namespace Roave\Realpath;

class Realpath
{
    /**
     * Cleverer replacement for realpath()
     *
     * @param string $path
     * @return string
     * @throws Exception\PathPartDoesNotExist
     * @throws Exception\PathDoesNotExist
     */
    public static function get($path)
    {
        $path = self::makeAbsolutePath($path);
        $path = self::removeDotPaths($path);
        $path = self::removeDuplicateSlashes($path);

        $pathParts = explode('/', $path);
        for ($i = 2; $i <= count($pathParts); $i++) {
            $subPath = implode('/', array_slice($pathParts, 0, $i));

            if (!file_exists($subPath)) {
                throw Exception\PathPartDoesNotExist::fromSubPath($subPath, $path);
            }

            $subPath = self::resolveSymbolicLink($subPath);
        }

        $path = isset($subPath) ? $subPath : $path;
        return $path;
    }

    /**
     * Resolve the current path, if it is a symbolic link
     *
     * @param string $path
     * @return string
     */
    private static function resolveSymbolicLink($path)
    {
        if (!is_link($path)) {
            return $path;
        }

        // @todo https://github.com/Roave/Realpath/issues/4

        return $path;
    }

    /**
     * Determine if the path is a relative path (will be absolute if not)
     *
     * @param string $path
     * @return bool
     */
    private static function isRelativePath($path)
    {
        // @todo https://github.com/Roave/Realpath/issues/5
        return false;
    }

    /**
     * Convert a relative path to an absolute path
     *
     * @param string $path
     * @return string
     */
    private static function makeAbsolutePath($path)
    {
        if (!self::isRelativePath($path)) {
            return $path;
        }

        // @todo https://github.com/Roave/Realpath/issues/5
        return $path;
    }

    /**
     * Remove duplicate slashes in a URL
     *
     * @param string $path
     * @return string
     */
    private static function removeDuplicateSlashes($path)
    {
        // @todo https://github.com/Roave/Realpath/issues/3
        return $path;
    }

    /**
     * Replace dots in path (e.g. `.` and `..`)
     *  - `/foo/../bar/` should resolve to `/bar/`
     *  - `/foo/./bar/` should resolve to `/foo/bar/`
     *  - `/foo/../../` should throw an exception
     *
     * @param string $path
     * @return string
     */
    private static function removeDotPaths($path)
    {
        // @todo https://github.com/Roave/Realpath/issues/1
        return $path;
    }
}
