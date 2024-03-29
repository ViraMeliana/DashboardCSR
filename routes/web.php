<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\HomeController;
use App\Http\Controllers\LanguageController;

Route::redirect('/', '/login');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::get('/about', [HomeController::class, 'about'])->name('landing.about');
Route::get('/activity', [HomeController::class, 'activity'])->name('landing.activity');
Route::post('/store', [HomeController::class, 'store'])->name('landing.activity.store');
Route::get('/add-activity', [HomeController::class, 'createActivity'])->name('landing.createActivity');
Route::post('/realtime-activities/media', [HomeController::class, 'storeMedia'])->name('landing.storeMedia');
Route::post('/realtime-activities/ckmedia', [HomeController::class, 'storeCKEditorImages'])->name('landing.storeCKEditorImages');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Risk
    Route::delete('risks/destroy', 'RiskController@massDestroy')->name('risks.massDestroy');
    Route::post('risks/parse-csv-import', 'RiskController@parseCsvImport')->name('risks.parseCsvImport');
    Route::post('risks/process-csv-import', 'RiskController@processCsvImport')->name('risks.processCsvImport');
    Route::resource('risks', 'RiskController');

    // Atp Process
    Route::delete('atp-processes/destroy', 'AtpProcessController@massDestroy')->name('atp-processes.massDestroy');
    Route::resource('atp-processes', 'AtpProcessController');

    // Business Partner
    Route::delete('business-partners/destroy', 'BusinessPartnerController@massDestroy')->name('business-partners.massDestroy');
    Route::resource('business-partners', 'BusinessPartnerController', ['except' => ['show']]);

    // Business Partner Document
    Route::delete('business-partner-documents/destroy', 'DocumentManagementController@massDestroy')->name('business-partner-documents.massDestroy');
    Route::resource('business-partner-documents', 'DocumentManagementController', ['except' => ['show']]);
    Route::get('business-partner-documents/report/{id}/{type}', 'DocumentManagementController@report')->name('business-partner-documents.report');

    // Business Partner Identification
    Route::delete('business-partner-identifications/destroy', 'BusinessPartnerIdentificationController@massDestroy')->name('business-partner-identifications.massDestroy');
    Route::resource('business-partner-identifications', 'BusinessPartnerIdentificationController');

    // Bribery Risk Assesment
    Route::delete('bribery-risk-assesments/destroy', 'BriberyRiskAssesmentController@massDestroy')->name('bribery-risk-assesments.massDestroy');
    Route::post('bribery-risk-assesments/media', 'BriberyRiskAssesmentController@storeMedia')->name('bribery-risk-assesments.storeMedia');
    Route::post('bribery-risk-assesments/ckmedia', 'BriberyRiskAssesmentController@storeCKEditorImages')->name('bribery-risk-assesments.storeCKEditorImages');
    Route::resource('bribery-risk-assesments', 'BriberyRiskAssesmentController');

    // Position
    Route::delete('positions/destroy', 'PositionController@massDestroy')->name('positions.massDestroy');
    Route::resource('positions', 'PositionController', ['except' => ['show']]);

    // Risk Mitigation Monitoring
    Route::delete('risk-mitigation-monitorings/destroy', 'RiskMitigationMonitoringController@massDestroy')->name('risk-mitigation-monitorings.massDestroy');
    Route::post('risk-mitigation-monitorings/media', 'RiskMitigationMonitoringController@storeMedia')->name('risk-mitigation-monitorings.storeMedia');
    Route::post('risk-mitigation-monitorings/ckmedia', 'RiskMitigationMonitoringController@storeCKEditorImages')->name('risk-mitigation-monitorings.storeCKEditorImages');
    Route::resource('risk-mitigation-monitorings', 'RiskMitigationMonitoringController');

    // Resources
    Route::delete('resources/destroy', 'ResourcesController@massDestroy')->name('resources.massDestroy');
    Route::resource('resources', 'ResourcesController', ['except' => ['show']]);

    // Job
    Route::delete('jobs/destroy', 'JobController@massDestroy')->name('jobs.massDestroy');
    Route::resource('jobs', 'JobController', ['except' => ['show']]);

    // Human Resources
    Route::delete('human-resources/destroy', 'HumanResourcesController@massDestroy')->name('human-resources.massDestroy');
    Route::resource('human-resources', 'HumanResourcesController');

    // Method
    Route::delete('methods/destroy', 'MethodController@massDestroy')->name('methods.massDestroy');
    Route::resource('methods', 'MethodController', ['except' => ['show']]);

    // Supporting Process
    Route::delete('supporting-processes/destroy', 'SupportingProcessController@massDestroy')->name('supporting-processes.massDestroy');
    Route::resource('supporting-processes', 'SupportingProcessController', ['except' => ['show']]);

    // Analysis Process
    Route::delete('analysis-processes/destroy', 'AnalysisProcessController@massDestroy')->name('analysis-processes.massDestroy');
    Route::resource('analysis-processes', 'AnalysisProcessController');

    // Input Analysis
    Route::delete('input-analysis/destroy', 'InputAnalysisController@massDestroy')->name('input-analysis.massDestroy');
    Route::resource('input-analysis', 'InputAnalysisController', ['except' => ['show']]);

    // Output Analysis
    Route::delete('output-analysis/destroy', 'OutputAnalysisController@massDestroy')->name('output-analysis.massDestroy');
    Route::resource('output-analysis', 'OutputAnalysisController', ['except' => ['show']]);

    // Goal Measurement
    Route::delete('goal-measurements/destroy', 'GoalMeasurementController@massDestroy')->name('goal-measurements.massDestroy');
    Route::resource('goal-measurements', 'GoalMeasurementController', ['except' => ['show']]);

    // Social Media Schedule
    Route::delete('social-media-schedules/destroy', 'SocialMediaScheduleController@massDestroy')->name('social-media-schedules.massDestroy');
    Route::post('social-media-schedules/media', 'SocialMediaScheduleController@storeMedia')->name('social-media-schedules.storeMedia');
    Route::post('social-media-schedules/ckmedia', 'SocialMediaScheduleController@storeCKEditorImages')->name('social-media-schedules.storeCKEditorImages');
    Route::resource('social-media-schedules', 'SocialMediaScheduleController');
    Route::get('system-social-media-calendar', 'SocialMediaCalendarController@index')->name('socialMediaCalendar');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');

    // Pilar
    Route::delete('pilars/destroy', 'PilarController@massDestroy')->name('pilars.massDestroy');
    Route::resource('pilars', 'PilarController');

    // Tpb
    Route::delete('tpbs/destroy', 'TpbController@massDestroy')->name('tpbs.massDestroy');
    Route::resource('tpbs', 'TpbController');

    // Tjsl
    Route::delete('tjsls/destroy', 'TjslController@massDestroy')->name('tjsls.massDestroy');
    Route::post('tjsls/process-csv-import', 'TjslController@processCsvImport')->name('tjsls.processCsvImport');
    Route::post('tjsls/show-cart', 'TjslController@showChart')->name('tjsls.showChart');
    Route::resource('tjsls', 'TjslController');

    // Tjsl Insidentil
    Route::resource('tjsl-insidentils', 'TjslInsidentilController');

    // Tjsl Insidentil
    Route::resource('work-instructions', 'WorkInstructionController');

    // Realtime Activity
    Route::delete('realtime-activities/destroy', 'RealtimeActivityController@massDestroy')->name('realtime-activities.massDestroy');
    Route::post('realtime-activities/media', 'RealtimeActivityController@storeMedia')->name('realtime-activities.storeMedia');
    Route::post('realtime-activities/ckmedia', 'RealtimeActivityController@storeCKEditorImages')->name('realtime-activities.storeCKEditorImages');
    Route::resource('realtime-activities', 'RealtimeActivityController');

    // Core Risk
    Route::delete('core-risks/destroy', 'CoreRiskController@massDestroy')->name('core-risks.massDestroy');
    Route::resource('core-risks', 'CoreRiskController');
    Route::post('core-risks/parse-csv-import', 'CoreRiskController@parseCsvImport')->name('core-risks.parseCsvImport');
    Route::post('core-risks/process-csv-import', 'CoreRiskController@processCsvImport')->name('core-risks.processCsvImport');

    Route::post('core-risks/show-quartal', 'CoreRiskController@showQuartal')->name('core-risks.showQuartal');
    Route::post('core-risks/update-quartal', 'CoreRiskController@updateQuartal')->name('core-risks.updateQuartal');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
