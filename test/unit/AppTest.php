<?php
declare(strict_types=1);

namespace test\unit;


use PHPUnit\Framework\TestCase;
use app\source\App;

class AppTest extends TestCase
{
    private App $app;
    public function setUp(): void
    {
        parent::setUp();
        $config = require 'config/config.php';
        $this->app = new App($config);
        $this->app->run();

    }
    /**
     * @dataProvider \test\dataProviders\RouterDataProvider::routeProvider
     */
    public function testRouting(array $route): void
    {
        // Start output buffering
        ob_start();

        // Uncomment the following line when you're ready to test the callController method
        $this->app->callController($route);

        // Get the output
        $output = ob_get_clean();
        
        // Assert that the output starts with "Error:"
        $this->assertStringStartsWith('Error:', $output);   
        // $this->expectException(\Exception::class);
        
    }

    public static function routeProvider(): array
    {
        return [
            [['controller' => 'app\controllers\DefaultController', 'method' => 'actionndex']],
            [['controller' => 'app\controllers\AnotherController', 'method' => 'show']],
            [['controller' => 'app\controllers\DefaultController', 'method' => 'nonExistentMethod']],
            [['controller' => 'app\controllers\NonExistentController', 'method' => 'index']],
        ];
    }
}