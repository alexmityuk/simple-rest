<?php

namespace App\Api\Product\Model;

use App\Api\Product\Entity\Product;
use App\Core\HydratorInterface;
use App\Core\Model;

/**
 * Class ProductModel
 *
 * @package App\Api\Product\Model
 */
class ProductModel implements Model
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
     * @return Product[]|[]
     */
    public function findAll()
    {
        $rawProducts = [
            [
                'id' => 1,
                'name' => 'Crocs flip flops',
                'brand' => 'Crocs',
            ],
            [
                'id' => 2,
                'name' => 'Nike crosses',
                'brand' => 'Nike',
            ],
            [
                'id' => 3,
                'name' => 'Oakley sunglasses',
                'brand' => 'Oakley',
            ],
        ];

        return $this->hydrator->hydrateMany($rawProducts);
    }

    /**
     * @param $id
     * @return Product|null
     */
    public function findById($id)
    {
        $product = array_filter($this->findAll(), function (Product $item) use ($id) {
            return $item->equals($id);
        });

        return array_shift($product);
    }
}
