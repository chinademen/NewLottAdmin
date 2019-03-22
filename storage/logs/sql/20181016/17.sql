2018-10-16 17:29:18
controller: AlarmController action: getAlarmData
select * from `functionalities` where `id` > 0 and `controller` = 'AlarmController' and `action` = 'getAlarmData'
9.170ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = 34849 order by `sequence` asc
2.950ms
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.070ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.790ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
524.360ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
6.460ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.540ms

2018-10-16 17:29:21
controller: ProjectController action: index
select * from `functionalities` where `id` > 0 and `controller` = 'ProjectController' and `action` = 'index'
8.580ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = 34659 order by `sequence` asc
3.340ms
select * from `functionalities` where `functionalities`.`id` = 34659 limit 1
2.440ms
select * from `search_configs` where `search_configs`.`id` = '30196' limit 1
2.790ms
select * from `search_items` where `search_config_id` = 30196 order by `sequence` asc
14.570ms
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-16 00:00:00'
3.950ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-16 00:00:00' order by `id` desc limit 20 offset 0
5.330ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
7.960ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
23.660ms
select `id`, `name` from `merchants` order by `id` asc
28.360ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
12.810ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
8.330ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34660' order by `sequence` asc
2.190ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34783' order by `sequence` asc
1.990ms
select `id`, `name` from `lotteries` order by `id` asc
2.500ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
4.940ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IndabWMreVZwZHY4WkhBRXZTcUZXSmc9PSIsInZhbHVlIjoiQlIrWmlHUDJLU1NMNFhaODZKSHc4VVZXMzYxUUc1QnVsaG5lK1BvV2lIYXc0MFp2TnFlTndVbEorNWRvRW9Fbjl5dlJMbEJzYXg0Snl0S2ZYOUIyK2c9PSIsIm1hYyI6IjA5YjllNDQ5NmQyZGQwOWQ0Njk0YzAzMzc3YjU1MDdmNzg1ODdkNDUzZTI1NWNiMTA3NTZhMzhiNmEzYTQ2MmUifQ%3D%3D; l_acs_m_session=eyJpdiI6IkwxcFZocHF5dkpqdks5R1EwQ2NMM1E9PSIsInZhbHVlIjoiR2Q0clYxZG16YXJlUitzRWN1aGwwSmIwS2dHS2VTaXFlQ3ZSR3Y5OGR5V1c5UGtrV3RwSDJISndTYXJOaklpU3hERU9pSVVnTGtJQWdFcGN6QnJxZGc9PSIsIm1hYyI6IjRkMmFmMTkwNTlkYzFkODEyZDc3M2Q5MmI5NzcyYzM5Y2MyNGIyYzRlMTQ5YWE1NTcxMTAwMTQ1MmVlNjMxMDcifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50678","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682161.1892,"REQUEST_TIME":1539682161,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-16 00:00:00"}', '2018-10-16 17:29:21', '2018-10-16 17:29:21')
552.180ms

2018-10-16 17:29:23
controller: BetRecordsController action: view
select * from `functionalities` where `id` > 0 and `controller` = 'BetRecordsController' and `action` = 'view'
3.800ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = 34785 order by `sequence` asc
1.980ms
select * from `bet_records` where `bet_records`.`id` = '578' limit 1
17.010ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.920ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34785, 'View Bet Records', 'BetRecordsController', 'view', '/bet-records/578/view', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Imd4akRqRlBoVzlXbjlcL0VqTVNxWXFRPT0iLCJ2YWx1ZSI6Ik9iTHFqTkxkTm1WbTdMbzJmXC9ZeVJkUTVQUjZ4Y2dIVW9LamhiQmV6dzBlQjJhVTRsbDNDeXdEeGFad2VSSm1Ra2d0emZiVnk2WEtcL2hVZ0gyMHNqRmc9PSIsIm1hYyI6IjhlNmNiZDU2M2MzMTJhYTllZGRhNzQ4YmVlMGZiMWJiNjhjZTM5NWJhMDQ5ZGUyNWZjYWM2MmRhNjBlZDJhZGMifQ%3D%3D; l_acs_m_session=eyJpdiI6Iit6UzFuMStBUzdiSElvaWNoczZ6QUE9PSIsInZhbHVlIjoiR0x0K0xzUTREZmFNb21sb3hBR21PMXZkWmpTR2NadGZYTXozRng0bzR2UDhcL0N6aEQyVndEMXdENXVNTVMwMU5RcTdnWTlMR3lCYkdGQWc3UGxETVNRPT0iLCJtYWMiOiJiZjZlYmRjNmM2YjhiZDc5N2NkNDA4NWEyM2E1MTJlNmQyYzc1MzJmOGQzN2JhMzBjYjBhMzRiZGZjOTFjNzI5In0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/projects","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50678","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/bet-records\/578\/view","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682163.2542,"REQUEST_TIME":1539682163,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-16 17:29:23', '2018-10-16 17:29:23')
504.790ms

2018-10-16 17:29:33
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-16 00:00:00'
5.470ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-16 00:00:00' order by `id` desc limit 20 offset 0
5.430ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
9.670ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
11.970ms
select `id`, `name` from `merchants` order by `id` asc
47.310ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
9.970ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
3.730ms
select `id`, `name` from `lotteries` order by `id` asc
3.740ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.420ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IkU5RUtaUVI2Umk0SUJwMjdvTUNZUUE9PSIsInZhbHVlIjoiTXZDN2Q0QjA0RE1peGVTcklwT3lXQlNiSnVVTXFcL1c3VUN1bWoyYjdwZUp5d2pEU1ZtdXJ0NU5nUkJQaDU4ODFZSUFDWEdiMGdjU3ZHbEpzcWtMSk1BPT0iLCJtYWMiOiJhNjAzNDliNjQ2NTExZTUxNGZkNGNhZThiMzQ5NTlhMWExYjdiOTQwMTEzMDE0ZjlkZGU0NmRiYmY5YWJiODZjIn0%3D; l_acs_m_session=eyJpdiI6IkJaZ200bm5BY1RyWFV1NzBVeVVtV0E9PSIsInZhbHVlIjoiSmlhcmI5Tnk1aG9Qa1wvOHJcL1JreGxQSGowYnZMVVQybXR1b3F0azVaZXlibFlWOEpFYzFncitUVkRxdVUxVVwvQTNUZWZOb3ZoalwvcnVwSzdwMGMxNEtnPT0iLCJtYWMiOiI3MmEzMzRhNWIwNDI2NDY3M2EwZjFlZWZmNDVhZTZjNDIyOTAxZmJiOWRjZGZmYzVmZjNjNjJjMDk2NTkxZmViIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50678","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682173.1192,"REQUEST_TIME":1539682173,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-16 00:00:00"}', '2018-10-16 17:29:33', '2018-10-16 17:29:33')
398.970ms

2018-10-16 17:29:39
controller: BetRecordsController action: view
select * from `bet_records` where `bet_records`.`id` = '578' limit 1
22.530ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.680ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34785, 'View Bet Records', 'BetRecordsController', 'view', '/bet-records/578/view', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IlF0YlVcL0ZxSGNNQnV6QWlcL2ZsZzdaZz09IiwidmFsdWUiOiJmbVlDNkZod1wvTmFOQk96MmVhMlwvUTI4Y3dZb2tDVW9oZWZWcVE5dEdON09WWExadnVVQlQ1V3ZpaGxwa25KQ2x0cTdxR0RzYUFKSXYzS0Z0dGZkVkV3PT0iLCJtYWMiOiJjOTcwOTZiZTRhYTg1ZWRlZjRmNzcxMWNkMmJjYWU0NTgwNWI0YTM5ZmQ1ZWVhYzdmNzEyNmUxZjdlODBlOTUzIn0%3D; l_acs_m_session=eyJpdiI6IlUwRmpqN0cyTkFkWjdZb3RicWsrWXc9PSIsInZhbHVlIjoiOHlBbUdldmpBQjBSMjhIMEFSMG9jNXJnRVRvKytqRU1ETEVTc1pxNHJaYnRFaEhRWWowNlVcL0M2ZSsrekNwZXZrSFEyWGVaQlppSFRRcFQybnpVeGpnPT0iLCJtYWMiOiI5YTM3MDI3YjNmZjUyNDNhYjdiYjYwY2M0ODQ4Yjk0ZGNjOTNkNWUwYzRlZmQwZGIwMGNmYmE5MmFiODM3NjIyIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/projects","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50678","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/bet-records\/578\/view","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682178.8965,"REQUEST_TIME":1539682178,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-16 17:29:38', '2018-10-16 17:29:38')
446.330ms

