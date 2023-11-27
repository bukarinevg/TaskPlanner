<?php
namespace app\controllers;

use app\models\TaskModel;

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
    public function actionPut($task = new TaskModel()):void {
        $request = $this->app->getRequest();
        $data = $request->getContent();
        $minutes = $data['min'];
        $code = $data['code']; 
        $task->insert(['code', 'time_to_run', 'created_at'], [$code, $task->calculateTime($minutes),  date('Y-m-d H:i:s') ]);
    }

    

}
