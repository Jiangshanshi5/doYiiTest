<?php
    define("HOST","localhost");
    define("USER","root");
    define("PASS","");
    define("DBNAME","shop");
	echo HOST;
	/**
	composer
composer config -g repo.packagist composer https://packagist.composer-proxy.org
composer config -g repo.packagist composer https://p.staticq.com
composer config -g repo.packagist composer https://packagist.phpcomposer.com
composer global require "fxp/composer-asset-plugin:~1.1.1"
composer composer.phar install
composer config repo.packagist composer https://packagist.phpcomposer.com
composer create-projec※t --prefer-dist yiisoft/yii2-app-basic basic
*/
composer config -g repo.packagist composer https://packagist.phpcomposer.com -vvv
 composer create-project --prefer-dist yiisoft/yii2-app-basic basic -vvv
 https://github.com/yiisoft/yii2