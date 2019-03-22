2018-10-04 16:24:08
controller: AlarmController action: getAlarmData
select * from `functionalities` where `id` > 0 and `controller` = 'AlarmController' and `action` = 'getAlarmData'
3.490ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = 34849 order by `sequence` asc
3.110ms
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.120ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
3.510ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1539187200 group by `lottery_id`
127.970ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.800ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.490ms

2018-10-04 16:24:23
controller: ProjectController action: index
select * from `functionalities` where `id` > 0 and `controller` = 'ProjectController' and `action` = 'index'
4.520ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = 34659 order by `sequence` asc
4.230ms
select * from `functionalities` where `functionalities`.`id` = 34659 limit 1
2.450ms
select * from `search_configs` where `search_configs`.`id` = '30196' limit 1
2.780ms
select * from `search_items` where `search_config_id` = 30196 order by `sequence` asc
3.750ms
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-04 00:00:00'
4.410ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-04 00:00:00' order by `id` desc limit 20 offset 0
4.580ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
6.210ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
6.650ms
select `id`, `name` from `merchants` order by `id` asc
3.220ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.560ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
2.530ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34660' order by `sequence` asc
2.110ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34783' order by `sequence` asc
2.040ms
select `id`, `name` from `lotteries` order by `id` asc
3.260ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.500ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IkZEYjZzXC9Sak1MTHhSTVFqUFlMaHJRPT0iLCJ2YWx1ZSI6ImdRZ1wvOFZCTGtCTkdPdmo3MVZlellBTFJBWXZUWGJ0WWJiZEttTWdcL0F1QTNtMitWR1BmRFZlREZVcUtibjhGWDNQUjhMWkdyeHB2a1NXdUxlT1hnV3c9PSIsIm1hYyI6IjVjZTU4MWVmMjY3YzAxMDExZmMxNzY1OTliMDVjNTMxNDYyODdkMTdjY2E0NjE5OWQwZDI5MjE4NzUwMjVhYjQifQ%3D%3D; l_acs_m_session=eyJpdiI6IkRRY2l2MnVCWGZFV0FSUUZGeGFNTUE9PSIsInZhbHVlIjoiVjlFK0xobXZWcGNGcHJMUWdhd3lIb1VOTU1QNU5wejRRUXpibHErOG1NV0tsRTYxQzQ5dUgwQU9UUk9sUTRRUUd6MEZ3K0sxcTRBM0w4V1NmTFc2NVE9PSIsIm1hYyI6IjhhMWI5ODdjNTIxMDEzZTVkMzI2NTcyZjY5MGU2NGY1NGRjZGFmOWM0OTlmMTYzMmI3NjIwY2E4MjQyYTc4NGMifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"35822","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.10.3","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1538641463.1433,"REQUEST_TIME":1538641463,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-04 00:00:00"}', '2018-10-04 16:24:23', '2018-10-04 16:24:23')
394.950ms

