<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// Login By Google, Facebook
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

Route::get('/', function () {
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'registration']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Route::group(['middleware' => ['auth']], function () {

    // Confirm Register
    Route::get('/registration', 'RegistrationController@index')->name('registration');
    Route::post('/registration', 'RegistrationController@store')->name('registration');

    // Profile
    Route::get('/profile', 'ProfileController@edit')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile');

    // Get Characteristics
    Route::get('characteristics', 'CharacteristicsController@index')->name('characteristics');

    // Contas
    Route::post('property-account', 'AccountController@store')->name('property-account');
    Route::delete('property-account', 'AccountController@delete')->name('property-account');
    

    // Get colleges
    Route::get('colleges_autocomplete', 'CollegeController@search')->name('CollegeAutocomplete');

    // Get Course
    Route::get('course_autocomplete', 'CourseController@search')->name('CourseAutocomplete');

    //Match
    Route::post('match', 'MacthController@store')->name('match');

    //VMatch
    Route::post('v_match', 'VMacthesController@store')->name('v_match');

    //Close contract
    Route::post('/contract', 'ContractController@store')->name('contract');
    Route::put('/contract', 'ContractController@update')->name('contract');
    Route::delete('/contract', 'ContractController@destroy')->name('contract');

    Route::group(['middleware' => ['checkproperty']], function () {
        
        //Views Match Imovel
        Route::get('/match/property/{id}', 'PropertyMatchesController@show')->name('match_property');

        // Alert
        Route::get('/alert/property/{id}', 'AlertPropertyController@index')->name('alert.index');
        Route::post('/alert/property', 'AlertPropertyController@store')->name('alert.store');

        // Habitos Imoveis
        Route::post('i_habit', 'IHabitsController@store')->name('i_habit.store');
        Route::delete('i_habit', 'IHabitsController@destroy')->name('i_habit.destroy');

        // Image Property
        Route::post('property-image', 'ImageUploadController@store')->name('property-image');
        Route::delete('property-image', 'ImageUploadController@delete')->name('property-image');

        //Habits
        Route::get('/api/habits', 'HabitsController@index')->name('habits');
        
        //Characteristic
        Route::get('/api/characteristic', 'CharacteristicsController@index')->name('characteristic');

        Route::get('/properties', 'PropertyController@index')->name('properties');
        Route::get('/property/edit/{id}', 'PropertyController@edit')->name('property.edit');
        Route::get('/property/create', 'PropertyController@create')->name('property.create');
        Route::post('/property/store', 'PropertyController@store')->name('property.store');
        Route::put('/property/update/{id}', 'PropertyController@update')->name('property.put');

        Route::delete('/property', 'PropertyController@destroy')->name('property.destroy');
        
    });

    Route::group(['middleware' => ['checkdweller']], function () {

        //Close contract
        Route::post('/v_contract', 'VContractController@store')->name('v_contract');
        Route::delete('/v_contract', 'VContractController@destroy')->name('v_contract');

        //Views Match Vaga
        Route::get('/match/vacancy/{id}', 'VacancyMatchesController@show')->name('match_vacancy');

        //Meu Imóvel
        Route::get('my_property', 'DwellerPropertyController@index')->name('property.index');

        // Get Vagas
        Route::get('/vacancy', 'VacancyController@create')->name('vacancy.create');

        Route::post('/vacancy', 'VacancyController@store')->name('vacancy.store');
        Route::delete('/vacancy', 'VacancyController@destroy')->name('vacancy.destroy');
        Route::put('/vacancy/{id}', 'VacancyController@update')->name('vacancy.update');

        //Minhas Vagas
        Route::get('my_vacancies', 'VacancyController@view')->name('vacancies');
        Route::get('/api/my_vacancies', 'VacancyController@index')->name('vacancies');
        Route::get('my_vacancies/{id}/create', 'VacancyController@create')->name('vacancies.create');
        Route::get('my_vacancies/{id}/edit', 'VacancyController@edit')->name('vacancies.edit');
        Route::post('my_vacancies', 'VacancyController@store')->name('vacancy');
        Route::put('my_vacancies', 'VacancyController@update')->name('vacancy');
        Route::delete('my_vacancies', 'VacancyController@destroy')->name('vacancy');

        // Vagas Sugeridas
        Route::get('suggested_vacancies', 'SuggestedVacanciesController@index')->name('SuggestedVacancies');


        // Habitos Vagas
        Route::post('v_habit', 'VHabitsController@store')->name('v_habit.store');
        Route::delete('v_habit', 'VHabitsController@destroy')->name('v_habit.destroy');


        // Habitos Imoveis
        Route::post('m_habit', 'MHabitsController@store')->name('m_habit.store');
        Route::delete('m_habit', 'MHabitsController@destroy')->name('m_habit.destroy');

        Route::get('suggested_properties', 'SuggestedPropertiesController@index')->name('SeggestedProperties');
        Route::get('suggested_properties/map', 'SuggestedPropertiesController@map')->name('SeggestedPropertiesMap');
        Route::get('suggested_properties/settings', 'SuggestedPropertiesController@settings')->name('SeggestedPropertiesSettings');
        Route::post('suggested_properties/settings/save', 'SuggestedPropertiesController@save')->name('SeggestedPropertiesSettingsSave');

        
    });

    //Email
    Route::get('chats','MessageControllers@index')->name('chats');

    // Return JSON
    Route::get('api/chats','MessageControllers@chat')->name('api.chats');
    Route::get('api/chats/{recipient}/{property}','MessageControllers@subject')->name('api.subject');

    // Create Message
    Route::post('chats/{recipient}/{property}','MessageControllers@store')->name('chat.store');

    Route::get('/immobile/{id}', 'ImmobileController@show')->name('immobile');
    Route::get('/immobile/{id}/details', 'ImmobileController@details')->name('immobile.details');

    Route::get('/contracts', 'ContractController@index')->name('contracts');
    Route::get('/contracts/{id}', 'ContractController@show')->name('page-contracts');
    Route::post('/contracts/{id}/pdf', 'ContractController@contract')->name('contract.upload.file');


    // Route::get('/api/contracts/{id}', 'ContractController@show')->name('contracts');

});
