2019-03-22 11:00:29
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
2.830ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.590ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1553788800 group by `lottery_id`
117.140ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.490ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
1.980ms

2019-03-22 11:01:29
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
2.990ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.570ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1553788800 group by `lottery_id`
119.670ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.180ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
1.930ms

2019-03-22 11:02:29
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.200ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
3.520ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1553788800 group by `lottery_id`
119.040ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.230ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
1.880ms

2019-03-22 11:03:29
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
5.820ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.910ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1553788800 group by `lottery_id`
122.390ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.920ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
1.900ms

2019-03-22 11:04:30
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
2.530ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.380ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1553788800 group by `lottery_id`
120.240ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.950ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.100ms

