<?php

use yii\db\Migration;

class m220107_074725_create_table_mining_activity extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%mining_activity}}',
            [
                'id' => $this->primaryKey()->comment('ລະຫັດ'),
                'export' => $this->tinyInteger()->defaultValue('1')->comment('ຂະຫຍາຍອອກ'),
                'processing' => $this->tinyInteger()->defaultValue('1')->comment('ກຳລັງດຳເນີນງານ'),
                'mining_started_at' => $this->string(45)->notNull()->comment('ວັນທີເລີ່ມຂຸດຄົ້ນແຮ່ທາດ'),
                'project_id' => $this->integer()->notNull()->comment('ລະຫັດໂຄງການ'),
                'mineral_id' => $this->integer()->notNull()->comment('ລະຫັດແຮ່ທາດ'),
                'mining_type_id' => $this->integer()->notNull()->comment('ລະຫັດປະເພດການຂຸດຄົ້ນ'),
            ],
            $tableOptions
        );

        $this->createIndex('minerals_id', '{{%mining_activity}}', ['mineral_id']);
        $this->createIndex('mining_types_id', '{{%mining_activity}}', ['mining_type_id']);
        $this->createIndex('projects_id', '{{%mining_activity}}', ['project_id']);

        $this->addForeignKey(
            'mining_activity_ibfk_1',
            '{{%mining_activity}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'mining_activity_ibfk_2',
            '{{%mining_activity}}',
            ['mineral_id'],
            '{{%mineral}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'mining_activity_ibfk_3',
            '{{%mining_activity}}',
            ['mining_type_id'],
            '{{%mining_type}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%mining_activity}}');
    }
}
