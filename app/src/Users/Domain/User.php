<?php

namespace App\src\Users\Domain;

final class User
{
    private readonly string$id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $password;
    private string $day;
    private string $month;
    private string $year;
    private string $gender;

    public function __construct(
        ?string  $id,
        string $firstName,
        string $lastName,
        string $email,
        string $password,
        string $day,
        string $month,
        string $year,
        string $gender
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
        $this->gender = $gender;
    }

    public static function create(
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
            null,
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

    public function getId(): ?string
    {
        return $this->id;
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
