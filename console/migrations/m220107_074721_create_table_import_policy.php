<?php

use yii\db\Migration;

class m220107_074721_create_table_import_policy extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%import_policy}}',
            [
                'id' => $this->primaryKey()->comment('ລະຫັດ'),
                'project_id' => $this->integer()->notNull()->comment('ລະຫັດໂຄງການ'),
                'number' => $this->string()->notNull()->comment('ເລກທີ'),
                'date' => $this->date()->notNull()->comment('ວັນທີ'),
                'amount' => $this->decimal(10, 2)->notNull()->comment('ມູນຄ່າ'),
                'attach_file' => $this->string(45),
            ],
            $tableOptions
        );

        $this->createIndex('project_id', '{{%import_policy}}', ['project_id']);

        $this->addForeignKey(
            'import_policy_ibfk_1',
            '{{%import_policy}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%import_policy}}');
    }
}
