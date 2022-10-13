<?php

use yii\db\Migration;

class m220714_095726_create_table_m_prodduct_contract_farming_agri extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_prodduct_contract_farming_agri}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'product_farming' => $this->tinyInteger()->comment('Product farming'),
                'area_ht' => $this->string(45)->comment('Area hectar'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table monitoring'),
                'contract_2_3' => $this->tinyInteger()->comment('Contract 2+3'),
                'number_contract_2_3' => $this->integer()->comment('Number contract 2+3'),
                'contract_4_1' => $this->tinyInteger()->comment('Contract 4+1'),
                'number_contract_4_1' => $this->integer()->comment('Number contract 4+1'),
                'purchase_only' => $this->tinyInteger()->comment('Purchase only'),
                'number_purchase_only' => $this->integer()->comment('Number purchase only'),
                'compliance_id' => $this->integer()->unsigned()->comment('is foreign keys from  relation table compliance'),
                'ref_document' => $this->tinyInteger()->comment('Reference document'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_prodduct_contract_farming_compliance1_idx', '{{%m_prodduct_contract_farming_agri}}', ['compliance_id']);
        $this->createIndex('fk_prodduct_contract_farming_title_has_monitoring1_idx', '{{%m_prodduct_contract_farming_agri}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_prodduct_contract_farming_compliance1',
            '{{%m_prodduct_contract_farming_agri}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_prodduct_contract_farming_agri}}');
    }
}
