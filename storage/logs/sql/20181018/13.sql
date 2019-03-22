2018-10-18 13:55:24
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.150ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.860ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
184.550ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.700ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.500ms

2018-10-18 13:56:25
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.120ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.710ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
177.840ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.980ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.650ms

2018-10-18 13:57:25
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
2.830ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.590ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
180.080ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.300ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.510ms

2018-10-18 13:58:25
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.150ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.630ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
198.800ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.900ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.650ms

2018-10-18 13:59:25
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.210ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.960ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
228.110ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.390ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.150ms

