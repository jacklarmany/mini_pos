<?php

use yii\db\Migration;

class m220714_095605_create_table_mining_type_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%mining_type_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->notNull()->comment('Language code'),
                'name' => $this->string()->notNull()->comment('Name'),
                'mining_type_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table mining type'),
            ],
            $tableOptions
        );

        $this->createIndex('mining_types_id', '{{%mining_type_translate}}', ['mining_type_id']);

        $this->addForeignKey(
            'mining_type_translate_ibfk_1',
            '{{%mining_type_translate}}',
            ['mining_type_id'],
            '{{%mining_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%mining_type_translate}}');
    }
}