2018-10-04 16:24:32
controller: SeriesController action: index
select * from `functionalities` where `id` > 0 and `controller` = 'SeriesController' and `action` = 'index'
4.140ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = 34568 order by `sequence` asc
3.450ms
select count(*) as aggregate from `series` where `id` > 0
2.760ms
select * from `series` where `id` > 0 limit 20 offset 0
2.580ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'series'
5.800ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'series' order by ordinal_position;
6.140ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34568 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.750ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34650', '34604', '34571', '34766', '34569', '34570', '34572') and `disabled` = 0 order by `id` asc
3.970ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34650' order by `sequence` asc
2.710ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34604' order by `sequence` asc
2.860ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34571' order by `sequence` asc
2.090ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34766' order by `sequence` asc
2.020ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34570' order by `sequence` asc
2.140ms
select * from `popups` where `popups`.`id` = '1' limit 1
2.800ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.240ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34572' order by `sequence` asc
2.070ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.610ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34568, 'Series', 'SeriesController', 'index', '/series', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjU4RVY4SFpBeTNVa0d6N1kyN01TRmc9PSIsInZhbHVlIjoiVnA2MURFaWdMV1N4ek5PaEpvYzZHV2lBMTlNSWRhTGwwR0ZYV05lMjFIRUM0NEZzeDVlV045OUVCdkV5NmxBWDdkVURqWTA5VGdhbkZ6SG10eUhVMmc9PSIsIm1hYyI6IjRjNjEwMTcwOTcwZjYxZDY3N2UzMzY0NTdjZTFjMDFhZWUwMTBhODVmNmI4NTdiZDkwZTQzY2UwNTJhNjZlNzkifQ%3D%3D; l_acs_m_session=eyJpdiI6Ikw5ZTRtYXp6bWExbkttNEZSNVwvaHp3PT0iLCJ2YWx1ZSI6IjRhVnpsS3NOMU90SDBiVnFQVStRdUZnTFpqK21SNnpsMmFsblBIVk9YQXliUHVnQUtvWnpzY2EzcXBpVFE1Qkp1dFI2NXBaRVoxbm43ejlxODlKZ3FnPT0iLCJtYWMiOiJlODgwZjExNTllNDU5MDFmNTgxM2FmYzJjNmI4MGEwNjhhYTc1ZmViZDc3OWJmMzZlMmE5Y2MwNDliNGViZjhjIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"35822","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.10.3","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/series","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1538641472.2327,"REQUEST_TIME":1538641472,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-04 16:24:32', '2018-10-04 16:24:32')
401.560ms

2018-10-04 16:24:34
controller: LotteryController action: index
select * from `functionalities` where `id` > 0 and `controller` = 'LotteryController' and `action` = 'index'
3.560ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = 34573 order by `sequence` asc
3.110ms
select * from `functionalities` where `functionalities`.`id` = 34573 limit 1
2.430ms
select * from `search_configs` where `search_configs`.`id` = '30180' limit 1
2.880ms
select * from `search_items` where `search_config_id` = 30180 order by `sequence` asc
4.200ms
select count(*) as aggregate from `lotteries` where `id` > 0
3.140ms
select * from `lotteries` where `id` > 0 order by `sequence` asc limit 20 offset 0
4.270ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'lotteries'
5.930ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'lotteries' order by ordinal_position;
6.230ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34573 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
6.680ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34733', '34578', '34574', '34715', '34576', '34714', '34575', '34577', '34720', '34723', '34728') and `disabled` = 0 order by `id` asc
4.490ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34576' order by `sequence` asc
2.030ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34714' order by `sequence` asc
2.100ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34575' order by `sequence` asc
2.210ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
7.810ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34577' order by `sequence` asc
6.150ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34720' order by `sequence` asc
2.180ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.420ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34573, 'Lottery', 'LotteryController', 'index', '/lotteries', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjNWd3J1b3kxNzZDejFnNUpwRDJvalE9PSIsInZhbHVlIjoibFdtNXNUYTdheGRTa3ErREtkbUEwR0xLN3hZMmZ5S2hIdEpTRkJJRUVlS3Z4SVg2OWdtUG1cL0RPTWtqNm5TU1RoWmlBWXpqbE0rclhQR2JTQlU4N0F3PT0iLCJtYWMiOiJiNjNkNGU3NjAyYTkwMWM5ZTJhNWQ3MjI2OTdiMjYyZWQ2OGUyMGFmY2FjYTM4MDZjY2UyNjlhMGQyNWIxZDdjIn0%3D; l_acs_m_session=eyJpdiI6IjhtMW5vYlZ4eFR5UEpOWjQ2OU1DcXc9PSIsInZhbHVlIjoiMTVlVnhsUHJsRkxCU0E3Q2tBXC8xWGpIRXplSnZTWU9ha1RKSUhvSEVwenptY0NhbElPYkZiaXhSV0VzdmxSRjdyYUJ6UW0yRml2OStlUDhzV1NqNFRBPT0iLCJtYWMiOiIzN2FlN2RhMjE3ZjE0YjlkNjI5ZTIxMTg4NDRlMGZhNTQ3ZGU0Njk2YWNkYmM3Zjk2ZjYwZjZkYWE4ZWYxMTM2In0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"35822","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.10.3","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/lotteries","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1538641473.47,"REQUEST_TIME":1538641473,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-04 16:24:33', '2018-10-04 16:24:33')
449.690ms

