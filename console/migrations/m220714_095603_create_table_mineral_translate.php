<?php

use yii\db\Migration;

class m220714_095603_create_table_mineral_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%mineral_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->notNull()->comment('Language code'),
                'name' => $this->string()->notNull()->comment('Name translate'),
                'mineral_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table mineral'),
            ],
            $tableOptions
        );

        $this->createIndex('minerals_id', '{{%mineral_translate}}', ['mineral_id']);

        $this->addForeignKey(
            'mineral_translate_ibfk_1',
            '{{%mineral_translate}}',
            ['mineral_id'],
            '{{%mineral}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%mineral_translate}}');
    }
}
