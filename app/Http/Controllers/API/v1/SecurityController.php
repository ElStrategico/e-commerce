<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Services\SecurityService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeEmailRequest;
use App\Http\Requests\ChangePasswordRequest;

class SecurityController extends Controller
{
    /**
     * @var SecurityService
     */
    private $securityService;

    public function __construct()
    {
        $this->securityService = new SecurityService();
    }

    /**
     * @param ChangeEmailRequest $request
     */
    public function changeEmail(ChangeEmailRequest $request)
    {
        return $this->securityService->changeEmail(
            $request->input('email'),
            $request->input('token')
        );
    }

    /**
     * @param ChangePasswordRequest $request
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        return $this->securityService->changePassword(
            $request->input('new_password'),
            $request->input('token')
        );
    }
}
