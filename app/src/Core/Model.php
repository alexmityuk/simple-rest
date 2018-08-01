<?php

namespace App\Core;

/**
 * Interface Model
 *
 * @package App\Core
 */
interface Model
{
    /**
     * @param HydratorInterface $hydrator
     * @return void
     */
    public function setHydrator(HydratorInterface $hydrator);

    /**
     * @return array
     */
    public function findAll();

    /**
     * @param $id
     * @return array
     */
    public function findById($id);
}
