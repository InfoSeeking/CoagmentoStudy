<?php
namespace App\Utilities;

use Illuminate\Validation\Validator;

// StatusWithResult is a wrapper around Status to include a return object.
// It is meant to be returned from a function which may return errors (not exceptions).
//
class StatusWithResult {
	public static function fromErrors(array $messages, $code=StatusCodes::GENERIC_ERROR) {
		$statusWithResult = new StatusWithResult();
		$statusWithResult->status = Status::fromErrors($messages, $code);
		return $statusWithResult;
	}

	public static function fromError(string $message, $code=StatusCodes::GENERIC_ERROR) {
		$statusWithResult = new StatusWithResult();
		$statusWithResult->status = Status::fromError($message, $code);
		return $statusWithResult;
	}

	public static function fromValidator(Validator $validator) {
		$statusWithResult = new StatusWithResult();
		$statusWithResult->status = Status::fromValidator($validator);
		return $statusWithResult;
	}

	public static function fromResult($result) {
		$statusWithResult = new StatusWithResult();
		$statusWithResult->status = Status::OK();
		$statusWithResult->result = $result;
		return $statusWithResult;
	}

	public function getResult() {
		return $result;
	}

	public function getStatus() {
		return $this->status;
	}

	public function isOK() {
		return $this->status->isOK();
	}

	public function getCode() {
		return $this->status->getCode();
	}

	public function asArray() {
		$array = $this->status->asArray();
		$array["result"] = $this->result;
		return $array;
	}

	private function __construct() {}
	private $result = null;
	private $status;
}