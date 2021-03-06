<?php

    include( '../bootstrap.php' );

    S2P_SDK\S2P_SDK_Module::st_debugging_mode( true );
    S2P_SDK\S2P_SDK_Module::st_throw_errors( false );

    $api_parameters = array();

    // By default, API will check S2P_SDK_API_KEY, S2P_SDK_SITE_ID and S2P_SDK_ENVIRONMENT constats set in config.php
    // If you want to override these constants (per request) uncomment lines below and provide values to override
    // $api_parameters['api_key'] = '{PROVIDED_APIKEY}';
    // $api_parameters['site_id'] = '{PROVIDED_SITE_ID}';
    // $api_parameters['environment'] = 'test'; // test or live

    $api_parameters['method'] = 'methods';
    $api_parameters['func'] = 'list_all';

    $api_parameters['get_variables'] = array();
    $api_parameters['method_params'] = array();

    $call_params = array();
    $call_params['curl_params'] = array(
        // Use constant function so in case constant is not set, it will be empty and cURL call function would choose a default value
        'connection_ssl_version' => constant( 'CURL_SSLVERSION_TLSv1_2' ),
    );

    $finalize_params = array();
    $finalize_params['redirect_now'] = false;

    if( !($call_result = S2P_SDK\S2P_SDK_Module::quick_call( $api_parameters, $call_params, $finalize_params )) )
    {
        echo 'API call error: ';

        if( ($error_arr = S2P_SDK\S2P_SDK_Module::st_get_error())
        and !empty( $error_arr['display_error'] ) )
            echo $error_arr['display_error'];
        else
            echo 'Unknown error.';
    } else
    {
        echo 'API call time: '.$call_result['call_microseconds'].'s<br/>'."\n";

        if( !empty( $call_result['finalize_result']['should_redirect'] )
        and !empty( $call_result['finalize_result']['redirect_to'] ) )
            echo '<br/>'."\n".
                 'Go to <a href="'.$call_result['finalize_result']['redirect_to'].'">'.$call_result['finalize_result']['redirect_to'].'</a> to complete transaction<br/>'."\n".
                 '<br/>'."\n";

        echo 'Call result:<br>'."\n".
             '<pre>';

        var_dump( $call_result['call_result'] );

        echo '</pre>';
    }
