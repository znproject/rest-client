<?php

namespace Packages\Eav\Yii2\Api\controllers;

use Packages\Eav\Domain\Interfaces\Services\CategoryServiceInterface;
use Packages\Eav\Domain\Interfaces\Services\AttributeServiceInterface;
use Packages\Eav\Domain\Services\AttributeService;
use yii\base\Module;
use ZnLib\Rest\Yii2\Base\BaseCrudController;

class AttributeController extends BaseCrudController
{

    public function __construct(string $id, Module $module, array $config = [], AttributeServiceInterface $bookService)
    {
        parent::__construct($id, $module, $config);
        $this->service = $bookService;
    }
}
