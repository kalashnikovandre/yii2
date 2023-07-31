<?php

use yii\db\Migration;

/**
 * Class m230731_144930_add_contacts_table
 */
class m230731_144930_add_contacts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('contact', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50),
            'phone' => $this->string(20),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('contact');
    }
}
