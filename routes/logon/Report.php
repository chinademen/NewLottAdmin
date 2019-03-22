<?php

/**
 * 广告设置
 */
$sUrlDir = 'report';
Route::group([ 'prefix' => $sUrlDir ], function() {

    $sResource = 'reports';
    $sController = 'ReportController';
    Route::get('/', [ 'as' => $sResource.'.index', 'uses' => $sController.'@'.'index' ]);
    Route::get('{id}/view', [ 'as' => $sResource.'.view', 'uses' => $sController.'@'.'view' ]);

});
// 报表路由
Route::get('day_bet_report', [ 'as' => 'DayBetReport'.'.dayBetReport', 'uses' => 'DayBetReportController'.'@'.'dayBetReport' ]); // 日投注报表
Route::get('day_bet_report/show/{date}', [ 'as' => 'DayBetReport'.'.showDayBetReport', 'uses' => 'DayBetReportController'.'@'.'showDayBetReport' ]); // 日投注报表详情页

Route::get('month_bet_report', [ 'as' => 'MonthBetReport'.'.monthBetReport', 'uses' => 'MonthBetReportController'.'@'.'monthBetReport' ]);// 月投注报表
Route::get('month_bet_report/show/{month}', [ 'as' => 'MonthBetReport'.'.showMonthBetReport', 'uses' => 'MonthBetReportController'.'@'.'showMonthBetReport' ]);// 月投注报表详情页

Route::get('issue_bet_report', [ 'as' => 'IssueBetReport'.'.issueBetReport', 'uses' => 'IssueBetReportController'.'@'.'issueBetReport' ]);// 单期投注报表
Route::get('issue_bet_report/show/{issue}', [ 'as' => 'IssueBetReport'.'.showIssueBetReport', 'uses' => 'IssueBetReportController'.'@'.'showIssueBetReport' ]);// 单期投注报表详情

Route::get('day_lottery_report', [ 'as' => 'DayLotteryReport'.'.dayLotteryReport', 'uses' => 'DayLotteryReportController'.'@'.'dayLotteryReport' ]); // 日彩种报表
Route::get('day_lottery_report/show/{date}/{lottery?}', [ 'uses' => 'DayLotteryReportController'.'@'.'showDayLotteryReport' ])->name('DayLotteryReport.showDayLotteryReport'); // 日彩种报表

Route::get('month_lottery_report', [ 'as' => 'MonthLotteryReport'.'.monthLotteryReport', 'uses' => 'MonthLotteryReportController'.'@'.'monthLotteryReport' ]);// 月彩种报表
Route::get('month_lottery_report/show/{month}/{lottery?}', [ 'as' => 'MonthLotteryReport'.'.showMonthLotteryReport', 'uses' => 'MonthLotteryReportController'.'@'.'showMonthLotteryReport' ]);// 月彩种报表

Route::get('user_day_report', [ 'as' => 'UserDayReport'.'.userDayReport', 'uses' => 'UserDayReportController'.'@'.'userDayReport' ]);// 用户日报表
Route::get('user_day_report/show/{date}/{user_id?}', [ 'as' => 'UserDayReport'.'.showUserDayReport', 'uses' => 'UserDayReportController'.'@'.'showUserDayReport' ]);// 用户日报表

Route::get('user_month_report', [ 'as' => 'UserMonthReport'.'.userMonthReport', 'uses' => 'UserMonthReportController'.'@'.'userMonthReport' ]);// 用户月报表
Route::get('user_month_report/show/{month}/{user_id?}', [ 'as' => 'UserMonthReport'.'.showUserMonthReport', 'uses' => 'UserMonthReportController'.'@'.'showUserMonthReport' ]);// 用户月报表

Route::get('user_day_lottery_report', [ 'as' => 'UserDayLotteryReport'.'.userDayLotteryReport', 'uses' => 'UserDayLotteryReportController'.'@'.'userDayLotteryReport' ]);  // 用户日彩种报表
Route::get('user_day_lottery_report/{date}/{user_id}/{lottery_id}', [ 'as' => 'UserDayLotteryReport'.'.showUserDayLotteryReport', 'uses' => 'UserDayLotteryReportController'.'@'.'showUserDayLotteryReport' ]);  // 用户日彩种报表

Route::get('series_way_report', [ 'as' => 'SeriesWayReport'.'.seriesWayReport', 'uses' => 'SeriesWayReportController'.'@'.'seriesWayReport' ]);// 投注方式报表
Route::get('series_way_report/{date}/{way_id}', [ 'as' => 'SeriesWayReport'.'.showSeriesWayReport', 'uses' => 'SeriesWayReportController'.'@'.'showSeriesWayReport' ]);// 投注方式报表

Route::get('user_way_report', [ 'as' => 'UserWayReport'.'.userWayReport', 'uses' => 'UserWayReportController'.'@'.'userWayReport' ]);// 用户投注方式报表
Route::get('user_way_report/{date}/{user_id?}/{way_id?}', [ 'as' => 'UserWayReport'.'.showUserWayReport', 'uses' => 'UserWayReportController'.'@'.'showUserWayReport' ]);// 用户投注方式报表

Route::get('merchant_report', [ 'as' => 'MerchantsReport'.'.merchantsReport', 'uses' => 'MerchantsReportController'.'@'.'merchantsReport' ]);// 商户报表
Route::get('merchant_report/{date}/{merchant_id}/{way_id}', [ 'as' => 'MerchantsReport'.'.showMerchantsReport', 'uses' => 'MerchantsReportController'.'@'.'showMerchantsReport' ]);// 商户报表


Route::get('merchant_month_report', [ 'as' => 'MerchantsMonthReport'.'.merchantsMonthReport', 'uses' => 'MerchantsMonthReportController'.'@'.'merchantsMonthReport' ]);// 商月报表
Route::get('merchant_month_report/{date}/{merchant_id}/{way_id}', [ 'as' => 'MerchantsMonthReport'.'.showMerchantsMonthReport', 'uses' => 'MerchantsMonthReportController'.'@'.'showMerchantsMonthReport' ]);// 商户月报表

