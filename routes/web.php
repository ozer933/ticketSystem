<?php

Route::any('/', function () {
    return view('login');
})->name('portalhome');;

Route::any('/girisyap', 'UserController@loginsessions');

Route::any('/logout', 'UserController@exitsessions');

Route::any('/adminpanel', 'UserController@login')->name('login');

Route::any('/passwordreset', 'UserController@passwordreset');


/* middleware secure adminpanel route list */
Route::group(['middleware' => ['Rootsessions', 'Rootsessions']], function () {

    Route::any('/adminpanel/ticketlistsource', 'TicketController@ticketlistsource');
    Route::any('/adminpanel/welcome', 'TicketController@welcome');
    Route::any('/adminpanel/ticket-add', 'TicketController@ticketAdds');
    Route::any('/adminpanel/keyword-find/{keyword}', 'TicketController@keywordFind');
    Route::any('/adminpanel/ticket-list', 'TicketController@ticketList');
    Route::any('/adminpanel/user-ticket-list', 'TicketController@userTicketList');
    Route::any('/adminpanel/ticket-edit/{id}', 'TicketController@ticketEdit');
    Route::any('/adminpanel/ticket-delete/{id}', 'TicketController@ticketDelete');

});

Route::get('/clear', function () {
    echo "Cache temizlendi!";
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('optimize');
    echo "Cache temizlendi!";
});
