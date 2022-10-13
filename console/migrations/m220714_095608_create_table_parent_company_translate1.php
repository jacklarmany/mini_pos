<?php

use yii\db\Migration;

class m220714_095608_create_table_parent_company_translate1 extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%parent_company_translate1}}',
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
    }

    public function safeDown()
    {
        $this->dropTable('{{%parent_company_translate1}}');
    }
}
