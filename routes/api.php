<?php
/**
 * A & A Creation Co.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    A & A Creation
 * @package     ${PACKAGE}
 * @Date        : 16/10/2020
 * @copyright   Copyright (c) A & A Creation (https://anacreation.com/)
 */

use Anacreation\Organization\Http\Api\OrganizationController;
use Illuminate\Support\Facades\Route;

Route::group([
                 'middleware' => 'api',
                 'prefix'     => 'api',
             ],
    function() {

        Route::group([
                         'middleware' => config('organization.route.middleware',
                                                []),
                         'prefix'     => config('organization.route.prefix',
                                                null),
                     ],
            function() {

                Route::get('organizations',
                           OrganizationController::class."@index")
                     ->name('organizations::index');
                Route::post('organizations',
                            OrganizationController::class."@store")
                     ->name('organizations::store');
                Route::put('organizations/{organization}',
                           OrganizationController::class."@update")
                     ->name('organizations::update');
                Route::delete('organizations/{organization}',
                              OrganizationController::class."@destroy")
                     ->name('organizations::destroy');
                Route::post('organizations/{organization}/attach',
                            OrganizationController::class."@attach")
                     ->name('organizations::attach');
                Route::post('organizations/{organization}/detach',
                            OrganizationController::class."@detach")
                     ->name('organizations::detach');

            });

    });
