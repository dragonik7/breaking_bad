<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResponseCollection extends JsonResource {

	public static     $wrap    = 'data';
	protected bool    $success = true;
	protected ?string $message = null;
	protected int     $status  = 200;

	public function __construct($resource = null) {
		parent::__construct($resource);
	}

	public function with(Request $request) {
		$message = [
			'status' => $this->success,
		];
		if (!$this->success) {
			return array_push($message, [
				'error' => [
					'message' => $this->message,
				],
			]);
		}
		return $message;
	}

	/**
	 * @param  string|null  $message
	 */
	public function setMessage(?string $message): void {
		$this->message = $message;
	}

	/**
	 * @param  bool  $success
	 */
	public function setSuccess(bool $success): void {
		$this->success = $success;
	}
}
