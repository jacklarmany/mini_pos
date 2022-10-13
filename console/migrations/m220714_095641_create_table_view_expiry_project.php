<?php

use yii\db\Migration;

class m220714_095641_create_table_view_expiry_project extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%view_expiry_project}}',
            [
                'number_code' => $this->string()->comment('Number code is number of contract'),
                'project_id' => $this->integer()->notNull()->comment('Project ID is foreign keys from relation  table project'),
                'contract_type_id' => $this->integer()->notNull()->comment('Contract type ID is foreign keys from relation contract type'),
                'start_at' => $this->date()->notNull()->comment('Contract date start'),
                'end_at' => $this->date()->comment('Contract date end'),
                'sector_id' => $this->integer()->notNull(),
                'status' => $this->string(14)->notNull()->defaultValue(''),
                'set_day_notification' => $this->integer()->comment('Set the day when the contract nearest expiry notification'),
                'remaining_days' => $this->integer(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%view_expiry_project}}');
    }
}
