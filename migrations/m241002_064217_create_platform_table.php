<?php

use yii\db\Migration;

/**
 * Class m241002_064217_create_platform_table
 */
class m241002_064217_create_platform_table extends Migration
{
    public $table = 'platform';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->bigPrimaryKey(20)->unsigned(),
            'name' => $this->string(255)->notNull()->comment('Platform name'),
            'data' => $this->text()->notNull()->comment('Data mapping rule, JSON format'),
            'created_by' => $this->bigInteger(20)->unsigned()->notNull()->comment('ref: > user.id'),
            'created_at' => $this->integer(10)->unsigned()->notNull()->comment('unixtime'),
            'updated_by' => $this->bigInteger(20)->unsigned()->notNull()->comment('ref: > user.id'),
            'updated_at' => $this->integer(10)->unsigned()->notNull()->comment('unixtime'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241002_064217_create_platform_table cannot be reverted.\n";

        return false;
    }
}
