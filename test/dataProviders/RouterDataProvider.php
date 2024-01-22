<?php 
declare (strict_types = 1);

namespace test\dataProviders;

class RouterDataProvider
{
    public static function routeProvider(): array
    {
        return [
            [['controller' => 'app\controllers\DefaultController', 'method' => 'actionpIndex']],
            [['controller' => 'app\controllers\AnotherController', 'method' => 'show']],
            [['controller' => 'app\controllers\DefaultController', 'method' => 'nonExistentMethod']],
            [['controller' => 'app\controllers\NonExistentController', 'method' => 'index']],
        ];
    }
}
