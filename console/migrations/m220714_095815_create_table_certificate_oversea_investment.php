<?php

use yii\db\Migration;

class m220714_095815_create_table_certificate_oversea_investment extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%certificate_oversea_investment}}',
            [
                'id' => $this->primaryKey()->comment('Auto Increment ID'),
                'number_code' => $this->string()->notNull()->comment('Number code'),
                'date_issue' => $this->date()->notNull()->comment('Issue date'),
                'attach_file' => $this->string()->comment('Upload document relation'),
                'extent_certificate_id' => $this->integer()->comment('Extent certificate Relation old certificate '),
                'oversea_investment_id' => $this->integer()->notNull()->comment('oversea investment ID'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_certificate_oversea_investment_certificate_oversea_inves_idx', '{{%certificate_oversea_investment}}', ['extent_certificate_id']);
        $this->createIndex('fk_certificate_oversea_investment_oversea_investment1_idx', '{{%certificate_oversea_investment}}', ['oversea_investment_id']);

        $this->addForeignKey(
            'fk_certificate_oversea_investment_oversea_investment1',
            '{{%certificate_oversea_investment}}',
            ['oversea_investment_id'],
            '{{%oversea_investment}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%certificate_oversea_investment}}');
    }
}
