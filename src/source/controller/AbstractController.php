<?php
namespace app\source\controller;
abstract class AbstractController
{
    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }
}
