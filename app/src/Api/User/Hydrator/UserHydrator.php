<?php

namespace App\Api\User\Hydrator;

use App\Api\User\Entity\User;
use App\Core\HydratorInterface;

/**
 * Class UserHydrator
 *
 * @package App\Api\User\Hydrator
 */
class UserHydrator implements HydratorInterface
{
    /**
     * @param array $item
     * @return User
     */
    public function hydrateOne($item)
    {
        return new User($item);
    }
    /**
     * @param array $data
     * @return User[]
     */
    public function hydrateMany(array $data)
    {
        return array_map(function ($item) {
            return $this->hydrateOne($item);
        }, $data);
    }
}