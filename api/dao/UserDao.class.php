<?php
require_once dirname(__FILE__)."/BaseDao.class.php";
class UserDao extends BaseDao{

  public function __construct()
    {
        parent::__construct("users");
    }

  public function get_user_by_email($email){
    return $this->query_unique("SELECT * FROM users WHERE email = :email",["email" => $email]);
  }


public function get_user_by_id($id){
  return $this->query_unique("SELECT * FROM users WHERE id = :id", ['id' => $id]);
}


public function add_user($user){
  return $this->insert("users", $user);
}

public function update_user($id, $user){
  $this->update("users", $id, $user);

}
public function update_user_by_email($email, $user){
   $this->update("users", $email, $user, "email");
 }

public function get_all_users(){
  return $this->query("SELECT * FROM users", []);
}

public function get_by_id($id)
    {
        return $this->query_unique("SELECT DISTINCT FROM " . $this->table . " WHERE id = :id", ["id" => $id]);
    }


    public function login($user){
    $db_user = $this->dao->get_user_by_email($user['email']);
    if (!isset($db_user['id'])) throw new Exception("User doesn't exists", 400);
    if ($db_user['status'] != 'ACTIVE') throw new Exception("Account not active", 400);
    $account = $this->accountDao->get_by_id($db_user['accounts_id']);
    if (!isset($account['id']) || $account['status'] != 'ACTIVE') throw new Exception("Account not active", 400);
    if ($db_user['password'] != md5($user['password'])) throw new Exception("Invalid password", 400);
    return $db_user;
  }
}



 ?>
