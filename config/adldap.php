<?php
return [
    'hosts' => ['ntt.edu.vn'],
    'base_dn' => 'DC=NTT,DC=EDU,DC=VN',
    'username' => 'ldapservices@ntt.edu.vn',
    'password' => 'it@NTTU123',
    'account_prefix' =>'',
    'account_suffix' => '@ntt.edu.vn',
    'port' => 389,
    'follow_referrals' => true,
    'use_ssl' => false,
    'use_tls' => false,
    'version' => 3,
    'timeout' => 5,
];
