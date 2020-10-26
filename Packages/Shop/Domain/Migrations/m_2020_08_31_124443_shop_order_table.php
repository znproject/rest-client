<?php

namespace Migrations;

use Illuminate\Database\Schema\Blueprint;
use ZnLib\Migration\Domain\Base\BaseCreateTableMigration;
use ZnLib\Migration\Domain\Enums\ForeignActionEnum;

class m_2020_08_31_124443_shop_order_table extends BaseCreateTableMigration
{

    protected $tableName = 'shop_order';
    protected $tableComment = 'Заказы товаров из магазина';

    public function tableSchema()
    {
        return function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Идентификатор');
            $table->integer('product_id')->comment('Продукт');
            $table->integer('client_id')->comment('Клиент');
            $table->integer('price')->comment('Цена');
            $table->integer('count')->comment('Количество');
            $table->text('product_attributes')->nullable()->comment('Атрибуты пордукта (защита от подмены)');
            $table->integer('status')->comment('Статус (Новый, забронированный, отклоненный, завершенный)');
            $table->dateTime('created_at')->comment('Время создания');
            $table->dateTime('updated_at')->nullable()->comment('Время обновления');

            $table
                ->foreign('product_id')
                ->references('id')
                ->on($this->encodeTableName('shop_product'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);
            $table
                ->foreign('client_id')
                ->references('id')
                ->on($this->encodeTableName('user_identity'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);
        };
    }

}