<?php

namespace Migrations;

use Illuminate\Database\Schema\Blueprint;
use ZnLib\Migration\Domain\Base\BaseCreateTableMigration;
use ZnLib\Migration\Domain\Enums\ForeignActionEnum;

class m_2020_08_31_124404_shop_point_staff_table extends BaseCreateTableMigration
{

    protected $tableName = 'shop_point_staff';
    protected $tableComment = 'Персонал торговой точки';

    public function tableSchema()
    {
        return function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Идентификатор');
            $table->integer('point_id')->comment('Торговая точка');
            $table->integer('user_id')->comment('Пользователь');
            $table->integer('role_id')->comment('Роль');
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
                ->foreign('user_id')
                ->references('id')
                ->on($this->encodeTableName('user_identity'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);

            $table
                ->foreign('role_id')
                ->references('id')
                ->on($this->encodeTableName('reference_item'))
                ->onDelete(ForeignActionEnum::CASCADE)
                ->onUpdate(ForeignActionEnum::CASCADE);
        };
    }

}