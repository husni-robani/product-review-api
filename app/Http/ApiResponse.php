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
    protected int $httpCode;
    /** @var array|\JsonSerializable  */
    protected array|\JsonSerializable $data;
    /** @var string  */
    protected string $errorMessage;
    /** @var string  */
    protected string $message;

    public function __construct(int $httpCode, array|\JsonSerializable $data = [] , string $message = '', string $errorMessage = '')
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
