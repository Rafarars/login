<?php

namespace App\src\Users\Application\Create;

final class UserCreatorRequest
{
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $day;
    private $month;
    private $year;
    private $gender;

    public function __construct(
        string $firstName,
        string $lastName,
        string $email,
        string $password,
        string $day,
        string $month,
        string $year,
        string $gender
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
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

    public function day(): string
    {
        return $this->day;
    }

    public function month(): string
    {
        return $this->month;
    }

    public function year(): string
    {
        return $this->year;
    }

    public function Gender(): string
    {
        return $this->gender;
    }
}
