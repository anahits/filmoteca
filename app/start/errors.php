<?php

/**
 * If I define a route that match any thing that code is not execute and a HttpNotFoundException is thrown.
 * So I need to catch that exception and try the redirect.
 */
App::missing(function () {
    $redirects = App::make('Filmoteca\Repository\RedirectsRepository')->all();

    $redirect = $redirects->first(function ($index, $redirect) {
        return $redirect->old == '/' . Request::path();
    });

    if ($redirect !== null) {
        return Redirect::to($redirect->new, 301);
    }

    $viewData = [
        'title'     => 'errors.page_not_found',
        'message'   => 'errors.page_not_found',
        'code'      => '404'
    ];

    return Response::view('syntara::dashboard.error', $viewData);
});

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function (\Illuminate\Database\Eloquent\ModelNotFoundException $exception, $code) {

    log_and_send_email($exception);

    $viewData = [
        'title'     => 'errors.page_not_found',
        'message'   => 'errors.page_not_found',
        'code'      => '404'
    ];

    return Response::view('syntara::dashboard.error', $viewData);
});


App::error(function (Exception $exception, $code) {
    log_and_send_email($exception);
});

function log_and_send_email($exception)
{
    Log::error($exception);

    if (App::environment() == 'prod') {
        $data = ['exception' => $exception];
        Mail::send('emails.error', $data, function ($message) {
            $message->from(Config::get('mail.from.address'));
            $message
                ->to(Config::get('mail.error.address'))
                ->subject(Config::get('mail.error.subject'));
        });
    }
}