2018-10-16 17:29:41
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-16 00:00:00'
5.200ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-16 00:00:00' order by `id` desc limit 20 offset 0
5.700ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
12.920ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
9.820ms
select `id`, `name` from `merchants` order by `id` asc
4.280ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
8.110ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
2.620ms
select `id`, `name` from `lotteries` order by `id` asc
2.850ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.500ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Ilg3NURBZndlSnBsM3pzaTVvWFprMnc9PSIsInZhbHVlIjoiY3lNM1ZyQ0swRWVOcVplTVRiVmxEQkI5aEhlNysxcjUxUlFlWTl4dWZ6bmVvRW1xN1pybG9FVjlYSEpNcUVWQ0hQNlF1OWJIWVhSMXdLdTBjYnAxbkE9PSIsIm1hYyI6IjUyYWQzMzdhYzMxM2U2MzM0NTYxZmZhZWMxODc5ZGU5YzY3OWNlZDEwNmM2NzVmMDcwZmYwYTU3MTljNjdlNzkifQ%3D%3D; l_acs_m_session=eyJpdiI6IlorNnlnSGhFUWFTYTZKNXhxTEtUdXc9PSIsInZhbHVlIjoiY0w1VElyOHdDWktvd3hRSDNBSWxWSUZ0RHlqbVlVXC9CWUNcL1VscWh0bUY1dTFNU05ZbkhmYWpqQjJVRGNxUnlnZlhsRVwvK0RTMUFuUkoxdGJkeVZlSHc9PSIsIm1hYyI6IjMwZDg2M2ZmZjcwMjlkYjIxNmEwMTk4MGNmM2RjYjQ3ZGE1ZGYxMzRhY2I4YWI0YTZlOTkwMTE1ZjVlZTA0ZjcifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50678","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682181.1611,"REQUEST_TIME":1539682181,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-16 00:00:00"}', '2018-10-16 17:29:41', '2018-10-16 17:29:41')
448.440ms

2018-10-16 17:29:45
controller: BetRecordsController action: view
select * from `bet_records` where `bet_records`.`id` = '578' limit 1
23.310ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
3.220ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34785, 'View Bet Records', 'BetRecordsController', 'view', '/bet-records/578/view', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6ImNVbnpubitXMmRBWkxNeFkrXC8reFZBPT0iLCJ2YWx1ZSI6Ik9JUUZKbnQxanFBSGhqWjRtVW4rNlptY3pYNjJocUh2RkR1ZEJhb3FXUzlHTGxMV21kYjVLdyttbjBPcXg5NGN6RTZkQlwveEJVT240RVhCWTVaUmd0QT09IiwibWFjIjoiYTQ2MmY5ZTMxZDM0Mzc5Y2E3NWM0ZjY4NGZiYTNjYjE4ZjQxYTZmNmNjNzcxMGQ3ZDFhYjAyZjlkYzJlMWE5ZCJ9; l_acs_m_session=eyJpdiI6IkNtMndCd3JyK1JKcXJaQXFSTFNqbnc9PSIsInZhbHVlIjoiUlhjNTczSUdJTUROU1h2UTdyQzlteEptZjNaNzE5Z1NqaWpqVjdHdnQzWktuNXArQ0FjQmVuRXM0MnJDR3VcL3dEdzJsZDZqQjNIWVVvY015cURcL2xtQT09IiwibWFjIjoiY2U3NGUzODllMjQ1OTRkNGQzZjRjNTQ1ZTdlNTE4MWVkZDdlY2RiNGEyMDg2ZjY0Y2VhY2M0NTE2OWNmODkyMCJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/projects","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50678","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/bet-records\/578\/view","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682185.3461,"REQUEST_TIME":1539682185,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-16 17:29:45', '2018-10-16 17:29:45')
418.060ms

2018-10-16 17:29:49
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-16 00:00:00'
5.010ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-16 00:00:00' order by `id` desc limit 20 offset 0
5.770ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
9.240ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
11.810ms
select `id`, `name` from `merchants` order by `id` asc
59.200ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
26.660ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
5.430ms
select `id`, `name` from `lotteries` order by `id` asc
8.280ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.500ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Im11ejQ1bGVZNUM3NzJIekNUekk3bHc9PSIsInZhbHVlIjoiM1lubmxHNW9JR3hzVkNOTllraHN4NlBnQlZ6UW5ZK2k1azF6c01IYTB2NzlkdngzVE9GXC8wMVNNNGhFNkZJSjcwWjJXNXNVWDVxc1NQZkJNZGlsRjVRPT0iLCJtYWMiOiJlZjNkNThmMzFlYmE3OWM4OTg4YjdjOGFlOGIwZmNlNGFkOWJmZWU5MjQ1Y2I2YzhkMTIxZGE5ZjMwNTA5YTZkIn0%3D; l_acs_m_session=eyJpdiI6IlVhXC9BNFFcLzJHTVVmSG1JQ2pEbzlpZz09IiwidmFsdWUiOiJveFVWM3dGYmRzczdqUGZ0NzNMczNORCtXZHRlenQzOTU1R2RWeXIrU1B0MlpwVVB5ZEg0b05DUDhGaHZtVXNWOWo5WmtFUlpOeXFsK212RVAyeFE5UT09IiwibWFjIjoiNTViYzVhMmQ1OWQ0NjZiNDM1MTgyZDNjMzViZDI1ZmJmYzNkYWEzNzcyZDgxNmJiZmUxOWFhZWM1NTFlOWIzMyJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50678","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682188.8962,"REQUEST_TIME":1539682188,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-16 00:00:00"}', '2018-10-16 17:29:49', '2018-10-16 17:29:49')
508.590ms

2018-10-16 17:30:18
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.310ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.740ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
549.430ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
4.560ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.820ms

2018-10-16 17:31:18
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.610ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
5.850ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
662.440ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
4.450ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.690ms

2018-10-16 17:32:18
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.480ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
3.000ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
603.770ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.440ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.720ms

2018-10-16 17:33:18
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.260ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
3.080ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
467.550ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
5.150ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.350ms

2018-10-16 17:34:18
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.380ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.740ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
443.380ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
8.800ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.840ms

2018-10-16 17:35:19
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.270ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.610ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
360.030ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.830ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.510ms

2018-10-16 17:36:19
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.290ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
4.160ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
669.570ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
18.400ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
4.240ms

2018-10-16 17:36:24
controller: BetRecordsController action: view
select * from `bet_records` where `bet_records`.`id` = '578' limit 1
42.250ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
4.460ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34785, 'View Bet Records', 'BetRecordsController', 'view', '/bet-records/578/view', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Ikd2M3dtREEyYUtFcmprOHRkSHlRQkE9PSIsInZhbHVlIjoiOEpKK0JYUHNSak1LYnVvQnZFT0JIUUJXV0R0R24zV1RlWDBTSUREVEhtMTVteFBKVTEwZ21Scm9VN2Y4a1hyUDlVenpjKytLdEVwazJ4ektjMVVPZHc9PSIsIm1hYyI6IjBiM2YxYzdiMmZkNGVjZTE0YWE2MTVmYmVmNGRlNTlmZDYzNzJlYjkzNzc0MDIyNGJjMmJiOGZlMTBiYmJmNDYifQ%3D%3D; l_acs_m_session=eyJpdiI6IlRMaHRWdjF4NHF1ejRRV2dYdnFjM2c9PSIsInZhbHVlIjoibXlyZVFCaThhbGZEblZpXC9sQ0RrT1QzQmR4Z1kwTVlCaXpneDQ0V21zZ3I1ZFhJXC83OVNxb2liYjBGUnFlVnpOZ3I4bE1XcFc4VlI0WUtkQzZYT1pDUT09IiwibWFjIjoiOThkM2U1MjkwYTU3MjJjZjI0YTNiZWQxZjZhMGJkOWZkZjgxNTMxNWRhMzAzYjhmNDM0NjI2M2E2ZDFhYjEzNCJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/projects","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50678","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/bet-records\/578\/view","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682584.0242,"REQUEST_TIME":1539682584,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-16 17:36:24', '2018-10-16 17:36:24')
523.590ms

2018-10-16 17:37:19
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.300ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.920ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
597.990ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.590ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.600ms

2018-10-16 17:38:19
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
2.950ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
3.150ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
459.600ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.730ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.850ms

2018-10-16 17:38:26
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-16 00:00:00'
5.920ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-16 00:00:00' order by `id` desc limit 20 offset 0
5.910ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
16.770ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
11.710ms
select `id`, `name` from `merchants` order by `id` asc
25.090ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
9.170ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
3.740ms
select `id`, `name` from `lotteries` order by `id` asc
2.630ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
5.830ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjhEVHNCR09nQXc2dUpDdGNsamlNZ3c9PSIsInZhbHVlIjoieGt4OXZUZzRiUUlNRm5jc3JvMU9WMWVVTlFaVzhldWZNOFR5T0V2K2FybFwvaGszWmxUOXFENXBLcCs5QVcySXFFZmQ4NjBXVCsxSjIxV3R5WUM3UmhBPT0iLCJtYWMiOiIxZTJkOGU1ZDdhZjc2MjQ4Nzg0YWQyNmFkYWE1OTBlZGQyNDM2NzYwZWFlOTI2ZmJhMTU1MWZjNTZiNzYzZDI0In0%3D; l_acs_m_session=eyJpdiI6IkJzUWh0ZVdXUlwvSms0YXk4RjFJRzlnPT0iLCJ2YWx1ZSI6IjFXQ04wOXUwSTVtUmd0QzJjamkwcVA5UlRlOVlSanFoZDJTa3hiMWU4SmdrMHBPd2FqbTRvNEc2MTBsSFQ5eXhlVWdaWVJDSmJaK3JhS0FvVFZjUVV3PT0iLCJtYWMiOiJiN2Q5Zjc0MDdmMTQ5OTg1YjQ4NjZmOGJlNjA2OTBiZjZiNDU5NWNkMDcxMjUwYWE4OTBjM2RmMjgzOGRjNTRmIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50824","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682705.3697,"REQUEST_TIME":1539682705,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-16 00:00:00"}', '2018-10-16 17:38:25', '2018-10-16 17:38:25')
538.200ms

