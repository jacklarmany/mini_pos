<?php

use yii\db\Migration;

class m220714_095644_create_table_company_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%company_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->notNull()->comment('Language code'),
                'name' => $this->string()->notNull()->comment('Company name translate'),
                'representative' => $this->string(244)->notNull()->comment('Representative name translate'),
                'company_id' => $this->integer()->notNull()->comment('Company ID is foreign key from relation table company'),
            ],
            $tableOptions
        );

        $this->createIndex('companies_id', '{{%company_translate}}', ['company_id']);

        $this->addForeignKey(
            'company_translate_ibfk_1',
            '{{%company_translate}}',
            ['company_id'],
            '{{%company}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%company_translate}}');
    }
}
