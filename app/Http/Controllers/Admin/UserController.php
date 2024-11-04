<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    protected $__userService;

    public function __construct(UserService $userService)
    {
        $this->__userService = $userService;
    }

    public function index()
    {
        $users = $this->__userService->getUsers();
        $users = User::all();
        return view('pages.users.index', compact('users'));
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $userData = $request->validated();
        $this->__userService->createUser($userData);
        alert()->success('Thành công','Cập nhật thành công');
        return redirect()->route('admin.users');
    }

    public function edit($id)
    {
        $user = $this->__userService->find($id);
        return view('pages.users.edit', compact('user'));
    }

    public function update($id, UpdateUserRequest $request)
    {
        $data = $request->validated();
        $check = $this->__userService->updateUser($id, $data);
        if($check){
            alert()->success('Thành công','Sửa thành công');
        }else{
            alert()->error('Thất bại','Sửa thất bại');
        }
        return redirect()->route('admin.users');
    }
}
