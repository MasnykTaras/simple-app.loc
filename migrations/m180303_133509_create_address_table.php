<?php

use yii\db\Migration;

/**
 * Handles the creation of table `address`.
 */
class m180303_133509_create_address_table extends Migration
{
    public $table = 'address';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'index' => $this->integer()->notNull(),
            'state' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'strite' => $this->string()->notNull(),
            'strit_number' => $this->integer(),
            'office_number' => $this->integer(),
            'user_id' => $this->integer()->notNull(),
        ]);
        
       $this->createIndex(
            'idx-address-user_id',
            'address',
            'user_id'
        );
        $this->addForeignKey(
            'fk-address-user_id',
            'address',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table);
        $this->dropIndex('idx-address-user_id', $this->table);
        $this->dropForeignKey('fk-address-user_id', $this->table);
    }
}
