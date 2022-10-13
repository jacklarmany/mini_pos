<?php

use yii\db\Migration;

class m220714_095822_create_table_document extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%document}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'project_id' => $this->integer()->notNull()->comment('Project ID is foreign keys from relation table Project'),
                'document_type_id' => $this->integer()->notNull()->comment('Document type ID is foreign keys from relation table document type'),
                'started_at' => $this->date()->comment('Date Start'),
                'ended_at' => $this->date()->comment('Date End'),
                'attach_file' => $this->string()->comment('Attach document relation'),
                'status' => $this->string()->comment('Status'),
            ],
            $tableOptions
        );

        $this->createIndex('document_type_id', '{{%document}}', ['document_type_id']);
        $this->createIndex('project_id', '{{%document}}', ['project_id']);

        $this->addForeignKey(
            'document_ibfk_2',
            '{{%document}}',
            ['document_type_id'],
            '{{%document_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%document}}');
    }
}
