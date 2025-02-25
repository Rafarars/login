<?php

namespace App\src\Users\Infrastructure\Persistence\Eloquent;

use App\Models\EloquentRepository;
use App\src\Users\Domain\UserRepository;
use App\src\Users\Domain\User;
use App\Models\User as UserModel;

final class EloquentUserRepository extends EloquentRepository implements UserRepository
{
    public function __construct(UserModel $model)
    {
        parent::__construct($model);
    }

    // Sobrescribe toDatabase() para mapear campos específicos
    protected function toDatabase(array $domainData): array
    {
        return [
            'id' => $domainData['id'],
            'first_name' => $domainData['firstName'],
            'last_name' => $domainData['lastName'],
            'email' => $domainData['email'],
            'password' => bcrypt($domainData['password']),
            'birth_date' => $domainData['birth_date'],
            'gender' => $domainData['gender'],
        ];
    }

    // Implementación del save() específico para User
    public function save(User $user): void
    {
        $domainData = $user; // Asume que User tiene este método
        parent::save($domainData);
    }
}
