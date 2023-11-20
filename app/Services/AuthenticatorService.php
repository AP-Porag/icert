<?php

namespace App\Services;


use App\Models\Authenticator;
use Illuminate\Support\Facades\Hash;
use App\Services\BaseService;

class AuthenticatorService extends BaseService
{

    protected $model;

    public function __construct()
    {
        $this->model = Authenticator::class;
    }

    public function storeOrUpdate($data, $id = null)
    {
        try {
            // Call patent method
            return parent::storeOrUpdate($data, $id);
        } catch (\Exception $e) {
            $this->logFlashThrow($e);
        }
    }
}

