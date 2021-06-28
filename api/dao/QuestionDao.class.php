<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class QuestionDao extends BaseDao{
  public function __construct(){
    parent::__construct("scores");
  }

  public function get_question_by_id($id){
  return $this->query_unique("SELECT question FROM questions WHERE id = :id",["id" => $id]);
}
//public function get_answers_by_id($id){
  //return $this->query_unique("SELECT fanswer1, fanswer2, fanswer3, tanswer FROM questions WHERE id = :id", ["id" => $id] order by RAND() LIMIT 4);
//}
public function get_all_questions(){
  return $this->query("SELECT * FROM questions", []);
}

public function get_answers(){
  return $this->query("SELECT fanswer1,fanswer2,fanswer3,tanswer FROM questions", []);
}
}

?>
