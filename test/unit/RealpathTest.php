<?php

namespace Roave\RealpathTest;

use Roave\Realpath\Exception\PathPartDoesNotExist;
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

        $this->setExpectedException(PathPartDoesNotExist::class);
        Realpath::get($test);
    }
}
