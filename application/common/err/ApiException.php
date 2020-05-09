<?php

namespace app\common\err;

use Exception;

class ApiException extends Exception {
	public function __construct($apiErrConst)
	{
		list($code, $msg) = $apiErrConst;
		parent::__construct($msg, $code);
	}
}