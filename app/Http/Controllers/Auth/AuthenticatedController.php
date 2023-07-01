<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class AuthenticatedController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        $data = $request->authenticate();

        return response()->json($data, 200);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): JsonResponse
    {
        $status = $request->user()->currentAccessToken()->delete();
        if ($status) {
            return response()->json('Successfully loged out', 200);
        }

        return response()->json('Something went wrong please try again', 500);
    }
}
