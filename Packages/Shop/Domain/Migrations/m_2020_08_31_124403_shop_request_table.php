<?php

namespace Migrations;

use Illuminate\Database\Schema\Blueprint;
use ZnLib\Migration\Domain\Base\BaseCreateTableMigration;
use ZnLib\Migration\Domain\Enums\ForeignActionEnum;

class m_2020_08_31_124403_shop_request_table extends BaseCreateTableMigration
{

    protected $tableName = 'shop_request';
    protected $tableComment = 'Запрос клиента (на товар или обслуживание)';

    public function tableSchema()
    {
        return function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Идентификатор');
            $table->integer('product_type_id')->comment('Тип продукта (услуга, товар)');
            $table->integer('client_id')->comment('Отправитель');
            $table->integer('price')->comment('Предлагаемая цена клиента');
//            $table->integer('brand_id')->comment('Марка');
//            $table->integer('eav_id')->comment('Модель');
//            $table->integer('issue_year')->comment('Год выпуска');
//            $table->integer('fuel_type_id')->comment('Тип топлива');

            $table->text('product_data')->comment('Данные продукта');
            $table->text('description')->comment('Описание');
            $table->integer('status_id')->comment('Статус (новый, завершенный)');
            $table->dateTime('created_at')->comment('Время создания');
            $table->dateTime('updated_at')->nullable()->comment('Время обновления');

            $table
                ->foreign('product_type_id')
                ->references('id')
                ->on($this->encodeTableName('reference_item'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);
            $table
                ->foreign('client_id')
                ->references('id')
                ->on($this->encodeTableName('user_identity'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);
            /*$table
                ->foreign('brand_id')
                ->references('id')
                ->on($this->encodeTableName('reference_item'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);
            $table
                ->foreign('eav_id')
                ->references('id')
                ->on($this->encodeTableName('reference_item'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);
            $table
                ->foreign('fuel_type_id')
                ->references('id')
                ->on($this->encodeTableName('reference_item'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);*/
            $table
                ->foreign('status_id')
                ->references('id')
                ->on($this->encodeTableName('reference_item'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);
        };
    }

}