<?php
/*
|--------------------------------------------------------------------------
| 数据抓取配置文件
|--------------------------------------------------------------------------
|
*/
return [
    /**
     * 抓取货币市场行情 参数配置
     */
    'marketQuotation' => [
        //抓取路径
        'url' => 'https://www.coingecko.com/coins/currency_exchange_rates.json',
        //数币类型
        'digitalIdentifier' => 'BTC',
        //法币类型
        'currenciesLabels' => ['CNY', 'USD']
    ]
];
