<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use App\Http\Requests\Request;

class InternalException extends Exception
{
    protected $messageForUser;

    /**
     * InternalException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "系统内部错误", $code = 550, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function render(Request $request)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => $this->messageForUser], $this->code);
        }

        return view('pages.error', ['message' => $this->messageForUser]);
    }
}
