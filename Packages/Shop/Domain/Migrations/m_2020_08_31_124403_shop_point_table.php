<?php

namespace Migrations;

use Illuminate\Database\Schema\Blueprint;
use ZnLib\Migration\Domain\Base\BaseCreateTableMigration;
use ZnLib\Migration\Domain\Enums\ForeignActionEnum;

class m_2020_08_31_124403_shop_point_table extends BaseCreateTableMigration
{

    protected $tableName = 'shop_point';
    protected $tableComment = 'Торговая точка';

    public function tableSchema()
    {
        return function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Идентификатор');
            $table->string('title')->comment('Название');
            $table->integer('category_id')->comment('Категория');
            $table->integer('city_id')->comment('Город');
            $table->string('street')->comment('Название улицы');
            $table->string('home')->comment('Дом');
            $table->string('pavilion')->nullable()->comment('Торговое место');
            $table->smallInteger('status')->comment('Статус');
            $table->dateTime('created_at')->comment('Время создания');
            $table->dateTime('updated_at')->nullable()->comment('Время обновления');

            $table
                ->foreign('category_id')
                ->references('id')
                ->on($this->encodeTableName('reference_item'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);
        };
    }
}