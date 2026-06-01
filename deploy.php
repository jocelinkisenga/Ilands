<?php

$secret = 'MonSecretTresLong2026';

if (!isset($_GET['secret']) || $_GET['secret'] !== $secret) {
    http_response_code(403);
    exit('Access denied');
}

$output = shell_exec(
    'cd /home/c2690576c/public_html/iland && git pull origin main 2>&1'
);

echo "<pre>$output</pre>";