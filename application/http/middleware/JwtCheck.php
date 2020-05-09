<?php

namespace app\http\middleware;

use app\common\auth\JwtAuth;
use app\common\controller\JsonResponse;
use app\common\err\ApiErrDesc;
use app\common\err\ApiException;

class JwtCheck
{
    public function handle($request, \Closure $next)
    {
    	$token = $request->param('token');

    	if ( $token ){
    		$jwtAuth = JwtAuth::instance();
    		$jwtAuth->setToken($token);

			if ( $jwtAuth->validate() && $jwtAuth->verify() ){
                // 中间件向控制器传参
                // $request->uid = $jwtAuth->getUid();
				return $next($request);
    		}else{
                throw new ApiException(ApiErrDesc::ERR_TOKEN);
    		}
    	}else{
    		
            throw new ApiException(ApiErrDesc::ERR_PARAM);
    	}
    	
    }
}
