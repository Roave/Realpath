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
        $shouldFailPath = sys_get_temp_dir() . '/this_folder_must_not_exist';
        $fullAttemptedPath = $shouldFailPath . '/foo/bar';

        $expectedMessage = sprintf(
            'Could not find parent path "%s" whilst trying to locate full path "%s"',
            $shouldFailPath,
            $fullAttemptedPath
        );

        $this->setExpectedException(PathPartDoesNotExist::class, $expectedMessage);
        Realpath::get($fullAttemptedPath);
    }
}
