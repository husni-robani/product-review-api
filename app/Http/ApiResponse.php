<?php

namespace App\Http;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;

/**
 *
 */
class ApiResponse implements Responsable
{
    /** @var int  */
    protected $httpCode;
    /** @var array  */
    protected $data;
    /** @var string  */
    protected $errorMessage;
    /** @var string  */
    protected $message;

    public function __construct(int $httpCode, array $data = [] , string $message = '', string $errorMessage = '')
    {
        $this->httpCode = $httpCode;
        $this->data = $data;
        $this->message = $message;
        $this->errorMessage = $errorMessage;
    }

    public function toResponse($request): JsonResponse
    {
        $payload = $this->payload();
        return response()->json(
            $payload, $this->httpCode
        );
    }

    protected function payload(): array
    {
        if ($this->httpCode >= 500){
            return [
                'success' => false,
                'error_message' => 'Server Error'
            ];
        }else if ($this->httpCode >= 400){
            return [
                'success' => false,
                'error_message' => $this->errorMessage
            ];
        }else {
            return [
                'success' => true,
                'message' => $this->message,
                'data' => $this->data
            ];
        }
    }

}
