<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Risk
    Route::apiResource('risks', 'RiskApiController');

    // Atp Process
    Route::apiResource('atp-processes', 'AtpProcessApiController');

    // Business Partner
    Route::apiResource('business-partners', 'BusinessPartnerApiController', ['except' => ['show']]);

    // Business Partner Identification
    Route::apiResource('business-partner-identifications', 'BusinessPartnerIdentificationApiController');

    // Bribery Risk Assesment
    Route::post('bribery-risk-assesments/media', 'BriberyRiskAssesmentApiController@storeMedia')->name('bribery-risk-assesments.storeMedia');
    Route::apiResource('bribery-risk-assesments', 'BriberyRiskAssesmentApiController');

    // Position
    Route::apiResource('positions', 'PositionApiController', ['except' => ['show']]);

    // Risk Mitigation Monitoring
    Route::post('risk-mitigation-monitorings/media', 'RiskMitigationMonitoringApiController@storeMedia')->name('risk-mitigation-monitorings.storeMedia');
    Route::apiResource('risk-mitigation-monitorings', 'RiskMitigationMonitoringApiController');

    // Resources
    Route::apiResource('resources', 'ResourcesApiController', ['except' => ['show']]);

    // Job
    Route::apiResource('jobs', 'JobApiController', ['except' => ['show']]);

    // Human Resources
    Route::apiResource('human-resources', 'HumanResourcesApiController');

    // Method
    Route::apiResource('methods', 'MethodApiController', ['except' => ['show']]);

    // Supporting Process
    Route::apiResource('supporting-processes', 'SupportingProcessApiController', ['except' => ['show']]);

    // Analysis Process
    Route::apiResource('analysis-processes', 'AnalysisProcessApiController');

    // Input Analysis
    Route::apiResource('input-analysis', 'InputAnalysisApiController', ['except' => ['show']]);

    // Output Analysis
    Route::apiResource('output-analysis', 'OutputAnalysisApiController', ['except' => ['show']]);

    // Goal Measurement
    Route::apiResource('goal-measurements', 'GoalMeasurementApiController', ['except' => ['show']]);

    // Social Media Schedule
    Route::post('social-media-schedules/media', 'SocialMediaScheduleApiController@storeMedia')->name('social-media-schedules.storeMedia');
    Route::apiResource('social-media-schedules', 'SocialMediaScheduleApiController');

    // Pilar
    Route::apiResource('pilars', 'PilarApiController');

    // Tpb
    Route::apiResource('tpbs', 'TpbApiController');

    // Tjsl
    Route::apiResource('tjsls', 'TjslApiController');

    // Realtime Activity
    Route::post('realtime-activities/media', 'RealtimeActivityApiController@storeMedia')->name('realtime-activities.storeMedia');
    Route::apiResource('realtime-activities', 'RealtimeActivityApiController');
});
