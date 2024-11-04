<?php

namespace App\Services;

use App\Repositories\Users\UserRepository;
use Illuminate\Support\Facades\Storage;

class UserService {

    protected $__userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->__userRepository = $userRepository;
    }

    public function getUsers()
    {
        return $this->__userRepository->getAll();
    }

    public function createUser(array $data)
    {
        if(isset($data['avatar_url'])){
            $uploadedFileUrl = cloudinary()->upload($data['avatar_url']->getRealPath())->getSecurePath();
        }
        $data['avatar_url'] = $uploadedFileUrl;
        return $this->__userRepository->create($data);
    }

    public function updateUser($id, array $data)
    {
        if (isset($data['avatar_url'])) {
            $uploadedFileUrl = cloudinary()->upload($data['avatar_url']->getRealPath())->getSecurePath();
            $data['avatar_url'] = $uploadedFileUrl;
        }
        return $this->__userRepository->update($id, $data);
    }

    public function find($id)
    {
        return $this->__userRepository->findById($id);
    }
}

