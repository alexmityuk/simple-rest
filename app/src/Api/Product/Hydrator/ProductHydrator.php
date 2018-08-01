<?php

namespace App\Api\Product\Hydrator;

use App\Api\Product\Entity\Product;
use App\Core\HydratorInterface;

/**
 * Class ProductHydrator
 *
 * @package App\Api\Product\Hydrator
 */
class ProductHydrator implements HydratorInterface
{
    /**
     * @param array $item
     * @return Product
     */
    public function hydrateOne($item)
    {
        return new Product($item);
    }
    /**
     * @param array $data
     * @return Product[]
     */
    public function hydrateMany(array $data)
    {
        return array_map(function ($item) {
            return $this->hydrateOne($item);
        }, $data);
    }
}