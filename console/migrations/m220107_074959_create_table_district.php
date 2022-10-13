<?php

use yii\db\Migration;

class m220107_074959_create_table_district extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%district}}',
            [
                'id' => $this->primaryKey()->comment('ລະຫັດ'),
                'code' => $this->string(45)->comment('ລະຫັດເມືອງ'),
                'name' => $this->string()->notNull()->comment('ຊື່ເມືອງ'),
                'province_id' => $this->integer()->notNull()->comment('ລະຫັດແຂວງ'),
            ],
            $tableOptions
        );

        $this->createIndex('provinces_id', '{{%district}}', ['province_id']);

        $this->addForeignKey(
            'district_ibfk_1',
            '{{%district}}',
            ['province_id'],
            '{{%province}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%district}}');
    }
}
