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
     * 
     * @return void	
     */
    public function actionPost() : void {
        $task = new TaskModel();
        $task->load($this->app->getRequest());
       
        // $request = $this->app->getRequest();
        // $data = $request->getContent();
        // $minutes = $data['min'];
        // $code = $data['code']; 
        // print_r($data);
        $task->insert(['code', 'time_to_run', 'created_at'], [$task->code, $task->calculateTime($task->minutes),  date('Y-m-d H:i:s') ]);
        echo json_encode(['status' => 'success']);
    }

    

}
