<?php 
namespace app\controllers;


/**
 * This class represents the default controller for the task-planner application.
 * It extends the AbstractController class from the app\source\controller namespace.
 */
class DefaultController extends \app\source\controller\AbstractController
{
    /**
     * This method is the index action of the DefaultController.
     * It is responsible for rendering the homepage of the application.
     */
    public function actionIndex(): string
    {
        return 'DefaultController index';
    }
}
