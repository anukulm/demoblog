<?php

return [


    'langs' => [
        'es' => 'www.domain.es',
        'en' => 'www.domain.us'
        // etc
    ],
    'IMAGE_PATH' => url('public/upload/image').'/',
    'PER_PAGE_LIMIT' => 4,

    'DEFAULT_IMAGE_PATH' => url('public/default').'/',

    'STATUS_ARRAY' => ['Inactive','Active'],
    'NOTIF_STATUS_ARRAY' => ['Pending','Approved'],
    'DISPLAY_TYPE_ARRAY' => ['Public','Premium'],
    'SMTP_TYPE' => [1 => 'SSL', 2=> 'TLS', 0 => 'NONE'],
    'YES_NO' => [1 => 'Yes',  0 => 'No'],
    'TRUE_FALSE' => [1 => true,  0 => false],
    'PAYMENT_MODE' => [1 => 'Live',  0 => 'Test'],

    'REG_STATUS' => [ 0 => 'Not paid', 1 => 'Registered & Paid',  2 => 'Rejected' ],
    'PAYMENT_STATUS' => [ 0 => 'Not paid', 1 => 'Paid', 2 => 'Failed'],


];
