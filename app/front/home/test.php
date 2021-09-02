<?php

    echo 'welcome to test<br>';

    if (isset($_GET['ilies']))
    {
        $file = 'test.pdf';

        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="SSSSS.PDF"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($file));

        @readfile($file);
    }