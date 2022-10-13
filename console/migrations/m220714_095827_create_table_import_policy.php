<?php

use yii\db\Migration;

class m220714_095827_create_table_import_policy extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%import_policy}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'project_id' => $this->integer()->notNull()->comment('Project ID is foreign keys from relation table project'),
                'number' => $this->string()->notNull()->comment('Number No.'),
                'date' => $this->date()->notNull()->comment('Date Import'),
                'amount' => $this->decimal(10, 2)->notNull()->comment('Amount import'),
                'attach_file' => $this->string(45)->comment('Attach relation document'),
            ],
            $tableOptions
        );

        $this->createIndex('project_id', '{{%import_policy}}', ['project_id']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%import_policy}}');
    }
}
