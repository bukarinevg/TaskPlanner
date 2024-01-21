<?php 
declare(strict_types=1);

namespace Tests\unit;

use PHPUnit\Framework\TestCase;
use app\source\attribute\validation\TypeAttribute;

class TypeAttributeTest extends TestCase
{
    private TypeAttribute $typeAttribute;
    public function setUp(): void
    {
        parent::setUp();
        $this->typeAttribute = new TypeAttribute('string');
    }
   
    public function testTypeAttribute(): void
    {
        //given - when - then
        //arrange-act-assert

        //given  
        $typeAttribute = new TypeAttribute('string');

        $expected = True;
        //when 
        $result = $typeAttribute->validate('test');

        //assert
        $this->assertEquals($expected, $result);

        $typeAttribute = new TypeAttribute('string');

        $expected = False;
        //when 
        $result = $typeAttribute->validate(333);

        //assert
        $this->assertEquals($expected, $result);

        $typeAttribute = new TypeAttribute('integer');

        $expected = True;
        //when 
        $result = $typeAttribute->validate(333);

        //assert
        $this->assertEquals($expected, $result);


        $typeAttribute = new TypeAttribute('string');

        $expected = False;
        //when 
        $result = $typeAttribute->validate([]);

        //assert
        $this->assertEquals($expected, $result);


    }
}