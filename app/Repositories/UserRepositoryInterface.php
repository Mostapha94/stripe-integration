<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    /**
     * Register a new user.
     *
     * @param array $data The user data.
     */
    public function register(array $data);
}
