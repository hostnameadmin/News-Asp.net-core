<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class Api
{
    public function handle($request, Closure $next)
    {

        $validator = Validator::make($request->all(), [
            'key' => 'required',
            'action' => 'required',
        ], [
            'key.required' => 'Incorrect request !',
            'action.required' => 'Incorrect request !',
        ]);

        if ($validator->fails()) {
            $firstErrorMessage = $validator->errors()->first();
            return response()->json([
                'error' => $firstErrorMessage
            ], 422);
        }

        $token = $request->key;
        $user = User::where('token', $token)->first();

        if (!$user) {
            return response()->json(['error' => 'Invalid API key!'], Response::HTTP_UNAUTHORIZED);
        }

        if ($user->status == 0) {
            return response()->json(['error' => 'Your account has been Baned !'], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
