<?php

use yii\db\Migration;

class m220714_095817_create_table_contract extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%contract}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'number_code' => $this->string()->comment('Number code is number of contract'),
                'project_id' => $this->integer()->notNull()->comment('Project ID is foreign keys from relation  table project'),
                'extended_contract_id' => $this->integer()->comment('Extended contract ID is foreign key from previous contract'),
                'contract_type_id' => $this->integer()->notNull()->comment('Contract type ID is foreign keys from relation contract type'),
                'start_at' => $this->date()->notNull()->comment('Contract date start'),
                'end_at' => $this->date()->comment('Contract date end'),
                'attach_file' => $this->string()->comment('Attach document relation contract'),
                'extent_times' => $this->integer()->comment('Times extent contract'),
                'date_issue' => $this->date()->comment('Contract date issue'),
                'set_day_notification' => $this->integer()->comment('Set the day when the contract nearest expiry notification'),
            ],
            $tableOptions
        );

        $this->createIndex('contract_type_id', '{{%contract}}', ['contract_type_id']);
        $this->createIndex('extended_contract_id', '{{%contract}}', ['extended_contract_id'], true);
        $this->createIndex('project_id', '{{%contract}}', ['project_id']);

        $this->addForeignKey(
            'contract_ibfk_2',
            '{{%contract}}',
            ['contract_type_id'],
            '{{%contract_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%contract}}');
    }
}
