<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Traits\ApiResponse;
use App\Repositories\UserRepositoryInterface;


class AuthController extends Controller
{
    use ApiResponse;

    protected $userRepository;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->userRepository = $userRepository;
    }

    /**
    * Register a new user.
    *
    * @param RegisterRequest $request
    * @return \Illuminate\Http\JsonResponse
    */
    public function register(RegisterRequest $request)
    {
        $user = $this->userRepository->register($request->all());

        $data = [
            'token' => auth()->login($user),
            'user' =>  new UserResource($user),
        ];

        return $this->success('User registered successfully', $data, 'data');
    }

}
