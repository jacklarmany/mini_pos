<?php

use yii\db\Migration;

class m220714_095607_create_table_parent_company_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%parent_company_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'name' => $this->string()->notNull(),
                'address' => $this->text()->notNull(),
                'district' => $this->string()->notNull(),
                'province' => $this->string()->notNull(),
                'parent_company_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table parent company'),
                'language' => $this->string(45)->notNull()->comment('Language code'),
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

    public function safeDown()
    {
        $this->dropTable('{{%parent_company_translate}}');
    }
}
