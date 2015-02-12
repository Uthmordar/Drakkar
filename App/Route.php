<?php

Router::get(['pattern' => '\/error.php', 'connect' => 'Home:show404']);
Router::get(['pattern' => '', 'connect' => 'Home:showHome']);

Router::post(['pattern' => '', 'connect' => 'Home:postHome']);