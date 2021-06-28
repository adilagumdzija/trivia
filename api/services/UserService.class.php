<?php

require_once dirname(__FILE__) . '/../dao/UserDao.class.php';

class AccountService
{
    public function __construct()
    {
        $this->dao = new UserDao();
    }

    public function get_users()
    {
      return $this->dao->get_all_users();
    }
  }
?>
