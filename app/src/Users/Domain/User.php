<?php

namespace App\src\Users\Domain;

final class User
{
    private readonly ?string $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $password;
    private string $birth_date;
    private string $gender;

    public function __construct(
        ?string  $id,
        string $firstName,
        string $lastName,
        string $email,
        string $password,
        string $birth_date,
        string $gender
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->birth_date = $birth_date;
        $this->gender = $gender;
    }

    public static function create(
        string $firstName,
        string $lastName,
        string $email,
        string $password,
        string $birth_date,
        string $gender
    ): User {
        return new self(
            null,
            $firstName,
            $lastName,
            $email,
            $password,
            $birth_date,
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

    public function getBirthDate(): string
    {
        return $this->birth_date;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function toPrimitive(): array
    {
        return [
            'id' => $this->id,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'password' => $this->password,
            'birth_date' => $this->birth_date,
            'gender' => $this->gender,
        ];
    }
}
