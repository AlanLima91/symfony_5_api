<?php

declare(strict_types = 1)
;

namespace Tests\App\Service;

use App\Service\LoginService;
use App\Repository\UserRepository;
use App\Entity\User;
use Prophecy\Argument;

beforeEach(function () {
    $this->userProphecy = $this->prophesize(User::class );
    $this->userRepositoryProphecy = $this->prophesize(UserRepository::class );
    $this->loginService = new LoginService(
        $this->userProphecy->reveal(),
        $this->userRepositoryProphecy->reveal()
        );
});

test('retrieve user from username test', function () {
    $this->userRepositoryProphecy
        ->findBy(Argument::type('array'))
        ->shouldBeCalledOnce()
        ->willReturn($this->userProphecy->reveal());

    $user = $this->loginService->retrieveUserFromUsername("");
    $this->assertEquals($user, $this->userProphecy->reveal());
});

it('won\'t retrieve user from username test', function () {
    $this->userRepositoryProphecy
        ->findBy(Argument::type('array'))
        ->shouldBeCalledOnce()
        ->willReturn(null);

    $user = $this->loginService->retrieveUserFromUsername("");
    $this->assertEquals($user, null);
});
