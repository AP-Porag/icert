<?php

namespace App\Services;


use App\Models\ThirdPartyDropOffCenter;
use App\Services\BaseService;

class ThirdPartyDropOffService extends BaseService
{

    protected $model;

    public function __construct()
    {
        $this->model = ThirdPartyDropOffCenter::class;
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

