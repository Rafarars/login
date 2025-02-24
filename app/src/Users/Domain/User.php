<?php

namespace App\src\Users\Domain;

final class User
{
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $password;
    private string $day;
    private string $month;
    private string $year;
    private string $gender;

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

    public function create(
        string $firstName,
        string $lastName,
        string $email,
        string $password,
        string $day,
        string $month,
        string $year,
        string $gender
    ): User {
        return new self(
            $firstName,
            $lastName,
            $email,
            $password,
            $day,
            $month,
            $year,
            $gender
        );
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getDay(): string
    {
        return $this->day;
    }

    public function getMonth(): string
    {
        return $this->month;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function getGender(): string
    {
        return $this->gender;
    }
}
