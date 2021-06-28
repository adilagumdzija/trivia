<?php
require_once dirname(__FILE__)."/BaseDao.class.php";
class ScoreDao extends BaseDao{

  public function __construct(){
    parent::__construct("scores");
  }

  public function get_score_by_id($id){
    return $this->query_unique("SELECT best_score FROM scores WHERE id = :id",["id" => $id]);
}
public function get_all_scores(){
  return $this->query("SELECT * FROM scores", []);
}
}
?>
