<?php

use yii\db\Migration;

class m220714_095543_create_table_m_import_fund_type extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_import_fund_type}}',
            [
                'id' => $this->primaryKey()->unsigned()->comment('Primary key of table is auto increment'),
                'name' => $this->string()->notNull()->comment('Name'),
            ],
            $tableOptions
        );

        $this->createIndex('fund_type_name_UNIQUE', '{{%m_import_fund_type}}', ['name'], true);
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_import_fund_type}}');
    }
}
