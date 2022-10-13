<?php

use yii\db\Migration;

class m220714_095649_create_table_district extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%district}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'code' => $this->string(45)->comment('District code'),
                'name' => $this->string()->notNull()->comment('District name'),
                'province_id' => $this->integer()->notNull()->comment('Province ID is foreign keys from relation table province'),
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
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%district}}');
    }
}
