<?php

use yii\db\Migration;

class m220714_095832_create_table_monitoring extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%monitoring}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'date_monitoring' => $this->date()->notNull()->comment('Date monitoring'),
                'created_date' => $this->dateTime()->comment('Date created'),
                'updated_date' => $this->dateTime()->comment('Date updated'),
                'status' => $this->string()->comment('Status'),
                'project_id' => $this->integer()->comment('Is foreign keys from relation table project'),
                'project_status_contract_id' => $this->integer()->comment('Is foreign keys from relation table contract'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_monitoring_contract1_idx', '{{%monitoring}}', ['project_status_contract_id']);
        $this->createIndex('fk_monitoring_project1_idx', '{{%monitoring}}', ['project_id']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%monitoring}}');
    }
}