2018-10-16 17:39:15
controller: DictionaryController action: index
select * from `functionalities` where `id` > 0 and `controller` = 'DictionaryController' and `action` = 'index'
20.850ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = 1536 order by `sequence` asc
3.590ms
select * from `functionalities` where `functionalities`.`id` = 1536 limit 1
2.430ms
select * from `search_configs` where `search_configs`.`id` = '45' limit 1
2.990ms
select * from `search_items` where `search_config_id` = 45 order by `sequence` asc
3.730ms
select count(*) as aggregate from `dictionaries` where `id` > 0
2.950ms
select * from `dictionaries` where `id` > 0 limit 20 offset 0
5.320ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries'
7.270ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries' order by ordinal_position;
15.020ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 1536 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
23.910ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('1541', '1601', '1537', '1538', '1539', '1754', '1540', '1546', '1553') and `disabled` = 0 order by `id` asc
8.730ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '1541' order by `sequence` asc
7.890ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '1538' order by `sequence` asc
2.340ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '1539' order by `sequence` asc
2.260ms
select * from `popups` where `popups`.`id` = '1' limit 1
3.110ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
7.350ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '1540' order by `sequence` asc
2.000ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '1546' order by `sequence` asc
1.780ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '1553' order by `sequence` asc
1.890ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.480ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 1536, 'Dictionaries', 'DictionaryController', 'index', '/dictionaries', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IkdJSXArWGRiakttaXp2aTlkUHRJVFE9PSIsInZhbHVlIjoic2ozYk5rU2xWeEdpQm5TOEJja3Nwb25WajF3alFFMDE0ZHFaMklLN1JuTys1cTlFVXozZzF4MU9YR2JkTkFPOGNmc2RNOTRQRG50NG9jQllMa2RwUGc9PSIsIm1hYyI6IjQwNzlhYjMyNTdiY2UxOGM2ODVjNDZhNzUzYjFkZmQ0Nzc5OTNkNWNhNTM5NmMyMGE5NGVmZmM4OGNkNDNiMjEifQ%3D%3D; l_acs_m_session=eyJpdiI6IllHNDF3R3ZETDNzNnRwK3M3QlNuT3c9PSIsInZhbHVlIjoid1R2SWFPNFpGdzhRVm00REdKa3FoeDNNRGs1SnlqUThZOGJTd3E1ckdNWUh0Ujc0bWhPK280OE5MakRlTlRQSk5hSWVJK1FtZDgrUW1lTm85UnNNYVE9PSIsIm1hYyI6IjhlMTQ1ZjZmOGZjMGQxYjg5ZmZjYjk5M2QwNTViNDQ2NWI1Njg4MTNkMjM5Y2NmNjliNzAyNTM4ODM3ZDc1MDAifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50824","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/dictionaries","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682754.9805,"REQUEST_TIME":1539682754,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-16 17:39:15', '2018-10-16 17:39:15')
511.640ms

2018-10-16 17:39:17
controller: VocabularyController action: index
select * from `functionalities` where `id` > 0 and `controller` = 'VocabularyController' and `action` = 'index'
3.730ms
select * from `functionalities` where `functionalities`.`id` = 1541 limit 1
2.730ms
select * from `search_configs` where `search_configs`.`id` = '43' limit 1
2.440ms
select * from `search_items` where `search_config_id` = 43 order by `sequence` asc
3.290ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries' order by ordinal_position;
7.470ms
select `id`, `name` from `dictionaries` where `id` > 0 order by `name` asc
13.220ms
select count(*) as aggregate from `vocabularies` where `id` > 0
41.620ms
select * from `vocabularies` where `id` > 0 order by `keyword` asc limit 20 offset 0
53.500ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'vocabularies'
7.270ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'vocabularies' order by ordinal_position;
7.160ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 1541 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
9.490ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('1542', '1543', '1544', '1545') and `disabled` = 0 order by `id` asc
64.090ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '1543' order by `sequence` asc
3.380ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '1544' order by `sequence` asc
2.180ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
2.810ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '1545' order by `sequence` asc
2.120ms
select `id`, `name` from `dictionaries` order by `name` asc
30.730ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
3.640ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 1541, 'Vocabularies', 'VocabularyController', 'index', '/vocabularies', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjAydnZjbUduUkR5Qk9rZ1wvUUlvVGdRPT0iLCJ2YWx1ZSI6IndDbmYyOGRIU21iRmFXTTFSeDdhZG51eDZsYWl2Um1vaXJzZmlMaTVmTWg0VFp4Nm02Z3YwVjgrTlN4M1lXdnJvaitibWJONFBiUHYrMUozU3l1YTdBPT0iLCJtYWMiOiIyYTBjMjVkOGE2MzJhNGFhMWM2NWNiYmJhMzA0ZWY2MWI0YjMyNTVmN2ExYjA3ZWNkZThiMTU2N2I0NDFiYjI1In0%3D; l_acs_m_session=eyJpdiI6IkV4MFNUYzFSeXNTbmxtMjRpWlBtSkE9PSIsInZhbHVlIjoiK0l1SXFvMkFXNGFnZ3duTHlCdXg5aHBXNHpoMFRWM0FlMjgzNzArYUFxcG5udldZWlk1UEQ4S29sQU9TVVwva0hDRlwvR1RReUdoSVZrVnZRR1VuN3NyQT09IiwibWFjIjoiODg2ODgwMjM5NjEwNTNkNmQzYmVjYjQxNWM0Njc4MWExZTUwMzc3ODc0Y2Y3YjA5MzdjMDQxOGRhNTA5ODg4YiJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50824","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/vocabularies","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682756.6196,"REQUEST_TIME":1539682756,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-16 17:39:16', '2018-10-16 17:39:16')
553.400ms

2018-10-16 17:39:19
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
2.890ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.790ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
485.810ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
6.650ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
3.040ms

2018-10-16 17:39:24
controller: DictionaryController action: index
select count(*) as aggregate from `dictionaries` where `id` > 0
4.850ms
select * from `dictionaries` where `id` > 0 limit 20 offset 0
2.450ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries'
37.080ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries' order by ordinal_position;
44.260ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 1536 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.080ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('1541', '1601', '1537', '1538', '1539', '1754', '1540', '1546', '1553') and `disabled` = 0 order by `id` asc
4.890ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.110ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
3.640ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 1536, 'Dictionaries', 'DictionaryController', 'index', '/dictionaries', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6InlzbTBiWUtESVpKbXI5WUtWZytEMFE9PSIsInZhbHVlIjoiQnZDcHFPYXo2aTEzZDNtVGpGZDdLcTNablZ6YVNzNXRPczBEY01sU3NkWmJMSUYrWEZ2KzBzb0R0UUdMdFJkQ3hVOGo3TTZpaHN2dzRkbnA3cG5SQkE9PSIsIm1hYyI6IjFmNzE1NmE1Y2FlODcyNmEwM2Q0MzVmZDJiMWE3OTEyNzZiYWI5NmJmNjEyZDkyOWEwNTBmMGE5ZWI4YWQ1MjcifQ%3D%3D; l_acs_m_session=eyJpdiI6IjFwN1VLNkh6M2JTdFNYR1krK0JVZ3c9PSIsInZhbHVlIjoiRTY5QVRrNngwOFRyZ0ZONXJOU2F0ODZuZ0ZUaFpMXC9yUEVJSmhRYmdZd0N3Z1NXWGxnUWJoSVFyVW9CamYzZ0w0eFpsd0RyYWtFN1BwdlFyTDBBRStRPT0iLCJtYWMiOiIzODdhZTNmM2I0YjllMGZkZWMyZTAwODgyODkxNTc4MGU1ZGE2YjhhZGVhMzM1NDQ0ZmU0OTZkNjg2YWI4YWRjIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50824","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/dictionaries","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682763.9154,"REQUEST_TIME":1539682763,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-16 17:39:24', '2018-10-16 17:39:24')
489.860ms

2018-10-16 17:39:27
controller: VocabularyController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries' order by ordinal_position;
13.610ms
select `id`, `name` from `dictionaries` where `id` > 0 order by `name` asc
15.490ms
select count(*) as aggregate from `vocabularies` where `id` > 0
11.380ms
select * from `vocabularies` where `id` > 0 order by `keyword` asc limit 20 offset 0
17.020ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'vocabularies'
8.630ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'vocabularies' order by ordinal_position;
24.520ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 1541 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
13.560ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('1542', '1543', '1544', '1545') and `disabled` = 0 order by `id` asc
3.350ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
6.700ms
select `id`, `name` from `dictionaries` order by `name` asc
9.290ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.940ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 1541, 'Vocabularies', 'VocabularyController', 'index', '/vocabularies', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IlVVT3NEVjExVlZadXJkOFBWRFwvY1dnPT0iLCJ2YWx1ZSI6IjZxWVNuU2NGbmNjSjZlTmJHZ2E4aVNqdmEzblN1TU5pR3QzMUs0K1ZFemVMR0hyVjBudDNna0ZlamZIbmZBK25rblVFemYwUHlpMXNTS2JrNlo3ZzFBPT0iLCJtYWMiOiIxN2Q5MGM5YjhmZWZiN2UxYmZlZTU0YjdjYmIxNmNiNWE2ZTYzYmNlNWMyODllN2NlZGM1MjM2MTdmNWMwODQ1In0%3D; l_acs_m_session=eyJpdiI6IjdnWVNiMnd2SGZFK0p0eEduTm5sNUE9PSIsInZhbHVlIjoiNkhTcmN2K09CVk9MTUEzd2FYVDhBRjRQZDI2cFZHZ2x2UHR1bm9GdWtrbkJJUkhkMjZ6WFBYQ2pTME5IOTQwTWRtdWdOemwzSEJDdlZGdFFGSjU1aFE9PSIsIm1hYyI6ImM1MTdiYWFmZjU3OWYwZWQxZTFkZGI0ZDg0ZmJjNDUyMTc4OGVlYjZjN2UxOWZlM2NhODI4N2RmN2YxODYzNTcifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50824","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/vocabularies","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682766.3363,"REQUEST_TIME":1539682766,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-16 17:39:26', '2018-10-16 17:39:26')
600.080ms

