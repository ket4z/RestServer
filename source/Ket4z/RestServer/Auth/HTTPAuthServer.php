<?php
namespace Ket4z\RestServer\Auth;

class HTTPAuthServer implements \Ket4z\RestServer\AuthServer {
	protected $realm;

	public function __construct($realm = 'Rest Server') {
		$this->realm = $realm;
	}

	public function isAuthorized($classObj) {
		if (method_exists($classObj, 'authorize')) {
			return $classObj->authorize();
		}

		return true;
	}

	public function unauthorized($classObj) {
		header("WWW-Authenticate: Basic realm=\"$this->realm\"");
		throw new \Ket4z\RestServer\RestException(401, "You are not authorized to access this resource.");
	}
}
