<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180303_125433_create_user_table extends Migration
{
    public $table = "user";
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'login' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'secondname' => $this->string()->notNull(),
            'gender' => $this->integer()->defaultValue(0),
            'created' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'email' => $this->string()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table);
    }
}
