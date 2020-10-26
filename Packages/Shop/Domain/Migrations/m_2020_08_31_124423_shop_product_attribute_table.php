<?php

namespace Migrations;

use Illuminate\Database\Schema\Blueprint;
use ZnLib\Migration\Domain\Base\BaseCreateTableMigration;
use ZnLib\Migration\Domain\Enums\ForeignActionEnum;

class m_2020_08_31_124423_shop_product_attribute_table extends BaseCreateTableMigration
{

    protected $tableName = 'shop_product_attribute';
    protected $tableComment = 'Наборы атрибутов продукта';

    public function tableSchema()
    {
        return function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Идентификатор');
            $table->integer('product_id')->comment('Продукт');
            $table->string('title')->comment('Название');
            $table->string('name')->comment('Системное имя');
            $table->string('type')->comment('тип значения: text, checkbox, ...');

            $table
                ->foreign('product_id')
                ->references('id')
                ->on($this->encodeTableName('shop_product'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);
        };
    }

}