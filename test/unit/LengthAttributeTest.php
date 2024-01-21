<?php
declare(strict_types=1);

namespace Tests\unit;

use app\source\attribute\validation\LengthAttribute;
use PHPUnit\Framework\TestCase;

class LengthAttributeTest extends TestCase
{
    public function testValidate()
    {
        $lengthAttribute = new LengthAttribute(1, 5);

        $expected = True;
        //when 
        $result = $lengthAttribute->validate(333);

        //assert
        $this->assertEquals($expected, $result);

        $expected = True;
        //when 
        $result = $lengthAttribute->validate('str');

        //assert
        $this->assertEquals($expected, $result);

        $expected = False;
        //when 
        $result = $lengthAttribute->validate(333333);

        //assert
        $this->assertEquals($expected, $result);

        $expected = False;
        //when 
        $result = $lengthAttribute->validate('strin');

        //assert
        $this->assertEquals($expected, $result);
    }
}