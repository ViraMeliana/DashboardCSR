<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'risk_create',
            ],
            [
                'id'    => 18,
                'title' => 'risk_edit',
            ],
            [
                'id'    => 19,
                'title' => 'risk_show',
            ],
            [
                'id'    => 20,
                'title' => 'risk_delete',
            ],
            [
                'id'    => 21,
                'title' => 'risk_access',
            ],
            [
                'id'    => 22,
                'title' => 'atp_process_create',
            ],
            [
                'id'    => 23,
                'title' => 'atp_process_edit',
            ],
            [
                'id'    => 24,
                'title' => 'atp_process_show',
            ],
            [
                'id'    => 25,
                'title' => 'atp_process_delete',
            ],
            [
                'id'    => 26,
                'title' => 'atp_process_access',
            ],
            [
                'id'    => 27,
                'title' => 'business_partner_create',
            ],
            [
                'id'    => 28,
                'title' => 'business_partner_edit',
            ],
            [
                'id'    => 29,
                'title' => 'business_partner_delete',
            ],
            [
                'id'    => 30,
                'title' => 'business_partner_access',
            ],
            [
                'id'    => 31,
                'title' => 'business_partner_identification_create',
            ],
            [
                'id'    => 32,
                'title' => 'business_partner_identification_edit',
            ],
            [
                'id'    => 33,
                'title' => 'business_partner_identification_show',
            ],
            [
                'id'    => 34,
                'title' => 'business_partner_identification_delete',
            ],
            [
                'id'    => 35,
                'title' => 'business_partner_identification_access',
            ],
            [
                'id'    => 36,
                'title' => 'bribery_risk_assesment_create',
            ],
            [
                'id'    => 37,
                'title' => 'bribery_risk_assesment_edit',
            ],
            [
                'id'    => 38,
                'title' => 'bribery_risk_assesment_show',
            ],
            [
                'id'    => 39,
                'title' => 'bribery_risk_assesment_delete',
            ],
            [
                'id'    => 40,
                'title' => 'bribery_risk_assesment_access',
            ],
            [
                'id'    => 41,
                'title' => 'position_create',
            ],
            [
                'id'    => 42,
                'title' => 'position_edit',
            ],
            [
                'id'    => 43,
                'title' => 'position_delete',
            ],
            [
                'id'    => 44,
                'title' => 'position_access',
            ],
            [
                'id'    => 45,
                'title' => 'risk_mitigation_monitoring_create',
            ],
            [
                'id'    => 46,
                'title' => 'risk_mitigation_monitoring_edit',
            ],
            [
                'id'    => 47,
                'title' => 'risk_mitigation_monitoring_show',
            ],
            [
                'id'    => 48,
                'title' => 'risk_mitigation_monitoring_delete',
            ],
            [
                'id'    => 49,
                'title' => 'risk_mitigation_monitoring_access',
            ],
            [
                'id'    => 50,
                'title' => 'resource_create',
            ],
            [
                'id'    => 51,
                'title' => 'resource_edit',
            ],
            [
                'id'    => 52,
                'title' => 'resource_delete',
            ],
            [
                'id'    => 53,
                'title' => 'resource_access',
            ],
            [
                'id'    => 54,
                'title' => 'job_create',
            ],
            [
                'id'    => 55,
                'title' => 'job_edit',
            ],
            [
                'id'    => 56,
                'title' => 'job_delete',
            ],
            [
                'id'    => 57,
                'title' => 'job_access',
            ],
            [
                'id'    => 58,
                'title' => 'human_resource_create',
            ],
            [
                'id'    => 59,
                'title' => 'human_resource_edit',
            ],
            [
                'id'    => 60,
                'title' => 'human_resource_show',
            ],
            [
                'id'    => 61,
                'title' => 'human_resource_delete',
            ],
            [
                'id'    => 62,
                'title' => 'human_resource_access',
            ],
            [
                'id'    => 63,
                'title' => 'method_create',
            ],
            [
                'id'    => 64,
                'title' => 'method_edit',
            ],
            [
                'id'    => 65,
                'title' => 'method_delete',
            ],
            [
                'id'    => 66,
                'title' => 'method_access',
            ],
            [
                'id'    => 67,
                'title' => 'supporting_process_create',
            ],
            [
                'id'    => 68,
                'title' => 'supporting_process_edit',
            ],
            [
                'id'    => 69,
                'title' => 'supporting_process_delete',
            ],
            [
                'id'    => 70,
                'title' => 'supporting_process_access',
            ],
            [
                'id'    => 71,
                'title' => 'analysis_process_create',
            ],
            [
                'id'    => 72,
                'title' => 'analysis_process_edit',
            ],
            [
                'id'    => 73,
                'title' => 'analysis_process_show',
            ],
            [
                'id'    => 74,
                'title' => 'analysis_process_delete',
            ],
            [
                'id'    => 75,
                'title' => 'analysis_process_access',
            ],
            [
                'id'    => 76,
                'title' => 'input_analysi_create',
            ],
            [
                'id'    => 77,
                'title' => 'input_analysi_edit',
            ],
            [
                'id'    => 78,
                'title' => 'input_analysi_delete',
            ],
            [
                'id'    => 79,
                'title' => 'input_analysi_access',
            ],
            [
                'id'    => 80,
                'title' => 'output_analysi_create',
            ],
            [
                'id'    => 81,
                'title' => 'output_analysi_edit',
            ],
            [
                'id'    => 82,
                'title' => 'output_analysi_delete',
            ],
            [
                'id'    => 83,
                'title' => 'output_analysi_access',
            ],
            [
                'id'    => 84,
                'title' => 'goal_measurement_create',
            ],
            [
                'id'    => 85,
                'title' => 'goal_measurement_edit',
            ],
            [
                'id'    => 86,
                'title' => 'goal_measurement_delete',
            ],
            [
                'id'    => 87,
                'title' => 'goal_measurement_access',
            ],
            [
                'id'    => 88,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 89,
                'title' => 'dashboard_header_access',
            ],
            [
                'id'    => 90,
                'title' => 'social_media_schedule_access',
            ],
            [
                'id'    => 91,
                'title' => 'operations_header_access',
            ],
            [
                'id'    => 92,
                'title' => 'dashboard_access',
            ],
            [
                'id'    => 93,
                'title' => 'users_header_access',
            ],

            [
                'id'    => 94,
                'title' => 'pilar_create',
            ],
            [
                'id'    => 95,
                'title' => 'pilar_edit',
            ],
            [
                'id'    => 96,
                'title' => 'pilar_show',
            ],
            [
                'id'    => 97,
                'title' => 'pilar_delete',
            ],
            [
                'id'    => 98,
                'title' => 'pilar_access',
            ],
            [
                'id'    => 99,
                'title' => 'tpb_create',
            ],
            [
                'id'    => 100,
                'title' => 'tpb_edit',
            ],
            [
                'id'    => 101,
                'title' => 'tpb_show',
            ],
            [
                'id'    => 102,
                'title' => 'tpb_delete',
            ],
            [
                'id'    => 103,
                'title' => 'tpb_access',
            ],
            [
                'id'    => 104,
                'title' => 'tjsl_create',
            ],
            [
                'id'    => 105,
                'title' => 'tjsl_edit',
            ],
            [
                'id'    => 106,
                'title' => 'tjsl_show',
            ],
            [
                'id'    => 107,
                'title' => 'tjsl_delete',
            ],
            [
                'id'    => 108,
                'title' => 'tjsl_access',
            ],
            [
                'id'    => 109,
                'title' => 'realtime_activity_create',
            ],
            [
                'id'    => 110,
                'title' => 'realtime_activity_edit',
            ],
            [
                'id'    => 111,
                'title' => 'realtime_activity_show',
            ],
            [
                'id'    => 112,
                'title' => 'realtime_activity_delete',
            ],
            [
                'id'    => 113,
                'title' => 'realtime_activity_access',
            ],
            [
                'id'    => 114,
                'title' => 'risiko_create',
            ],
            [
                'id'    => 115,
                'title' => 'risiko_edit',
            ],
            [
                'id'    => 116,
                'title' => 'risiko_show',
            ],
            [
                'id'    => 117,
                'title' => 'risiko_delete',
            ],
            [
                'id'    => 118,
                'title' => 'risiko_access',
            ],
            [
                'id'    => 119,
                'title' => 'mitigation_create',
            ],
            [
                'id'    => 120,
                'title' => 'mitigation_edit',
            ],
            [
                'id'    => 121,
                'title' => 'mitigation_show',
            ],
            [
                'id'    => 122,
                'title' => 'mitigation_delete',
            ],
            [
                'id'    => 123,
                'title' => 'mitigation_access',
            ],
            [
                'id'    => 124,
                'title' => 'evidance_create',
            ],
            [
                'id'    => 125,
                'title' => 'evidance_edit',
            ],
            [
                'id'    => 126,
                'title' => 'evidance_show',
            ],
            [
                'id'    => 127,
                'title' => 'evidance_delete',
            ],
            [
                'id'    => 128,
                'title' => 'evidance_access',
            ],
            [
                'id'    => 129,
                'title' => 'core_risk_create',
            ],
            [
                'id'    => 130,
                'title' => 'core_risk_edit',
            ],
            [
                'id'    => 131,
                'title' => 'core_risk_show',
            ],
            [
                'id'    => 132,
                'title' => 'core_risk_delete',
            ],
            [
                'id'    => 133,
                'title' => 'core_risk_access',
            ],
            [
                'id'    => 134,
                'title' => 'social_media_schedule_edit',
            ],
            [
                'id'    => 135,
                'title' => 'social_media_schedule_create',
            ],
            [
                'id'    => 136,
                'title' => 'social_media_schedule_show',
            ],
            [
                'id'    => 137,
                'title' => 'social_media_schedule_delete',
            ],
        ];

        Permission::insert($permissions);
    }
}
