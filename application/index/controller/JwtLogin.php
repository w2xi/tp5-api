<?php

namespace app\index\controller;

use think\Request;
use app\common\auth\JwtAuth;
use app\common\controller\JsonResponse;
use app\index\model\User;
use app\common\err\ApiException;
use app\common\err\ApiErrDesc;

class JwtLogin {
	/**
	 * 登录验证，颁发token
	 * @param  Request $request
	 * @return string
	 */
	public function login(Request $request)
	{
		$username = $request->param('username');
		$password = $request->param('password');

		if ( empty($username) || empty($password) ){
			throw new ApiException(ApiErrDesc::ERR_PARAM);
		}
		// 身份验证......, 获取 uid
		$result = User::where(['username'=>$username])->find();
		if ( !$result ){
			throw new ApiException(ApiErrDesc::ERR_USER_NOT_EXIST);
		}
		if ( !password_verify($password, $result->password) ){
			throw new ApiException(ApiErrDesc::ERR_POSSWORD);
		}
		
		$jwtAuth = JwtAuth::instance();
		$token = $jwtAuth->setUid((int)$result->id)->encode()->getToken();

		return JsonResponse::jsonSuccessData(['token'=>$token]);
	}
}