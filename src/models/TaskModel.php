<?php 
namespace app\models;
/**
 * This class represents a TaskModel.
 */
class TaskModel  extends \app\source\model\AbstractModel{

    /**
     * The name of the database table for model.
     */
    public $table = 'task';

    /**
     * Validates the given input.
     *
     * @param string $name The name of the task.
     * @param int $time_to_run The time to run the task.
     * @return void
     */

    protected function validate($columns){

        $code = $columns['code'];
        $time_to_run = $columns['time_to_run'];
        if($time_to_run <= 0 || $time_to_run > 59){
            throw new \Exception("Time to run must be between 1 and 59 minutes");
        }
        if(empty($code)){
            throw new \Exception("Code cannot be empty");
        }
        else if(strlen($code) > 255){
            throw new \Exception("Code cannot be longer than 255 characters");
        }
        return true;
        
    }

    /**
     * Calculates the time to run based on the given input.
     *
     * @param int $time_to_run The time to run in seconds.
     * @return string The time to run in date format.
     */
    public function calculateTime($time_to_run){
        return  date('Y-m-d H:i', strtotime('+'.$time_to_run.' minutes'));
    }
}