<?php 
declare(strict_types=1);

namespace test\unit;

use PHPUnit\Framework\TestCase;
use app\source\attribute\validation\TypeAttribute;

class TypeAttributeTest extends TestCase
{
   
    /**
     * @dataProvider \test\dataProviders\TypeAttributeDataProvider::validType
     */
    public function testValidTypeAttribute(mixed $value, string $type ): void
    {
        //given - when - then
        //arrange-act-assert

        //given  
        $typeAttribute = new TypeAttribute($type);

        $expected = True;
        //when 
        $result = $typeAttribute->validate($value);

        //assert
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider \test\dataProviders\TypeAttributeDataProvider::invalidType
     */
    public function testInvalidTypeAttribute(mixed $value, string $type ): void
    {
        //given - when - then
        //arrange-act-assert

        //given  
        $typeAttribute = new TypeAttribute($type);

        $expected = False;
        //when 
        $result = $typeAttribute->validate($value);
        //assert
        $this->assertEquals($expected, $result);
    }
}