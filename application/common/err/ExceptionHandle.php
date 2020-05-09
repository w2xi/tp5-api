<?php

namespace app\common\err;

use Exception;
use think\exception\Handle;
use app\common\err\ApiErrDesc;
use app\common\err\ApiException;
use app\common\controller\JsonResponse;

/**
 * 重写Handle的render方法，实现自定义异常消息
 */
class ExceptionHandle extends Handle {
	public function render(Exception $e)
    {
    	$code = $e->getCode();

        if ( $e instanceof ApiException){
        	$msg = $e->getMessage();	
        }else{
            if(config('app_debug')){
                // 调试状态下需要显示TP默认的异常页面，因为TP的默认页面
                // 很容易看出问题
                return parent::render($e);
            }
        	if ( !$code || $code < 0 ){
        		$code = ApiErrDesc::UNKNOWN_ERR[0];
        		$msg = $e->getMessage() ?: ApiErrDesc::UNKNOWN_ERR[1];
        	}
        }

        return JsonResponse::jsonFailData($code, $msg);
    }
}