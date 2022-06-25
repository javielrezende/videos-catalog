<?php

namespace Tests\Unit;

use Core\Test;
use PHPUnit\Framework\TestCase;

class TestUnitTest extends TestCase {
    public function test_call_method_foo_and_return_123()
    {
        $test = new Test();
        $response = $test->foo();

        $this->assertEquals(123, $response);
    }
}