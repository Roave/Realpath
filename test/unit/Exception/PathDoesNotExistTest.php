<?php

namespace Roave\RealpathTest;

use Roave\Realpath\Exception\PathDoesNotExist;

/**
 * @covers \Roave\Realpath\Exception\PathDoesNotExist
 */
class PathDoesNotExistTest extends \PHPUnit_Framework_TestCase
{
    public function testFromPath()
    {
        $exception = PathDoesNotExist::fromPath('/foo/bar');

        $this->assertInstanceOf(PathDoesNotExist::class, $exception);
        $this->assertSame('Specified path "/foo/bar" does not exist', $exception->getMessage());
    }
}
