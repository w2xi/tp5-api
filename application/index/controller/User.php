<?php

namespace app\index\controller;

use think\Request;
use app\index\model\User as UserModel;
use app\common\err\ApiException;
use app\common\err\ApiErrDesc;
use app\common\controller\JsonResponse;
use app\index\controller\BaseUser;

class User extends BaseUser {
	public function info(Request $request)
	{
		$uid = $this->uid;
		$info = UserModel::where(['id'=>$uid])->find();
		if ( !$info ) {
			throw new ApiException(ApiErrDesc::ERR_USER_NOT_EXIST);
		}

		return JsonResponse::jsonSuccessData([
			'uid'		=>	$info->id,
			'username'	=>	$info->username
		]);	
	}
}