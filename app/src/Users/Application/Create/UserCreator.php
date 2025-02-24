<?php

namespace App\src\Users\Application\Create;

use App\src\Users\Domain\UserRepository;
use App\src\Users\Domain\User;

final class UserCreator
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(UserCreatorRequest $request): void
    {
        $user = User::create(
            $request->firstName(),
            $request->lastName(),
            $request->email(),
            $request->password(),
            $request->day(),
            $request->month(),
            $request->year(),
            $request->gender()
        );

        $this->repository->save($user);
    }
}
