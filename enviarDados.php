<?php

    date_default_timezone_set("America/New_York");
    header("Content-Type: text/event-stream");

    while (1) {

        $curDate = date(DATE_ISO8601);

        echo "event: ping\n",
       'data: {"time": "' . $curDate . '"}', "\n\n";


        echo 'data:1', "\n\n";

        // libera o buffer de saída e envia mensagens ecoadas para o navegador
        while (ob_get_level() > 0){
            ob_end_flush();
        }

        flush();
        // interrompe o loop se o cliente abortar a conexão (fechou a página)
        if ( connection_aborted() ) break;

        sleep(1);
    }