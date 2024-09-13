<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateClientsSummarytable1View extends Migration
{
    public function up()
    {
        DB::statement("
            CREATE VIEW clients_summary AS
            SELECT
                CASE
                    WHEN client_category IN ('SENIOR CITIZENS', 'SENIOR CITIZENS (NO SUBCATEGORIES)') THEN 'SENIOR CITIZENS'
                    ELSE client_category
                END AS client_category_combined,
                sex,
                SUM(CASE
                        WHEN client_category IN ('FAMILY HEADS AND OTHER NEEDY ADULT') AND age BETWEEN 18 AND 29 THEN amount1
                        ELSE 0
                    END) AS total_amount_fh_na_18_29,
                SUM(CASE
                        WHEN client_category IN ('FAMILY HEADS AND OTHER NEEDY ADULT') AND age BETWEEN 30 AND 44 THEN amount1
                        ELSE 0
                    END) AS total_amount_fh_na_30_44,
                SUM(CASE
                        WHEN client_category IN ('FAMILY HEADS AND OTHER NEEDY ADULT') AND age BETWEEN 45 AND 59 THEN amount1
                        ELSE 0
                    END) AS total_amount_fh_na_45_59,
                SUM(CASE
                        WHEN client_category IN ('SENIOR CITIZENS', 'SENIOR CITIZENS (NO SUBCATEGORIES)') AND age BETWEEN 60 AND 70 THEN amount1
                        ELSE 0
                    END) AS total_amount_sc_60_70,
                SUM(CASE
                        WHEN client_category IN ('SENIOR CITIZENS', 'SENIOR CITIZENS (NO SUBCATEGORIES)') AND age BETWEEN 71 AND 79 THEN amount1
                        ELSE 0
                    END) AS total_amount_sc_71_79,
                SUM(CASE
                        WHEN client_category IN ('SENIOR CITIZENS', 'SENIOR CITIZENS (NO SUBCATEGORIES)') AND age >= 80 THEN amount1
                        ELSE 0
                    END) AS total_amount_sc_80_above,
                SUM(CASE
                        WHEN client_category IN ('MEN/WOMEN IN SPECIALLY DIFFICULT CIRCUMSTANCES') AND age BETWEEN 18 AND 29 THEN amount1
                        ELSE 0
                    END) AS total_amount_md_18_29,
                SUM(CASE
                        WHEN client_category IN ('MEN/WOMEN IN SPECIALLY DIFFICULT CIRCUMSTANCES') AND age BETWEEN 30 AND 44 THEN amount1
                        ELSE 0
                    END) AS total_amount_md_30_44,
                SUM(CASE
                        WHEN client_category IN ('MEN/WOMEN IN SPECIALLY DIFFICULT CIRCUMSTANCES') AND age BETWEEN 45 AND 59 THEN amount1
                        ELSE 0
                    END) AS total_amount_md_45_59,
                SUM(CASE
                        WHEN client_category IN ('Children in Need of Special Protection') AND age BETWEEN 0 AND 13 THEN amount1
                        ELSE 0
                    END) AS total_amount_csp_0_13,
                SUM(CASE
                        WHEN client_category IN ('Children in Need of Special Protection') AND age BETWEEN 14 AND 17 THEN amount1
                        ELSE 0
                    END) AS total_amount_csp_14_17,
                SUM(CASE
                        WHEN client_category IN ('YOUTH') AND age BETWEEN 18 AND 30 THEN amount1
                        ELSE 0
                    END) AS total_amount_youth_18_30,
                SUM(CASE
                        WHEN client_category IN ('PERSONS WITH DISABILITIES') AND age BETWEEN 0 AND 13 THEN amount1
                        ELSE 0
                    END) AS total_amount_pwd_0_13,
                SUM(CASE
                        WHEN client_category IN ('PERSONS WITH DISABILITIES') AND age BETWEEN 14 AND 17 THEN amount1
                        ELSE 0
                    END) AS total_amount_pwd_14_17,
                SUM(CASE
                        WHEN client_category IN ('PERSONS WITH DISABILITIES') AND age BETWEEN 18 AND 29 THEN amount1
                        ELSE 0
                    END) AS total_amount_pwd_18_29,
                SUM(CASE
                        WHEN client_category IN ('PERSONS WITH DISABILITIES') AND age BETWEEN 30 AND 44 THEN amount1
                        ELSE 0
                    END) AS total_amount_pwd_30_44,
                SUM(CASE
                        WHEN client_category IN ('PERSONS WITH DISABILITIES') AND age BETWEEN 45 AND 59 THEN amount1
                        ELSE 0
                    END) AS total_amount_pwd_45_59,
                SUM(CASE
                        WHEN client_category IN ('PERSONS WITH DISABILITIES') AND age BETWEEN 60 AND 70 THEN amount1
                        ELSE 0
                    END) AS total_amount_pwd_60_70,
                SUM(CASE
                        WHEN client_category IN ('PERSONS WITH DISABILITIES') AND age BETWEEN 71 AND 79 THEN amount1
                        ELSE 0
                    END) AS total_amount_pwd_71_79,
                SUM(CASE
                        WHEN client_category IN ('PERSONS WITH DISABILITIES') AND age >= 80 THEN amount1
                        ELSE 0
                    END) AS total_amount_pwd_80_above,
                SUM(CASE
                        WHEN client_category IN ('Persons Living with HIV-AIDS') AND age BETWEEN 0 AND 13 THEN amount1
                        ELSE 0
                    END) AS total_amount_plwha_0_13,
                SUM(CASE
                        WHEN client_category IN ('Persons Living with HIV-AIDS') AND age BETWEEN 14 AND 17 THEN amount1
                        ELSE 0
                    END) AS total_amount_plwha_14_17,
                SUM(CASE
                        WHEN client_category IN ('Persons Living with HIV-AIDS') AND age BETWEEN 18 AND 29 THEN amount1
                        ELSE 0
                    END) AS total_amount_plwha_18_29,
                SUM(CASE
                        WHEN client_category IN ('Persons Living with HIV-AIDS') AND age BETWEEN 30 AND 44 THEN amount1
                        ELSE 0
                    END) AS total_amount_plwha_30_44,
                SUM(CASE
                        WHEN client_category IN ('Persons Living with HIV-AIDS') AND age BETWEEN 45 AND 59 THEN amount1
                        ELSE 0
                    END) AS total_amount_plwha_45_59,
                SUM(CASE
                        WHEN client_category IN ('Persons Living with HIV-AIDS') AND age BETWEEN 60 AND 70 THEN amount1
                        ELSE 0
                    END) AS total_amount_plwha_60_70,
                SUM(CASE
                        WHEN client_category IN ('Persons Living with HIV-AIDS') AND age BETWEEN 71 AND 79 THEN amount1
                        ELSE 0
                    END) AS total_amount_plwha_71_79,
                SUM(CASE
                        WHEN client_category IN ('Persons Living with HIV-AIDS') AND age >= 80 THEN amount1
                        ELSE 0
                    END) AS total_amount_plwha_80_above
            FROM clients
            WHERE client_category NOT LIKE 'SENIOR CITIZENS (NO SUBCATEGORIES)'
            GROUP BY client_category_combined, sex,
                     CASE
                         WHEN age BETWEEN 18 AND 29 THEN '18-29'
                         WHEN age BETWEEN 30 AND 44 THEN '30-44'
                         WHEN age BETWEEN 45 AND 59 THEN '45-59'
                         WHEN age BETWEEN 60 AND 70 THEN '60-70'
                         WHEN age BETWEEN 71 AND 79 THEN '71-79'
                         WHEN age >= 80 THEN '80+'
                         WHEN age BETWEEN 0 AND 13 THEN '0-13'
                         WHEN age BETWEEN 14 AND 17 THEN '14-17'
                         WHEN age BETWEEN 18 AND 30 THEN '18-30'
                         ELSE 'Unknown'
                     END
        ");
    }

    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS clients_summary');
    }
}
