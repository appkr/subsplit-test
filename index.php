<?php

require __DIR__ . '/./vendor/autoload.php';

echo \App\ZooKeeper::feed(new \Animal\Zebra, 'wild plants'), PHP_EOL;
echo \App\ZooKeeper::feed(new \Animal\Bear, 'fishes'), PHP_EOL;