<?php

use yii\db\Migration;

class m220107_074651_create_table_parent_company_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%parent_company_translate}}',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'address' => $this->text()->notNull(),
                'district' => $this->string()->notNull(),
                'province' => $this->string()->notNull(),
                'parent_company_id' => $this->integer()->notNull(),
                'language' => $this->string(45)->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('fk_parent_company_translate_parent_company1_idx', '{{%parent_company_translate}}', ['parent_company_id']);

        $this->addForeignKey(
            'fk_parent_company_translate_parent_company1',
            '{{%parent_company_translate}}',
            ['parent_company_id'],
            '{{%parent_company}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('{{%parent_company_translate}}');
    }
}
