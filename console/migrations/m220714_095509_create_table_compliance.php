<?php

use yii\db\Migration;

class m220714_095509_create_table_compliance extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%compliance}}',
            [
                'id' => $this->primaryKey()->unsigned()->comment('Primary key of table is auto increment'),
                'compliance_choice' => $this->string(200)->notNull()->comment('Compliance name'),
                'sort' => $this->integer()->defaultValue('10')->comment('Sort sequence'),
            ],
            $tableOptions
        );

        $this->createIndex('compliance_choice_UNIQUE', '{{%compliance}}', ['compliance_choice'], true);
    }

    public function safeDown()
    {
        $this->dropTable('{{%compliance}}');
    }
}
