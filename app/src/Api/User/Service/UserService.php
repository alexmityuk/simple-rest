<?php

namespace App\Api\User\Service;

use App\Api\User\Dto\UserCredentials;
use App\Api\User\Model\UserModel;

/**
 * Class UserService
 *
 * @package App\Api\User\Service
 */
class UserService
{
    /**
     * @var UserModel
     */
    private $userModel;

    /**
     * UserService constructor.
     *
     * @param UserModel $userModel
     */
    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * @param UserCredentials $userCredentials
     * @return \App\Api\User\Entity\User
     */
    public function getUserByCredentials(UserCredentials $userCredentials)
    {
        return $this->userModel->findByCredentials($userCredentials);
    }
}
