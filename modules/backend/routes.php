<?php

use MyClinic\Doctor\Controllers\Specialty;
use MyClinic\Setting\Controllers\Locations;
use MyClinic\Setting\Controllers\Settings;

/**
 * Register Backend routes before all user routes.
 */
App::before(function ($request) {
    /**
     * @event backend.beforeRoute
     * Fires before backend routes get added
     *
     * Example usage:
     *
     *     Event::listen('backend.beforeRoute', function () {
     *         // your code here
     *     });
     *
     */
    
    Event::fire('backend.beforeRoute');

    Route::get('location-specialties/{slug}',  [Locations::class, 'getSpecialties']);
    Route::get('location-specialties/{slug}/alphabet/{alphabet}',  [Locations::class, 'getSpecialtiesByAlphabet']);
    Route::get('location-specialties/{slug}/alphabet/ar/{alphabet}',  [Locations::class, 'getSpecialtiesByAlphabetAr']);
    Route::get('specialty-doctors/{slug}',  [Specialty::class, 'getDoctors']);
    Route::post('send-contact-us',  [Settings::class, 'sendContactUsMail']);
    Route::post('enrollment-submit',  [Settings::class, 'enrollmentSubmit']);
    Route::post('ask-us-submit',  [Settings::class, 'askUsSubmit']);
    Route::get('change-to/{language}',  [Settings::class, 'changeToLanguage']);
    Route::post('career-request',  [Settings::class, 'careerRequest']);
    Route::get('get-locations',  [Settings::class, 'getLocation']);
    Route::post('api/myclinic/doctor-detail', [Settings::class,'getDoctorUrl']);


    /*
     * Other pages
     */
    Route::group([
            'middleware' => Config::get('backend.middleware_group', 'web'),
            'prefix' => Backend::uri()
        ], function () {
            Route::any('{slug?}', [\Backend\Classes\BackendController::class, 'run'])
                ->where('slug', '(.*)?')
            ;
        })
    ;

    /*
     * Entry point
     */
    Route::any(Backend::uri(), [\Backend\Classes\BackendController::class, 'run'])
        ->middleware(Config::get('backend.middleware_group', 'web'))
    ;

    /**
     * @event backend.route
     * Fires after backend routes have been added
     *
     * Example usage:
     *
     *     Event::listen('backend.route', function () {
     *         // your code here
     *     });
     *
     */
    Event::fire('backend.route');
});
