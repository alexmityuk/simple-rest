<?php

namespace App\Api\Product\Entity;

/**
 * Class Product
 *
 * @package App\Api\Product\Entity
 */
class Product
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $brand;

    /**
     * Product constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->name = (string) $data['name'] ?? '';
        $this->brand = (string) $data['brand'] ?? '';
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function equals($id)
    {
        return $this->getId() === $id;
    }
}
