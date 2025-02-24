<?php

namespace App\src\Users\Domain;

interface UserRepository
{
    public function save(User $user): void;
}
