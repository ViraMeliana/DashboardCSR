<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'pilar' => [
        'title'          => 'Pilar',
        'title_singular' => 'Pilar',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'tpb' => [
        'title'          => 'TPB',
        'title_singular' => 'TPB',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'tpb_number'         => 'Tpb Number',
            'tpb_number_helper'  => ' ',
            'rka'                => 'Rka',
            'rka_helper'         => ' ',
            'cash_out'           => 'Cash Out',
            'cash_out_helper'    => ' ',
            'commited'           => 'Commited',
            'commited_helper'    => ' ',
            'realization'        => 'Realization',
            'realization_helper' => ' ',
            'periode'            => 'Periode',
            'periode_helper'     => ' ',
            'pilar'              => 'Pilar',
            'pilar_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'tjsl' => [
        'title'          => 'TJLS',
        'title_singular' => 'TJL',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'tpb'               => 'Tpb',
            'tpb_helper'        => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'realtimeActivity' => [
        'title'          => 'Realtime Activity',
        'title_singular' => 'Realtime Activity',
        'fields'         => [
            'id'                             => 'ID',
            'id_helper'                      => ' ',
            'title'                          => 'Title',
            'title_helper'                   => ' ',
            'date'                           => 'Date',
            'date_helper'                    => ' ',
            'type'                           => 'Type',
            'type_helper'                    => ' ',
            'total'                          => 'Total',
            'total_helper'                   => 'Rp/Ea/Zak/Pcs',
            'location'                       => 'Location',
            'location_helper'                => ' ',
            'village'                        => 'Village',
            'village_helper'                 => ' ',
            'subdistrict'                    => 'Subdistrict',
            'subdistrict_helper'             => ' ',
            'district'                       => 'District',
            'district_helper'                => ' ',
            'province'                       => 'Province',
            'province_helper'                => ' ',
            'receiver'                       => 'Receiver',
            'receiver_helper'                => ' ',
            'number_of_beneficiaries'        => 'Number Of Beneficiaries',
            'number_of_beneficiaries_helper' => ' ',
            'photo'                          => 'Photo',
            'photo_helper'                   => ' ',
            'created_at'                     => 'Created at',
            'created_at_helper'              => ' ',
            'updated_at'                     => 'Updated at',
            'updated_at_helper'              => ' ',
            'deleted_at'                     => 'Deleted at',
            'deleted_at_helper'              => ' ',
        ],
    ],
    'risk' => [
        'title'          => 'Risk',
        'title_singular' => 'Risk',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'risk_name'                    => 'Risk Name',
            'risk_name_helper'             => ' ',
            'risk_process'                 => 'Risk Process',
            'risk_process_helper'          => ' ',
            'description'                  => 'Description',
            'description_helper'           => ' ',
            'likelihood_baseline'          => 'Likelihood Baseline',
            'likelihood_baseline_helper'   => ' ',
            'consequences_baseline'        => 'Consequences Baseline',
            'consequences_baseline_helper' => ' ',
            'iso'                          => 'ISO',
            'iso_helper'                   => ' ',
            'existing_control'             => 'Existing Control',
            'existing_control_helper'      => ' ',
            'effectiveness'                => 'Effectiveness',
            'effectiveness_helper'         => ' ',
            'risk_cause'                   => 'Risk Cause',
            'risk_cause_helper'            => ' ',
            'proactive_mitigation'         => 'Proactive Mitigation',
            'proactive_mitigation_helper'  => ' ',
            'likelihood_target'            => 'Likelihood Target',
            'likelihood_target_helper'     => ' ',
            'consequences_target'          => 'Consequences Target',
            'consequences_target_helper'   => ' ',
            'impact'                       => 'Impact',
            'impact_helper'                => ' ',
            'reactive_mitigation'          => 'Reactive Mitigation',
            'reactive_mitigation_helper'   => ' ',
            'time_schedule'                => 'Time Schedule',
            'time_schedule_helper'         => ' ',
            'type'                         => 'Type',
            'type_helper'                  => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
        ],
    ],
    'atpProcess' => [
        'title'          => 'Atp Process',
        'title_singular' => 'Atp Process',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'activity'           => 'Activity',
            'activity_helper'    => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'transaction'        => 'Transaction',
            'transaction_helper' => ' ',
            'project'            => 'Project',
            'project_helper'     => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'businessPartner' => [
        'title'          => 'Business Partner',
        'title_singular' => 'Business Partner',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'businessPartnerIdentification' => [
        'title'          => 'Business Partner Identification',
        'title_singular' => 'Business Partner Identification',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'risk_level'                   => 'Risk Level',
            'risk_level_helper'            => ' ',
            'business_partner'             => 'Business Partner',
            'business_partner_helper'      => ' ',
            'business_partner_name'        => 'Business Partner Name',
            'business_partner_name_helper' => ' ',
            'address'                      => 'Address',
            'address_helper'               => ' ',
            'activity'                     => 'Activity',
            'activity_helper'              => ' ',
            'smap_implementation'          => 'Smap Implementation',
            'smap_implementation_helper'   => ' ',
            'self_smap_control'            => 'Self Smap Control',
            'self_smap_control_helper'     => ' ',
            'description'                  => 'Description',
            'description_helper'           => ' ',
            'validate'                     => 'Validate',
            'validate_helper'              => ' ',
            'validate_date'                => 'Validate Date',
            'validate_date_helper'         => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
        ],
    ],
    'briberyRiskAssesment' => [
        'title'          => 'Bribery Risk Assesment',
        'title_singular' => 'Bribery Risk Assesment',
        'fields'         => [
            'id'                             => 'ID',
            'id_helper'                      => ' ',
            'atp_process'                    => 'Atp Process',
            'atp_process_helper'             => ' ',
            'requirements'                   => 'Requirements',
            'requirements_helper'            => ' ',
            'bribery_risk'                   => 'Bribery Risk',
            'bribery_risk_helper'            => ' ',
            'impact'                         => 'Impact',
            'impact_helper'                  => ' ',
            'risk_causes'                    => 'Risk Causes',
            'risk_causes_helper'             => ' ',
            'internal_control'               => 'Internal Control',
            'internal_control_helper'        => ' ',
            'l'                              => 'L',
            'l_helper'                       => ' ',
            'c'                              => 'C',
            'c_helper'                       => ' ',
            'criteria_impact'                => 'Criteria Impact',
            'criteria_impact_helper'         => ' ',
            'risk_level'                     => 'Risk Level',
            'risk_level_helper'              => ' ',
            'proactive_mitigation'           => 'Proactive Mitigation',
            'proactive_mitigation_helper'    => ' ',
            'l_target'                       => 'L Target',
            'l_target_helper'                => ' ',
            'c_target'                       => 'C Target',
            'c_target_helper'                => ' ',
            'risk_level_target'              => 'Risk Level Target',
            'risk_level_target_helper'       => ' ',
            'opportunity'                    => 'Opportunity',
            'opportunity_helper'             => ' ',
            'description'                    => 'Description',
            'description_helper'             => ' ',
            'created_at'                     => 'Created at',
            'created_at_helper'              => ' ',
            'updated_at'                     => 'Updated at',
            'updated_at_helper'              => ' ',
            'deleted_at'                     => 'Deleted at',
            'deleted_at_helper'              => ' ',
            'personal_identification'        => 'Personal Identification',
            'personal_identification_helper' => ' ',
            'reviewed_signature'             => 'Reviewed Signature',
            'reviewed_signature_helper'      => ' ',
            'approved_signature'             => 'Approved Signature',
            'approved_signature_helper'      => ' ',
        ],
    ],
    'position' => [
        'title'          => 'Position',
        'title_singular' => 'Position',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'riskMitigationMonitoring' => [
        'title'          => 'Risk Mitigation Monitoring',
        'title_singular' => 'Risk Mitigation Monitoring',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'target'                      => 'Target',
            'target_helper'               => ' ',
            'goal'                        => 'Goal',
            'goal_helper'                 => ' ',
            'revision'                    => 'Revision',
            'revision_helper'             => ' ',
            'proactive_mitigation'        => 'Proactive Mitigation',
            'proactive_mitigation_helper' => ' ',
            'plan_date'                   => 'Plan Date',
            'plan_date_helper'            => ' ',
            'realization_date'            => 'Realization Date',
            'realization_date_helper'     => ' ',
            'l'                           => 'L',
            'l_helper'                    => ' ',
            'c'                           => 'C',
            'c_helper'                    => ' ',
            'risk_level'                  => 'Risk Level',
            'risk_level_helper'           => ' ',
            'responsible'                 => 'Responsible',
            'responsible_helper'          => ' ',
            'status'                      => 'Status',
            'status_helper'               => ' ',
            'accepted_signature'          => 'Accepted Signature',
            'accepted_signature_helper'   => ' ',
            'check_signature'             => 'Check Signature',
            'check_signature_helper'      => ' ',
            'prepare_signature'           => 'Prepare Signature',
            'prepare_signature_helper'    => ' ',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
        ],
    ],
    'resource' => [
        'title'          => 'Resources',
        'title_singular' => 'Resource',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'job' => [
        'title'          => 'Job',
        'title_singular' => 'Job',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'humanResource' => [
        'title'          => 'Human Resources',
        'title_singular' => 'Human Resource',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'competence'        => 'Competence',
            'competence_helper' => ' ',
            'awareness'         => 'Awareness',
            'awareness_helper'  => ' ',
            'scope'             => 'Scope',
            'scope_helper'      => ' ',
            'jobdesc'           => 'Jobdesc',
            'jobdesc_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
        ],
    ],
    'method' => [
        'title'          => 'Method',
        'title_singular' => 'Method',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'supportingProcess' => [
        'title'          => 'Supporting Process',
        'title_singular' => 'Supporting Process',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'analysisProcess' => [
        'title'          => 'Analysis Process',
        'title_singular' => 'Analysis Process',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'resources'                 => 'Resources',
            'resources_helper'          => ' ',
            'main_job'                  => 'Main Job',
            'main_job_helper'           => ' ',
            'human_resource'            => 'Human Resource',
            'human_resource_helper'     => ' ',
            'method'                    => 'Method',
            'method_helper'             => ' ',
            'supporting_process'        => 'Supporting Process',
            'supporting_process_helper' => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'date'                      => 'Date',
            'date_helper'               => ' ',
        ],
    ],
    'inputAnalysi' => [
        'title'          => 'Input Analysis',
        'title_singular' => 'Input Analysi',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'input'                   => 'Input',
            'input_helper'            => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'analysis_process'        => 'Analysis Process',
            'analysis_process_helper' => ' ',
        ],
    ],
    'outputAnalysi' => [
        'title'          => 'Output Analysis',
        'title_singular' => 'Output Analysi',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'output'                  => 'Output',
            'output_helper'           => ' ',
            'analysis_process'        => 'Analysis Process',
            'analysis_process_helper' => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'goalMeasurement' => [
        'title'          => 'Goal Measurement',
        'title_singular' => 'Goal Measurement',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'kpi'                    => 'Kpi',
            'kpi_helper'             => ' ',
            'target'                 => 'Target',
            'target_helper'          => ' ',
            'analysi_process'        => 'Analysi Process',
            'analysi_process_helper' => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'socialMediaSchedules' => [
        'title'          => 'Social Media Schedule',
        'title_singular' => 'Social Media Schedule',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'date'               => 'Date',
            'date_helper'        => ' ',
            'event'              => 'Event',
            'event_helper'       => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'type'               => 'Type',
            'type_helper'        => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'media'              => 'Media',
            'media_helper'       => ' ',
            'caption'            => 'Caption',
            'caption_helper'     => ' ',
        ],
    ],
];