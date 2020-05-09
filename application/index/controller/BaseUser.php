<?php

namespace app\index\controller;

use app\common\auth\JwtAuth;

class BaseUser {
	protected $uid;

	public function __construct()
	{
		$this->uid = JwtAuth::instance()->getUid();
	}
}