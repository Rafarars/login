<?php

namespace App\src\Users\Application\Create;

final class UserCreatorRequest
{
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $birth_date;
    private $gender;

    public function __construct(
        string $firstName,
        string $lastName,
        string $email,
        string $password,
        string $birth_date,
        string $gender
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->birth_date = $birth_date;
        $this->gender = $gender;
    }

    public function firstName(): string
    {
        return $this->firstName;
    }

    public function lastName(): string
    {
        return $this->lastName;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function birth_date(): string
    {
        return $this->birth_date;
    }

    public function Gender(): string
    {
        return $this->gender;
    }
}
