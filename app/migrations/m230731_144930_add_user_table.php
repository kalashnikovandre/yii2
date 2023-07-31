<?php

use yii\db\Migration;

/**
 * Class m230731_144930_add_user_table
 */
class m230731_144930_add_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'name' => $this->string(),
            'phone' => $this->string(20),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
