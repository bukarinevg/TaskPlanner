<?php 
declare (strict_types = 1);
namespace test\dataProviders;

class TypeAttributeDataProvider
{
    public static function validType(): array
    {
        return [
            [1, 'integer'],
            ['str', 'string'],
            [1.1, 'double'],
            [true, 'boolean'],
            [[], 'array'],
            [new \stdClass(), 'object'],
            [null, 'NULL'],
            
        ];
    }

    public static function invalidType(): array
    {
        return [
            [1, 'string'],
            ['str', 'int'],
            [1.1, 'int'],
            [true, 'int'],
            [[], 'int'],
            [new \stdClass(), 'int'],
            [null, 'int'],
            
        ];
    }
}