<?php

namespace app\common\auth;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\ValidationData;
use Lcobucci\JWT\Signer\Hmac\Sha256;

/**
 * 单例 在一次接口请求中所有出现使用jwt的地方都是一个用户
 */
class JwtAuth {
	/**
	 * 单例句柄
	 * @var null
	 */
	private static $instance = null;
	/**
	 * token
	 * @var string
	 */
	private $token;
	/**
	 * decode token
	 */
	private $decodeToken;
	/**
	 * secrect
	 * @var string
	 */
	private $secrect = 'BA6B50F7A9963131ABCB5218F3228177A06F692A';
	/**
	 * uid
	 * @var integer
	 */
	private $uid;
	/**
	 * claim iss    签发者
	 * @var string
	 */
	private $iss = 'api.imooc.com';
	/**
	 * claim aud    接收者
	 * @var string
	 */
	private $aud = 'api.test.com';

	private function __construct()
	{

	}
	public static function instance()
	{
		if ( is_null(self::$instance) ){
			self::$instance = new static();
		}

		return self::$instance;
	}
	// 禁止 clone
	private function __clone(){}

	/**
	 * set token
	 * @param string $token 
	 * @return object $this
	 */
	public function setToken($token)
	{
		$this->token = $token;

		return $this;
	}
	/**
	 * uid
	 * @param int $uid
	 * @return object $this
	 */
	public function setUid($uid)
	{
		$this->uid = $uid;

		return $this;
	}

	public function getUid()
	{
		return $this->uid;
	}
	/**
	 * 获取 token
	 * @return string
	 */
	public function getToken()
	{
		// 当把对象当成字符串时会调用 对象的 __toString()方法
		return (string)$this->token;
	}

	/**
	 * 编码jwt token
	 * @return object $this
	 */
	public function encode()
	{
		$time = time();
		$signer = new Sha256();

		$this->token = (new Builder())->setHeader('alg', 'HS256')
				->setIssuer($this->iss)
				->setAudience($this->aud)
				->setIssuedAt($time)
				->setExpiration($time + 7200)
				->set('uid', $this->uid)
				->sign($signer, $this->secrect)
				->getToken();

		return $this; // 链式调用
	}

	/**
	 * decode token
	 * @return object $this->decodeToken
	 */
	public function decode()
	{
		if ( !$this->decodeToken ){
			$this->decodeToken = (new Parser())->parse((string)$this->token);
			$this->uid = $this->decodeToken->getClaim('uid');
		}

		return $this->decodeToken;
	}
	/**
	 * validate token
	 * @return bool 
	 */
	public function validate()
	{
		$data = new ValidationData();
		$data->setIssuer($this->iss);
		$data->setAudience($this->aud);
		
		return $this->decode()->validate($data);
	}

	/**
	 * verify
	 * @return bool
	 */
	public function verify()
	{
		$result = $this->decode()->verify(new Sha256(), $this->secrect);

		return $result;
	}
}