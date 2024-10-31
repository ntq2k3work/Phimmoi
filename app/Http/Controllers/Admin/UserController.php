<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

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
        $userData = $request->only('name', 'email', 'password', 'phone_number', 'birthday', 'address', 'avatar_url', 'gender');
        $user = $this->__userService->createUser($userData);
        return redirect()->route('admin.users')->with('success', 'User created successfully');
    }
}
