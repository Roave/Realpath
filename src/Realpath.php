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
        if (self::isRelativePath($path)) {
            $path = self::makeAbsolutePath($path);
        }

        $path = self::removeDotPaths($path);
        $path = self::removeDuplicateSlashes($path);

        // @todo split the path into parts, and check each part's path:
        //   - does the path exist? if not, throw a useful exception
        //     @todo https://github.com/Roave/Realpath/issues/2
        //   - is the path a symlink? if so, resolve it
        //     @todo https://github.com/Roave/Realpath/issues/4

        // e.g.:
        //  /foo/bar/baz should be broken into:
        //    - /foo
        //    - /foo/bar
        //    - /foo/bar/baz
        //  Each path should be tested to see if it exists, and feedback given
        //  if it does not

        // @todo remove this when https://github.com/Roave/Realpath/issues/2 is implemented
        if (!file_exists($path)) {
            throw Exception\PathDoesNotExist::fromPath($path);
        }

        // @todo remove this
        $path = realpath($path);
        if ($path === false) {
            throw Exception\PathDoesNotExist::fromPath($path);
        }

        return $path;
    }

    /**
     * Is the path a symbolic link?
     *
     * @param string $path
     * @return bool
     */
    private static function isSymbolicLink($path)
    {
        return is_link($path);
    }

    /**
     * Resolve the current path, if it is a symbolic link
     *
     * @param string $path
     * @return string
     */
    private static function resolveSymbolicLink($path)
    {
        if (!self::isSymbolicLink($path)) {
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
