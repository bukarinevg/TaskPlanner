<?php 
namespace app\models;
class Task  extends \app\source\model\AbstractModel{

    public function create($name, $time_to_run) {
        date_default_timezone_set('Asia/Tel_Aviv');
        $time_to_run =  $this->calculateTime($time_to_run);;
        $query = $this->db->prepare("INSERT INTO task (code, time_to_run,  created_at) VALUES (:name, :time_to_run , :created_at)");
        $query->execute([
            'name' => $name,
            'time_to_run' => $time_to_run, 
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function getAll() {
        $query = $this->db->query("SELECT * FROM tasks");
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    
    private function calculateTime($time_to_run){
        return  date('Y-m-d H:i', strtotime('+'.$time_to_run.' minutes'));
    }
}