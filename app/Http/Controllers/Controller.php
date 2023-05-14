<?php

namespace App\Http\Controllers;

use App\Enum\EnumTypeMessage;
use App\Suport\Message;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $message;

    public function __construct()
    {
        $this->message = new Message();
    }

    /**
     * @return Message
     */
    public function message(): Message
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @param $object
     * @return JsonResponse
     */
    protected function successRequest(string $message, $object): JsonResponse
    {
        $this->message()->setText($message)->setType(EnumTypeMessage::Success);
        return response()->json(
            [
                'success' => $this->message()->toArray(),
                'object_response' => $object
            ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
        );
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    protected function notFoundRequest(string $message): JsonResponse
    {
        $this->message()->setText($message)->setType(EnumTypeMessage::Error);
        return response()->json(
            [
                'errors' => $this->message()->toArray(),
            ], 404, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
        );
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    protected function badRequest(string $message): JsonResponse
    {
        $this->message()->setText($message)->setType(EnumTypeMessage::Error);
        return response()->json(
            [
                'errors' => $this->message()->toArray()
            ], 400, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
        );
    }
}
