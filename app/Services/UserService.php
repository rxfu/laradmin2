<?php

namespace App\Services;

use App\Exceptions\InvalidRequestException;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserService extends Service
{
    public function __construct(UserRepository $users)
    {
        $this->repository = $users;
    }

    public function changePassword($oldPassword, $newPassword, $confirmedPassword)
    {
        $credentials = [
            'username' => Auth::user()->username,
            'password' => $oldPassword,
        ];

        if (Auth::attempt($credentials)) {
            if ($newPassword === $confirmedPassword) {
                try {
                    $this->repository->update(Auth::id(), ['password' => $newPassword]);
                } catch (Exception $e) {
                    throw new InvalidRequestException('密码修改失败', $this->repository->getObject(), 'update');
                }
            } else {
                throw new InvalidRequestException('确认密码与新密码不一致，请重新输入', $this->repository->getObject(), 'update');
            }
        } else {
            throw new InvalidRequestException('旧密码错误，请重新输入', $this->repository->getObject(), 'update');
        }
    }
}
