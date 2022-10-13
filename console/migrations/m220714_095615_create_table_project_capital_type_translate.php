<?php

use yii\db\Migration;

class m220714_095615_create_table_project_capital_type_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%project_capital_type_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'name' => $this->string()->comment('Name'),
                'language' => $this->string(45)->comment('Language code'),
                'project_capital_type_id' => $this->integer()->notNull()->comment('Is foreign keys from relation project capital type'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_project_capital_type_translate_project_capital_type1_idx', '{{%project_capital_type_translate}}', ['project_capital_type_id']);

        $this->addForeignKey(
            'fk_project_capital_type_translate_project_capital_type1',
            '{{%project_capital_type_translate}}',
            ['project_capital_type_id'],
            '{{%project_capital_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%project_capital_type_translate}}');
    }
}
