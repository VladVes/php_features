<?php
namespace app\models;
use app\services\Auth;

class User
{
	protected $id;
	protected $login;
	protected $password;
	protected $email;
	protected $sessionId;

	public function getId()
	{
		return $this->id;
	}

	public function getCurrent()
	{
		session_start();
		$userId = $this->getUserId();
		if($userId) {
			return (new UserRep())->getById($userId);
		}
		return null;
	}

	public function getUserId()
	{
		$sid = (new Auth())->getSessionId();
		if(!is_null($sid)){
			return (new SessionRep())->getUidBySid($sid);
		}
		return null;
	}

}
?>