<?php
require $argv[1] ?? dirname(__DIR__).'/vendor/autoload.php';
$app = new Illuminate\Foundation\Application(sys_get_temp_dir());
Illuminate\Support\Facades\Facade::setFacadeApplication($app);
$app->register(AmrShawky\LaravelCurrency\CurrencyServiceProvider::class);
$service = $app->make('Currency');
if (!$service instanceof AmrShawky\CurrencyFactory) throw new RuntimeException('Currency service binding failed');
if (!AmrShawky\LaravelCurrency\Facade\Currency::getFacadeRoot() instanceof AmrShawky\CurrencyFactory) throw new RuntimeException('Currency facade failed');
echo "2 currency compatibility checks passed\n";
