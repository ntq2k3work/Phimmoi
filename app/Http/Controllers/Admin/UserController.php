<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
