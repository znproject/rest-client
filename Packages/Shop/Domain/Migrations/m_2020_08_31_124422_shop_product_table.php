<?php

namespace Migrations;

use Illuminate\Database\Schema\Blueprint;
use ZnLib\Migration\Domain\Base\BaseCreateTableMigration;
use ZnLib\Migration\Domain\Enums\ForeignActionEnum;

class m_2020_08_31_124422_shop_product_table extends BaseCreateTableMigration
{

    protected $tableName = 'shop_product';
    protected $tableComment = 'Товар, услуга';

    public function tableSchema()
    {
        return function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Идентификатор');
            $table->integer('point_id')->comment('Торговая точка');
            $table->integer('category_id')->comment('Категория');
            $table->integer('type_id')->comment('Тип (услуга, товар)');
            $table->integer('entity_id')->nullable()->comment('Сущность');
            $table->integer('price_min')->nullable()->comment('Минимальная цена');
            $table->integer('price_max')->comment('Максимальная цена (базовая цена)');
            $table->string('title')->comment('Название');
            $table->text('description')->nullable()->comment('Описание');
            $table->text('attributes')->nullable()->comment('Значения атрибутов');
            $table->smallInteger('status')->comment('Статус');
            $table->dateTime('created_at')->comment('Время создания');
            $table->dateTime('updated_at')->nullable()->comment('Время обновления');

            $table
                ->foreign('point_id')
                ->references('id')
                ->on($this->encodeTableName('shop_point'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);
            $table
                ->foreign('category_id')
                ->references('id')
                ->on($this->encodeTableName('reference_item'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);
            $table
                ->foreign('type_id')
                ->references('id')
                ->on($this->encodeTableName('reference_item'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);
            $table
                ->foreign('entity_id')
                ->references('id')
                ->on($this->encodeTableName('eav_entity'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);
            $table
                ->foreign('status')
                ->references('id')
                ->on($this->encodeTableName('reference_item'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);
        };
    }

}