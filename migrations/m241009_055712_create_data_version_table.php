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
            'id' => $this->primaryKey(),
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
