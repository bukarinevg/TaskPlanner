<?php 
namespace app\models;
/**
 * This class represents a task, sent by the user.
 */
class Task  extends \app\source\model\AbstractModel{

    /**
     * Creates a new task.
     *
     * @param string $name The name of the task.
     * @param int $time_to_run The time to run the task.
     */
    public function create($name, $time_to_run) {
        $this->validate($name, $time_to_run);
        $time_to_run =  $this->calculateTime($time_to_run);;
        $query = $this->db->prepare("INSERT INTO task (code, time_to_run,  created_at) VALUES (:name, :time_to_run , :created_at)");
        $query->execute([
            'name' => $name,
            'time_to_run' => $time_to_run, 
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Validates the given input.
     *
     * @param string $name The name of the task.
     * @param int $time_to_run The time to run the task.
     * @return void
     */
    protected function validate($name, $time_to_run){
        if($time_to_run <= 0 || $time_to_run > 59){
            throw new \Exception("Time to run must be between 1 and 59 minutes");
        }
        if(empty($name)){
            throw new \Exception("Name cannot be empty");
        }
        else if(strlen($name) > 255){
            throw new \Exception("Name cannot be longer than 255 characters");
        }
        
    }


    /**
     * Gets all tasks.
     *
     * @return array An array containing all tasks.
     */
    public function getAll() {
        $query = $this->db->query("SELECT * FROM tasks");
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    
    /**
     * Calculates the time to run based on the given input.
     *
     * @param int $time_to_run The time to run in seconds.
     * @return void
     */
    private function calculateTime($time_to_run){
        return  date('Y-m-d H:i', strtotime('+'.$time_to_run.' minutes'));
    }
}