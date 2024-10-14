<?php

use yii\db\Migration;

/**
 * Class m241002_064228_create_client_table
 */
class m241002_064228_create_client_table extends Migration
{
    public $table = 'client';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->bigPrimaryKey()->unsigned()->notNull()->comment('Auto increment id'),
            'name' => $this->string(255)->notNull()->comment('Client name'),
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
        echo "m241002_064228_create_client_table cannot be reverted.\n";

        return false;
    }
}
