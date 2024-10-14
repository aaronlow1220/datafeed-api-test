<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%data_version}}`.
 */
class m241009_055712_create_data_version_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%data_version}}', [
            'id' => $this->bigPrimaryKey()->unsigned()->notNull()->comment('Auto increment id'),
            'client_id' => $this->bigInteger()->unsigned()->notNull()->comment('Client id'),
            'hash' => $this->string(255)->notNull()->comment('Data hash'),
            'created_at' => $this->integer(10)->unsigned()->notNull()->comment('unixtime'),
            'updated_at' => $this->integer(10)->unsigned()->notNull()->comment('unixtime'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%data_version}}');
    }
}
