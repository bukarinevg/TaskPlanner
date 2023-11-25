<?php 
namespace app\models;
class TaskModel  extends \app\source\model\AbstractModel{

    public function create($name) {
        $query = $this->db->prepare("INSERT INTO tasks (name, created_at) VALUES (:name, :created_at)");
        $query->execute([
            'name' => $name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function getAll() {
        $query = $this->db->query("SELECT * FROM tasks");
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}