2018-10-16 17:39:30
controller: DictionaryController action: index
select count(*) as aggregate from `dictionaries` where `id` > 0
3.070ms
select * from `dictionaries` where `id` > 0 limit 20 offset 0
25.370ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries'
15.860ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries' order by ordinal_position;
14.740ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 1536 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
10.840ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('1541', '1601', '1537', '1538', '1539', '1754', '1540', '1546', '1553') and `disabled` = 0 order by `id` asc
12.160ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
15.190ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.540ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 1536, 'Dictionaries', 'DictionaryController', 'index', '/dictionaries', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IkE1SWdiRG04djN6RmpaN0d0MTBcL2N3PT0iLCJ2YWx1ZSI6IjJCWTRjNlpRb1Z4VXBMXC9jTStQRmVhaFh3T2Rlb3ROa1ljK1h3VjdXcGZ0UFg3ZU1ZaHNHRjRKREpxVkhkK2I4SmxnV1I4YTR2TWIrV0hyQTcyM0k3QT09IiwibWFjIjoiYmYwNWZmYTAwODA4MzlhMTJjYjc3M2ZiMjEwYmY3ZThlNjRmZGVmMDk4ODNiNjU5YTUwNDIyOTBjNWZhYzIyMiJ9; l_acs_m_session=eyJpdiI6InpNSXlaV0ljemN5K3VUdXJyYTVBM3c9PSIsInZhbHVlIjoiVjVnZWVJY0prZGpHdEdPZWJxTUxPM281cGxSTldseU52UUJuVG9CamRCMk51K29XRVNEZ21JRXVNY3J0c1p5bFd0VUZPUFJKNjBuXC9HeUkyVWZzOFJRPT0iLCJtYWMiOiJmNWZlZWE0MmE4ZjFhMDQxYTViMjhkZmQ2Nzg4YjI4MWM3YTc2ODJhOGRjOGI1MTA1ZDY0MDQyNjBhY2Q2ZTZhIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50824","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/dictionaries","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682770.3833,"REQUEST_TIME":1539682770,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-16 17:39:30', '2018-10-16 17:39:30')
438.370ms

2018-10-16 17:39:35
controller: DictionaryController action: index
select count(*) as aggregate from `dictionaries` where `id` > 0 and `name` like '%projetc%'
23.220ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries'
36.050ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries' order by ordinal_position;
19.550ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 1536 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
9.230ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('1541', '1601', '1537', '1538', '1539', '1754', '1540', '1546', '1553') and `disabled` = 0 order by `id` asc
4.900ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.960ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.330ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 1536, 'Dictionaries', 'DictionaryController', 'index', '/dictionaries?is_search=&name=projetc', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjdrMEs0M0xjNGR6RUZ1VnNpS0lvT2c9PSIsInZhbHVlIjoia3cxYVFHR3VMZkFmdjVwWVNIRkZOdDBSWnpISjRnc1FcL0JFMk5IdDVyS3czcitLd2RqdUQwTDFnTndcL3plMml1TWhTWGZwdnA3d3NxS296TGNlaEpUZz09IiwibWFjIjoiZTFlOTEzZGI1MzVkZTRhMGU1MGNiMzc0MGJlYjRlYWM0YWU0MjlkZTI4YTI4Yjk5ZjYyYzM2Y2Y1ODczNDYzZiJ9; l_acs_m_session=eyJpdiI6InRZY0x4aWRYalkxY2cwUHlTeEVhd1E9PSIsInZhbHVlIjoiVjhkbkpIMkFKQXU5MXNKOGMyaDR3TDlDdmxzY0FIV3lpeW5zaGpcL2dTbHNlNUhIanpqWDBJRzl4NUZQMlNxY1pzYlVlYjl2Wk5IMkFqUm9yZUNrQkt3PT0iLCJtYWMiOiJmMTU5MGVjZjQ0NzQwOTk0MjU3NzhjODY4OTkzMWYxMDQ0YjBmYjJkNTJiZTQ4N2MxMjZiZmZmM2RlNzRmZjFmIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/dictionaries","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50824","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/dictionaries?is_search=&name=projetc","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"is_search=&name=projetc","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682774.9532,"REQUEST_TIME":1539682774,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"is_search":"","name":"projetc"}', '2018-10-16 17:39:35', '2018-10-16 17:39:35')
487.360ms

2018-10-16 17:39:40
controller: DictionaryController action: index
select count(*) as aggregate from `dictionaries` where `id` > 0 and `name` like '%project%'
32.030ms
select * from `dictionaries` where `id` > 0 and `name` like '%project%' limit 20 offset 0
8.120ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries'
8.010ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries' order by ordinal_position;
7.960ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 1536 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
8.060ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('1541', '1601', '1537', '1538', '1539', '1754', '1540', '1546', '1553') and `disabled` = 0 order by `id` asc
3.940ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
22.830ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.380ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 1536, 'Dictionaries', 'DictionaryController', 'index', '/dictionaries?is_search=&name=project', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6ImFlazd5a1prK3V2blRDT3FzMHFuK1E9PSIsInZhbHVlIjoic20zZGxYc05CWW90UlhjdXdOU1krT0J1NGpSXC9mRTBFSGZYdlMyS0E3eUkwbkZuVmk3N2phc2swMWxYa25LdEcyZVJtT2NIQkFBbVdJbnZuTUl6ZkhBPT0iLCJtYWMiOiI0NDg1Nzc1MmEyYWFmYTgzZTliYzMxNmQ1MDdjNjQxYjg5N2NlZDE1MWUwMDk3M2EzMWEyY2I1YWI4NjJkZTIzIn0%3D; l_acs_m_session=eyJpdiI6IkhxV2pCTGVcL0xxQzNOVXdBYThFT1VRPT0iLCJ2YWx1ZSI6InNjVkRXMVBkVlhtR0UwY0NpUmhQQzJnUWw0dUZ2YTYwSTRFMEROUFJYRWJqR0F3WUJkbVJtdFdvUjQ3b3orTjhmYjdHZjQwbHlCV2p6a3lpbjAwM1lnPT0iLCJtYWMiOiJkZWZjNGY2Yjg4NTI4ZDVkZDBiMGFlMzgxYjAzMWVmNmEwNzQ5MmQ5ZTBjYzg1NWNmMTIwODg5M2JjMTE3NDg3In0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/dictionaries?is_search=&name=projetc","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50824","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/dictionaries?is_search=&name=project","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"is_search=&name=project","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682779.7182,"REQUEST_TIME":1539682779,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"is_search":"","name":"project"}', '2018-10-16 17:39:39', '2018-10-16 17:39:39')
477.810ms

2018-10-16 17:39:59
controller: VocabularyController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries' order by ordinal_position;
12.340ms
select `id`, `name` from `dictionaries` where `id` > 0 order by `name` asc
8.830ms
select count(*) as aggregate from `vocabularies` where `id` > 0 and `dictionary_id` = '30685'
14.230ms
select * from `vocabularies` where `id` > 0 and `dictionary_id` = '30685' order by `keyword` asc limit 20 offset 0
3.420ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'vocabularies'
8.870ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'vocabularies' order by ordinal_position;
7.420ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 1541 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
10.110ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('1542', '1543', '1544', '1545') and `disabled` = 0 order by `id` asc
3.290ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.680ms
select `id`, `name` from `dictionaries` order by `name` asc
6.490ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.400ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 1541, 'Vocabularies', 'VocabularyController', 'index', '/vocabularies?dictionary_id=30685', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6InRyKyt3NlFUYmVOamMyN2laREs0elE9PSIsInZhbHVlIjoiQmVzeTBLMVR6MmZqc2laaEtWZCtiQ3dRQjJYOHZldURWWk9OK09ZWTBMNW52eTBUVGRJQ2t1eU42dGVkOFZBeWN4Rm10TEFTd0xcL0RpSlZESjNjZzJRPT0iLCJtYWMiOiI4ZGM3ZGFiZmVmOWMxMDc0YzkwNjU0YmU0Y2IxOWY2NTUyOGZjOTRjOTI3ZWM2N2E1NGRhODBlNzVmZjE5MjIwIn0%3D; l_acs_m_session=eyJpdiI6IitQdUZkQ2lYUnJvU0d0NlFcL2J3SUZBPT0iLCJ2YWx1ZSI6ImZUcVduT29iQlNvNEhPNDRwb0lSSXV6VDNKdWlyb0hXR0Y5cTJSMFpuUWQrckJHaTFURnI4ajQxbkVFWG4zU3F0a2M3RjN6QkRWVWxcLzRUVUNxTTZQZz09IiwibWFjIjoiOTZhZGQyYmFlMTM5NGE5OTVlYmQ1YzRmYTliOWI4MTg0MjBlYzMyNDY5NDIxN2RiMWNhZTUyNDU1YzQ2MDI3YiJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/dictionaries?is_search=&name=project","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50824","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/vocabularies?dictionary_id=30685","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"dictionary_id=30685","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682798.9453,"REQUEST_TIME":1539682798,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"dictionary_id":"30685"}', '2018-10-16 17:39:59', '2018-10-16 17:39:59')
447.340ms

