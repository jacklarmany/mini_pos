<?php

use yii\db\Migration;

class m220714_095838_create_foreign_keys extends Migration
{
    public function safeUp()
    {
        $this->addForeignKey(
            'fk_m_investment_incentive_type_translate_m_investment_incenti1',
            '{{%m_investment_incentive_type_translate}}',
            ['m_investment_incentive_type_id'],
            '{{%m_investment_incentive_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_summary_compliance_monitoring_monitoring1',
            '{{%summary_compliance_monitoring}}',
            ['monitoring_id'],
            '{{%monitoring}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_title_has_monitoring_monitoring1',
            '{{%title_has_monitoring}}',
            ['monitoring_id'],
            '{{%monitoring}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_title_has_monitoring_has_delay_reason_title_has_monitoring1',
            '{{%title_has_monitoring_has_delay_reason}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_user_project1',
            '{{%user}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_user_has_province_user1',
            '{{%user_has_province}}',
            ['user_id'],
            '{{%user}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_company_have_insurace_title_has_monitoring1',
            '{{%m_company_have_insurace}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_compensation_title_has_monitoring1',
            '{{%m_compensation}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_condition_for_employee_title_has_monitoring1',
            '{{%m_condition_for_employee}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_constructed_transmission_line_title_has_monitoring1',
            '{{%m_constructed_transmission_line}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_contractual_contrubution_has_compliance_title_has_monito1',
            '{{%m_contractual_contrubution_has_compliance}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_electricity_by_year_title_has_monitoring1',
            '{{%m_electricity_by_year}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_env_measure_title_has_monitoring1',
            '{{%m_env_measure}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_export_processed_ores_title_has_monitoring1',
            '{{%m_export_processed_ores}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_export_unprocessed_title_has_monitoring1',
            '{{%m_export_unprocessed_ores}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_financial_title_has_monitoring1',
            '{{%m_financial}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_further_measure_title_has_monitoring1',
            '{{%m_further_measure}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_grivevance_title_has_monitoring1',
            '{{%m_grievance}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_has_accident_project_title_has_monitoring1',
            '{{%m_has_accident_project}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_international_standard_title_has_monitoring1',
            '{{%m_international_standard}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_investment_incentive_title_has_monitoring1',
            '{{%m_investment_incentive}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_investment_problem_title_has_monitoring1',
            '{{%m_investment_problem}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_lao_employee_promoted_title_has_monitoring1',
            '{{%m_lao_employee_promoted}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_lao_national_staff_training_title_has_monitoring1',
            '{{%m_lao_national_staff_training}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_mineral_form_outside_title_has_monitoring1',
            '{{%m_mineral_form_outside}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_mineral_processing_title_has_monitoring1',
            '{{%m_mineral_processing}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_non_contractual_contribution_has_compliance_title_has_mo1',
            '{{%m_non_contractual_contribution_has_compliance}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_operation_type_title_has_monitoring1',
            '{{%m_operation_type}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_plan_after_project_ended_title_has_monitoring1',
            '{{%m_plan_after_project_ended}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_processed_ores_in_country_title_has_monitoring1',
            '{{%m_processed_ores_in_country}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_processed_product_agri_title_has_monitoring1',
            '{{%m_processed_product_agri}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_prodduct_contract_farming_title_has_monitoring1',
            '{{%m_prodduct_contract_farming_agri}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_product_title_has_monitoring1',
            '{{%m_product_agri}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_product_energy_start_title_has_monitoring1',
            '{{%m_product_energy_start}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_product_mining_title_has_monitoring1',
            '{{%m_product_mining_start}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_progress_title_has_monitoring1',
            '{{%m_progress_project_operation_agri}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_recommendation_investor_title_has_monitoring1',
            '{{%m_recommendation_investor}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_relocation_host_village_title_has_monitoring1',
            '{{%m_relocation_host_village}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_reserved_budget_project_ended_title_has_monitoring1',
            '{{%m_reserved_budget_project_ended}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_resettlement_people_title_has_monitoring1',
            '{{%m_resettlement_people}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_sale_agri_title_has_monitoring1',
            '{{%m_sale_agri}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_sale_electricity_title_has_monitoring1',
            '{{%m_sale_electricity}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_service_company_doc_title_has_monitoring1',
            '{{%m_service_company_doc}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_total_employee_project_has_compliance_title_has_monitori1',
            '{{%m_total_employee_project_has_compliance}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_unprocessed_in_country_title_has_monitoring1',
            '{{%m_unprocessed_ores_in_country}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_monitoring_import_fund_title_has_monitoring1',
            '{{%monitoring_import_fund}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_study_item_has_title_has_monitoring_title_has_monitoring1',
            '{{%study_item_has_title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_land_survey_title_has_monitoring1',
            '{{%land_survey}}',
            ['title_id', 'monitoring_id'],
            '{{%title_has_monitoring}}',
            ['title_id', 'monitoring_id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_project_user1',
            '{{%project}}',
            ['createdby_user_id'],
            '{{%user}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_project_user2',
            '{{%project}}',
            ['updatedby_user_id'],
            '{{%user}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_project_capital_project1',
            '{{%project_capital}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_project_capital_user1',
            '{{%project_capital}}',
            ['addedby_user_id'],
            '{{%user}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_project_capital_user2',
            '{{%project_capital}}',
            ['editedby_user_id'],
            '{{%user}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'project_location_ibfk_1',
            '{{%project_location}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_project_translate_project1',
            '{{%project_translate}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_time_frame_time_frame1',
            '{{%time_frame}}',
            ['extent_time_frame_id'],
            '{{%time_frame}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'agricultural_activity_ibfk_2',
            '{{%agricultural_activity}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_certificate_oversea_investment_certificate_oversea_investm1',
            '{{%certificate_oversea_investment}}',
            ['extent_certificate_id'],
            '{{%certificate_oversea_investment}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'collateral_ibfk_1',
            '{{%collateral}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'contract_ibfk_1',
            '{{%contract}}',
            ['extended_contract_id'],
            '{{%contract}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'contract_ibfk_3',
            '{{%contract}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'contribution_ibfk_1',
            '{{%contribution}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'control_list_activity_ibfk_1',
            '{{%control_list_activity}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_director_info_project1',
            '{{%director_info}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'document_ibfk_1',
            '{{%document}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'electrical_activity_ibfk_1',
            '{{%electrical_activity}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fund_contribution_ibfk_1',
            '{{%fund_contribution}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'import_policy_ibfk_1',
            '{{%import_policy}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'investment_ibfk_1',
            '{{%investment}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'investment_policy_ibfk_1',
            '{{%investment_policy}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'land_usage_ibfk_1',
            '{{%land_usage}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'mining_activity_ibfk_1',
            '{{%mining_activity}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_monitoring_contract1',
            '{{%monitoring}}',
            ['project_status_contract_id'],
            '{{%contract}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_monitoring_project1',
            '{{%monitoring}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'other_concession_activity_ibfk_1',
            '{{%other_concession_activity}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'parent_company_project_ibfk_2',
            '{{%parent_company_project}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'ppp_activity_ibfk_1',
            '{{%ppp_activity}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_attact_file_monitoring1',
            '{{%m_attact_file}}',
            ['monitoring_id'],
            '{{%monitoring}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_m_attact_file_monitoring1', '{{%m_attact_file}}');
        $this->dropForeignKey('ppp_activity_ibfk_1', '{{%ppp_activity}}');
        $this->dropForeignKey('parent_company_project_ibfk_2', '{{%parent_company_project}}');
        $this->dropForeignKey('other_concession_activity_ibfk_1', '{{%other_concession_activity}}');
        $this->dropForeignKey('fk_monitoring_project1', '{{%monitoring}}');
        $this->dropForeignKey('fk_monitoring_contract1', '{{%monitoring}}');
        $this->dropForeignKey('mining_activity_ibfk_1', '{{%mining_activity}}');
        $this->dropForeignKey('land_usage_ibfk_1', '{{%land_usage}}');
        $this->dropForeignKey('investment_policy_ibfk_1', '{{%investment_policy}}');
        $this->dropForeignKey('investment_ibfk_1', '{{%investment}}');
        $this->dropForeignKey('import_policy_ibfk_1', '{{%import_policy}}');
        $this->dropForeignKey('fund_contribution_ibfk_1', '{{%fund_contribution}}');
        $this->dropForeignKey('electrical_activity_ibfk_1', '{{%electrical_activity}}');
        $this->dropForeignKey('document_ibfk_1', '{{%document}}');
        $this->dropForeignKey('fk_director_info_project1', '{{%director_info}}');
        $this->dropForeignKey('control_list_activity_ibfk_1', '{{%control_list_activity}}');
        $this->dropForeignKey('contribution_ibfk_1', '{{%contribution}}');
        $this->dropForeignKey('contract_ibfk_3', '{{%contract}}');
        $this->dropForeignKey('contract_ibfk_1', '{{%contract}}');
        $this->dropForeignKey('collateral_ibfk_1', '{{%collateral}}');
        $this->dropForeignKey('fk_certificate_oversea_investment_certificate_oversea_investm1', '{{%certificate_oversea_investment}}');
        $this->dropForeignKey('agricultural_activity_ibfk_2', '{{%agricultural_activity}}');
        $this->dropForeignKey('fk_time_frame_time_frame1', '{{%time_frame}}');
        $this->dropForeignKey('fk_project_translate_project1', '{{%project_translate}}');
        $this->dropForeignKey('project_location_ibfk_1', '{{%project_location}}');
        $this->dropForeignKey('fk_project_capital_user2', '{{%project_capital}}');
        $this->dropForeignKey('fk_project_capital_user1', '{{%project_capital}}');
        $this->dropForeignKey('fk_project_capital_project1', '{{%project_capital}}');
        $this->dropForeignKey('fk_project_user2', '{{%project}}');
        $this->dropForeignKey('fk_project_user1', '{{%project}}');
        $this->dropForeignKey('fk_land_survey_title_has_monitoring1', '{{%land_survey}}');
        $this->dropForeignKey('fk_study_item_has_title_has_monitoring_title_has_monitoring1', '{{%study_item_has_title_has_monitoring}}');
        $this->dropForeignKey('fk_monitoring_import_fund_title_has_monitoring1', '{{%monitoring_import_fund}}');
        $this->dropForeignKey('fk_m_unprocessed_in_country_title_has_monitoring1', '{{%m_unprocessed_ores_in_country}}');
        $this->dropForeignKey('fk_m_total_employee_project_has_compliance_title_has_monitori1', '{{%m_total_employee_project_has_compliance}}');
        $this->dropForeignKey('fk_m_service_company_doc_title_has_monitoring1', '{{%m_service_company_doc}}');
        $this->dropForeignKey('fk_m_sale_electricity_title_has_monitoring1', '{{%m_sale_electricity}}');
        $this->dropForeignKey('fk_m_sale_agri_title_has_monitoring1', '{{%m_sale_agri}}');
        $this->dropForeignKey('fk_m_resettlement_people_title_has_monitoring1', '{{%m_resettlement_people}}');
        $this->dropForeignKey('fk_m_reserved_budget_project_ended_title_has_monitoring1', '{{%m_reserved_budget_project_ended}}');
        $this->dropForeignKey('fk_relocation_host_village_title_has_monitoring1', '{{%m_relocation_host_village}}');
        $this->dropForeignKey('fk_m_recommendation_investor_title_has_monitoring1', '{{%m_recommendation_investor}}');
        $this->dropForeignKey('fk_progress_title_has_monitoring1', '{{%m_progress_project_operation_agri}}');
        $this->dropForeignKey('fk_product_mining_title_has_monitoring1', '{{%m_product_mining_start}}');
        $this->dropForeignKey('fk_m_product_energy_start_title_has_monitoring1', '{{%m_product_energy_start}}');
        $this->dropForeignKey('fk_product_title_has_monitoring1', '{{%m_product_agri}}');
        $this->dropForeignKey('fk_prodduct_contract_farming_title_has_monitoring1', '{{%m_prodduct_contract_farming_agri}}');
        $this->dropForeignKey('fk_m_processed_product_agri_title_has_monitoring1', '{{%m_processed_product_agri}}');
        $this->dropForeignKey('fk_m_processed_ores_in_country_title_has_monitoring1', '{{%m_processed_ores_in_country}}');
        $this->dropForeignKey('fk_m_plan_after_project_ended_title_has_monitoring1', '{{%m_plan_after_project_ended}}');
        $this->dropForeignKey('fk_operation_type_title_has_monitoring1', '{{%m_operation_type}}');
        $this->dropForeignKey('fk_m_non_contractual_contribution_has_compliance_title_has_mo1', '{{%m_non_contractual_contribution_has_compliance}}');
        $this->dropForeignKey('fk_m_mineral_processing_title_has_monitoring1', '{{%m_mineral_processing}}');
        $this->dropForeignKey('fk_m_mineral_form_outside_title_has_monitoring1', '{{%m_mineral_form_outside}}');
        $this->dropForeignKey('fk_m_lao_national_staff_training_title_has_monitoring1', '{{%m_lao_national_staff_training}}');
        $this->dropForeignKey('fk_m_lao_employee_promoted_title_has_monitoring1', '{{%m_lao_employee_promoted}}');
        $this->dropForeignKey('fk_m_investment_problem_title_has_monitoring1', '{{%m_investment_problem}}');
        $this->dropForeignKey('fk_m_investment_incentive_title_has_monitoring1', '{{%m_investment_incentive}}');
        $this->dropForeignKey('fk_international_standard_title_has_monitoring1', '{{%m_international_standard}}');
        $this->dropForeignKey('fk_m_has_accident_project_title_has_monitoring1', '{{%m_has_accident_project}}');
        $this->dropForeignKey('fk_m_grivevance_title_has_monitoring1', '{{%m_grievance}}');
        $this->dropForeignKey('fk_m_further_measure_title_has_monitoring1', '{{%m_further_measure}}');
        $this->dropForeignKey('fk_m_financial_title_has_monitoring1', '{{%m_financial}}');
        $this->dropForeignKey('fk_m_export_unprocessed_title_has_monitoring1', '{{%m_export_unprocessed_ores}}');
        $this->dropForeignKey('fk_m_export_processed_ores_title_has_monitoring1', '{{%m_export_processed_ores}}');
        $this->dropForeignKey('fk_m_env_measure_title_has_monitoring1', '{{%m_env_measure}}');
        $this->dropForeignKey('fk_m_electricity_by_year_title_has_monitoring1', '{{%m_electricity_by_year}}');
        $this->dropForeignKey('fk_m_contractual_contrubution_has_compliance_title_has_monito1', '{{%m_contractual_contrubution_has_compliance}}');
        $this->dropForeignKey('fk_m_constructed_transmission_line_title_has_monitoring1', '{{%m_constructed_transmission_line}}');
        $this->dropForeignKey('fk_m_condition_for_employee_title_has_monitoring1', '{{%m_condition_for_employee}}');
        $this->dropForeignKey('fk_m_compensation_title_has_monitoring1', '{{%m_compensation}}');
        $this->dropForeignKey('fk_m_company_have_insurace_title_has_monitoring1', '{{%m_company_have_insurace}}');
        $this->dropForeignKey('fk_user_has_province_user1', '{{%user_has_province}}');
        $this->dropForeignKey('fk_user_project1', '{{%user}}');
        $this->dropForeignKey('fk_title_has_monitoring_has_delay_reason_title_has_monitoring1', '{{%title_has_monitoring_has_delay_reason}}');
        $this->dropForeignKey('fk_title_has_monitoring_monitoring1', '{{%title_has_monitoring}}');
        $this->dropForeignKey('fk_summary_compliance_monitoring_monitoring1', '{{%summary_compliance_monitoring}}');
        $this->dropForeignKey('fk_m_investment_incentive_type_translate_m_investment_incenti1', '{{%m_investment_incentive_type_translate}}');
    }
}
