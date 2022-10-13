<?php

use yii\db\Migration;

class m220714_095517_create_table_country_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%country_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string()->comment('Language code'),
                'name' => $this->string()->comment('Country name translate'),
                'country_id' => $this->integer()->comment('Country ID is foreign keys from relation table country'),
            ],
            $tableOptions
        );

        $this->createIndex('country_id', '{{%country_translate}}', ['country_id']);

        $this->addForeignKey(
            'country_translate_ibfk_1',
            '{{%country_translate}}',
            ['country_id'],
            '{{%country}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%country_translate}}');
    }
}
