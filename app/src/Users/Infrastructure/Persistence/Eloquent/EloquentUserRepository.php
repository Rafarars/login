<?php

namespace App\src\Users\Infrastructure\Persistence\Eloquent;

use App\src\Users\Domain\UserRepository;
use App\src\Users\Domain\User;

final class EloquentUserRepository extends EloquentRepository implements UserRepository
{
    public function save(User $user): void
    {

    }
}
