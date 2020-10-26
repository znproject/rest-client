<?php

namespace Migrations;

use Illuminate\Database\Schema\Blueprint;
use ZnLib\Migration\Domain\Base\BaseCreateTableMigration;
use ZnLib\Migration\Domain\Enums\ForeignActionEnum;

class m_2020_08_31_124413_shop_offer_table extends BaseCreateTableMigration
{

    protected $tableName = 'shop_offer';
    protected $tableComment = 'Ценовое предложение';

    public function tableSchema()
    {
        return function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Идентификатор');
            $table->integer('request_id')->comment('Запрос клиента');
            $table->integer('point_id')->comment('Торговая точка');
            $table->integer('price')->comment('Цена от сервиса');
            $table->integer('status_id')->comment('Статус (новый, завершенный)');
            $table->text('description')->comment('Описание');
            $table->dateTime('created_at')->comment('Время создания');
            $table->dateTime('updated_at')->nullable()->comment('Время обновления');

            $table
                ->foreign('request_id')
                ->references('id')
                ->on($this->encodeTableName('shop_request'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);

            $table
                ->foreign('point_id')
                ->references('id')
                ->on($this->encodeTableName('shop_point'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);

            $table
                ->foreign('status_id')
                ->references('id')
                ->on($this->encodeTableName('reference_item'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);
        };
    }

}