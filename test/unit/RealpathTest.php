<?php

namespace Roave\RealpathTest;

use Roave\Realpath\Exception\PathDoesNotExist;
use Roave\Realpath\Realpath;

/**
 * @covers \Roave\Realpath\Realpath
 */
class RealpathTest extends \PHPUnit_Framework_TestCase
{
    public function testGetWithKnownPath()
    {
        $test = sys_get_temp_dir();
        $this->assertSame($test, Realpath::get($test));
    }

    public function testGetWithNonExistentPathThrowsException()
    {
        $test = "/foo/bar/baz/bat";

        $this->setExpectedException(PathDoesNotExist::class);
        Realpath::get($test);
    }
}
