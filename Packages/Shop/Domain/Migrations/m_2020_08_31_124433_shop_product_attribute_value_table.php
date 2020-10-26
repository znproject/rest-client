<?php

namespace Migrations;

use Illuminate\Database\Schema\Blueprint;
use ZnLib\Migration\Domain\Base\BaseCreateTableMigration;
use ZnLib\Migration\Domain\Enums\ForeignActionEnum;

class m_2020_08_31_124433_shop_product_attribute_value_table extends BaseCreateTableMigration
{

    protected $tableName = 'shop_product_attribute_value';
    protected $tableComment = 'Наборы атрибутов товара';

    public function tableSchema()
    {
        return function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Идентификатор');
            $table->integer('product_id')->comment('Продукт');
            $table->integer('attribute_id')->comment('Атрибут');
            $table->string('value')->comment('Значение атрибута');

            $table
                ->foreign('product_id')
                ->references('id')
                ->on($this->encodeTableName('shop_product'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);
            $table
                ->foreign('attribute_id')
                ->references('id')
                ->on($this->encodeTableName('shop_product_attribute'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);

        };
    }

}