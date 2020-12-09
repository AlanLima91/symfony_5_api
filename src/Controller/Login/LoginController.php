<?php

declare(strict_types = 1)
;

namespace App\Controller\Login;

use App\Service\LoginService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class LoginController
{
    public function __invoke(
        Request $request,
        LoginService $loginService,
        UserPasswordEncoderInterface $userPasswordEncoderInterface,
        JWTEncoderInterface $jwtEncoderInterface,
        ): Response
    {
        if (!$request->get('username') || !$request->get('password')) {
            return new JsonResponse(['message' => 'Missing username or password'], Response::HTTP_BAD_REQUEST);
        }

        $username = $request->getUser();
        $password = $request->getPassword();
        $user = $loginService->retrieveUserFromUsername($username);

        if (!$user || $this->userPasswordEncoderInterface->isPasswordValid($user, $password)) {
            throw new BadCredentialsException();
        }

        $token = $this->jwtEncoderInterface->encode([
            'username' => $user->getUsername(),
            'exp' => time() + 3600,
        ]);

        return new Response(['token' => $token], Response::HTTP_CREATED);
    }
}
