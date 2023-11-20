<?php

namespace App\Services;


use App\Models\Promo;
use Illuminate\Support\Facades\Hash;
use App\Services\BaseService;

class PromoService extends BaseService
{

    protected $model;

    public function __construct()
    {
        $this->model = Promo::class;
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

