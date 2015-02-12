<?php

Router::get(['pattern' => '\/error.php', 'connect' => 'Home:show404']);
Router::get(['pattern' => '\/', 'connect' => 'Home:showHome']);

Router::post(['pattern' => '\/', 'connect' => 'Home:postHome']);

Router::get(['pattern'=>'\/[a-zA-Z0-9\-_]+\/(?P<id>[1-9][0-9]*)', 'connect'=>'Home:article', 'params'=>'id']);