2018-10-16 17:40:06
controller: VocabularyController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries' order by ordinal_position;
7.440ms
select `id`, `name` from `dictionaries` where `id` > 0 order by `name` asc
86.830ms
select count(*) as aggregate from `vocabularies` where `id` > 0 and `dictionary_id` = '30685'
19.190ms
select * from `vocabularies` where `id` > 0 and `dictionary_id` = '30685' order by `keyword` asc limit 20 offset 20
19.730ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'vocabularies'
8.250ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'vocabularies' order by ordinal_position;
8.630ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 1541 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
155.780ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('1542', '1543', '1544', '1545') and `disabled` = 0 order by `id` asc
66.720ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
177.250ms
select `id`, `name` from `dictionaries` order by `name` asc
104.780ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
5.750ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 1541, 'Vocabularies', 'VocabularyController', 'index', '/vocabularies?dictionary_id=30685&page=2', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjJyWlRvb2FjbHc2aXhHQ29iRDdydHc9PSIsInZhbHVlIjoicUVlRSs0d1VJM25WWXBVVTJvNklPUHFHcnIrb3NUOFhcL2puQm5iRTJkdGQrd0hBeGJhWU93THhVM3k1d2tobFwvUERQUDhLd1I5Q2l2Tm5BUXNQRFR6Zz09IiwibWFjIjoiZDFjMDE0MWQyMjFjYTdkOWNjZmFkMWQ0ZGIyYmRmM2UzMDJhZTA2NmI3M2ZkNTFhMDZlMGE1YTg1ZDVmZjNjMyJ9; l_acs_m_session=eyJpdiI6ImNZUG9oc1NPanBPZ2NRbEhFbFwvSDhRPT0iLCJ2YWx1ZSI6IkNXXC9qVlVidkVhTTMrT1dKbzB3aHR5Sm9ITXFsSVpuRWxkREExZExYV3BkUXJ2NlNiN2FYM2REaXMrYk1ibjBSb2F0R1NhZ1pvMzVOTzh0RmJaTVlRdz09IiwibWFjIjoiYjcwZjc0NDNkMWU2MGE4ZjMxNzM2NzExNmMzMDM3NGQ5NmI0ZDA3YjRiMmZkNTM2NTk4ZGJjMGY2N2FlYmUwNiJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/vocabularies?dictionary_id=30685","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50824","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/vocabularies?dictionary_id=30685&page=2","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"dictionary_id=30685&page=2","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682805.2089,"REQUEST_TIME":1539682805,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"dictionary_id":"30685","page":"2"}', '2018-10-16 17:40:05', '2018-10-16 17:40:05')
723.990ms

2018-10-16 17:40:10
controller: VocabularyController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries' order by ordinal_position;
7.410ms
select `id`, `name` from `dictionaries` where `id` > 0 order by `name` asc
3.410ms
select count(*) as aggregate from `vocabularies` where `id` > 0 and `dictionary_id` = '30685'
8.900ms
select * from `vocabularies` where `id` > 0 and `dictionary_id` = '30685' order by `keyword` asc limit 20 offset 40
18.210ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'vocabularies'
7.310ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'vocabularies' order by ordinal_position;
7.100ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 1541 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
10.060ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('1542', '1543', '1544', '1545') and `disabled` = 0 order by `id` asc
3.440ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.800ms
select `id`, `name` from `dictionaries` order by `name` asc
16.880ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
22.730ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 1541, 'Vocabularies', 'VocabularyController', 'index', '/vocabularies?dictionary_id=30685&page=3', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjBLY0ROXC9IXC9xZzdsdG1HZHd6YWF5UT09IiwidmFsdWUiOiJ3cDBXVTNqYnUxYytxbk9rdDZnY3d1ZmhWWWJLU1U2WkFxdlwvNUFvcFh5dmlPaWVrXC9zSXNiQ1wvMEc3aXVvbVZQdmYzOUJuc3FnalltNVwvYjJabGQwMXc9PSIsIm1hYyI6ImJmY2E0MjI1NTliMmU4NjcxNWZiNjUzMjRiN2ZjZTczNTIyOWU5ODU1N2VkZDA5NWY1OTQzNDY2YmE0ODU0YTgifQ%3D%3D; l_acs_m_session=eyJpdiI6IkJxVHFqTEp1U1wvNkRQT3VTQm5yeVwvdz09IiwidmFsdWUiOiJBM3dDS0JTSHdOWTNxY0dpSFNmVHB3MnNFSVN1WkNuQ3l1QzM3ek11Z3dFYnNEcmlBVGUzQ3R5MnBaUDlcL0RoWnF4Zm5kNVJTZDRmOWIyaGlTWGZkekE9PSIsIm1hYyI6ImJlM2M5Zjc0YmZhZWEzMDQxYWExNDg0OTBhNmUxMTNkODJkYzBjNTlhZTc5MDFlNTYyM2NhMDgxNGE3ZjRjMTEifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/vocabularies?dictionary_id=30685&page=2","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50824","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/vocabularies?dictionary_id=30685&page=3","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"dictionary_id=30685&page=3","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682809.8607,"REQUEST_TIME":1539682809,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"dictionary_id":"30685","page":"3"}', '2018-10-16 17:40:10', '2018-10-16 17:40:10')
464.210ms

2018-10-16 17:40:13
controller: VocabularyController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries' order by ordinal_position;
34.350ms
select `id`, `name` from `dictionaries` where `id` > 0 order by `name` asc
4.490ms
select count(*) as aggregate from `vocabularies` where `id` > 0 and `dictionary_id` = '30685'
2.070ms
select * from `vocabularies` where `id` > 0 and `dictionary_id` = '30685' order by `keyword` asc limit 20 offset 60
3.420ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'vocabularies'
6.910ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'vocabularies' order by ordinal_position;
11.660ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 1541 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
9.240ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('1542', '1543', '1544', '1545') and `disabled` = 0 order by `id` asc
2.820ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
2.730ms
select `id`, `name` from `dictionaries` order by `name` asc
32.500ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.680ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 1541, 'Vocabularies', 'VocabularyController', 'index', '/vocabularies?dictionary_id=30685&page=4', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IkNzTnlxYUxDR3dUM25MRmo3SXlBeHc9PSIsInZhbHVlIjoiSkZMMElrMnZmNGxOUldxemZKQmpKWldvbkZwUWJwa0NoMlpCNVJKN3RlWUtcLzlcL0MrejJ5K3BUcmlcL2dIazh1U2NydUZLVERhS1Zka3RXajd3aFpUcFE9PSIsIm1hYyI6ImY5ZGNjZGI5MjQ4NTFhM2MxZTM3NTViMjI0ZjU3Y2EzZWQ2N2ZmYzYyNmQ1YzgzYmFiZjAxMWJjMmNkNmYyYmIifQ%3D%3D; l_acs_m_session=eyJpdiI6IlA3YkVMeitWbjhGSFUxczVpa1A5VFE9PSIsInZhbHVlIjoiXC9SbHNYY3dcL1wvSnBFbk4zc1lSQlhHZTVocnFTaTJKQVo5TWtNdlwvXC83VVRiWTRtVWt2SU1YaXVaUVA5VTIyak93WnhNa2V5cmF1aDZacTY0bHpwUmdUdz09IiwibWFjIjoiMjg1MmUyYjg0ZDgzMjFkNDljMDU2MDAwOWUwNWMzMzNiYjZkZWE4MTc2MTgwZmMzMTQ0YWMxZTg1NTM1NTA0MiJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/vocabularies?dictionary_id=30685&page=3","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50824","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/vocabularies?dictionary_id=30685&page=4","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"dictionary_id=30685&page=4","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682812.3895,"REQUEST_TIME":1539682812,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"dictionary_id":"30685","page":"4"}', '2018-10-16 17:40:12', '2018-10-16 17:40:12')
417.550ms