2018-10-04 16:24:35
controller: IssueController action: index
select * from `functionalities` where `id` > 0 and `controller` = 'IssueController' and `action` = 'index'
3.540ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = 34578 order by `sequence` asc
2.610ms
select * from `functionalities` where `functionalities`.`id` = 34578 limit 1
2.530ms
select * from `search_configs` where `search_configs`.`id` = '30181' limit 1
2.110ms
select * from `search_items` where `search_config_id` = 30181 order by `sequence` asc
3.340ms
select count(*) as aggregate from `issues` where `id` > 0
83.390ms
select * from `issues` where `id` > 0 order by `lottery_id` asc, `issue` asc limit 20 offset 0
149.350ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'issues'
21.980ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'issues' order by ordinal_position;
10.650ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34578 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
6.670ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34734', '34735', '34738', '34581', '34736', '34739') and `disabled` = 0 order by `id` asc
29.680ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34581' order by `sequence` asc
2.290ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34736' order by `sequence` asc
2.290ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34739' order by `sequence` asc
2.120ms
select `id`, `name` from `lotteries` order by `id` asc
2.410ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.530ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34578, 'Issue', 'IssueController', 'index', '/issues', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6InJPSTFxSmlUZW9sek4xS21PTXIxUHc9PSIsInZhbHVlIjoiQWpqTUErbVpKaFptV0JMd21mOHhhenhcL1VOS05NWnRmN1FcL2NlWjh6dHNMWFNuSnRrUFpCXC9TUVZUSmt0SFJORnZXR2c1dUlKMkRXa2lvakNBaGdjd0E9PSIsIm1hYyI6ImQ5ZjY5MjE5NThjNjI2NTkwZjExZDE2M2Y4NjhkNzBmN2NmNDFkZmM0OTI1ODk0MTZiZGY1OTlmZjg5YTY1OGEifQ%3D%3D; l_acs_m_session=eyJpdiI6InZTOFhjME8yQ2FkbnJtbTU2aGh3ekE9PSIsInZhbHVlIjoidEVRU2FBZm1yaTNKWlwvNlZwT05tUmI0MU5hbzJQVThvTUpvZlhiRHpUZEtVRHZ0dFdLQTMwa3NUdDlmd1N5eHd5MzlDcjBcL0dlOE9pT0RoOXlnZHg0QT09IiwibWFjIjoiYmZiNTU3ZTJiY2FhNWZhNDdkZTdlZDFiZTM5ZWIxMmVlYjMwMzc2ZTQ3MGFiMmE4YTAzMDVlNDM2NzUwNTdmZCJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"35822","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.10.3","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/issues","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1538641474.604,"REQUEST_TIME":1538641474,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-04 16:24:34', '2018-10-04 16:24:34')
518.770ms

2018-10-04 16:25:08
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
11.460ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
3.080ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1539187200 group by `lottery_id`
129.980ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.110ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.540ms

2018-10-04 16:26:08
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
2.960ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.450ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1539187200 group by `lottery_id`
126.280ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
5.840ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.660ms

2018-10-04 16:27:08
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.190ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.790ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1539187200 group by `lottery_id`
130.830ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.540ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.500ms

2018-10-04 16:28:08
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.210ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.860ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1539187200 group by `lottery_id`
126.760ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.770ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.580ms

2018-10-04 16:29:08
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.760ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
3.770ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1539187200 group by `lottery_id`
128.600ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.890ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.600ms

2018-10-04 16:30:08
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
2.840ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.120ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1539187200 group by `lottery_id`
131.890ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.520ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.240ms

2018-10-04 16:31:08
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.370ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.220ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1539187200 group by `lottery_id`
127.750ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.360ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.430ms
select * from `sys_configs` where `item` = 'sys_use_sql_log'
4.410ms

