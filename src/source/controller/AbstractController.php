<?php
namespace app\source\controller;

/**
 * This is an abstract class that serves as the base controller for all controllers in the application.
 */
abstract class AbstractController
{
    /**
     * @var object $app The application object.
     */
    protected $app;

    /**
     * Constructor for the AbstractController class.
     *
     * @param mixed $app The application object.
     */
    public function __construct($app)
    {
        $this->app = $app;
    }
}