2018-10-16 17:40:17
controller: VocabularyController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries' order by ordinal_position;
7.260ms
select `id`, `name` from `dictionaries` where `id` > 0 order by `name` asc
26.610ms
select count(*) as aggregate from `vocabularies` where `id` > 0 and `dictionary_id` = '30685'
7.350ms
select * from `vocabularies` where `id` > 0 and `dictionary_id` = '30685' order by `keyword` asc limit 20 offset 80
17.690ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'vocabularies'
11.930ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'vocabularies' order by ordinal_position;
8.870ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 1541 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
6.390ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('1542', '1543', '1544', '1545') and `disabled` = 0 order by `id` asc
2.740ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
2.990ms
select `id`, `name` from `dictionaries` order by `name` asc
33.610ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.480ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 1541, 'Vocabularies', 'VocabularyController', 'index', '/vocabularies?dictionary_id=30685&page=5', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjRmMlFpVk5wMnZHYzNGVHlcL0xwcU5RPT0iLCJ2YWx1ZSI6Ik5reTFEQTNjZExDYUt2VVhCNFExZW5sbFZuSk1ERnFqc2RDZkJ0TlNFazN1WFdCWjdUSk8yazd4WEhLNm5TaHo3TGdzRWZIZW00bzZ2OXNCVXlzWktRPT0iLCJtYWMiOiJiOGI5ZjkzYzQzMTRhZTg2NTc5ODgxZTBiNDA5MmY4YzczMzRiY2EyNGI1NjNlYzQ3NTYwMmE0NzdhZjQ0M2Q0In0%3D; l_acs_m_session=eyJpdiI6ImRZMXZKOFZCQlpTTWhjR2hxODYwcGc9PSIsInZhbHVlIjoiM2xEaUN5bGJtRzNtYnFkMVpJemZhWmhTXC9cL1lVM2lWa0thdHUzT3VQeEg5MHd2bjkzbEVwZzUrcFwvNDVxekl0NXExTG9Ha3Y1cGZSS3ZRUHNjekt3amc9PSIsIm1hYyI6IjRiZjA4YzNjZTZhYjkzYTlhNTkyNzdjZmVhMzE2ZDJjNjVjNjFiNjQ0OGI0ODRlNTE0MDAwMzA5NjZkOGMzOGEifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/vocabularies?dictionary_id=30685&page=4","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50824","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/vocabularies?dictionary_id=30685&page=5","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"dictionary_id=30685&page=5","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682815.9673,"REQUEST_TIME":1539682815,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"dictionary_id":"30685","page":"5"}', '2018-10-16 17:40:16', '2018-10-16 17:40:16')
1,015.960ms

2018-10-16 17:40:20
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
4.180ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
3.130ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
467.110ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
30.620ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.610ms

2018-10-16 17:40:20
controller: VocabularyController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries' order by ordinal_position;
11.780ms
select `id`, `name` from `dictionaries` where `id` > 0 order by `name` asc
15.050ms
select count(*) as aggregate from `vocabularies` where `id` > 0
26.230ms
select * from `vocabularies` where `id` > 0 order by `keyword` asc limit 20 offset 0
81.520ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'vocabularies'
9.730ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'vocabularies' order by ordinal_position;
8.100ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 1541 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
8.530ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('1542', '1543', '1544', '1545') and `disabled` = 0 order by `id` asc
3.450ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.430ms
select `id`, `name` from `dictionaries` order by `name` asc
12.970ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.220ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 1541, 'Vocabularies', 'VocabularyController', 'index', '/vocabularies', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Inp4NVloNnNXVnlxa243SWkzc3lIWVE9PSIsInZhbHVlIjoiVDNrOGxRTFhHTW9xSVpEdElySGlBM0c1RmU0SnpIQkdUUFRHd2NBRUhHTVdKeUZDTlJnd3BVQW1cL2ZiRTBlM2kyaVpjbEN3MVZEYVA3eXZKZHBWVmRBPT0iLCJtYWMiOiIzNmRlODYzYjllOTAzNGZmMTlkNjk3Njg2Yzc0MDZlMWRmM2RjYmMxYzdmNjgzYjhiNmM3MjBhNTM2ZTlmZDUxIn0%3D; l_acs_m_session=eyJpdiI6IlBTMnpjdHJoa2E3cEFYenFHUjQrcGc9PSIsInZhbHVlIjoiWERuMTNWM2Q1Q3VYNUx4bUxZa2g3T0lJOEd5YzFwMitDbDN5eUtOalYyaUJNU2JmbktjeEJ3QU9pYUhWckUrRlRnM2Njb1ljMXRqNGEyUm95bk9qb1E9PSIsIm1hYyI6Ijc0NjE3YmQyYWI1M2ZmZTg4NWViMTMzZTRmYjliZjQ3YWRkNzVmYTljOWQ0OGMxZmNhMGUyM2IyZThhODBiNDcifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/vocabularies?dictionary_id=30685&page=5","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50860","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/vocabularies","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682819.4875,"REQUEST_TIME":1539682819,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-16 17:40:19', '2018-10-16 17:40:19')
615.280ms

2018-10-16 17:40:31
controller: DictionaryController action: index
select count(*) as aggregate from `dictionaries` where `id` > 0
16.660ms
select * from `dictionaries` where `id` > 0 limit 20 offset 0
21.040ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries'
10.840ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries' order by ordinal_position;
18.630ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 1536 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
8.940ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('1541', '1601', '1537', '1538', '1539', '1754', '1540', '1546', '1553') and `disabled` = 0 order by `id` asc
5.200ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.630ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.480ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 1536, 'Dictionaries', 'DictionaryController', 'index', '/dictionaries', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6InVzMjM2c2NJTjloS0MxZkVlcHFCZWc9PSIsInZhbHVlIjoiY09sMDVEazg4cWkraUEzMDhQbE95bDBGb0oxMVJxekVqeFRaRGYwajducTk0bU45QWEreW5UXC9wcW5pT0FLaEFBSGY1c1l3anZsK1JnMXBkQUJGYW9RPT0iLCJtYWMiOiI0YWQ1M2FiMmU5MTQ0NmYzMWI4NjQyYWI4MWEyZTYwNWQ4NDZiZDgyYmU0YjdmZWVkMDhmNTdiZGU3MTUxMzMxIn0%3D; l_acs_m_session=eyJpdiI6InNJNUNFQXdUSkM0M1o4ekRmUHZcL0J3PT0iLCJ2YWx1ZSI6IkFxZlJQQVdXNzgzMzJHU1M3U2pFRjZnZERtNFJGRkI5Q3BWZHlEeTZNV1psNlA2eG8yblJXRDhWc3hKaVd3b1VidkJ5RnM5VDhnMklXY3lWYytrUElnPT0iLCJtYWMiOiJkZGI4OThhOGIwYmI0M2RlMzkyM2NiOGMzNGQ1ZTdhNTMxYTBiOWExNDhmYmE3OWU1NGQ1MWQ5NTJhMmU3ODNiIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50860","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/dictionaries","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682830.5978,"REQUEST_TIME":1539682830,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-16 17:40:30', '2018-10-16 17:40:30')
718.360ms

2018-10-16 17:40:34
controller: VocabularyController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries' order by ordinal_position;
10.560ms
select `id`, `name` from `dictionaries` where `id` > 0 order by `name` asc
12.990ms
select count(*) as aggregate from `vocabularies` where `id` > 0 and `dictionary_id` = '3'
15.300ms
select * from `vocabularies` where `id` > 0 and `dictionary_id` = '3' order by `keyword` asc limit 20 offset 0
29.510ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'vocabularies'
10.140ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'vocabularies' order by ordinal_position;
11.790ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 1541 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
6.740ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('1542', '1543', '1544', '1545') and `disabled` = 0 order by `id` asc
2.860ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.090ms
select `id`, `name` from `dictionaries` order by `name` asc
26.350ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.530ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 1541, 'Vocabularies', 'VocabularyController', 'index', '/vocabularies?dictionary_id=3', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6InVOZUxmaUxnMEJEM09lVE1mRlwvTGdRPT0iLCJ2YWx1ZSI6ImF0NVlUb2M2RUtRVWgrZ1owMWNWU3NJbklqZlZyRmdCZkVsYjZJQkQ2a0ZsRWI4WGk4ZnExN0NsN3BBWVV2VDRjRjB0TnZXaVpxcVNqOWZ0SGxER1hBPT0iLCJtYWMiOiI2ZTYxYzQwOWUzOGIxYzc0M2MzYWZkOWJhYzIwODgzMGFjMzEyYTAzNzMxM2YxOGU5ODIyY2UwODE4MGUzMTc2In0%3D; l_acs_m_session=eyJpdiI6InNYeFpFTjRwQXhNemJHYUQweVB5T2c9PSIsInZhbHVlIjoia3FNUkVLY2w3YTIrTXBJS3hZcjcxVXY1ZGRXSzVNMHBkNUFDVlk5enI0ZzRZNFpiTDJkYWluNW90ZjFDam8rbjcxSGhjeXNKY3YxWklrVkRFS3JnWkE9PSIsIm1hYyI6IjQ0MDExMzdhNTUxY2VlZjNiYWZhZDVmZWFhZTBiMjUyOTNkNDdkNjU3YzJmNzRmNGFlZGRjZTQ4NmY2N2NhMjgifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/dictionaries","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50860","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/vocabularies?dictionary_id=3","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"dictionary_id=3","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682834.0989,"REQUEST_TIME":1539682834,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"dictionary_id":"3"}', '2018-10-16 17:40:34', '2018-10-16 17:40:34')
494.640ms

