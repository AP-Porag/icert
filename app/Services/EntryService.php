<?php

namespace App\Services;


use App\Models\Entry;
use App\Services\BaseService;

class EntryService extends BaseService
{

    protected $model;

    public function __construct()
    {
        $this->model = Entry::class;
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

