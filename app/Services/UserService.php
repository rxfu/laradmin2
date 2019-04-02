<?php

namespace App\Services;

use App\Exceptions\GeneralException;
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
                    $this->repository->update(Auth::user()->id, ['password' => $newPassword]);
                } catch (Exception $e) {
                    throw new GeneralException('密码修改失败', $this->repository->getModel(), 'update');
                }
            } else {
                throw new GeneralException('确认密码与新密码不一致，请重新输入', $this->repository->getModel(), 'update');
            }
        } else {
            throw new GeneralException('旧密码错误，请重新输入', $this->repository->getModel(), 'update');
        }
    }
}