2018-10-16 17:40:44
controller: VocabularyController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries' order by ordinal_position;
7.340ms
select `id`, `name` from `dictionaries` where `id` > 0 order by `name` asc
13.630ms
select count(*) as aggregate from `vocabularies` where `id` > 0 and `dictionary_id` = '3' and `keyword` like '%投注原始%'
4.930ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'vocabularies'
14.880ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'vocabularies' order by ordinal_position;
30.930ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 1541 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
25.620ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('1542', '1543', '1544', '1545') and `disabled` = 0 order by `id` asc
3.890ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.680ms
select `id`, `name` from `dictionaries` order by `name` asc
2.640ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.400ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 1541, 'Vocabularies', 'VocabularyController', 'index', '/vocabularies?is_search=&dictionary_id=3&keyword=%E6%8A%95%E6%B3%A8%E5%8E%9F%E5%A7%8B', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjRcL1ZwdExGN3M5RzdhMjJuWkExQllnPT0iLCJ2YWx1ZSI6Ikt2Tjg1bHllc0FZblk5MkhaaHorT1d3NlVUblB3RDRHUWxLMExiSDR3alRvWlhraUZLZVk5WmZlMURYTms2UWRCSTF2aE5lTW5kZTZEYWhyeFVXT1dBPT0iLCJtYWMiOiIwNDgwODg5ZmQ3MzJiNDVmMWQ2NWZjMDJjOGFmMzM4YTJlNmJhN2Y3MzJkN2EyYzg1YjgwYjI1YTRkYTIwZjgzIn0%3D; l_acs_m_session=eyJpdiI6ImFIT1pjVXVtVXRNNWFvdVVyUXBjR2c9PSIsInZhbHVlIjoiMkxkWUMwd3NDSWZxQmpaNjdiZVhTNFNiM0ZpNVwvcFwvTkd6bHV1aENxUWl3OXV5K0ZxWFpTMUg3eU9wR09mbXg5QUZaaWVqRHdSOVVPaEZLRGZvWFJlZz09IiwibWFjIjoiZGRmNjUyMjQ4MjFlYjFjZDczMjMyYjQ3NDU1N2VmM2QxN2M0MTZiZDAzODA1MDMwZDBkNjE0ZDU3OTg4OTk3MyJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/vocabularies?dictionary_id=3","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50860","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/vocabularies?is_search=&dictionary_id=3&keyword=%E6%8A%95%E6%B3%A8%E5%8E%9F%E5%A7%8B","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"is_search=&dictionary_id=3&keyword=%E6%8A%95%E6%B3%A8%E5%8E%9F%E5%A7%8B","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682843.905,"REQUEST_TIME":1539682843,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"is_search":"","dictionary_id":"3","keyword":"\u6295\u6ce8\u539f\u59cb"}', '2018-10-16 17:40:44', '2018-10-16 17:40:44')
441.530ms

2018-10-16 17:40:56
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-16 00:00:00'
4.440ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-16 00:00:00' order by `id` desc limit 20 offset 0
5.240ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
12.700ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
13.810ms
select `id`, `name` from `merchants` order by `id` asc
33.640ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
9.140ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
3.000ms
select `id`, `name` from `lotteries` order by `id` asc
3.430ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.760ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IllmT05DUE5uUE9lQXo0NmdwbUw2dlE9PSIsInZhbHVlIjoiWW9zNzdrV0FCN01XUDllVmE2SklPOXEzOXZFR2FhazhhNjF3SE1QaUJNWHg1VERpbjFFdVdwcE83XC9FQWxBaDd4bTFXWFJDM2IwUng0NFhBWDdFdTRRPT0iLCJtYWMiOiJhY2U0NjIzMjdhOGY2NWI4ZmM1NjYzNzVjYTAxNzk2Y2Q5NzM3ZWZjOWRjMDk5NDVhMzQwNTk1YTFiMmQ0YTE5In0%3D; l_acs_m_session=eyJpdiI6Im16SWUwWVBvTDJlTTNzXC9FbWxHb3hnPT0iLCJ2YWx1ZSI6IjNqUjNCWHRwdmlSN3puWkNTanVTY0pZUDZNclIzaEZqK0pIeCtvb0swQUFZSXh0XC80cFF4ZWdPc3F3YkIrclZqSlwvSlFHVFRuU0VQTUp0UHQxaEdKQnc9PSIsIm1hYyI6ImJhZWEyOTk2NzAyMzVhZDEzNGVkY2RhMzlhMDM2ZGQ2MGM1MWFhNzJkZjU4MWU2MzIzMzI3YjU2NTgyYzA5M2QifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50860","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682855.6721,"REQUEST_TIME":1539682855,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-16 00:00:00"}', '2018-10-16 17:40:55', '2018-10-16 17:40:55')
421.930ms

2018-10-16 17:41:10
controller: FunctionalityController action: index
select * from `functionalities` where `id` > 0 and `controller` = 'FunctionalityController' and `action` = 'index'
4.670ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = 2 order by `sequence` asc
5.060ms
select * from `functionalities` where `functionalities`.`id` = 2 limit 1
2.620ms
select * from `search_configs` where `search_configs`.`id` = '1' limit 1
2.920ms
select * from `search_items` where `search_config_id` = 1 order by `sequence` asc
7.680ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
11.210ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
4.870ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `parent_id` is null
2.380ms
select * from `functionalities` where `id` > 0 and `parent_id` is null order by `sequence` asc limit 20 offset 0
4.810ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
22.690ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
18.600ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
13.810ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
4.430ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '150' order by `sequence` asc
3.050ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '8' order by `sequence` asc
2.950ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '2054' order by `sequence` asc
3.220ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '3' order by `sequence` asc
2.450ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '5' order by `sequence` asc
2.320ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.600ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '6' order by `sequence` asc
2.610ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
3.480ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IkJ1d2lWZlNmVEpyWGZCWWZFb2lEZmc9PSIsInZhbHVlIjoiUlE0Ymh5WnN6b0ZIMnhZcnorRjI0aUJUZWRjZFlyNDVuK2UrZU1NV0UxQ2JZRGpZcEtuRXVpZG1UUGladm1DR0ZON1hRVnN1YzZaYmcwVWFzNVlQVGc9PSIsIm1hYyI6IjI4NWM0OThiYmRhYWQxYzU1ZTc2MmE3NTNjM2NmMDlhYTkxN2Q3ZWQ4OTgwM2NiZGZkOWQ2ZDBhMmViMWRhNzYifQ%3D%3D; l_acs_m_session=eyJpdiI6ImRER25tMzNCVkVXVk13b1RLMFMzU1E9PSIsInZhbHVlIjoiZER5Y1wveDZ5SjhabUNNXC9BZzQxZTNuMkdhZTlCMWNJTHdqalJ1U0ZlNk1HalZKNVI1UHJUY2hvRFBndEdsV29RenUreU52bkNoMUtNZk9MQmc1VkdsQT09IiwibWFjIjoiYWE0NGMzMTRjMWU5NjgwOGQwY2E0NTAxZjIyNTA2MWRiMzY3Njc5NTNhZjQ5ZjdhNGYxYzUyNmY5YzFhZTk1ZiJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50860","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682870.1535,"REQUEST_TIME":1539682870,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-16 17:41:10', '2018-10-16 17:41:10')
425.360ms

2018-10-16 17:41:19
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
4.330ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.540ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
325.480ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
5.130ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
3.030ms

2018-10-16 17:41:35
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
18.130ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
12.060ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `controller` = 'ProjectController'
3.090ms
select * from `functionalities` where `id` > 0 and `controller` = 'ProjectController' order by `sequence` asc limit 20 offset 0
7.140ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
14.580ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
15.980ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
9.200ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
4.030ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.340ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.970ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities?is_search=&controller=ProjectController&title=', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IkFcL0lweFB4MGtUbEZ1aEtYT3p3RGh3PT0iLCJ2YWx1ZSI6ImNPTTBnaXNCdnhPc1ExVE1YRk5kY0Eyc1RUZ0U1cHlVQldyNHdUbktodklFR3FDMlpjWDM1OHVzNW1ockZFTnpiTXJ4dG1KUzNlT1AyWmczSk9HNEdnPT0iLCJtYWMiOiIwYTJmZjlmMTMyNzM3MTE2ZGVmNjY4OGY4YTlhYzA2NTg3MWEyY2YzMWI5MTRjMGJmN2YzOWU3OWJlYWVlZDI4In0%3D; l_acs_m_session=eyJpdiI6IktRWGxHcEgrTVZ4MHF0K0lNbjBqYnc9PSIsInZhbHVlIjoidjFLZmxlVlNxZFBcLzFmR3N5c1A1VkErNXdTWmJTaXBvdGUyb0Nic0FcL1ozeGY1dU14TGprdW1UcEpiaFZhNDI0dTIxd25SQithcVpnTTVnZk5OdWtEZz09IiwibWFjIjoiZTE1ZDgwYjAzNjVkY2ZjOGYwMjI1OWEzY2JmZmU4OGFhNzY1MjNlMzRkNGNlZWMyNDY1ZGUzMTgyMjRjMzNhNyJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50860","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities?is_search=&controller=ProjectController&title=","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"is_search=&controller=ProjectController&title=","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682894.4906,"REQUEST_TIME":1539682894,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"is_search":"","controller":"ProjectController","title":""}', '2018-10-16 17:41:34', '2018-10-16 17:41:34')
463.220ms

