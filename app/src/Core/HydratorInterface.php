<?php

namespace App\Core;

/**
 * Interface HydratorInterface
 *
 * @package App\Core
 */
interface HydratorInterface
{
    /**
     * @param $item
     * @return mixed
     */
    public function hydrateOne($item);

    /**
     * @param array $data
     * @return mixed
     */
    public function hydrateMany(array $data);
}
