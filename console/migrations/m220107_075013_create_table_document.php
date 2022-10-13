<?php

use yii\db\Migration;

class m220107_075013_create_table_document extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%document}}',
            [
                'id' => $this->primaryKey(),
                'project_id' => $this->integer()->notNull(),
                'document_type_id' => $this->integer()->notNull(),
                'started_at' => $this->date(),
                'ended_at' => $this->date(),
                'attach_file' => $this->string(),
                'status' => $this->string(),
            ],
            $tableOptions
        );

        $this->createIndex('document_type_id', '{{%document}}', ['document_type_id']);
        $this->createIndex('project_id', '{{%document}}', ['project_id']);

        $this->addForeignKey(
            'document_ibfk_1',
            '{{%document}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'document_ibfk_2',
            '{{%document}}',
            ['document_type_id'],
            '{{%document_type}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%document}}');
    }
}
