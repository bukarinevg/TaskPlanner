<?php 
namespace app\models;

use app\source\attribute\validation\LengthAttribute;
use app\source\attribute\validation\TypeAttribute;

/**
 * This class represents a TaskModel.
 */
class TaskModel  extends \app\source\model\AbstractModel{

    /**
     * The name of the database table for model.
     */
    public string $table = 'task';

    /**
     * The fields for model.
     */
    public array $fields =  [
        'code',
        'minutes',
    ];

    /**
     * Validates the data of the model.
    */
    #[TypeAttribute('string')]
    #[LengthAttribute(3, 255)]
    public string $code;
    #[TypeAttribute('integer')]
    #[LengthAttribute(1, 3)]
    public int $minutes;

    

    // /**
    //  * Validates the given input.
    //  *
    //  * @param string $name The name of the task.
    //  * @param int $time_to_run The time to run the task.
    //  * @return void
    //  */

    // protected function validate($columns) : bool|\Exception{
    //     $code = $columns['code'];
    //     $time_to_run = $columns['time_to_run'];

    //     if( strtotime($time_to_run)  <  time() ){
    //         throw new \Exception("Time to run is wrong");
    //     }
    //     else if(empty($code)){
    //         throw new \Exception("Code cannot be empty");
    //     }
    //     else if(strlen($code) > 255){
    //         throw new \Exception("Code cannot be longer than 255 characters");
    //     }
    //     else return true;
        
    // }

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