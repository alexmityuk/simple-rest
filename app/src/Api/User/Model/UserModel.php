<?php

namespace App\Api\User\Model;

use App\Api\User\Dto\UserCredentials;
use App\Api\User\Entity\User;
use App\Core\HydratorInterface;
use App\Core\Model;

/**
 * Class UserModel
 *
 * @package App\Api\User\Model
 */
class UserModel implements Model
{
    /**
     * @var HydratorInterface
     */
    private $hydrator;

    /**
     * @param HydratorInterface $hydrator
     */
    public function setHydrator(HydratorInterface $hydrator)
    {
        $this->hydrator = $hydrator;
    }

    /**
     * @return User[]
     */
    public function findAll()
    {
        $users = [
            [
                'id' => 1,
                'login' => 'user1',
                'password' => '1',
                'display' => 'User One'
            ],
            [
                'id' => 2,
                'login' => 'user2',
                'password' => '2',
                'display' => 'User Two',
            ]
        ];

        return $this->hydrator->hydrateMany($users);
    }

    /**
     * @param $id
     * @return User|null
     */
    public function findById($id)
    {
        $user = array_filter($this->findAll(), function (User $item) use ($id) {
            return $item->equalsById($id);
        });

        return array_shift($user);
    }

    /**
     * @param UserCredentials $userCredentials
     * @return User|null
     */
    public function findByCredentials(UserCredentials $userCredentials)
    {
        $user = array_filter($this->findAll(), function (User $item) use ($userCredentials) {
            return $item->equalsByCredentials($userCredentials);
        });

        return array_shift($user);
    }
}