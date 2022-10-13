<?php

use yii\db\Migration;

class m220107_074723_create_table_investment_policy extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%investment_policy}}',
            [
                'id' => $this->primaryKey()->comment('ລະຫັດ'),
                'project_id' => $this->integer()->notNull()->comment('ລະຫັດໂຄງການ'),
                'policy_id' => $this->integer()->notNull()->comment('ລະຫັດນະໂຍບາຍ'),
                'started_at' => $this->dateTime()->notNull()->comment('ວັນທີເລີ່ມ'),
                'ended_at' => $this->dateTime()->notNull()->comment('ວັນທີສິ້ນສຸດ'),
                'percent' => $this->decimal(12, 2)->comment('This filed use only in project Hydro'),
            ],
            $tableOptions
        );

        $this->createIndex('policy_id', '{{%investment_policy}}', ['policy_id']);
        $this->createIndex('project_id', '{{%investment_policy}}', ['project_id']);

        $this->addForeignKey(
            'investment_policy_ibfk_1',
            '{{%investment_policy}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'investment_policy_ibfk_2',
            '{{%investment_policy}}',
            ['policy_id'],
            '{{%policy}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%investment_policy}}');
    }
}
