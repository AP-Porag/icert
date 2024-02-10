<?php

namespace App\Services;


use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
            if (Auth::user()->user_type == User::USER_TYPE_ICERT){
                $data['customer_for']= Customer::CUSTOMER_FOR_ICERT;
            }
            if (Auth::user()->user_type == User::USER_TYPE_KSA){
                $data['customer_for']= Customer::CUSTOMER_FOR_KSA;
            }
            if (Auth::user()->user_type == User::USER_TYPE_ADMIN){
                $data['customer_for']= Customer::CUSTOMER_FOR_ICERT;
            }

            return parent::storeOrUpdate($data, $id);
        } catch (\Exception $e) {
            $this->logFlashThrow($e);
        }
    }
}

