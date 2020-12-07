<?php

declare(strict_types=1);

namespace App\Controller\Login;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController
{
  public function __invoke(Request $request): Response
  {
    return new Response();
  }
}
