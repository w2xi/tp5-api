<?php

namespace app\common\controller;

class JsonResponse {
	/**
	 * api接口请求失败时的返回
	 * @param  int    $code    错误码
	 * @param  string $msg     错误码对应的错误信息
	 * @param  array  $data    返回数据		
	 * @return string 		   json string
	 */
	public static function jsonFailData($code, $msg, $data = [])
	{
		return self::jsonResponse($code, $msg, $data);
	}
	/**
	 * api接口请求成功时的返回
	 * @param  array $data    返回数据	
	 * @return string         json string
	 */			
	public static function jsonSuccessData($data = [])
	{
		return self::jsonResponse(0, 'Success', $data);
	}
	/**
	 * 返回 json 数据
	 * @param  [type] $code [description]
	 * @param  [type] $msg  [description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	private static function jsonResponse($code, $msg, $data)
	{
		$data = [
			'code'	=>	$code,
			'msg'	=>	$msg,
			'data'	=>	$data
		];

		// return json_encode($data);
		return json($data);
	} 
}