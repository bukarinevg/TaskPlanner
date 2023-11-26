<?php
namespace app\controllers;

use app\models\Task;

/**
 * Class TicketController
 *
 * This class is responsible for handling ticket-related actions.
 */
class TicketController  extends \app\source\controller\AbstractController{
    /**
     * Handles the 'put' action.
     *
     * This method creates a new task with the provided code and minutes.
     */
    public function actionPut() {
        $request = $this->app->getRequest();
        $data = $request->getContent();
        $minutes = $data['min'];
        $code = $data['code']; 

        $job = new Task();
        $job->create( $code, $minutes);
    }

}
