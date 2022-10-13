<?php

use yii\db\Migration;

class m220107_074701_create_table_company_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%company_translate}}',
            [
                'id' => $this->primaryKey(),
                'language' => $this->string(45)->notNull(),
                'name' => $this->string(45)->notNull(),
                'representative' => $this->string(45)->notNull(),
                'company_id' => $this->integer()->notNull(),
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
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%company_translate}}');
    }
}
