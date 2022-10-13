<?php

use yii\db\Migration;

class m220714_095645_create_table_contract_type extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%contract_type}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'name' => $this->string()->notNull()->comment('Contract type name'),
                'priority' => $this->integer()->comment('Priority number'),
                'sector_id' => $this->integer()->notNull()->comment('Sector ID is foreign key from relation table sector'),
                'notification' => $this->tinyInteger()->defaultValue('0')->comment('Notification is this contract type has notify or not.?'),
                'set_day_expire_notification' => $this->integer()->comment('Set day notification nearest expiry '),
                'has_monitoring' => $this->string()->comment('This contract type use for monitoring or not.?'),
                'section_monitoring' => $this->string()->comment('This contract type use for monitoring section'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_contract_type_sector1_idx', '{{%contract_type}}', ['sector_id']);

        $this->addForeignKey(
            'fk_contract_type_sector1',
            '{{%contract_type}}',
            ['sector_id'],
            '{{%sector}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%contract_type}}');
    }
}
