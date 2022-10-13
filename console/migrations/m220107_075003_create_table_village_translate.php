<?php

use yii\db\Migration;

class m220107_075003_create_table_village_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%village_translate}}',
            [
                'id' => $this->primaryKey(),
                'language' => $this->string(45)->notNull(),
                'name' => $this->string(45)->notNull()->comment('ຊື່ບ້ານພາສາອັງກິດ'),
                'village_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('village_id', '{{%village_translate}}', ['village_id']);

        $this->addForeignKey(
            'village_translate_ibfk_1',
            '{{%village_translate}}',
            ['village_id'],
            '{{%village}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%village_translate}}');
    }
}
