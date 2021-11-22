<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=' . getenv("DBHOST") . ';dbname=' . getenv("DBNAME") ,
    'username' => getenv("DBUSERNAME"),
    'password' => getenv("DBPASSWORD"),
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
