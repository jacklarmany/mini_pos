<?php
return [
    /* ==== For Monitoring =====*/
    'adminEmail' => 'web@cyberia.la',
    'systemSender' => 'smtp4test@cyberia.la',
    'SystemName' => 'IPD Database',
    'bsDependencyEnabled' => false,
    'bsVersion' => '4.x',
    'country_lao_id' => 84,# id get from table country
    'agricultural_id' => 1, # id get from table sector
    'hydropower_id' => 3, # id get from table sector
    'mining_id' => 2, # id get from table sector
    'other_concession_id' => 4, # id get from table sector
    'ppp_id' => 5, # id get from table sector
    'control_list_id' => 6, # id get from table sector
    'business_share_capital' => 5, # ID get from table investment type
    'project_value_id' => 1, # ID get from table project_capital_type
    'project_total_capital_id' => 2, # ID get from table project_capital_type
    'project_registered_capital_id' => 3, # ID get from table project_capital_type
    'has_notification' => 1, # FROM TABLE CONTRACT TYPE

    /* ===== For Contract Type =====*/
    'bodBunThuekKhuamKhaoJaiA' => 1,  /// THE ID FROM TBL CONTRACT_TYPE SECTOR_ID 1
    'sunySampatharnA' => 2,  /// THE ID FROM TBL CONTRACT_TYPE SECTOR_ID 1

    'bodBunThuekKhuamKhaoJaiM' => 29, /// THE ID FROM TBL CONTRACT_TYPE SECTOR_ID 2
    'sunyaSorkKhonLaeSamLuadM' => 6, /// THE ID FROM TBL CONTRACT_TYPE SECTOR_ID 2
    'sunyaKhoudKhnLaePoungTaengM' => 9,  /// THE ID FROM TBL CONTRACT_TYPE SECTOR_ID 2
    'sunyaSorkKhonSamluadLaeKhoudKhonM' => 30,  /// THE ID FROM TBL CONTRACT_TYPE SECTOR_ID 2

    'sunyaPhatthanaKhongKanH' => 4, /// THE ID FROM TBL CONTRACT_TYPE SECTOR_ID 3
    'bodBunThuekKhuamKhaoJaiH' => 3,  /// THE ID FROM TBL CONTRACT_TYPE SECTOR_ID 3
    'sunyaSumpaTharnH' => 5, /// THE ID FROM TBL CONTRACT_TYPE SECTOR_ID 3

    'sunyaSumpaTharnO' => 13, /// THE ID FROM TBL CONTRACT_TYPE SECTOR_ID 4
    'bodBunThuekKhuamKhaoJaiO' => 12, /// THE ID FROM TBL CONTRACT_TYPE SECTOR_ID 4
    'sunySampatharnO' => 13, /// THE ID FROM TBL CONTRACT_TYPE SECTOR_ID 4

    'bodBunThuekKhuamKhaoJaiP' => 16, /// THE ID FROM TBL CONTRACT_TYPE SECTOR_ID 5
    'sunySampatharnP' => 17, /// THE ID FROM TBL CONTRACT_TYPE SECTOR_ID 5


    /* ==== For Monitoring =====*/
    /* ========= Agricultural section I ============= */
    'm_completed_delay_agri_I' => 1,
    'm_status_study_agri_I' => 2,
    'm_land_survey_agri_I' => 3,
    'm_importing_fund_agri_I' => 4,
    'm_project_contribution_agri_I' => 5,

    /* ========= Energy section I ============= */
    'm_completed_delay_energy_I' => 36,
    'm_status_study_energy_I' => 37,
    'm_importing_fund_energy_I' => 38,
    'm_project_contribution_energy_I' => 39,

    /* ========= Mining section I ============= */
    'm_completed_delay_mining_I' => 19,
    'm_status_study_mining_I' => 20,
    'm_importing_fund_mining_I' => 21,
    'm_project_contribution_mining_I' => 22,

    /* ========= Other Conception section I ============= */
    'm_completed_delay_other_I' => 67,
    'm_status_study_other_I' => 68,
    'm_importing_fund_other_I' => 69,
    'm_project_contribution_other_I' => 70,

    /* ========= PPP section I ============= */
    'm_completed_delay_ppp_I' => 52,
    'm_status_study_ppp_I' => 53,
    'm_importing_fund_ppp_I' => 54,
    'm_project_contribution_ppp_I' => 55,



    /* ========= FROM TABLE "STUDY ITEM" USE IN REPORT ============ */
    /* ========= AGRICULTURAL SECTION ============ */
    'm_KanSumLuadTDin' => 1,
    'm_BodSuekSaPhnKaTopThangSinWadLom' => 2,
    'm_BodViPhakSedThaKitTekniq' => 3,

    /* ========= MINING SECTION ============ */
    'm_KanSorkKhon' => 4,
    'm_KanSumLuad' => 5,
    'm_BodSuekSaPhnKaTopThangSinWadLomm' => 7,
    'm_BodViPhakSedThaKitTekniqm' => 6,

    /* ========= HYDRO POWER SECTION ============ */
    'm_KanSumLuadTDinH' => 8,
    'm_BodSuekSaPhnKaTopThangSinWadLomH' => 9,
    'm_BodViPhakSedThaKitTekniqH' => 10,
    'm_sunYaPhatthanakhongkanH' => 11,
    'm_sunYaSuekhaiyfaifaH' => 12,

    /* ========= OTHER CONCESSION SECTION ============ */
    'm_KanSumLuadTDinO' => 16,
    'm_BodSuekSaPhnKaTopThangSinWadLomO' => 17,
    'm_BodViPhakSedThaKitTekniqO' => 18,

    /* ========= PPP SECTION ============ */
    'm_KanSumLuadTDinP' => 13,
    'm_BodSuekSaPhnKaTopThangSinWadLomP' => 14,
    'm_BodViPhakSedThaKitTekniqP' => 15,


    /* ========= FROM TABLE "STUDY ITEM STATUS" USE IN MONITORING REPORT ============ */
    'm_klttkkh' => 3, ///ກໍາລັງທົບທວນແກ້ໄຂ
    'm_klss' => 1, ///ກຳລັງສຶກສາ
    'm_kljlj' => 5, ///ກຳລັງເຈລະຈາ
    'm_sl' => 2, ///ສຳເລັດ
    'm_hh' => 4, ///ຮັບຮອງ



    /*============== Agricultural section II ===============*/
    'm_section2' => [
        'title_agri_1' => 6,
        'title_agri_2' => 7,
        'title_agri_3' => 8,
        'title_agri_4' => 9,
        'title_agri_5' => 10,
        'title_agri_6' => 11,
        'title_agri_7' => 12,
        'title_agri_8' => 13,
        'title_agri_9' => 14,
        'title_agri_10' => 15,
        'title_agri_11' => 16,
        'title_agri_12' => 17,
        'title_agri_13' => 18,

        'title_mining_1' => 23,
        'title_mining_2' => 24,
        'title_mining_3' => 25,
        'title_mining_4' => 26,
        'title_mining_5' => 27,
        'title_mining_6' => 28,
        'title_mining_7' => 29,
        'title_mining_8' => 30,
        'title_mining_9' => 31,
        'title_mining_10' => 32,
        'title_mining_11' => 33,
        'title_mining_12' => 34,
        'title_mining_13' => 35,

        'title_energy_1' => 40,
        'title_energy_2' => 41,
        'title_energy_3' => 42,
        'title_energy_4' => 43,
        'title_energy_5' => 44,
        'title_energy_6' => 45,
        'title_energy_7' => 46,
        'title_energy_8' => 47,
        'title_energy_9' => 48,
        'title_energy_10' => 49,
        'title_energy_11' => 50,
        'title_energy_12' => 51,

        'title_other_concession_1' => 71,
        'title_other_concession_2' => 72,
        'title_other_concession_3' => 73,
        'title_other_concession_4' => 74,
        'title_other_concession_5' => 75,
        'title_other_concession_6' => 76,
        'title_other_concession_7' => 77,
        'title_other_concession_8' => 78,
        'title_other_concession_9' => 79,
        'title_other_concession_10' => 80,

        'title_ppp_1' => 57,
        'title_ppp_2' => 58,
        'title_ppp_3' => 59,
        'title_ppp_4' => 60,
        'title_ppp_5' => 61,
        'title_ppp_6' => 62,
        'title_ppp_7' => 63,
        'title_ppp_8' => 64,
        'title_ppp_9' => 65,
        'title_ppp_10' => 66,
    ],


];
