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
            'birth_date' => $this->formatBirthDate(
                $domainData['year'],
                $domainData['month'],
                $domainData['day']
            ),
            'gender' => $domainData['gender'],
        ];
    }

    private function formatBirthDate(string $year, string $month, string $day): string
    {
        return sprintf('%s-%s-%s',
            $year,
            str_pad($month, 2, '0', STR_PAD_LEFT),
            str_pad($day, 2, '0', STR_PAD_LEFT)
        );
    }

    // Implementación del save() específico para User
    public function save(User $user): void
    {
        $domainData = $user->toPrimitive(); // Asume que User tiene este método
        parent::save($domainData);
    }
}
