<?php
namespace App\Services;

use App\Repositories\Users\UserRepository;

class UserService {
    protected $__userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->__userRepository = $userRepository;
    }

    public function createUser($data) {
        return $this->__userRepository->create($data);
    }
}
