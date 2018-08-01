<?php

namespace App\Api\User\Entity;

use App\Api\User\Dto\UserCredentials;

/**
 * Class User
 *
 * @package App\Api\User\Entity
 */
class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $display;

    /**
     * User constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->login = (string) $data['login'] ?? '';
        $this->password = (string) $data['password'] ?? '';
        $this->display = (string) $data['display'] ?? '';
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getDisplay(): string
    {
        return $this->display;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function equalsById($id)
    {
        return $this->getId() === $id;
    }

    /**
     * @param UserCredentials $userCredentials
     * @return bool
     */
    public function equalsByCredentials(UserCredentials $userCredentials)
    {
        return $this->getLogin() === $userCredentials->getLogin()
            && $this->getPassword() === $userCredentials->getPassword();
    }
}
