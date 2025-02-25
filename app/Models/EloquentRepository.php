<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\src\Users\Domain\User as Users;

abstract class EloquentRepository
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // Convierte los datos del dominio a formato de base de datos
    protected function toDatabase(array $domainData): array
    {
        return $domainData; // Implementación base (puede ser sobrescrita)
    }

    public function save(Users $user): void
    {
        $dbData = $this->toDatabase($user->toPrimitive());
        $this->model->create($dbData);
    }

    // Método para actualizar (si lo necesitas)
    public function update(array $domainData, $id): void
    {
        $dbData = $this->toDatabase($domainData);
        $this->model->find($id)->update($dbData);
    }
}
