<?php

use yii\db\Migration;

class m220107_074956_create_table_company extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%company}}',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(45)->notNull(),
                'representative' => $this->string(45)->notNull(),
                'country_id' => $this->integer(),
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
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%company}}');
    }
}
