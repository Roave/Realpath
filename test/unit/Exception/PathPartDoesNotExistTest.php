<?php

namespace Roave\RealpathTest;

use Roave\Realpath\Exception\PathPartDoesNotExist;

/**
 * @covers \Roave\Realpath\Exception\PathPartDoesNotExist
 */
class PathPartDoesNotExistTest extends \PHPUnit_Framework_TestCase
{
    public function testFromPath()
    {
        $exception = PathPartDoesNotExist::fromSubPath('/foo/bar', '/foo/bar/baz');

        $this->assertInstanceOf(PathPartDoesNotExist::class, $exception);
        $this->assertSame('Could not find parent path "/foo/bar" whilst trying to locate full path "/foo/bar/baz"', $exception->getMessage());
    }
}