2018-10-16 17:41:43
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.830ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
7.050ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `parent_id` = '34659'
3.780ms
select * from `functionalities` where `id` > 0 and `parent_id` = '34659' order by `sequence` asc limit 20 offset 0
13.410ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
7.130ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.370ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.250ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
4.410ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
2.800ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
3.090ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities?parent_id=34659', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IlkrWlVwbDdZQ1YyZWVjWkJWTER5V1E9PSIsInZhbHVlIjoiTE56XC9sS25mVktNSnJaN25laWJqRVY2SVhqb0RNSWw2RUt4WWVtdEFrcDJkRWlMXC9tdDNzZEYrV2QwTnFvd1F5VGJzYUJiNFB2ZmdIdUdBa3d4MnVyZz09IiwibWFjIjoiYzAxYThlMzMyNTM1Y2UyMTU0ZGMzYmE4MmU3YmRhNDQyYWViNDJlMzcwMjZlZjQzOTBkNjc4ODc5YWUwOTJhZCJ9; l_acs_m_session=eyJpdiI6Ik5jcEJ0alE1YlJZV1ZpTmEyYUVWaUE9PSIsInZhbHVlIjoiVWlZTlhBYTVWWk1IWHI1cEpsd1VGVEg3RTVvVHhRc0RieVo0OHY5VlhjN1hjcm5xTCtCVlRlTDZSXC80bGRIWlwvdTZHWDFIR1J3MlBEb0ViNkY2T0pRUT09IiwibWFjIjoiOTljOGFmZTA2YjY1Y2VmMTE0MTZjZWFiNDljMmNkNDcxNTUzNzA0NTdiMjhhZTNiNWE1MmZjYTYwYjczMjRlYyJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities?is_search=&controller=ProjectController&title=","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50860","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities?parent_id=34659","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"parent_id=34659","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682903.0347,"REQUEST_TIME":1539682903,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"parent_id":"34659"}', '2018-10-16 17:41:43', '2018-10-16 17:41:43')
417.610ms

2018-10-16 17:42:20
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.460ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.470ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
603.570ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
7.370ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.260ms

2018-10-16 17:42:21
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
8.550ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
4.830ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `controller` = 'BetRecordsController'
2.770ms
select * from `functionalities` where `id` > 0 and `controller` = 'BetRecordsController' order by `sequence` asc limit 20 offset 0
6.600ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
21.910ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
19.650ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
12.140ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
5.950ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
5.700ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.310ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities?is_search=&controller=BetRecordsController&title=', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6ImtOeHFCaVVEUzNxNUJkc29rUDdLWUE9PSIsInZhbHVlIjoibHBBYkp3SGx6OHo4MUl2aEloWUE2ZEsxVEhPNkFLblo3RmpXZnR4UFVuQlZLMHVcL2ZsaytFTGNnd3ZxN0l0SGFYYld3SHJKajNmMU1iZSsxdUpYM3NBPT0iLCJtYWMiOiJiMThiODMyN2E3ODJiMWQxMDc3YjcxYmYxNDRlZDczOGVmMjBhYjc5NjI2ZWY2NmZmZGQ2Y2ViNWY2NTc4Y2VhIn0%3D; l_acs_m_session=eyJpdiI6InZEUE5nOXJSOTg1a3hQXC92amtqMlFnPT0iLCJ2YWx1ZSI6IlJzSkJpYnY4MUFCeXZCaGZaWDZWV1dEWHFGbXBMNGI2cjFaRlZoR2RlNEJsZWo4WEY1dWVlSXdEUzRyRFR1N24rSVliZlNCR1pIRUdTTDZJZW1TajFBPT0iLCJtYWMiOiI1MTY3ZmJhYzI0ZjcyM2ZlZWNlYTM4NWM3OWFhOTU0ZDhhNzdkMGFjNmFiZTA2ZTE0NGMyYzIyYTNmYTEzNmY1In0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities?is_search=&controller=ProjectController&title=","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50860","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities?is_search=&controller=BetRecordsController&title=","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"is_search=&controller=BetRecordsController&title=","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682941.2142,"REQUEST_TIME":1539682941,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"is_search":"","controller":"BetRecordsController","title":""}', '2018-10-16 17:42:21', '2018-10-16 17:42:21')
610.080ms

2018-10-16 17:42:25
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
9.560ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
5.050ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `parent_id` = '34784'
9.030ms
select * from `functionalities` where `id` > 0 and `parent_id` = '34784' order by `sequence` asc limit 20 offset 0
3.700ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
7.080ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
9.800ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.630ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
4.600ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
2.910ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.400ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities?parent_id=34784', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6ImlyMjFQYXE5M0tXblhqemdYY2VFT0E9PSIsInZhbHVlIjoieGE0QjMwRERCbUN5eHBXenFWSTJkYVBJeUhIZWJpOXViM0Zvb1JQdVZuaGNEQzNFSndpNHl5TDdaeTVkZzJEdHBjUmJJUWZKQ3ZkT3REdmxsZ3pJeHc9PSIsIm1hYyI6IjgwYzI1YTA1Y2Y5Yzg4ZGU5ZjUyOWIzMmE3Mjc0NjEwZmUyZmM1ODc5ZDgxODM2MTRlMDYwNGVkY2RjOWE1NzUifQ%3D%3D; l_acs_m_session=eyJpdiI6IkFYeldQU2psVFwvK0RxejNYaFhHNEhBPT0iLCJ2YWx1ZSI6IndRNkJrUWdlSzdKeE5TVkQyak9rSTVYdEJiTks4cEFUMThXdFQ3ekVra0JOZklweDBpYmFjWm1nZUlPZG5PQkwrcjNNK2NlNHF2dU9LZVEwcVwvTklpdz09IiwibWFjIjoiMTZlN2U2OWE2NTdiNTkwZGNiMjkwNjMzMGVhZGM5ZDBkYWE0NTc1MWQwNGFlYWUzZTIxM2Q1OTVhYzkyMWNhYSJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities?is_search=&controller=BetRecordsController&title=","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50860","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities?parent_id=34784","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"parent_id=34784","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682944.6941,"REQUEST_TIME":1539682944,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"parent_id":"34784"}', '2018-10-16 17:42:24', '2018-10-16 17:42:24')
516.090ms

2018-10-16 17:42:27
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
8.930ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
4.630ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `parent_id` is null
2.370ms
select * from `functionalities` where `id` > 0 and `parent_id` is null order by `sequence` asc limit 20 offset 0
5.260ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
7.470ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
12.160ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
8.760ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
4.330ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
2.940ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
4.770ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6ImhoUHozQ1V1ZFBPT3J5TnFmNFZuY1E9PSIsInZhbHVlIjoiQmRVZkFOOURUcGEyMFZmNDZkUUhaN25nUkNkNjdjdHRNQm1wS0l4VGRVSjNCRWdUOU9aXC9lc0ZnckwwcUlBSnQzbTlYOUdBWTY4SERubkw0a3ZNdEp3PT0iLCJtYWMiOiJiYTliZThhZDdmNzg5NGQyMTE2MmVmZTE5OTYyMDU3ZjZmMzc1MWJkMTQyOWUyOGFkMTljNDZmMTkwZGNmM2Q2In0%3D; l_acs_m_session=eyJpdiI6IlVJR2MzRlUwbjQ0aHdXMUtKamN0TVE9PSIsInZhbHVlIjoiZnhDeFZHQkx6ZTZkUzlWb2xjNFV3a0pKWVhrTkNIRGxIZUpPWVhId3pJXC9zaGdveGhEMW93clVnaWpheTNFY2N2SzlDNlFDQzZXRFVuTDhBWmRwOVhBPT0iLCJtYWMiOiJjOTc0MzMwYTNjNzY2YWQxYjZiNmRlMmZjMTE0ZTYzNWRhODU0ZWYyZGI3NzA5N2VkZmVjMmVlOTJhOWRlMTdkIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50860","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539682947.1453,"REQUEST_TIME":1539682947,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-16 17:42:27', '2018-10-16 17:42:27')
443.500ms

2018-10-16 17:42:30
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
6.010ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.930ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
603.790ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
15.140ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.500ms

2018-10-16 17:43:30
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.140ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.730ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
887.600ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
17.430ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
4.320ms

2018-10-16 17:44:30
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.270ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
5.610ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
277.750ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.540ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.780ms

2018-10-16 17:45:30
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
4.290ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.660ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
586.980ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
4.220ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
5.150ms

2018-10-16 17:46:30
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
11.380ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.830ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
336.100ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
7.040ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.680ms

2018-10-16 17:47:30
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.050ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.560ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
485.930ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
4.070ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.530ms

2018-10-16 17:48:30
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
6.580ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
3.330ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
405.210ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
5.580ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.720ms

2018-10-16 17:49:30
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
4.770ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
3.670ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
582.910ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.400ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.410ms

2018-10-16 17:50:31
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.240ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
5.470ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
674.860ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.920ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.510ms

2018-10-16 17:51:31
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
8.460ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.560ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
577.950ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
26.920ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.620ms

2018-10-16 17:52:31
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.000ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
3.030ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
633.820ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
6.600ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.540ms

2018-10-16 17:53:31
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.180ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.790ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
521.920ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.690ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
3.640ms

2018-10-16 17:54:31
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.810ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.490ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
704.860ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.420ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
5.710ms

2018-10-16 17:55:31
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.290ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.730ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
672.250ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.540ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
3.020ms

2018-10-16 17:56:31
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.040ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.670ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
469.000ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
5.190ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
4.070ms

2018-10-16 17:57:31
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
4.790ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.840ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
511.550ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.900ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.830ms

2018-10-16 17:58:31
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.170ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.950ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
563.730ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
4.730ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.710ms

2018-10-16 17:59:31
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
10.210ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
3.430ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540224000 group by `lottery_id`
661.190ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.590ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.250ms

