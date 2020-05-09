<?php

namespace app\common\err;

class ApiErrDesc {
	/**
	 * API通用错误码
	 *
	 * code < 1000
	 */ 
	const SUCCESS = [0, 'success'];
	const UNKNOWN_ERR = [1, 'unknown error'];
	const ERR_URL = [2, 'interface is not exist'];
	
	const ERR_PARAM = [100, 'parameter error'];
	const ERR_PARAM_IS_EXPIRED = [101, 'parameter is expired'];
	const ERR_TOKEN = [102, 'error token'];

	/**
	 * 用户登录相关的错误
	 * 
	 * 1000 < error_code < 1100
	 */
	const ERR_POSSWORD = [1001, 'password error'];
	const ERR_USER_NOT_EXIST = [1002, 'user is not exist'];
}