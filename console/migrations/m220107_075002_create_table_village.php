<?php

use yii\db\Migration;

class m220107_075002_create_table_village extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%village}}',
            [
                'id' => $this->primaryKey()->comment('ລະຫັດ'),
                'code' => $this->string(45)->comment('ລະຫັດບ້ານ'),
                'name' => $this->string(45)->notNull()->comment('ຊື່ບ້ານ'),
                'province_id' => $this->integer()->notNull()->comment('ລະຫັດແຂວງ'),
                'district_id' => $this->integer()->notNull()->comment('ລະຫັດເມືອງ'),
            ],
            $tableOptions
        );

        $this->createIndex('districts_id', '{{%village}}', ['district_id']);
        $this->createIndex('provinces_id', '{{%village}}', ['province_id']);

        $this->addForeignKey(
            'village_ibfk_1',
            '{{%village}}',
            ['province_id'],
            '{{%province}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'village_ibfk_2',
            '{{%village}}',
            ['district_id'],
            '{{%district}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%village}}');
    }
}
