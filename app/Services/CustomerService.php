<?php

namespace App\Services;


use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use App\Services\BaseService;

class CustomerService extends BaseService
{

    protected $model;

    public function __construct()
    {
        $this->model = Customer::class;
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

