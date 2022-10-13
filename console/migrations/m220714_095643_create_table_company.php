<?php

use yii\db\Migration;

class m220714_095643_create_table_company extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%company}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'name' => $this->string()->notNull()->comment('Is company name'),
                'representative' => $this->string()->comment('Is representative name'),
                'country_id' => $this->integer()->comment('Country ID is foreign keys form relation table country'),
            ],
            $tableOptions
        );

        $this->createIndex('country_id', '{{%company}}', ['country_id']);

        $this->addForeignKey(
            'company_ibfk_1',
            '{{%company}}',
            ['country_id'],
            '{{%country}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%company}}');
    }
}
