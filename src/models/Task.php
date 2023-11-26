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
        $time_to_run =  $this->calculateTime($time_to_run);;
        $query = $this->db->prepare("INSERT INTO task (code, time_to_run,  created_at) VALUES (:name, :time_to_run , :created_at)");
        $query->execute([
            'name' => $name,
            'time_to_run' => $time_to_run, 
            'created_at' => date('Y-m-d H:i:s'),
        ]);
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