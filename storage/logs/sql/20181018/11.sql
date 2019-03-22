2018-10-18 11:02:40
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
5.290ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.610ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
178.200ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.790ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.530ms

2018-10-18 11:02:45
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00'
3.740ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
6.940ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
7.820ms
select `id`, `name` from `merchants` order by `id` asc
2.950ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.260ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
2.740ms
select `id`, `name` from `lotteries` order by `id` asc
2.330ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.270ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IlV0clBSa3BDb0d1Tk9mRDhWaDhITUE9PSIsInZhbHVlIjoiSHB3RHdwZUR6VDFGMTJGOHE0SUFpY0d6ck1vSWFaRktRY0ZcL3M1eFM2anZ1dTJreTVMY3FqMjU5Wk9nMUVuS1lsMXBaUVBYbm5DV29OcklkRmF6N1JRPT0iLCJtYWMiOiJkNDk1ZDI0MGJiNDUzODFiNjFhNjUyNDY2NzQ3NTU0NjEyNmY2MjQ0Y2U1YjU1MmIxNWNjNjE0YzgyYjljNjY4In0%3D; l_acs_m_session=eyJpdiI6IlRpbGQwbTIzM3pVcVZmamtqNk05REE9PSIsInZhbHVlIjoiaGtPZ2NLOWs2amV2eUV4c096R1dBWXpMNU5NZTNRME9ZR1hzbEsxOVoxZjFsSkRreWFWMjBUNHA4Qmt1NEY5N2FLZGNlUnRWQWttMGZDTXQrZ1FWdFE9PSIsIm1hYyI6IjliZGY1YTE3NTQzYmVhNmQ1MWY5MmRiMmZmODA4YjIyZWFjMDEwYmVlMjM4YTZjMjkzOTgzNTY2YTk1NWRhNDQifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"44336","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539831765.0958,"REQUEST_TIME":1539831765,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-18 00:00:00"}', '2018-10-18 11:02:45', '2018-10-18 11:02:45')
415.120ms

2018-10-18 11:02:48
controller: TracesController action: index
select * from `functionalities` where `id` > 0 and `controller` = 'TracesController' and `action` = 'index'
3.510ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = 34786 order by `sequence` asc
4.390ms
select * from `functionalities` where `functionalities`.`id` = 34786 limit 1
6.800ms
select * from `search_configs` where `search_configs`.`id` = '30211' limit 1
3.050ms
select * from `search_items` where `search_config_id` = 30211 order by `sequence` asc
4.470ms
select count(*) as aggregate from `traces` where `id` > 0
2.750ms
select * from `traces` where `id` > 0 order by `id` desc limit 20 offset 0
4.040ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'traces'
7.020ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'traces' order by ordinal_position;
7.530ms
select `id`, `name` from `merchants` order by `id` asc
2.240ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34786 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
6.690ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34787', '34790', '34789', '34788') and `disabled` = 0 order by `id` asc
2.600ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34787' order by `sequence` asc
2.030ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34790' order by `sequence` asc
2.650ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34789' order by `sequence` asc
1.920ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34788' order by `sequence` asc
1.930ms
select `id`, `name` from `lotteries` order by `id` asc
2.990ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.310ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34786, 'Traces', 'TracesController', 'index', '/traces', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Im9iVE5PMjc5OVwvR3ArZUM2SzBOUkF3PT0iLCJ2YWx1ZSI6ImJ3dlRmN21KMkRzbm1mQ21qV3hZXC9nS1pMTVRkQkVcL3VwRGMwNGV6TVwvbzJJVGtSSDRqbEthS3BUcmppVUFQWTVNZURaM21VeWZGOUh2TVRqMjB5SURRPT0iLCJtYWMiOiIzNjBlNGJlOWZiNTQ4NmNkOGIzNjM1MGU5ZmFhNDE4Y2VjMjEwN2VmNjE3ZDFjY2JhMzVkOTU4YTg3Y2E3MjM0In0%3D; l_acs_m_session=eyJpdiI6Inp0c3FzQjlxMlZPWitXZHo5bmMwMWc9PSIsInZhbHVlIjoiTjhnYXBINTFhNjRkelhjTE9CVzJEYktFVTBjY2Fnd1I1dGg3U1JaTEg3aHJ5WTgrNE01eHRmdk5VYXR4b3VSQ3REUldEUVwvbm1sTDRkMWJkblhFRGxnPT0iLCJtYWMiOiIyY2NiYzVmOTMxOTU5ZTNiZDFhYzVmMjIwYmFlYzM3NzJkNjZjZWNhYzUxMmVkMzg5M2FkMjU1M2U4NmJkYzlkIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"44336","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/traces","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539831767.4785,"REQUEST_TIME":1539831767,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:02:47', '2018-10-18 11:02:47')
489.400ms

2018-10-18 11:02:55
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00'
4.980ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
7.490ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
7.980ms
select `id`, `name` from `merchants` order by `id` asc
2.820ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.640ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
3.440ms
select `id`, `name` from `lotteries` order by `id` asc
3.060ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.860ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Im54UGpYUjdEc3VcL0cwUnN3UFd4Tm9BPT0iLCJ2YWx1ZSI6InlVNnR5UlVKZFwvdmdRdnBjU2llMEkwNldkQVk1SUtiTjFiZzVWRXZNWW5mZVBNWlh4UVR6dmNDSVR0V1FFV2puXC9rVEppREdGbjF4dE9QOVNpMk41TFE9PSIsIm1hYyI6IjFiOTRjZjFjYjU4ZDU3NWRiNGZlYjI5YWM2MTYyMjdkNzJiYmQ2NDdhNGQ2NzhjY2RjNDg5NmU1MGE4MDIzNDgifQ%3D%3D; l_acs_m_session=eyJpdiI6ImdGeTlDXC9YY1Z3RVwvRFI5a21ybXd0QT09IiwidmFsdWUiOiJya3ZUWDRTc2NuQVEzQ05GM3hPVnhUNVk5NmdXVUtsREN0Y1wvTndHNVZjdkQrZzBZSTVFVmJZT0ExRXg3dUl6UGJpd1NCdXBsc1EraEJLc2RBYnhvRVE9PSIsIm1hYyI6IjBiYjYyMGEzZDkyODQ2MjExYTc5NTJmNmUyMDZmNzEwNDI2NTBhNWU2YTM1OTQzMzZkMzVmZjg0ZmIyN2RmYTcifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"44336","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539831775.1016,"REQUEST_TIME":1539831775,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-18 00:00:00"}', '2018-10-18 11:02:55', '2018-10-18 11:02:55')
426.630ms

2018-10-18 11:03:04
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2017-10-18 00:00:00'
4.250ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2017-10-18 00:00:00' order by `id` desc limit 20 offset 0
20.260ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
19.040ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
17.490ms
select `id`, `name` from `merchants` order by `id` asc
2.240ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
6.760ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
2.760ms
select `id`, `name` from `lotteries` order by `id` asc
4.480ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.660ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects?download_flag=&merchant_id=&serial_number=&bought_at_from=2017-10-18+00%3A00%3A00&bought_at_to=&username=&coefficient=&status=&is_tester=0&lottery_id=&way_id=&issue=&pagesize=20&is_search=', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IlwvT2FaUlFZTFJKSTBVY2FWWFZEcW9RPT0iLCJ2YWx1ZSI6InRVYXdjT3MrNTRFZ3k3NDl6ZStPbENzelwvWXk0NDgrRmpLVjhpRUlqaG80TXFUUlp0UGkrT1JMeHdcL2F2Tjc3VTFsSStid0ZBOFhjdGxJWjFpYzZEK3c9PSIsIm1hYyI6ImNmMTgyYmY0NjJkNDBkMjI3ZjMyZWVkMTk0NjBlODY4ZGFlMzk3ZmNmZDQ2ZWU2ODAxYjhhMTliM2ZhOTgxODEifQ%3D%3D; l_acs_m_session=eyJpdiI6ImV1OU5UbGE5VUdxcDVLQmdxWTJRSlE9PSIsInZhbHVlIjoiblYrQVBET2NOY1d1Q0dDZWd3TnNuRkNIVWhMQUNEQitabDRqUjdIcVlnWUJZYzlIQkZ5QU90REs2Q3lOOEhsQVwvYmRCaWlFajJBR0JjaXNTTDJ4RTZ3PT0iLCJtYWMiOiJmM2E5YzdkMTNiMzU5NjkxYzE3OWViNDY2ZDA4MjQzNTQ1NzQ1MmMxYWRiZWY0OWY2ODgzY2U4NjIwYzc0N2RlIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/projects","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"44336","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects?download_flag=&merchant_id=&serial_number=&bought_at_from=2017-10-18+00%3A00%3A00&bought_at_to=&username=&coefficient=&status=&is_tester=0&lottery_id=&way_id=&issue=&pagesize=20&is_search=","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"download_flag=&merchant_id=&serial_number=&bought_at_from=2017-10-18+00%3A00%3A00&bought_at_to=&username=&coefficient=&status=&is_tester=0&lottery_id=&way_id=&issue=&pagesize=20&is_search=","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539831783.4554,"REQUEST_TIME":1539831783,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"download_flag":"","merchant_id":"","serial_number":"","bought_at_from":"2017-10-18 00:00:00","bought_at_to":"","username":"","coefficient":"","status":"","is_tester":"0","lottery_id":"","way_id":"","issue":"","pagesize":"20","is_search":""}', '2018-10-18 11:03:03', '2018-10-18 11:03:03')
506.900ms

2018-10-18 11:03:07
controller: BetRecordsController action: view
select * from `bet_records` where `bet_records`.`id` = '599' limit 1
53.170ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.630ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34785, 'View Bet Records', 'BetRecordsController', 'view', '/bet-records/599/view', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IkNaYWFwd3FrSXJzZUVHYmpUdHBUcGc9PSIsInZhbHVlIjoib29BTmNPTXpJVFFRUHJoN3B3ZnZTVGtERWZzd3B6MDVBN3ZDOEQ1bVZmMWgxeHBSclU3amFcL1RDYkNrVENQSm5kZjdWVFhpZ1l4RlE4YnB1czRUSVFnPT0iLCJtYWMiOiI2ZjMzOTg1ZjNkMTc1OTU4YWNjOGI2NmY3ZTMzNmE4N2NiYzE5ZTk5NWExMmE1NmZlZGI1ZDJiYTdlZTViOWIyIn0%3D; l_acs_m_session=eyJpdiI6ImJ0XC92SElzY29aZkRnMVVBbHBUZzRRPT0iLCJ2YWx1ZSI6IkdyS3kxN1wvRGppdXREZURGUXc3ejhDVkFVSFdIV0xkZTJMdGVHSkppaVZxNkpmMUtVKzk2bWZrTmt3Q2tmOGRiMkNOZTNXQlFNTG1HRUxzYWRtbG52QT09IiwibWFjIjoiMmNjN2E2MzZjNzgyNWJkNTQ1OTI2ZGY4YTA3MzY2NzVhY2M1NjkyMDA1ZGEzMjFlMTU4Y2U5ZWJjYjhmMDc1YyJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/projects?download_flag=&merchant_id=&serial_number=&bought_at_from=2017-10-18+00%3A00%3A00&bought_at_to=&username=&coefficient=&status=&is_tester=0&lottery_id=&way_id=&issue=&pagesize=20&is_search=","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"44336","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/bet-records\/599\/view","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539831786.8458,"REQUEST_TIME":1539831786,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:03:07', '2018-10-18 11:03:07')
440.580ms

2018-10-18 11:03:23
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00'
6.330ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
14.470ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
12.530ms
select `id`, `name` from `merchants` order by `id` asc
33.650ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
10.020ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
3.070ms
select `id`, `name` from `lotteries` order by `id` asc
4.470ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.860ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjU5VUlIeWZBanQwUEZhaytrR3dWb1E9PSIsInZhbHVlIjoiczNjaSt5b2ZyUjdHc3J0WFQwZjhwUm8wd0RWRTdReGluZTgyNVRGTmdYVjc2c2Z2aWhiazJJaEZWQTdtK21YOUFPYTU4aDRSZFhTRlhvSHArWnJnQ2c9PSIsIm1hYyI6IjZhNmY2MTVjZjUxNmMxMTU0MTU5OTVkYTUxNmFhNjNjYjkwMzBlOWM5ZjMzYzU3NjU3MjI1M2Y2NGZhMjY4YjQifQ%3D%3D; l_acs_m_session=eyJpdiI6ImJmVldzbUN1THB3OXluV0RhVDdxakE9PSIsInZhbHVlIjoiUm9FbWV0WllrbE1YeTlkeFVjcXhsVGZES09RZ21pZzlsZ0tpbnNWT0k0TXQ2aHRBcDcxVzk0VXMya1RVVnpLQnFwM29GR1VjeEJYMmNCZTUrMWVwdkE9PSIsIm1hYyI6Ijk5OTQzNGQ4Njc2Y2E4YmFmZmExOGVjZjQyYzMzZWIyNDhhYjg5ZTY2ZDdmNGYwMjY1NDIxNGYyYmMzMjQwNmMifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"44336","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539831802.8942,"REQUEST_TIME":1539831802,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-18 00:00:00"}', '2018-10-18 11:03:23', '2018-10-18 11:03:23')
480.690ms

2018-10-18 11:03:31
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.890ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
4.500ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `parent_id` is null
2.400ms
select * from `functionalities` where `id` > 0 and `parent_id` is null order by `sequence` asc limit 20 offset 0
4.330ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
11.720ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.480ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
6.430ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
4.790ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
16.110ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
8.890ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjhWaFUxVlpGMjFWMlNlXC9cL090ekxEQT09IiwidmFsdWUiOiI3eHN1UGhUVWhZU1plUTBEbXI0eXFjTVRoQzhlMndRMmtlZ3hQdktFMjhVMDVhWk9ZZ1A0UzZPamJMU1l4K1pRcVNYYU5Fc2ZyUTl2MVhWNzRhdVwvRlE9PSIsIm1hYyI6ImZhYTk5MGM4NmNmYzUzM2Y3M2RkZGZiMGU0YjE5NjU2ZjA1ZTY3YzNhNzcyOThiN2ViNzU1NzJkMzY0ZmUzYTcifQ%3D%3D; l_acs_m_session=eyJpdiI6IjNudndKcStoRjNzbXRSVXVqdzF2QXc9PSIsInZhbHVlIjoiQ0ZuTFFnYU9KYk5zSUxtMDBkanYrUFBPMEdRSzc0bndOU2QzYWpZXC9NYTR1cUJIRm5WVnpOcmdtS2o1RG01RlIrQUlwTVVGQ0hnQnpDd25FU2ZUOGVRPT0iLCJtYWMiOiI1MWIwMmIyMGMxN2ZlMjIzZjU4YTlhMWFlMmRmMzM2NmM4NmZhZGM3NWMwMGZlMjU3MDUyZjZhYjY5YzRkNmNkIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"44336","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539831810.814,"REQUEST_TIME":1539831810,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:03:30', '2018-10-18 11:03:30')
452.940ms

2018-10-18 11:03:40
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
2.950ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
3.280ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
175.950ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.750ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.510ms

2018-10-18 11:03:56
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.210ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
5.130ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `parent_id` = '34658'
2.360ms
select * from `functionalities` where `id` > 0 and `parent_id` = '34658' order by `sequence` asc limit 20 offset 0
3.440ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
6.890ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.070ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
8.710ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
4.370ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.970ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.790ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities?parent_id=34658', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Inp3dFlTR2kwOUlpb3R3eGJJdmlhYXc9PSIsInZhbHVlIjoiUFRvd0pncENpVUY1SkhPMW5Dd0p4aDhwUDNwcVNOc0VFZ2pWd1FGa2dTeXBFZndnYnVQWG9mcENTSTdYNEVkK0ZyZmVXXC80QWVyUDhncm45dG5vS0RBPT0iLCJtYWMiOiIyYzU5Y2M2MDE2NGEyYWM2MDRkZGEzZGU5OWE2Zjk0ZTgyYjJiODQxYjNhNWZkMjM1ZGY4Yjc3MWRmZGQ1MjJkIn0%3D; l_acs_m_session=eyJpdiI6IndDT3hTRWhJaHJLbkwzVktiRmRkVVE9PSIsInZhbHVlIjoiend1ZE5VRHM2ZjBjcnhLd0VrRGpmQ3hEXC9MNjc4VHhzT0wxRUVSNVFWd3QzNTlOWHhHUkFKUnFDM1h0RkdwZWVSa1pQczl0akdidmNUZFZHMkJIM29BPT0iLCJtYWMiOiIxNDQzM2ZlNDVkNDk3NjIyOWZhNzQzZmExODhiMWFjYThlNjBjNWQ4Y2ZhNDBlYTM5NDE2NGIyOGQyZjdkNTc4In0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"44336","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities?parent_id=34658","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"parent_id=34658","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539831835.5059,"REQUEST_TIME":1539831835,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"parent_id":"34658"}', '2018-10-18 11:03:55', '2018-10-18 11:03:55')
404.460ms

2018-10-18 11:04:11
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
12.630ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
13.420ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `parent_id` = '34659'
2.170ms
select * from `functionalities` where `id` > 0 and `parent_id` = '34659' order by `sequence` asc limit 20 offset 0
3.390ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
7.150ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
11.850ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.310ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
3.850ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.480ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.460ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities?parent_id=34659', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6ImhvMTMrTXhJNXQ2dk1TUVwvQ0VxU3VnPT0iLCJ2YWx1ZSI6Ik9iV1ZiVDZ0cnVHZktMRFExWSs5YkFhWXB2d0FNd1hVN21XbjQ0dDV1U2FyMmcxRDRUNkR4dXIrTHNqXC96XC9OXC9pMGFoQldycVpSN1k3Zm11MGxINTNnPT0iLCJtYWMiOiJhZGUxOGI1MzA1OWI2OWJmZTU5ODE1ODMwNDhiZmEzZjk3ODBhM2E1NDVmMGI1OTIyNzJmNGE5MDk2NjcxYTc1In0%3D; l_acs_m_session=eyJpdiI6IkxDcFwvVVJHaFMxUHNRQnhGejRhM1JRPT0iLCJ2YWx1ZSI6ImVKYU9qSTlKY3hYXC9HMFBydmZCMWFjK3ZlK2hiVEtnUXR4TVM4czRscGtFbXFmMFwvbG1CK0dKYUJaWkNMWDE3ckxHWHd2TzZ6UG90WktDRmY0NDNXRWc9PSIsIm1hYyI6IjRhN2ZlNjExNjBkOGQ1NzkyNDY4NTAzNTNhNmU5ODRiZjI1NjU2ZTg0OGI1MDlmOWM2NDRmZjhjOWQzNjE1NzMifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities?parent_id=34658","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"44336","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities?parent_id=34659","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"parent_id=34659","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539831851.0611,"REQUEST_TIME":1539831851,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"parent_id":"34659"}', '2018-10-18 11:04:11', '2018-10-18 11:04:11')
542.070ms

2018-10-18 11:04:40
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.030ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.600ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
175.810ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.370ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.720ms

2018-10-18 11:05:40
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.090ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.580ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
183.480ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.820ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.660ms

2018-10-18 11:06:07
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00'
4.210ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
7.020ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
7.540ms
select `id`, `name` from `merchants` order by `id` asc
2.870ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
6.960ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
7.110ms
select `id`, `name` from `lotteries` order by `id` asc
2.600ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.550ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Ik1xVEVvMjF2MmZNQko4U1g3MzNPVmc9PSIsInZhbHVlIjoidnJzME1RT3AzZGR1XC9zd2grYUxLMyswWjJCSVRNaWRXT2o2cytFMGE2M1JBRjlIOEhcL0ZMQVh4R1Y2VlExdTN1YWVOY1VqeXo5bmJGWUpnbVlxd3ZYUT09IiwibWFjIjoiNzA5M2E0MmI2NzkyZWRlZDE2ZGU5YjBjMThmZWZmOWI4YWQ4YzJkNTQyY2FlZTNlYTc2MjdiODhjODI3MGY5YyJ9; l_acs_m_session=eyJpdiI6Im1wYndCYUUrRTkrZDRjNVo4V2VGakE9PSIsInZhbHVlIjoidGhrejNjOUVBbnNQR3NES2tUODNBcUJxMnVLYW1RVERtUnRGRE5KZGtuZXhKVkZzZkJrN3RJb0JiWlhYNkRhR08wM3NNeE1vcVZ4eXZab1Z6WkZSOEE9PSIsIm1hYyI6IjFkNjk5NDE4Y2Y2MmRlZDY5YmMyMWExMjI0NjA4MjFmZjQzNTJiYjhjZmMxMjQ0MzE3NGMwZDI1MDIwY2NmMzgifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"44838","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539831966.7941,"REQUEST_TIME":1539831966,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-18 00:00:00"}', '2018-10-18 11:06:06', '2018-10-18 11:06:06')
618.180ms

2018-10-18 11:06:19
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2017-10-18 00:00:00'
5.400ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2017-10-18 00:00:00' order by `id` desc limit 20 offset 0
9.040ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
8.080ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
7.710ms
select `id`, `name` from `merchants` order by `id` asc
2.670ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
8.110ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
5.570ms
select `id`, `name` from `lotteries` order by `id` asc
5.210ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
4.870ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects?download_flag=&merchant_id=&serial_number=&bought_at_from=2017-10-18+00%3A00%3A00&bought_at_to=&username=&coefficient=&status=&is_tester=0&lottery_id=&way_id=&issue=&pagesize=20&is_search=', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IkFmK0ZXSENUSFlSRlwvaDJpR3V4eFhBPT0iLCJ2YWx1ZSI6ImVaU01yUzRKdnp3dUdXYTJIa0Q2Y2dkOTZzT2NXNDVzeHduZTRqV3k3NXV1K09JQ25UcTI2UmtoNklXakdXTTgyRjFpRVI4QVFFOXhSV3MxcFRtcWNRPT0iLCJtYWMiOiIwYjgwZWMxOWFiMTkxZTk4ZDZmMTFjYmVmNzYyMzcwNzkzMDQ4NTU5ZDAwY2Q5NTc1ZGNmMjFlN2Y2OWZiNjZjIn0%3D; l_acs_m_session=eyJpdiI6ImtnXC9ac0pNOUxoODN6T2xXbmc0RUtBPT0iLCJ2YWx1ZSI6ImdWc2JCMkJGNDU4dTdhdEtmU2c0SWIwYWRFdE9mSjR6N012T0RsTGticzFRV0ZsTzZkVE5RWk0wWmdrRFJFb2FiQUg4ZGN6dThqY1ozZmFXTDMzRXB3PT0iLCJtYWMiOiJiZGU0NWY1NzVlNDM5MzBmZGJmMWE3N2YyM2I3OTU3OTZmOTQxMWEwYWY5ZDA5NWEyNjBkODEzYzM4ZDJkODNlIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/projects","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"44880","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects?download_flag=&merchant_id=&serial_number=&bought_at_from=2017-10-18+00%3A00%3A00&bought_at_to=&username=&coefficient=&status=&is_tester=0&lottery_id=&way_id=&issue=&pagesize=20&is_search=","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"download_flag=&merchant_id=&serial_number=&bought_at_from=2017-10-18+00%3A00%3A00&bought_at_to=&username=&coefficient=&status=&is_tester=0&lottery_id=&way_id=&issue=&pagesize=20&is_search=","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539831978.9241,"REQUEST_TIME":1539831978,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"download_flag":"","merchant_id":"","serial_number":"","bought_at_from":"2017-10-18 00:00:00","bought_at_to":"","username":"","coefficient":"","status":"","is_tester":"0","lottery_id":"","way_id":"","issue":"","pagesize":"20","is_search":""}', '2018-10-18 11:06:19', '2018-10-18 11:06:19')
548.270ms

2018-10-18 11:06:40
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
2.950ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
8.710ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
182.120ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.910ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
3.120ms

2018-10-18 11:06:53
controller: BetRecordsController action: view
select * from `bet_records` where `bet_records`.`id` = '599' limit 1
2.240ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.610ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34785, 'View Bet Records', 'BetRecordsController', 'view', '/bet-records/599/view', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IlRGM3BhaEp6WWJaZitKSVNMZ2Erd3c9PSIsInZhbHVlIjoiclZ1dWlrUkNZb3U3bFByRlwvZWpQeUhcL0JQMFwvSTBKMFwvQit3V053R2hEZXVFVVRWVzU4TmZEZ0hIR1pqc1l6U2s5Y3BMeTl4VDVqWHR4V0F4aGx6c0VnPT0iLCJtYWMiOiJiYWIzODgzZTJmZjg1YmQ0MjY4OWJlNDJmMmNjODc0NTJlODY4ZGVjOTE2MWY5MzkzYWU1NjAxNzk3ZjJhN2ZhIn0%3D; l_acs_m_session=eyJpdiI6IkN0TTczbmcwZk1BZjUrcTZsdWRBZlE9PSIsInZhbHVlIjoiNjdUdWN1b1R0R3pUbW83WVhGV1pHeWVseXdqaG5EUFIyMU54Mm9FV2Y3eDVRNEFnTlZXOFNGemtoOTgyTE01OVc4V1Y3Y2I3WkJTYXl2UkRNeG45Tnc9PSIsIm1hYyI6ImE3ZDUwNGIwM2JiYTUwM2JlY2QxMDc5ZjczYzQyY2E2OTBjZTRjMDQ0NGQ2Y2UzNjRlZDNjNGVkODU0Mzg4ZDEifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/projects?download_flag=&merchant_id=&serial_number=&bought_at_from=2017-10-18+00%3A00%3A00&bought_at_to=&username=&coefficient=&status=&is_tester=0&lottery_id=&way_id=&issue=&pagesize=20&is_search=","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"44962","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/bet-records\/599\/view","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539832013.1993,"REQUEST_TIME":1539832013,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:06:53', '2018-10-18 11:06:53')
476.070ms

2018-10-18 11:07:40
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
7.130ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.720ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
176.520ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.320ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.910ms

2018-10-18 11:07:41
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.160ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
4.900ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `parent_id` is null
2.180ms
select * from `functionalities` where `id` > 0 and `parent_id` is null order by `sequence` asc limit 20 offset 0
3.640ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
7.190ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.280ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
9.910ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
4.010ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
8.720ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.390ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Ik9aZDliVHRjamQ3ZjNXNjkyRXJONXc9PSIsInZhbHVlIjoiYTJBT3NJM3BWOW9rblpPcVNcL29tRlwvXC9EVlhUOHl4TWw2aUlSblQ2WDVwR1NuWk4xYkpMTjZhUTZaNXhJMmo1c1ZBbDRCV1daNHdXNzJMSkRWb3FUTmc9PSIsIm1hYyI6ImMzNzk0ZGI2MTExNmQ3NDcyMDFmZDAxY2JkMzI2YjM2NGJlZDZkOWVmMTVkZTE4YjdmMTNjMjI1NzkwMWI5OWEifQ%3D%3D; l_acs_m_session=eyJpdiI6Ik4ySk9vVnpicVdIK0xaRzFHOFc2OUE9PSIsInZhbHVlIjoiQzVSXC9vS1ZhcGJTUkI5eWxsazluQnh6RzRrcHhcL2xcL0J4TXBWQjNadlVBNTdsWmhOcXEySTIzVFJJTm0wZDlsQit3WXBXUmJXOE9PYWNrZUxxN0JPQlE9PSIsIm1hYyI6ImRlMGRjM2YzM2JjOTZmMWFlYTY0ZWVjOGZmNWFkYWMyMDU4NmUwNDczZDZmY2IzM2FkOTExNWRmZDMwZmMzZWMifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"45088","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539832060.4386,"REQUEST_TIME":1539832060,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:07:40', '2018-10-18 11:07:40')
511.980ms

2018-10-18 11:07:59
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.580ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
5.740ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `controller` = 'ProjectController'
3.190ms
select * from `functionalities` where `id` > 0 and `controller` = 'ProjectController' order by `sequence` asc limit 20 offset 0
5.820ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
7.670ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.750ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
8.320ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
6.760ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.870ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.520ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities?is_search=&controller=ProjectController&title=', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6ImxNNWpaZGRvNjBiUUd1bDh5Z1Zza0E9PSIsInZhbHVlIjoiZ25MK0RJVFd1YkgxalV1emVjQjU4RXdXdnloUVJHcXpta1EyVDVEa3JpQjVENGNvcnd6cjFObTdkSlwvNnBPK1lMNTNkbmF3OGxhdmx0RlE5K0lvNWdBPT0iLCJtYWMiOiJlYWUwM2FlZWFhOWEzYjE2MTkzNjUwNWNmN2FiZGNmYmYwNWExNzBlMTI5ZTAzMDQ0YWU0MDJiMzRlYzhhODFkIn0%3D; l_acs_m_session=eyJpdiI6IkY1RUNMZkwrMlRsOUpBZFNqSFJZSEE9PSIsInZhbHVlIjoiMlBaNHZUU3p4Z25LYmR6eG0yK2JZdVk5NHlBdTM1eWJaM1I3UHV2cGdFOFVDa0hDVFFCTWsxTDJoclBLT1wvNEJ4THhzK1JleVRzcmJ6dlVsalBtTGR3PT0iLCJtYWMiOiIwM2RmZDc4MDQxMGQzMjkxZGQ0MjE2NjM4YTE4NGEzNDAxYjRjZTRlOGU4MjRjZGU2MGYyMjI5MmJjMDFmYmMwIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"45152","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities?is_search=&controller=ProjectController&title=","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"is_search=&controller=ProjectController&title=","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539832079.1619,"REQUEST_TIME":1539832079,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"is_search":"","controller":"ProjectController","title":""}', '2018-10-18 11:07:59', '2018-10-18 11:07:59')
429.390ms

2018-10-18 11:08:03
controller: FunctionalityRelationController action: index
select * from `functionalities` where `id` > 0 and `controller` = 'FunctionalityRelationController' and `action` = 'index'
3.860ms
select * from `functionalities` where `functionalities`.`id` = 8 limit 1
2.850ms
select * from `search_configs` where `search_configs`.`id` = '5' limit 1
3.130ms
select * from `search_items` where `search_config_id` = 5 order by `sequence` asc
11.030ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
9.960ms
select `id`, `title` from `functionalities` where `id` > 0 and `disabled` =  order by `title` asc
11.540ms
select count(*) as aggregate from `functionality_relations` where `id` > 0 and `functionality_id` = '34659'
2.420ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = '34659' order by `sequence` asc limit 20 offset 0
3.500ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations'
7.580ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations' order by ordinal_position;
8.020ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 8 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
8.790ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('9', '52', '10', '51') and `disabled` = 0 order by `id` asc
2.740ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '52' order by `sequence` asc
2.680ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '10' order by `sequence` asc
1.930ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
2.620ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '51' order by `sequence` asc
2.020ms
select `id`, `title` from `functionalities` order by `title` asc
4.110ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.740ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 8, 'Functionality Relations', 'FunctionalityRelationController', 'index', '/functionality-relations?functionality_id=34659', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Inc0aElsTTNpVVwvbFhXWW52WVFySTh3PT0iLCJ2YWx1ZSI6IlBNU0NGR3VZUHZvUEg1dG9ocklhUk5SZXY4R2hFYk1FV0h2Y05Mak1Sb0RNRFwvSFp5cXh5cHVCV0dvdmVEUkNcL1pkam1IeDBFRFpmVTRsdkszOXUzZ3c9PSIsIm1hYyI6ImJhMmI2NGY2YTZkNTc1MzcyNWJjYzViZGUwN2MwYWM0MGZlN2ZhY2Q4ZTY1MWRlM2Y0YmZhYmM4MDlmODc4OGIifQ%3D%3D; l_acs_m_session=eyJpdiI6ImdKSkZ2VWJ6bWJtVGg0dGdCU3AxVFE9PSIsInZhbHVlIjoiaTlMSWdFNDhBXC9MM2pkUEIwMHVQVitHN3p1SGFUa0VHRU5ZdGY1eDZ6MmRuTmlidVRJOXNBXC9xSEI3QnB5d1E3ZW9rQXFSV1RXV2d5V0p6M1lDTlB6QT09IiwibWFjIjoiNTE2MWNmZThkODMwODdhNTc1MTU3NWI0NTc2ODY3OTgwNDBhYzNhYTJhMGY5N2ZkMjNhMGNjYTlkMDJlOGRiOCJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities?is_search=&controller=ProjectController&title=","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"45152","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionality-relations?functionality_id=34659","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"functionality_id=34659","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539832082.7852,"REQUEST_TIME":1539832082,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"functionality_id":"34659"}', '2018-10-18 11:08:02', '2018-10-18 11:08:02')
462.930ms

2018-10-18 11:08:40
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.040ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.000ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
178.010ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.780ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.490ms

2018-10-18 11:09:40
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.070ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
1.990ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
179.340ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.660ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.350ms

2018-10-18 11:10:21
controller: FunctionalityRelationController action: view
select * from `functionalities` where `id` > 0 and `controller` = 'FunctionalityRelationController' and `action` = 'view'
4.100ms
select * from `functionality_relations` where `functionality_relations`.`id` = '33014' limit 1
3.160ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations'
6.930ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations' order by ordinal_position;
7.180ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 52 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
6.850ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('10', '8', '51') and `disabled` = 0 order by `id` asc
2.350ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.160ms
select `id`, `title` from `functionalities` order by `title` asc
4.180ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
10.310ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 52, 'View Relation', 'FunctionalityRelationController', 'view', '/functionality-relations/33014/view', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IlVSSTNhODNsd1QwR1ZaeEVhY2k0NFE9PSIsInZhbHVlIjoicm1sTEdEdHlqdWtaYVZTUVo1YWNSTlhkUm84RW83dmV4VjBsQXBjcHphQ1RuS1JKUldEaFJuQ214NUN0WnF0RTB5bUUxSUlBY1YyY0xJZSt0d2VwQWc9PSIsIm1hYyI6IjNlODQ3MTM1MTY3YmI3NGNjOWYyNGQzMjNlNzY1ZjJiYTAxNmI5OTJhODYyODcwNjlhMzE2OGM3ODFiYmM0MmQifQ%3D%3D; l_acs_m_session=eyJpdiI6IkFuaUtCcmFjd291eE1HT2RoR0VWSGc9PSIsInZhbHVlIjoiakF5MFwvZDBHWGdVUDZxS21oNlUrWTZwd2lqTFwvRXN5VFRtcVhBQ3lERXNjemFiaFhhTWYwd2VON3gzM3Y2OEd2VHkyd01md2I0NmFoVDJBZG55VTVRUT09IiwibWFjIjoiOTA3M2M5NjI5NDUyNjc2ODY2YzU5ZWI2YWI2NmE0N2ZhMThlMTMzMzdlMDRkYjFkZTljZmVlZGE4ZjYzMWZkYyJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionality-relations?functionality_id=34659","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"45158","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionality-relations\/33014\/view","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539832220.6234,"REQUEST_TIME":1539832220,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:10:20', '2018-10-18 11:10:20')
443.640ms

2018-10-18 11:10:28
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
8.240ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
4.030ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `parent_id` is null
1.990ms
select * from `functionalities` where `id` > 0 and `parent_id` is null order by `sequence` asc limit 20 offset 0
8.550ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
11.460ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
17.460ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
8.110ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
10.090ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.020ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.460ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjdFMno1TVVcL1dJem5BOTU0ODM3SFZ3PT0iLCJ2YWx1ZSI6IlVaNlRsTnNNWUtEekVyWjBZM0tVMFFuV3RTcjIxTk5rcVE1WllBRVRGMTdaM0Z4YkFTQnlGS2s0aHR1UjArMTFGZkcxdkM3TGErY082SkV3NVFnNjNBPT0iLCJtYWMiOiIwMWE5MzAwOGUwMjJkMTc0YjYxNDIyNjdiMjQ4NTQwODBlYTBiOTA0YWUwYTJiMzlmYWY1ZDRhOWI4ODMxZjNlIn0%3D; l_acs_m_session=eyJpdiI6IjlJZ2VxcHRwWlZ5elF1ZWdOU0ZFVFE9PSIsInZhbHVlIjoiT0d0SmR5RG5kZUhtWHIrQzhtays4NHlxUmtnendrM3duT0hrRVdSN2ZMK2RNWGJNMEVMT1NqaHNOb2FTWGM1aUxRcE9TTHRGOUlVRU55aCs5UXlTK2c9PSIsIm1hYyI6IjFkMzJjNGRlZWE3MGQ2MTdjYTBkN2RiNWMyMDIyZDE5Y2NlNGI2MmMxMzdkMGE5YjZjMWZmMTY0OGJlNGQ2YmQifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"45158","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539832228.369,"REQUEST_TIME":1539832228,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:10:28', '2018-10-18 11:10:28')
484.900ms

2018-10-18 11:10:32
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.980ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
5.460ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `title` like '%View Bet Records%'
3.130ms
select * from `functionalities` where `id` > 0 and `title` like '%View Bet Records%' order by `sequence` asc limit 20 offset 0
6.230ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
7.560ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.720ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
8.300ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
4.470ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.760ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.510ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities?is_search=&controller=&title=View+Bet+Records', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IkdicExwNm8yRWQ5eFRLR1QrS09TNlE9PSIsInZhbHVlIjoiVnY2RFRyMGdEQlpPUkh3Q01OWmJTQVV5M21FMDJxQzJxU2lXMzU2ZFhmdEVSTExKejRcL1o3ZkoxTm1JdEFMVmk0bHhsZzFjblRoZXpqR1dlKzNSeFhnPT0iLCJtYWMiOiIyN2JhZjEwMzllYzI5NGFkNzY4MzJlZDk4YTI0YzIzZGVmMDkyMTM0MTVkYTBmMjUzNTkwYWY3OTNhYTRiMzhhIn0%3D; l_acs_m_session=eyJpdiI6Im9TSVZWdHA1THZmalRnSnV1YzRiUmc9PSIsInZhbHVlIjoibml3TWV4SHlNQmRiSTNoTkN4bUNhTEQ0RFpEdjRcL0ZVZjZ0YVNjbjFGNnJqTmtMR1N6VmVlc3ZFa3Q4K0pHczZ3TmdHTDBkZWJhMktGSEE1amZ0ZGZBPT0iLCJtYWMiOiI5ZTk5YjJmNDUyZWIzOGY0ZDJhZTEzNGI2MjhjNTFhMTM1YThiMGZmZmU5MWViNWFiYzQyM2JjYjhkNjFjYjFhIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"45158","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities?is_search=&controller=&title=View+Bet+Records","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"is_search=&controller=&title=View+Bet+Records","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539832232.2112,"REQUEST_TIME":1539832232,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"is_search":"","controller":"","title":"View Bet Records"}', '2018-10-18 11:10:32', '2018-10-18 11:10:32')
436.780ms

2018-10-18 11:10:40
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.450ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.870ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
176.950ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.790ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.220ms

2018-10-18 11:11:40
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.470ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.740ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
178.720ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.070ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.470ms

2018-10-18 11:12:41
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.620ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.290ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
419.340ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.960ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.930ms

2018-10-18 11:13:41
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
2.920ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.440ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
409.800ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.710ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.550ms

2018-10-18 11:14:41
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
2.890ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.880ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
178.270ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.800ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.460ms

2018-10-18 11:15:41
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.520ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.800ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
181.110ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.610ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.310ms

2018-10-18 11:16:41
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.010ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.680ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
180.530ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.540ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.280ms

2018-10-18 11:17:22
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00'
4.410ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
7.480ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
49.070ms
select `id`, `name` from `merchants` order by `id` asc
9.830ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.370ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
3.210ms
select `id`, `name` from `lotteries` order by `id` asc
3.150ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.600ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6ImhJK3RxRHRLeityWEFackZla1VUYlE9PSIsInZhbHVlIjoiXC9nZFwvd0U0cFwvWGpBN1paNGV5Y2llUnR3RGxJMmkwMDRnZ1gwXC9nU0Nic0lIalpFWTBMTEpwbXppR3V6alZRWjBLSFhPNHV6WFZMUFJpU1JnSnlPTWxnPT0iLCJtYWMiOiI1NzU0MGE4ZWJiMGRlNzg1MGQwYmM2MTkzMDNjZWNjMzRjZjQ3NzAzOGM5MTNlYWVjNTZhN2E5MmExOTM1ZGFlIn0%3D; l_acs_m_session=eyJpdiI6IkVDNjAzdWxlbmhxU2EreGxOblB2N2c9PSIsInZhbHVlIjoiT0VRc2lnd1hyQ2hPd3A4RUJOWlVMZmIzU25RRTZIejViM3RZbGVcLysraG0xNFwvT3BOMGd0bWFYaXBPS3h5UnEwVUpMNkkyWE5IQTNtT3g4R0VhaGlHdz09IiwibWFjIjoiOTlkNTk4Yzg0MTcwMDViM2YxMGIwNjUxY2VkZTFhODQ3ZGIyOTUzMTFhMzNlZTYyNTUwNDE4NTExNWMyZjZhMSJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"46270","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539832642.1319,"REQUEST_TIME":1539832642,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-18 00:00:00"}', '2018-10-18 11:17:22', '2018-10-18 11:17:22')
453.010ms

2018-10-18 11:17:31
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2017-10-11 00:00:00'
4.190ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2017-10-11 00:00:00' order by `id` desc limit 20 offset 0
9.210ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
7.510ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
7.990ms
select `id`, `name` from `merchants` order by `id` asc
2.290ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
6.600ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
2.430ms
select `id`, `name` from `lotteries` order by `id` asc
2.380ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.250ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects?download_flag=&merchant_id=&serial_number=&bought_at_from=2017-10-11+00%3A00%3A00&bought_at_to=&username=&coefficient=&status=&is_tester=0&lottery_id=&way_id=&issue=&pagesize=20&is_search=', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6ImhsVVNXcnp6dXNQQTdSeCsraVdoc1E9PSIsInZhbHVlIjoiSUhTRFk0SFI4RnhHZkJHTjg0RjFTR21lek10Njg2S2RITVdMWFVzbHJpRktORHdBVlZVY1ZNTlR2R1dtSWJaQ0praWR5S0I1a3FMVmd2K0JtcFRweUE9PSIsIm1hYyI6ImU4OTM5NTA0Y2FlMWI5NWNmOWYyMTU5OTAwZGQxZjIzNmE0MDlkYTJhMzM1ODMwYTgwZWFhN2E5ODUxYTAwYjkifQ%3D%3D; l_acs_m_session=eyJpdiI6ImlFUGdMYjdzZjFxcmFKNDJ1THAwV3c9PSIsInZhbHVlIjoiOXY3d0tyMGc0eDhPQlwvQSt5NlVrblYwaE5neE8rSXhjWDJvemoxQWQyM1ZrZk5OdURJY0RnamNHUnNVdTlrT0hRU2NCUUVwbDRJWUU1TGxhdVwvMG5CUT09IiwibWFjIjoiN2UzZDAyNGM3YWYxYmNhNTBlY2ZhYTBiZTlhODg5NWU2NzczN2FmOWM1MDM0ZjdhMDYyNGRiODZiNWIzODJlOCJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/projects","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"46270","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects?download_flag=&merchant_id=&serial_number=&bought_at_from=2017-10-11+00%3A00%3A00&bought_at_to=&username=&coefficient=&status=&is_tester=0&lottery_id=&way_id=&issue=&pagesize=20&is_search=","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"download_flag=&merchant_id=&serial_number=&bought_at_from=2017-10-11+00%3A00%3A00&bought_at_to=&username=&coefficient=&status=&is_tester=0&lottery_id=&way_id=&issue=&pagesize=20&is_search=","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539832650.6633,"REQUEST_TIME":1539832650,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"download_flag":"","merchant_id":"","serial_number":"","bought_at_from":"2017-10-11 00:00:00","bought_at_to":"","username":"","coefficient":"","status":"","is_tester":"0","lottery_id":"","way_id":"","issue":"","pagesize":"20","is_search":""}', '2018-10-18 11:17:30', '2018-10-18 11:17:30')
386.760ms

2018-10-18 11:17:32
controller: BetRecordsController action: view
select * from `bet_records` where `bet_records`.`id` = '599' limit 1
2.930ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.160ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34785, 'View Bet Records', 'BetRecordsController', 'view', '/bet-records/599/view', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6ImpscFZiaXFheTBsTUE2MDVrSnZnZEE9PSIsInZhbHVlIjoiRlNtVm1HWndENFFndzFFalpwNUNNSjhPYVRFT2hJd1dUVmI4alwvRE5vajdkYnNqWVRhcDJsM3R1QnlMbDM2b003cVZcL2ltSG1rKzJwcG1senl5alwvMXc9PSIsIm1hYyI6IjRjYWYxY2ZhNjU4YTc2MWQ0NjRkOTE4YzE4OTAyMjc2N2NlZjE0MTdkZDIwNmYxMDEzM2QzZDgzMTczMzM1YjcifQ%3D%3D; l_acs_m_session=eyJpdiI6ImoyN1VOa2xxSDMxVmQ5eDJSM1JcL0tRPT0iLCJ2YWx1ZSI6IndhS3ExZDB6ejIrbzBjOWxsVUFHVVpVRkNHU0lUYklDdW5RWXhiZlwvRERZWlhpWXJyOTVGZnJXTE1rekpYem1PWUtad0JaMGNHUHNjT1ZCS3B3Qk4zZz09IiwibWFjIjoiMmMyMjAxZDI1ODc1N2FiNGU5ZDgwNTUzMDYzNWE1OTk0OTRjZWE4NWE4OThmMzY4YTY5ZDM1OWRhZTZkOWQ4MiJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/projects?download_flag=&merchant_id=&serial_number=&bought_at_from=2017-10-11+00%3A00%3A00&bought_at_to=&username=&coefficient=&status=&is_tester=0&lottery_id=&way_id=&issue=&pagesize=20&is_search=","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"46270","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/bet-records\/599\/view","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539832652.4315,"REQUEST_TIME":1539832652,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:17:32', '2018-10-18 11:17:32')
496.290ms

2018-10-18 11:17:42
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
460.590ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
6.620ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
366.640ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.790ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
3.460ms

2018-10-18 11:18:42
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.360ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.850ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
181.970ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.940ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.420ms

2018-10-18 11:19:42
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.120ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.130ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
180.230ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.940ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.700ms

2018-10-18 11:20:42
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
11.900ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.700ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
179.030ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.840ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.360ms

2018-10-18 11:21:42
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.240ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
1.970ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
178.310ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.680ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.660ms

2018-10-18 11:22:42
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
10.730ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.750ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
177.480ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.180ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.680ms

2018-10-18 11:23:42
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.440ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.920ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
177.230ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.740ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.620ms

2018-10-18 11:24:42
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.000ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.550ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
218.640ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.810ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.700ms

2018-10-18 11:25:43
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.390ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
3.090ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
247.600ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.550ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.550ms

2018-10-18 11:26:43
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.260ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.640ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
409.680ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.590ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.220ms

2018-10-18 11:27:43
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.070ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
1.990ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
330.360ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.870ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.490ms

2018-10-18 11:28:43
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.600ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
3.890ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
338.640ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.890ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.490ms

2018-10-18 11:28:45
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00'
6.040ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
10.690ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
9.890ms
select `id`, `name` from `merchants` order by `id` asc
32.320ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
8.520ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
3.270ms
select `id`, `name` from `lotteries` order by `id` asc
7.450ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.490ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6ImRXbUxOSmNZQWxVclk5RENLNlBNUGc9PSIsInZhbHVlIjoiVEJXMTNFOFNZemlEd1BoYXNrblJ3cVhjQlROR1FKaTgzeXNFTFljKzNBdXkrTGFMdTc4OUtkczZqbjlFNVl1UVBHcFM1YkV0REhNbFNhTDlBV0c3R3c9PSIsIm1hYyI6IjM2NTZhYzAxNjVkMTNhOGI3NDZkYzRlODU4OTJlMDI5YjAwOTg3ZWM3NWMwNmJjNDY2MjMzNTk2MjJmYzVkMDQifQ%3D%3D; l_acs_m_session=eyJpdiI6InpGdFJMbm1pZjc5ZUs3bDRNQys1QWc9PSIsInZhbHVlIjoiQVRBZkJ6VytyaVE4QVhRNjM0SHRrU25wY0hzODRUQXVPSTlzRDh5TG9wckt5U1NJTDBhTW9xelpmbzhnTmwrQlJNR0krK3BTUFwvd08xR2RESnp5SE53PT0iLCJtYWMiOiIwOTRkMTBmN2E3MTc1ZDFkMDYxMGI3OTFlMjg2NmUxOGVkMDIzZTJhNWExYWJmZmRjMzJkNDMxODRkMDE5YTMzIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"46530","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539833325.0144,"REQUEST_TIME":1539833325,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-18 00:00:00"}', '2018-10-18 11:28:45', '2018-10-18 11:28:45')
614.250ms

2018-10-18 11:28:53
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2017-10-18 00:00:00'
5.350ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2017-10-18 00:00:00' order by `id` desc limit 20 offset 0
9.150ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
7.680ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
7.710ms
select `id`, `name` from `merchants` order by `id` asc
2.340ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
18.650ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
9.770ms
select `id`, `name` from `lotteries` order by `id` asc
4.660ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.560ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects?download_flag=&merchant_id=&serial_number=&bought_at_from=2017-10-18+00%3A00%3A00&bought_at_to=&username=&coefficient=&status=&is_tester=0&lottery_id=&way_id=&issue=&pagesize=20&is_search=', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6InVQZ1RzaWVNS1J3aDhhazF2TlEyRnc9PSIsInZhbHVlIjoiSFpLUnZtWU9pUDFGRFlJcEFzRnZUMEQrSVpPK2tCOHU5T3hycUN2NCs3cTFtTUZuNjZFeGpaQzVaaWViaE5sUmZKVXNGV0JzZ2NFd0ZVSmcwQ0RxeGc9PSIsIm1hYyI6ImNjMjI2NzY0N2FiYjkwMjRhMDQxZTc2ZGZmMjY2NTY3NmNhZjE5N2Q5NjI2Nzg1NzM5NDc4OTkxZmJkNmViMGUifQ%3D%3D; l_acs_m_session=eyJpdiI6Ik9pM2Vrd3J1WFZcL3ZpVGI5ZUFPekx3PT0iLCJ2YWx1ZSI6InlaWFZyVWxUVGthYTN4eUdqR2p5WUR1eWVxY3F0OGtCeWNUV2M1a2hFMWFuQjU0UmhVaHFBbEk5NUJSaklzUVNQZGl4VEhGYU1WMzhISTNWbWhabEtBPT0iLCJtYWMiOiJmOTIxMTFkZWZiYzc5MjJmZTg3MTdmZmViNGY3NTIzMTRjZDU5MzI1ZDAyNmEzZTE3NWQ2ZWRjNzQxMzI4MmNiIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/projects","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"46530","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects?download_flag=&merchant_id=&serial_number=&bought_at_from=2017-10-18+00%3A00%3A00&bought_at_to=&username=&coefficient=&status=&is_tester=0&lottery_id=&way_id=&issue=&pagesize=20&is_search=","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"download_flag=&merchant_id=&serial_number=&bought_at_from=2017-10-18+00%3A00%3A00&bought_at_to=&username=&coefficient=&status=&is_tester=0&lottery_id=&way_id=&issue=&pagesize=20&is_search=","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539833333.1003,"REQUEST_TIME":1539833333,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"download_flag":"","merchant_id":"","serial_number":"","bought_at_from":"2017-10-18 00:00:00","bought_at_to":"","username":"","coefficient":"","status":"","is_tester":"0","lottery_id":"","way_id":"","issue":"","pagesize":"20","is_search":""}', '2018-10-18 11:28:53', '2018-10-18 11:28:53')
589.040ms

2018-10-18 11:28:57
controller: BetRecordsController action: view
select * from `bet_records` where `bet_records`.`id` = '599' limit 1
2.850ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.540ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34785, 'View Bet Records', 'BetRecordsController', 'view', '/bet-records/599/view', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Illxc01WUys5VEU2N3V4Zzhsb0VWM1E9PSIsInZhbHVlIjoiYWVBTmhEQzZUamFjN2VOcWRkOXIzY3p6M1JndjNjeVExanpsanVEY05DSmdUTHFLY0s3WFUwWWdramhPUmxYaWtiSkdsK1RkWFZKdFhITkJHZWFoUlE9PSIsIm1hYyI6IjhjMjFjYTkwNWZlNjMxMmIxOGZhMDdlMzE3Yjc4MmViNWQ0YjY3MTgxMDc2ZjBlNGJjMjg2ODg2ZjAwNDI0M2UifQ%3D%3D; l_acs_m_session=eyJpdiI6IlB0TGU1dU5lV1BRUFRhSUNiRWk4WHc9PSIsInZhbHVlIjoid1dFbERWb3FnTUlqRzhZK1RNZk9OaFZ1Y2FQTkxvSEhtSUo3XC9SellwNU1vU2RmKzBkMVZaOU5nazRIbzZ6RlRzZVkySVdzampUNkxnVDU5Tll6dmdnPT0iLCJtYWMiOiI3NTkwZGIwMDRmZGI5NTU5Y2ZlZGNiZTIzNTIyMmMxMjRjOWI0MzJjZjMwNjQ5MjEzODk0MDFkZjNiMmE0OGFkIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/projects?download_flag=&merchant_id=&serial_number=&bought_at_from=2017-10-18+00%3A00%3A00&bought_at_to=&username=&coefficient=&status=&is_tester=0&lottery_id=&way_id=&issue=&pagesize=20&is_search=","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"46530","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/bet-records\/599\/view","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539833336.7787,"REQUEST_TIME":1539833336,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:28:56', '2018-10-18 11:28:56')
478.350ms

2018-10-18 11:29:33
controller: BetRecordsController action: view
select * from `bet_records` where `bet_records`.`id` = '599' limit 1
2.810ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.490ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34785, 'View Bet Records', 'BetRecordsController', 'view', '/bet-records/599/view', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IlVUS2ZtUDJcLzRvbnYzUUFzSVJBSWVnPT0iLCJ2YWx1ZSI6IkxNTVRSdmhTTWVzYnFaTzlYbGVPSTc0RE9QSnlMamREVmRJaXN1SThkK1RcL3UzdVVtcjRxYWx2UitDSDRPc3E0MmFZYzc4VHNFTUIxakt0TUJWQUF4dz09IiwibWFjIjoiODIyYmM0NTVlMDc1MzAyYzg1ZmMyOTgxZDVmY2E3YzU2ZjFkNTRmMzdlODg0MTM2NjExYzI5MDUzMDE4YjQ0MSJ9; l_acs_m_session=eyJpdiI6IjlYblBFdkJLNTdtOXFBTE9rWlFjZWc9PSIsInZhbHVlIjoidHNvdEFJb241SFNsOHQrcDVmUExkZ0tYaGdpR2dsWXBSeFJnazNcL0JaUEFHWGM4V0RFWHZpdnlISGUxTnNOUTUxaGhjTWdCMFByWjJNOWpjRlhjT2xRPT0iLCJtYWMiOiIwZDI2ODM3NmVlOTFlODM2MTM2Mjk4ZmU0NzQxYzdhMDdjZDdkYjcyMzljNjdmN2VmYWUxMzI5MGJlNjhlOGQxIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"46842","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/bet-records\/599\/view","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539833372.5995,"REQUEST_TIME":1539833372,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:29:32', '2018-10-18 11:29:32')
448.300ms

2018-10-18 11:29:43
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.370ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.130ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
285.510ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.050ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.480ms

2018-10-18 11:30:43
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.100ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.920ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
325.440ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.880ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.570ms

2018-10-18 11:31:34
controller: BetRecordsController action: view
select * from `bet_records` where `bet_records`.`id` = '599' limit 1
3.110ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.350ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34785, 'View Bet Records', 'BetRecordsController', 'view', '/bet-records/599/view', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjcrOTRib1hMSURhODJrb1R1eld1XC9RPT0iLCJ2YWx1ZSI6InlqNFZCVmdodFVQSDFKYVRnTVJoMjhrNU9hMlR6b0hzOGU2Y25IUldWUUZSZ0xlZUREa3VHSll5U0kzTk9jTFh6XC9ZWkNoOE5hcE5seTV1VGFzZFNPZz09IiwibWFjIjoiNjA1OWZhMDRiNjVmZTBmOTJiOWFhMmNiZDBmNzE3NWQwNDVlMmRiZjc5MjcwNjUzMmMxZjViMTMwZGMyMDMzMyJ9; l_acs_m_session=eyJpdiI6IkZQZ0ZPMEtzYjVKS1wvbmR4a0dMejZRPT0iLCJ2YWx1ZSI6IkJrdVNsRkM5VXcrbU1RV2dcL0JCTEMxWWJiam9Xd1c4ckNraVRyU3ZJT1p1OEZPcDUrSXlcL1h2ZTNQOGhkMWdHWDlqSlZXSTEzWlRITXlha2t2V0VqXC93PT0iLCJtYWMiOiJiYjZkZDlmNmRlODE3NzlkMjgyNmJhNTQzN2U0ZTFhNDMzNjAwZDZkZWU0OTZhNzJiMzU2ZTM3MDEyYWQwMjk1In0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"46880","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/bet-records\/599\/view","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539833493.5323,"REQUEST_TIME":1539833493,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:31:33', '2018-10-18 11:31:33')
505.660ms

2018-10-18 11:31:44
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.500ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
5.750ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
327.380ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
87.780ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.810ms

2018-10-18 11:32:44
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
11.550ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
4.890ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
339.130ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.080ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.600ms

2018-10-18 11:33:44
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.520ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.740ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
359.070ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.360ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.780ms

2018-10-18 11:33:59
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.880ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
13.640ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `parent_id` is null
2.150ms
select * from `functionalities` where `id` > 0 and `parent_id` is null order by `sequence` asc limit 20 offset 0
3.800ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
7.520ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.770ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.760ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
3.850ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.310ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.450ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjcrOTRib1hMSURhODJrb1R1eld1XC9RPT0iLCJ2YWx1ZSI6InlqNFZCVmdodFVQSDFKYVRnTVJoMjhrNU9hMlR6b0hzOGU2Y25IUldWUUZSZ0xlZUREa3VHSll5U0kzTk9jTFh6XC9ZWkNoOE5hcE5seTV1VGFzZFNPZz09IiwibWFjIjoiNjA1OWZhMDRiNjVmZTBmOTJiOWFhMmNiZDBmNzE3NWQwNDVlMmRiZjc5MjcwNjUzMmMxZjViMTMwZGMyMDMzMyJ9; l_acs_m_session=eyJpdiI6IkZQZ0ZPMEtzYjVKS1wvbmR4a0dMejZRPT0iLCJ2YWx1ZSI6IkJrdVNsRkM5VXcrbU1RV2dcL0JCTEMxWWJiam9Xd1c4ckNraVRyU3ZJT1p1OEZPcDUrSXlcL1h2ZTNQOGhkMWdHWDlqSlZXSTEzWlRITXlha2t2V0VqXC93PT0iLCJtYWMiOiJiYjZkZDlmNmRlODE3NzlkMjgyNmJhNTQzN2U0ZTFhNDMzNjAwZDZkZWU0OTZhNzJiMzU2ZTM3MDEyYWQwMjk1In0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"46880","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539833639.2889,"REQUEST_TIME":1539833639,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:33:59', '2018-10-18 11:33:59')
521.160ms

2018-10-18 11:34:01
controller: FunctionalityRelationController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.210ms
select `id`, `title` from `functionalities` where `id` > 0 and `disabled` =  order by `title` asc
7.200ms
select count(*) as aggregate from `functionality_relations` where `id` > 0
2.870ms
select * from `functionality_relations` where `id` > 0 order by `sequence` asc limit 20 offset 0
3.560ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations'
6.870ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations' order by ordinal_position;
7.660ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 8 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
6.390ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('9', '52', '10', '51') and `disabled` = 0 order by `id` asc
2.590ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.380ms
select `id`, `title` from `functionalities` order by `title` asc
4.090ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.580ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 8, 'Functionality Relations', 'FunctionalityRelationController', 'index', '/functionality-relations', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Ilg1MFwvTmJHanFRbkhHRldoMmNHZXVBPT0iLCJ2YWx1ZSI6IlNqdXZnV2p5NkVMOU5NZ0RRNG5zbUQ0d0hrSXdzZDFwZExkWWtzcXdxazdZdE5uZklFUTJjYkdTY2hFcko0THcyNXJETnJYYlZycW5DOWQweVpWSytRPT0iLCJtYWMiOiJiYzUwODA0ZTU4MGQwNTFhYzk2Mzg2ODFkMjk2ZmFkNjQ5MWU5MDIxZTE1NWM4MWQ3YWViYjU5M2NjYzhjMzhhIn0%3D; l_acs_m_session=eyJpdiI6IkdoRDlyR0h0YkgzaGo5N3J0cVFGZUE9PSIsInZhbHVlIjoiZ2pDOVJSZ21IWks3aG5WcVA4XC81UTJpcGpqUVJ2eTIyeHQ1dm5WTFlmZGgrRjFsUXZJOXFvMDdjdmtlbjVZZ3ZIT2lzek02YjBIRTQwcXpuUTNZZ1ZnPT0iLCJtYWMiOiJhMjg2MTcxMDY4NjllNzI5YjlhNDRkNDIwZDZmM2E2N2I2ZTkzOTE3MjliMDg5ZTJlYjhhMjA2YTIxODdiOGUzIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"46880","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionality-relations","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539833641.176,"REQUEST_TIME":1539833641,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:34:01', '2018-10-18 11:34:01')
456.080ms

2018-10-18 11:34:07
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
9.690ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
4.270ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `parent_id` is null
3.480ms
select * from `functionalities` where `id` > 0 and `parent_id` is null order by `sequence` asc limit 20 offset 0
10.080ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
35.230ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
19.010ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
110.340ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
4.590ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
5.160ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.950ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IllUK29ZYnRXNnlPMEx1d1NkWEtLcnc9PSIsInZhbHVlIjoibWNYckhmWDhjMkkwaGY1NFwvQUZjZkFNWkNOQ0RFcm9ZUVlDcW5YVUM3cGZFNkt6bmZPSUlla2pUcE1maVgrVFwvR2V5Q1FFNzlLXC9UbitLa1lqb3NpdVE9PSIsIm1hYyI6ImU2ZTZkNDdmNWJiOTg1MmE5YzgxY2VlNTUxNTBjYzI2NWRmNjQ4NjQxYzMxMDFkMGNjODA5NDg4ODIyZDUxYjQifQ%3D%3D; l_acs_m_session=eyJpdiI6Ik42SFM4ZURBVnRYd29ubklKMDJ5aHc9PSIsInZhbHVlIjoicEQxbnJ1azZHdUlEaHJvdzBYVE1nc21yVnVqRlgyQUJ4cHVNbEtrUUxGOGZPSU42a29HNU9TSjZXNk8xVXJweFNLRSszSEFza2ZzVmxIT2xJTjIxNWc9PSIsIm1hYyI6ImQ0NTJkMDIwYmM5NjU4MmUwNTA2MzkxYzBjYjc5NzI1NzJlYmUyMmRhNWRlNTJmOGU0YTI0Y2YwYzBhZjc3YTcifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"46880","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539833646.0296,"REQUEST_TIME":1539833646,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:34:06', '2018-10-18 11:34:06')
716.280ms

2018-10-18 11:34:13
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
8.250ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
5.650ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `parent_id` = '34658'
2.250ms
select * from `functionalities` where `id` > 0 and `parent_id` = '34658' order by `sequence` asc limit 20 offset 0
3.790ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
7.590ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.590ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
8.060ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
4.480ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.620ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.590ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities?parent_id=34658', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IklrOWh1UDNrMXo5ZHhUdjVXY1RwZHc9PSIsInZhbHVlIjoiRVwvVGlZOGxYeHN3ajRJcmVwR3lOb0diNHAxemhiZFZKR2RBYW5wTGJmNXZKS3RuN1lYV1dDblR1Sm5YdSt6ZHFPRExFR3drOVltcTdsZ1duYm9lNDRRPT0iLCJtYWMiOiIyYjUwOWVmNmUyMjQxYTg5Mjk4YjY2MjllOWM2NWUwZDcwYThhN2I1NmYwYTA4ZjA0OWM4NDllMGJhOWQxOWNlIn0%3D; l_acs_m_session=eyJpdiI6ImU5dVc3VmpOVTJ3cWp2cUFGSlI3T0E9PSIsInZhbHVlIjoidk1TU0xaRUkzRVYwNDltVFd0bXVDbFZWMzVheGhCdnVBcU1BdUZ0RG8yTE9Td0E2eGxyRzA0Q25ueUhnYmljWXp5aTVoVlphQ0VKclwvXC9jcVlhcDhnZz09IiwibWFjIjoiYjdmMjdjM2I2Y2FlOGIxMzY1OTA1NDJmOWVjYWJmNWRlZjA4ODI2MjRhNjJmMDQ0OTViOTg4ZTM5ZGNmYTBkNSJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"46880","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities?parent_id=34658","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"parent_id=34658","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539833652.6153,"REQUEST_TIME":1539833652,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"parent_id":"34658"}', '2018-10-18 11:34:12', '2018-10-18 11:34:12')
468.630ms

2018-10-18 11:34:16
controller: FunctionalityRelationController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `disabled` =  order by `title` asc
6.880ms
select count(*) as aggregate from `functionality_relations` where `id` > 0 and `functionality_id` = '34659'
2.770ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = '34659' order by `sequence` asc limit 20 offset 0
3.810ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations'
7.470ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations' order by ordinal_position;
8.100ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 8 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
6.970ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('9', '52', '10', '51') and `disabled` = 0 order by `id` asc
3.340ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.130ms
select `id`, `title` from `functionalities` order by `title` asc
4.060ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.430ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 8, 'Functionality Relations', 'FunctionalityRelationController', 'index', '/functionality-relations?functionality_id=34659', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6ImxuVEtHdWtMVE1UdFpiQkI2MnFZQlE9PSIsInZhbHVlIjoiXC94K1ZDOFJINE9ITHZlTzgzMVViQ1F3MVp4cVVsRjFGYnhzN2ZOSEllcElsWEc5ZDZlOWMzQlAxR1k4ZjlCZCtQNFh5SGNpZFpZSmdFZzJjVUZQV2JRPT0iLCJtYWMiOiI4ZWYzZGU0YTQ5NjMxOWVhM2YyZTUzNzBjNGIzMTVjOGJmYTdmNDJhNmYzN2EzYjRjMTVkOGExZDBmZTg2NTllIn0%3D; l_acs_m_session=eyJpdiI6Ijk4enc1cWVXMFRKK3NcL2N5enloUHVBPT0iLCJ2YWx1ZSI6IitWRTZubnFlaTlGRHpWcDVYUVN6ZFwvRnQ3OWlzMzlqcGhcL25OWFdZZU9pc1RcL2V4WDR5UXpNQmNxNHliajVuZ2ZoblFydUo0QUxacld1QWFiS1RncFFnPT0iLCJtYWMiOiJmMmFiNGRiZDRmNTdlODA3MDQwNTlkOWVmMDMxY2ZlY2VkZWIwYWQzYWI3M2VmMTgzMDM0YTBiNjMxOTFkMjk1In0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities?parent_id=34658","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"46880","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionality-relations?functionality_id=34659","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"functionality_id=34659","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539833656.2572,"REQUEST_TIME":1539833656,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"functionality_id":"34659"}', '2018-10-18 11:34:16', '2018-10-18 11:34:16')
502.230ms

2018-10-18 11:34:41
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.710ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
5.020ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `parent_id` is null
2.570ms
select * from `functionalities` where `id` > 0 and `parent_id` is null order by `sequence` asc limit 20 offset 0
4.190ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
7.320ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.800ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.880ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
4.110ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.560ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.590ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IitQazZMMk9mTDR0cjFBK2MrYUl4T3c9PSIsInZhbHVlIjoibVduc2djUEZRWFc3cmZoRld6TGxWXC9uck9jTHZsenJNeVVaMVwvT0ZcLzhOakxiRkF5ZHA1K3NmXC9ITnU3RFZhK2dCUTRVOEhWU0hvOVVNZytJaUFCY2J3PT0iLCJtYWMiOiI0YmUxNjhiNmE1ODBhODM3ZTIxOTJkYTUyMTNlNDRhYTgwNjgxMzU5NzNhYTE0Y2I4MjQyZGZhZWE0ZTAyNGFhIn0%3D; l_acs_m_session=eyJpdiI6InFTTFl3SzJ2NHg4ckdcL25xWmp6c1BRPT0iLCJ2YWx1ZSI6IlYzNmFoVmMzVDREdG9KTHNXNGVhUkh1UUloTndTenlpbUVuYzlEXC96eHlpYlhTbVBmTUtCaWNRK1ZFRCtLQmFOeDhHT3A0UjJ5Qkt0VUo4b1ozM0pCUT09IiwibWFjIjoiNmYwNDBkMTIzZjUwMGU3ZmEwMWJiY2I3Zjg3MDEyZGQ2MzY4YTAxNjljODRiYWIyMTg4NTkyZDJjYWVhZjRmZiJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"46880","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539833681.3418,"REQUEST_TIME":1539833681,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:34:41', '2018-10-18 11:34:41')
474.780ms

2018-10-18 11:34:44
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.570ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
3.040ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
355.530ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.980ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.740ms

2018-10-18 11:34:45
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.880ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
4.310ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `title` like '%View Bet Records%'
3.000ms
select * from `functionalities` where `id` > 0 and `title` like '%View Bet Records%' order by `sequence` asc limit 20 offset 0
6.040ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
7.520ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.240ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.520ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
4.780ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.040ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.470ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities?is_search=&controller=&title=View+Bet+Records', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjdsdGJISWk1KzFSRDJ0WXExYzJ0aWc9PSIsInZhbHVlIjoiRWZDajZRK29Ybmk3N3BsMVhIcHBjQng2cWRPTkVlWFBHSVl1c0djUVBlVTUzXC9FSFZPbzNpNThuSFJOY1lcLytaWTh6MGZqOWVuSTdrVFp0c3VrakVQdz09IiwibWFjIjoiMjAyYmY5YmEyMWU3OTljMmYxNDAwZDgzMjAzMjJlYzkxMGU1NGQxNTQ0MmIxNGMwNDU4MDAxMjAwYmFjMjYzOSJ9; l_acs_m_session=eyJpdiI6ImZuXC9NRUx2V3FwSW03b3BxdDNUOFB3PT0iLCJ2YWx1ZSI6Im1ZU1lGVmlaY1ZRa29mS0JzYzJNS0Zac0wwQk9cL2hwRTRUb0hNcHNjMmpTZTZzV1BlQXpFa1AyeXZtZWxVXC9tZDlneEJxZG9cL3ZKYitQY0p2WTBBTUlnPT0iLCJtYWMiOiJhY2Y2OTU5MjU2NmVhYjQ2ZDJhNTE1ZDVhYjI4MjA0OTM1YzFkOTFkOTY2ZDhjMGYwNGQ1YWIyNjA1OWI2ZWQyIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"46880","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities?is_search=&controller=&title=View+Bet+Records","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"is_search=&controller=&title=View+Bet+Records","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539833684.6364,"REQUEST_TIME":1539833684,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"is_search":"","controller":"","title":"View Bet Records"}', '2018-10-18 11:34:44', '2018-10-18 11:34:44')
398.570ms

2018-10-18 11:35:09
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
2.320ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.090ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
182.700ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.460ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.190ms

2018-10-18 11:36:09
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
5.050ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.440ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
181.740ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
29.130ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
27.310ms

2018-10-18 11:37:09
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
10.570ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.600ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
177.830ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.940ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.320ms

2018-10-18 11:38:10
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
188.250ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
34.850ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
358.350ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.970ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.750ms

2018-10-18 11:39:09
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.240ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.800ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
183.840ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.880ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.890ms

2018-10-18 11:40:09
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.120ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.780ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
180.970ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.730ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
3.700ms

2018-10-18 11:40:28
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.080ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.850ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
179.370ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.580ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.670ms

2018-10-18 11:40:30
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00'
3.870ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00' order by `id` desc limit 20 offset 0
5.140ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
7.090ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
7.720ms
select `id`, `name` from `merchants` order by `id` asc
4.020ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.410ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
2.610ms
select `id`, `name` from `lotteries` order by `id` asc
2.370ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
6.040ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Im1peWNObzZJVVA4Tm1obFZPOGZzQ2c9PSIsInZhbHVlIjoiM2U1M0RBeWp3SDg3S1loSlhrcU9sTE93WUNCTk8wNE1xSXBXVDRBTE9TbFhBOVU1K0JtelE3Mkd3RFppXC8yN0g5bUZHXC92M2pDSU5XeXBGSTcyZEMzQT09IiwibWFjIjoiZTg2YWQzNGVkODkwZjk4M2NjZjU0ZmZlNzVmNjg4MDM3ZmYyY2ExYWY0NDYzMWM4OWI1YTc1NWM5Mjg1ZWU2NiJ9; l_acs_m_session=eyJpdiI6ImprU1pyeGd2SFJQZFB4cmNDSGkyeGc9PSIsInZhbHVlIjoiZUpKOHk0NldSeGJoenc3U1lZUnVVRzdSR3pIbkFrRzZpTmNLRDFIYmtsN0hodHFZOUk0bUExVHhkaXBpZzdQSFIrQ24rUzRxQ25nUXFJM3Ezem1zZEE9PSIsIm1hYyI6IjVkNzZiZGZjMmI3Njc1ZDI4OWE4OThlOThhMzczNzViMjg1ZjRjZGVjZDhhODJhOTlmMDU5ZjgyMjQyMGI3ZGYifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"46980","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834029.6221,"REQUEST_TIME":1539834029,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-18 00:00:00"}', '2018-10-18 11:40:29', '2018-10-18 11:40:29')
498.160ms

2018-10-18 11:40:38
controller: ProjectController action: view
select * from `functionalities` where `id` > 0 and `controller` = 'ProjectController' and `action` = 'view'
9.790ms
select * from `projects` where `projects`.`id` = '600' limit 1
3.740ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
7.440ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
7.150ms
select `id`, `name` from `merchants` order by `id` asc
2.170ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34660 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
9.610ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34659') and `disabled` = 0 order by `id` asc
2.750ms
select `id`, `name` from `lotteries` order by `id` asc
5.730ms
select * from `basic_methods` where `basic_methods`.`id` = 76 limit 1
7.930ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
6.270ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34660, 'View Project', 'ProjectController', 'view', '/projects/600/view', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjZiM1U0aEMrY0hUYjhGa2R2TERHN2c9PSIsInZhbHVlIjoiamNlWjkrRWZWc2tGTWZyaUI5TXl0RDJ0MndnRWM0bTlTQ2hUU1dUQmFWbHBEeFFicXVTNllsOUpIR1REdnBsenFWOVp2NlVPdDRSTmU2UncyRjhPQkE9PSIsIm1hYyI6IjU3MjcwZGU2YWVkNzU2YTgxNDExMzY1YWNjM2I2ZmFiNGNhZTM3ZTQ0ZTg0YTBiY2Q1MzkwNGNhNzI0Njc3ZTIifQ%3D%3D; l_acs_m_session=eyJpdiI6IlBJWUVPdkoyWTkrYldcL2pmbWswWEdBPT0iLCJ2YWx1ZSI6IkVJdDM3UTJWZ0lBc1o3RXpNeUh5eXBoRElNdmFoUEgxXC81blliUGNiNUpZK21vS29UWmdZb3hHbTZZdjM1XC9maVFWemhYTExaVGtcL1JqWjduZzQzam1nPT0iLCJtYWMiOiI3Yjk3ZjFmNzJlZTJlMjQ5MmI0MGJlYzAwYTQwYjNhYTIzNTc1ZmQxYzhiYWM3YWM5MWJlYWExYjM5MzZjYmI3In0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/projects","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"46980","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects\/600\/view","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834037.7023,"REQUEST_TIME":1539834037,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:40:37', '2018-10-18 11:40:37')
416.380ms

2018-10-18 11:40:54
controller: BetRecordsController action: view
select * from `bet_records` where `bet_records`.`id` = '600' limit 1
2.650ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.380ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34785, 'View Bet Records', 'BetRecordsController', 'view', '/bet-records/600/view', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IlBkTjR0bUdFS1BmU055bjI4WFYwRmc9PSIsInZhbHVlIjoia0FkaWFQM0kzRFplTHExSk1SRXEzRFdXXC9JRWFnNDB1a2RJUzJuNUExSjBWOVo1TXdlMGtHTGNKU29iQytwY0JtaWRnaWk1WlZyQlwvaWxUTm5JbVdqUT09IiwibWFjIjoiMTQ2YmE1MmJmMjFmNDJhMmQ2ZDY1MjkwMGNjOTliM2NjZTdmNzQ5ODM3MDc1ZjMyZDQ1Zjg4N2RkYTg3NTUyMiJ9; l_acs_m_session=eyJpdiI6Ilh0YjR5SnZZUEFxTXRBUzc2SnhQYVE9PSIsInZhbHVlIjoiT0ptZkhnTmtcL0FZZ1I4K1JyRkZQVEJjOU0yWWE0SzZSWW5hR3c1aExtckpcL2lqVGVIWjR1VDNMR1NpbldEbnBPc0x1YUN2cU5YWms1bUNtRE1wdFVEdz09IiwibWFjIjoiZDdlOTIxZTExOWNkOTlmZjEyNjQyYWI0OGRjYWE1NTllMzA5NWQ0ZWVhMzk4NjJiZjRjMTVjNjI0ODYxOTE0MyJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/projects","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47130","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/bet-records\/600\/view","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834054.3632,"REQUEST_TIME":1539834054,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:40:54', '2018-10-18 11:40:54')
576.530ms

2018-10-18 11:41:28
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
2.780ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.280ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
181.470ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.110ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.280ms

2018-10-18 11:42:27
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00'
12.340ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00' order by `id` desc limit 20 offset 0
5.490ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
16.560ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
7.750ms
select `id`, `name` from `merchants` order by `id` asc
4.930ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
9.990ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
6.110ms
select `id`, `name` from `lotteries` order by `id` asc
3.190ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.830ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IlR0NVc5QnE3ZTEzVzZONHZ0TkRpSHc9PSIsInZhbHVlIjoiRzhpKzBDNXM0bjJIOHBoM3FZY3Y0bUJReng2MUdjaCtEOTFCSXliNnE0Z0tFVzFoRnYwMnlURm1FWit5d2tSOXVnWkV3Snk0Wm52WkYwaFwvc2tjOXdBPT0iLCJtYWMiOiI2YjkwZjZjYTQ1ZWQ4MmYxZWNlODllMWE4ZTdmOGUyZmYxMmRmMGI4Mjk3YWE2YjdhYTliNzMyZWFiOWUxZDRkIn0%3D; l_acs_m_session=eyJpdiI6InRRZ0dOQ1hkRmFmYzcrcU5nVURzSlE9PSIsInZhbHVlIjoiZ2lzaHRYMkZ1XC9HRERxXC8wRkpENWU2bnhJb1BWaHZkYWdSc1NJRGhPNnpxdUZVRzRDbDBpdDJzRldQXC9cL1cwTzhiKzVRM3dYa1FmKzRFcVVTZEhpMnhBPT0iLCJtYWMiOiI5ZWY5MTViN2I5MDk0MTdmNGRhY2M1Zjk0ODhhMzYwYjBkMzY2MWQzNDJmNmQ3N2I4YmFmODIxYzA0NDI2NGIzIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47130","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834146.9767,"REQUEST_TIME":1539834146,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-18 00:00:00"}', '2018-10-18 11:42:27', '2018-10-18 11:42:27')
433.090ms

2018-10-18 11:42:28
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.180ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
1.870ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
176.260ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
2.560ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.430ms

2018-10-18 11:43:10
controller: BetRecordsController action: view
select * from `bet_records` where `bet_records`.`id` = '600' limit 1
113.300ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
21.410ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34785, 'View Bet Records', 'BetRecordsController', 'view', '/bet-records/600/view', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Ijl5NzNtbEh0cDhPOUYzWEJVTU9WVkE9PSIsInZhbHVlIjoiR3NtdGJESkh2MUVKdHI2alUzNjNjMVJGV0VLbVQ1c0kwbnppK3U5RmE5YlhtMEpRd1BkdVkrdmxVZnVPckhKVWVta0hkQmZHbGlmTXN1S1pVcE43T2c9PSIsIm1hYyI6IjQ2ZmFlMzE1Njg2ZmE4NzBhYjAzMTlhMzJlZTRkZWVjZjZmYWFkY2U0MzBkYTc5OThjMjI5YTk1YWIzMTg4ZWYifQ%3D%3D; l_acs_m_session=eyJpdiI6IndvNHFcLzI0NlpDTEVXdTh2QmVVV3NRPT0iLCJ2YWx1ZSI6IlhhVVFwcmZOVU9qYzFwN0hsSXZBc2FYV2k5aFFSNXJVa3lLaFhkM2pibW5UUXF1WEI4aUxDZ29KUk0yYnN5QzdGVWNPczB4YnR5WFhoRXd6d3pzMm9nPT0iLCJtYWMiOiJmZjRkYzEwZTk3ODRkZWRjZDYyYmRlZGU0OTMwMzNhNjE4ODk3Mjk5OTU3ODY2OGRjOTM5ZWJlOGYwNzVhMmQ2In0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/projects","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47198","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/bet-records\/600\/view","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834189.5176,"REQUEST_TIME":1539834189,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:43:09', '2018-10-18 11:43:09')
648.710ms

2018-10-18 11:43:28
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
2.860ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.460ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
183.760ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.060ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.330ms

2018-10-18 11:44:28
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
2.940ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.950ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
181.020ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.810ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.470ms

2018-10-18 11:45:29
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.120ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.310ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
332.010ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
8.250ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
5.120ms

2018-10-18 11:46:29
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.190ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.540ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
434.430ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.340ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.400ms

2018-10-18 11:47:29
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.870ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.840ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
396.730ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.850ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.650ms

2018-10-18 11:48:02
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00'
4.770ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00' order by `id` desc limit 20 offset 0
6.870ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
17.550ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
12.410ms
select `id`, `name` from `merchants` order by `id` asc
10.980ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.110ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
3.040ms
select `id`, `name` from `lotteries` order by `id` asc
3.220ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.430ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Ijd6QVhWRnFhSGNGaEVvWWVoam0rMGc9PSIsInZhbHVlIjoiSWRaVE96VTl3UFdJYk84YUJTd1RWWlwvc2FhUERHdWVwMldmNXE1d2tVS3VDZWo1MnZpVkR6T3ZRXC9HMkxUMVQwM1J2V0tscXVhdnZxUlY3bU1Gc010QT09IiwibWFjIjoiNDFmYjhhNmZiOTA2MzY5NDUzNDBiZTg2NmMwOTlmMjc5ZGIwNjcwZTI1YzNjNTQ5OTg1NjFhZGU3NjE2NjMzOCJ9; l_acs_m_session=eyJpdiI6IjNxQkcrNUNvM0FLSG9DOU9LRkZLc1E9PSIsInZhbHVlIjoiM2pyRTN2NlR1U2NkdDhKeTZ6T01SSHVJelhDXC9sNHpRMTFZZFZSVU1mU1pzZFhwZVYzQ01zYmpSb2cwcVo3UndCRXNLdklnM1dcL01ibUN0aGV4bTdOQT09IiwibWFjIjoiOTYwODQ0OTg0MzNmMTlkODBjYWEyZjdlOTljM2VlYTY1NmIzMmEyNWUxNDYwMjNmZDFiOTQ0ZGViZTljNjk4NSJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47198","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834481.5673,"REQUEST_TIME":1539834481,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-18 00:00:00"}', '2018-10-18 11:48:01', '2018-10-18 11:48:01')
507.100ms

2018-10-18 11:48:05
controller: BetRecordsController action: view
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.410ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34785, 'View Bet Records', 'BetRecordsController', 'view', '/bet-records/600/view', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6ImpNRXU1eWZTUzV0OW9tOTRTbE9ZOWc9PSIsInZhbHVlIjoiZ2xyd0tpMklBanJYcFpjQzNXVUs5aHhFc0NhNGFNN0s4eGpDNHh6bFlyY2MrWVwvXC9CVG8yNGhrR1V4cStpandLQWFQYlJ3bHdHTTRxdWJmb0VWNHY1Zz09IiwibWFjIjoiZDg2ODlmZjgyZDU0YTI1ZWRjMzgxZTMzMDI1N2UyZDA3MThjMTBkM2Y4YmZlOWJiMTcxYzYwMTI4MDBjMWMyMyJ9; l_acs_m_session=eyJpdiI6IlV6bDBrM21hcHVzclNhZTQ0OHNMZ1E9PSIsInZhbHVlIjoiOTZFT1pOQTFsMUxcLzEwUExJMFBQem4xQmlkSFV1Z0JBcWZGZzlcLzVsVFNVWENYbFMzUzZnMlkzdW91UnpsOGVhYXRXa1phZHdyWGFBNHBsbXZFUDhvUT09IiwibWFjIjoiMTY2ZTA1YTQ5ZTE1NTVmZjRhZjc0MDkzNjcwNjk4YzNhYWRkNzZmMmVmZjgxMjhmNDg2ZGFhOWJjZjVmOWRjNyJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/projects","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47198","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/bet-records\/600\/view","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834485.13,"REQUEST_TIME":1539834485,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:48:05', '2018-10-18 11:48:05')
566.410ms

2018-10-18 11:48:09
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00'
91.600ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00' order by `id` desc limit 20 offset 0
93.290ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
15.230ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
13.930ms
select `id`, `name` from `merchants` order by `id` asc
52.170ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
253.820ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
22.060ms
select `id`, `name` from `lotteries` order by `id` asc
72.900ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
26.780ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6ImpNRXU1eWZTUzV0OW9tOTRTbE9ZOWc9PSIsInZhbHVlIjoiZ2xyd0tpMklBanJYcFpjQzNXVUs5aHhFc0NhNGFNN0s4eGpDNHh6bFlyY2MrWVwvXC9CVG8yNGhrR1V4cStpandLQWFQYlJ3bHdHTTRxdWJmb0VWNHY1Zz09IiwibWFjIjoiZDg2ODlmZjgyZDU0YTI1ZWRjMzgxZTMzMDI1N2UyZDA3MThjMTBkM2Y4YmZlOWJiMTcxYzYwMTI4MDBjMWMyMyJ9; l_acs_m_session=eyJpdiI6IlV6bDBrM21hcHVzclNhZTQ0OHNMZ1E9PSIsInZhbHVlIjoiOTZFT1pOQTFsMUxcLzEwUExJMFBQem4xQmlkSFV1Z0JBcWZGZzlcLzVsVFNVWENYbFMzUzZnMlkzdW91UnpsOGVhYXRXa1phZHdyWGFBNHBsbXZFUDhvUT09IiwibWFjIjoiMTY2ZTA1YTQ5ZTE1NTVmZjRhZjc0MDkzNjcwNjk4YzNhYWRkNzZmMmVmZjgxMjhmNDg2ZGFhOWJjZjVmOWRjNyJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47198","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834488.6883,"REQUEST_TIME":1539834488,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-18 00:00:00"}', '2018-10-18 11:48:09', '2018-10-18 11:48:09')
434.440ms

2018-10-18 11:48:29
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.540ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.600ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
405.980ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.500ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.870ms

2018-10-18 11:49:15
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00'
4.730ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00' order by `id` desc limit 20 offset 0
4.930ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
22.450ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
13.600ms
select `id`, `name` from `merchants` order by `id` asc
7.930ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
8.400ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
3.740ms
select `id`, `name` from `lotteries` order by `id` asc
2.750ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.720ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IlcyNkgxa05DYVd5VkJ1VEI0TFI5YlE9PSIsInZhbHVlIjoiTmxKeVFQSE1vYU5cL2NSMGlBRDdsamFHTUExT2tyanFKRmNvZkZIRkU5TmNFRHhlV2NUQ05KRFB4bXZ6SHp3WjM2c2NuNTRUSnQ2QVYrRkpINXpHT0d3PT0iLCJtYWMiOiIyOGJkN2E0ZmI4MjYwNjNkYzBjNTc2YWQ4MTlkMmJhMmU5NDM2OGVlNzExNTA5NjdmNjliNDdkOTgxYTI2MjBlIn0%3D; l_acs_m_session=eyJpdiI6IlpSaFJGcHk4QkhSUTBlNythNGtYQ1E9PSIsInZhbHVlIjoiRnVKT2tVVUdwNnl5VGNxQllpTG5RMmU1aG5LRDVCS2Q3YysxT0pkaG50QXU5YlphK1ZBcE9VT2ZZczVmT3BObUVSbExHcjI2ZG9ZNG1jaTN4bDRwTnc9PSIsIm1hYyI6IjA3NDZiN2M0Y2VlY2M5N2JjOWIyOTUyOGUyM2M0MWFhOTczMzg2MTE0YmMyMzk5YTdlNTBiMzFlNzQ5MTdlNDIifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47198","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834555.3344,"REQUEST_TIME":1539834555,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-18 00:00:00"}', '2018-10-18 11:49:15', '2018-10-18 11:49:15')
441.670ms

2018-10-18 11:49:25
controller: BetRecordsController action: view
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.290ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34785, 'View Bet Records', 'BetRecordsController', 'view', '/bet-records/600/view', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IkdiTFNvTHJldFNcL01DZEphVytZOWZBPT0iLCJ2YWx1ZSI6IkI3KzJHNEhyTG1HYm1GdWkzSndvcDBkbXFnS3REa1IxWmNWQUJVNVQ4MEtPVHZwK01cL0xOd0dhc0NJRjJ6andPSmVuTzFhUWd5V3lBN1Z0aWtWZWJRQT09IiwibWFjIjoiZTI4MDlkNzlmNjBjYjIzMWYwNzIwOWE4Y2ZjN2U2NzIxOTRlOTM2YWMxOGNlOWJhYmM1N2ViZDYxMjhlNzQ1YiJ9; l_acs_m_session=eyJpdiI6InBUVXY5NWp1VkRXVVNveXVGR2tcL2p3PT0iLCJ2YWx1ZSI6IjVIeURrQW5EVFV6NEtsWEJHYU55T21SMXJrNzgwQ2hsd2JyRVpkNFwvOTUwY0ZsTTRpMkpLbm9cLzV1ajZ5REgxXC9mNG9CcW1LRGd3SHJZbjRWczZTRUNnPT0iLCJtYWMiOiIyNzYwYWI2MDc4NzdiZGRhYzU1Y2QyNmQ1Yzk2MDhiNDQ5NTkyYzA3NGY0MDI1ZTM5OWY2ODczMmJhMzkyYTA5In0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/projects","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47198","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/bet-records\/600\/view","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834565.4042,"REQUEST_TIME":1539834565,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:49:25', '2018-10-18 11:49:25')
519.410ms

2018-10-18 11:49:29
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.170ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.910ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
452.650ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.480ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.500ms

2018-10-18 11:49:29
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00'
3.650ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00' order by `id` desc limit 20 offset 0
5.250ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
7.020ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
7.340ms
select `id`, `name` from `merchants` order by `id` asc
2.970ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.620ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
3.250ms
select `id`, `name` from `lotteries` order by `id` asc
2.320ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.520ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IkdiTFNvTHJldFNcL01DZEphVytZOWZBPT0iLCJ2YWx1ZSI6IkI3KzJHNEhyTG1HYm1GdWkzSndvcDBkbXFnS3REa1IxWmNWQUJVNVQ4MEtPVHZwK01cL0xOd0dhc0NJRjJ6andPSmVuTzFhUWd5V3lBN1Z0aWtWZWJRQT09IiwibWFjIjoiZTI4MDlkNzlmNjBjYjIzMWYwNzIwOWE4Y2ZjN2U2NzIxOTRlOTM2YWMxOGNlOWJhYmM1N2ViZDYxMjhlNzQ1YiJ9; l_acs_m_session=eyJpdiI6InBUVXY5NWp1VkRXVVNveXVGR2tcL2p3PT0iLCJ2YWx1ZSI6IjVIeURrQW5EVFV6NEtsWEJHYU55T21SMXJrNzgwQ2hsd2JyRVpkNFwvOTUwY0ZsTTRpMkpLbm9cLzV1ajZ5REgxXC9mNG9CcW1LRGd3SHJZbjRWczZTRUNnPT0iLCJtYWMiOiIyNzYwYWI2MDc4NzdiZGRhYzU1Y2QyNmQ1Yzk2MDhiNDQ5NTkyYzA3NGY0MDI1ZTM5OWY2ODczMmJhMzkyYTA5In0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47198","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834569.3498,"REQUEST_TIME":1539834569,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-18 00:00:00"}', '2018-10-18 11:49:29', '2018-10-18 11:49:29')
429.420ms

2018-10-18 11:49:36
controller: BetRecordsController action: view
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.220ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34785, 'View Bet Records', 'BetRecordsController', 'view', '/bet-records/600/view', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjlUcGJXbXMxaHhhZ1ZhZkdGY1dIanc9PSIsInZhbHVlIjoiQno4MzNnT2NjNWZtVzFHbnVJVjQ4dlR0Qk9GeFRMQWlaSXVnbENmVnN4djFuekF3Z0NnTXNFRUZrQ2xlSHB1MUx1MHJaNkR5RTJ4clppVlBJdDNJdUE9PSIsIm1hYyI6IjMxZTM0MWQ2M2RmZjExOTk3NGYzMTA5ZDc1N2NmNGNlMGVlYmVhZGJmN2ZlMWMyYTVkY2VmNWEyZDU5Yzc1Y2EifQ%3D%3D; l_acs_m_session=eyJpdiI6Im81Nlkrd1wvSCtvXC91QzYrSTJBRWIxQT09IiwidmFsdWUiOiJMc0JMdGxuVUlJRkliNkx1MFJTT1ZBeG5YNTIzS21BYSsyZzF1dk5ucmJMM3Q3NEJFV2xVWlQ3NnQyN0dyenpha3pNeTZNNEowNmt6ZEJuZW8xeW1Idz09IiwibWFjIjoiNWNhODM5MjM2NWQ4ODRmOGVmZTAzY2Q4NDIzYTA2NDU5MWY0NzlhZDU3NTcyOWQ3NjU3MTY4OTFhM2VmZmQ1NyJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/projects","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47198","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/bet-records\/600\/view","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834576.4084,"REQUEST_TIME":1539834576,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:49:36', '2018-10-18 11:49:36')
439.290ms

2018-10-18 11:49:40
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00'
5.760ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00' order by `id` desc limit 20 offset 0
5.280ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
7.270ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
7.610ms
select `id`, `name` from `merchants` order by `id` asc
45.430ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
10.570ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
8.810ms
select `id`, `name` from `lotteries` order by `id` asc
4.380ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.270ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjlUcGJXbXMxaHhhZ1ZhZkdGY1dIanc9PSIsInZhbHVlIjoiQno4MzNnT2NjNWZtVzFHbnVJVjQ4dlR0Qk9GeFRMQWlaSXVnbENmVnN4djFuekF3Z0NnTXNFRUZrQ2xlSHB1MUx1MHJaNkR5RTJ4clppVlBJdDNJdUE9PSIsIm1hYyI6IjMxZTM0MWQ2M2RmZjExOTk3NGYzMTA5ZDc1N2NmNGNlMGVlYmVhZGJmN2ZlMWMyYTVkY2VmNWEyZDU5Yzc1Y2EifQ%3D%3D; l_acs_m_session=eyJpdiI6Im81Nlkrd1wvSCtvXC91QzYrSTJBRWIxQT09IiwidmFsdWUiOiJMc0JMdGxuVUlJRkliNkx1MFJTT1ZBeG5YNTIzS21BYSsyZzF1dk5ucmJMM3Q3NEJFV2xVWlQ3NnQyN0dyenpha3pNeTZNNEowNmt6ZEJuZW8xeW1Idz09IiwibWFjIjoiNWNhODM5MjM2NWQ4ODRmOGVmZTAzY2Q4NDIzYTA2NDU5MWY0NzlhZDU3NTcyOWQ3NjU3MTY4OTFhM2VmZmQ1NyJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47198","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834579.7664,"REQUEST_TIME":1539834579,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-18 00:00:00"}', '2018-10-18 11:49:39', '2018-10-18 11:49:39')
575.880ms

2018-10-18 11:50:29
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
4.140ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
3.250ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
179.300ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
5.070ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.360ms

2018-10-18 11:51:15
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
10.380ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
7.240ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `parent_id` is null
5.730ms
select * from `functionalities` where `id` > 0 and `parent_id` is null order by `sequence` asc limit 20 offset 0
6.410ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
13.020ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.290ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.490ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
4.180ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.570ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.570ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IkExY29ZdGZKbDZqNE5ZTFZhWnV3SkE9PSIsInZhbHVlIjoiekNpbFA2S0FJS3RZZ3ZtVVF3c2tnNE92WW1ITHBxYzZnZmxTd1YrQjlxcnFtU3ZqVHg5N0ttZ1FXMGtDSEFaNHRUSXptN1FMVDRpY1wvYTFEVFg5UEV3PT0iLCJtYWMiOiJlNzVkMzE5MjhjNjM4NWUyYWE3NjUyZDI4NDRjZDgwMTg4ZTZiOTM5YzMwZDBlNzEwZjVhNzkxMzdlN2RkMDE4In0%3D; l_acs_m_session=eyJpdiI6Ik1YeENlaEtRQVNORlhCNmhMd0pFT3c9PSIsInZhbHVlIjoicmFSc3VvMTN1VmE0UUp6NkZwdHVHdFVxdUlWaWpMcHN4bjJFYW1STVRRYk9RMUM1cytDZDdxY1VwaTN4Y0dqTkNybzZXTlVyUWN5NmtFSXhjaUduMmc9PSIsIm1hYyI6IjkzNjZiOGNkMjEzNmMxMTM4OTNmMjNhNzVhMjUwM2JjZjZkNzg3MWEyMTNiZDc3YTQyYTkxYzk3NTZjZmNhNDQifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47198","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834675.1532,"REQUEST_TIME":1539834675,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:51:15', '2018-10-18 11:51:15')
445.740ms

2018-10-18 11:51:24
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
8.140ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
4.400ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `title` like '%project%'
3.600ms
select * from `functionalities` where `id` > 0 and `title` like '%project%' order by `sequence` asc limit 20 offset 0
6.790ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
9.860ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
8.280ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.370ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
5.800ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.000ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
4.480ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities?is_search=&controller=&title=project', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IlQyclVjdGdPQzNcL1hDK1wvWnJ5UGhMZz09IiwidmFsdWUiOiJHb3hBUUhpdE5LWXZJODRNNERNaFJEdWxlQW9qN0FlYmx0OFZGV3FHQ1hKTGx5dTh6clR5cFhGOUMweG1WZzVINHQ1WWlSUjlBeVNmVFZBbXk3VnRPZz09IiwibWFjIjoiOWQyZGE5NjgwYTQyMDViMGJjNDgyMmRjMTlhNzA5Yjg3NDRjNWYxMDYzNjVhY2MzZDY1M2VmNzYxM2E2ZTg3OCJ9; l_acs_m_session=eyJpdiI6IllBWjdDeFUzWFU5cXFydnhqTU84REE9PSIsInZhbHVlIjoiK3pqbThqVk5IR3lOYzJaeEV4XC9nVTdCWWNrUnVCOWgzU2VSTitZUTRxSis4NnRCc2kxSDZrQ3dTOUJhREl5Q2lPZXo0Y2ZNTDRldzEzZVl3bFdoSTVBPT0iLCJtYWMiOiJjNzE0MjZjNThkYzdkNGZjMTJiNDY2MmVmYzdhNzAyYTlmZmZhMTg3ZGRjMWU3ZTFlZDcyYmU0ZjFjMmRjYzdkIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47198","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities?is_search=&controller=&title=project","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"is_search=&controller=&title=project","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834683.9859,"REQUEST_TIME":1539834683,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"is_search":"","controller":"","title":"project"}', '2018-10-18 11:51:24', '2018-10-18 11:51:24')
433.690ms

2018-10-18 11:51:29
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.470ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.980ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
200.750ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
4.000ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.460ms

2018-10-18 11:51:30
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
10.890ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
16.570ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `parent_id` = '34659'
8.380ms
select * from `functionalities` where `id` > 0 and `parent_id` = '34659' order by `sequence` asc limit 20 offset 0
3.670ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
7.230ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.180ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
8.190ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
4.520ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.720ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.440ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities?parent_id=34659', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6InNwbit6NGdaVmg4bjMzelpWaTNvVFE9PSIsInZhbHVlIjoiclwvZVVkOEY2Q25HNHI4SHlxYnhYYTYyVGdLc3p0Qkl4bmRjc014cjBCQlJEQ0pQZk45bk5qSjkrb0p3RGk4c3Y5aXh2UERWZWlyM0RGbml4dVcxWGZRPT0iLCJtYWMiOiJhNGU0OWIwM2VjMjBjNDgyNTYyYjM4MDQwYzM4ZmI1MThjMWQxY2M1ZmU4OTg3OTkyZWJmYzhjNmQwZjdkZDQzIn0%3D; l_acs_m_session=eyJpdiI6InZaY3pqK1VNNkdBWjhlYnpBUFV0TVE9PSIsInZhbHVlIjoiSldkbHU3ZkZZZ0lhbENcL1BXc3BLdGRWcjVZYWZacXFTM2psMkJXdjNNMHJWRHlweDhxUHZIazRZZUREbmM3NWR2amdWUG55aTJYdjRQRkx0SVpXeERBPT0iLCJtYWMiOiI1ZTkzY2RiZDg4NWM1NDEzNTVkNGMyODA4NjQ0OWNjNjJhYmZkMDBkNGM4NDY4ZGM0YzBjMjkzM2VhODJjYWE3In0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities?is_search=&controller=&title=project","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47198","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities?parent_id=34659","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"parent_id=34659","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834689.4555,"REQUEST_TIME":1539834689,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"parent_id":"34659"}', '2018-10-18 11:51:29', '2018-10-18 11:51:29')
545.690ms

2018-10-18 11:51:36
controller: FunctionalityRelationController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.650ms
select `id`, `title` from `functionalities` where `id` > 0 and `disabled` =  order by `title` asc
125.330ms
select count(*) as aggregate from `functionality_relations` where `id` > 0 and `functionality_id` = '34659'
6.690ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = '34659' order by `sequence` asc limit 20 offset 0
3.940ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations'
7.460ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations' order by ordinal_position;
7.410ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 8 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
6.790ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('9', '52', '10', '51') and `disabled` = 0 order by `id` asc
24.200ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.140ms
select `id`, `title` from `functionalities` order by `title` asc
4.030ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
110.780ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 8, 'Functionality Relations', 'FunctionalityRelationController', 'index', '/functionality-relations?functionality_id=34659', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IlAyTko2d09uM0dZNVpRenI2bFE4QUE9PSIsInZhbHVlIjoiTWk0TkxqUEVJVGZqeFF0dEI0OUxXajlGTVJPNm84UVVHTzdFNFhNWHF4UWwyTEd5dzJIbDBwQnZYXC9kVlBtc0dpRVJRdEF1dkhXRE5nTHhWaTVJQ2ZnPT0iLCJtYWMiOiJlODgwZTU1MmViMWIwN2MzNWEwOTY2YmE3NjcyYzEzOGRlMTlhODU0ZmVlNGE1ODg0ODk0YTJiYTJkMjExMTM0In0%3D; l_acs_m_session=eyJpdiI6IlF0TFwvMHlqbVozdll5RWFoTEhycTdRPT0iLCJ2YWx1ZSI6InlsOEVUSXA4STFRUE5GZHdjTmJDT2xpRU9UUGZldGY5U1BwZDFzNUxSK25EejB5WG9PbXhZb1wvTkJ4WVM0RkVZVjdkNHNnb0hUbjZjUzFkWHlFN1wvcUE9PSIsIm1hYyI6IjE2MTA4MzBmMWRiZTRiMzAzYjMzNTg5MDBlZDE5ZjZlMGIyYTNmMWQ2ODYzZTVlMmJjYmNlYzJlZGUwYmJiYWYifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities?is_search=&controller=&title=project","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47344","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionality-relations?functionality_id=34659","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"functionality_id=34659","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834695.2747,"REQUEST_TIME":1539834695,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"functionality_id":"34659"}', '2018-10-18 11:51:35', '2018-10-18 11:51:35')
880.750ms

2018-10-18 11:52:12
controller: FunctionalityParamController action: index
select * from `functionalities` where `id` > 0 and `controller` = 'FunctionalityParamController' and `action` = 'index'
13.300ms
select * from `functionalities` where `functionalities`.`id` = 150 limit 1
2.900ms
select * from `search_configs` where `search_configs`.`id` = '8' limit 1
3.020ms
select * from `search_items` where `search_config_id` = 8 order by `sequence` asc
3.670ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
13.290ms
select `id`, `title` from `functionalities` where `id` > 0 and `disabled` =  order by `title` asc
6.650ms
select count(*) as aggregate from `functionality_params` where `id` > 0 and `functionality_id` = '34659'
5.590ms
select * from `functionality_params` where `id` > 0 and `functionality_id` = '34659' order by `sequence` asc limit 20 offset 0
5.020ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_params'
14.990ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_params' order by ordinal_position;
24.370ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 150 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
13.400ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('151', '153', '152', '154') and `disabled` = 0 order by `id` asc
2.980ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '153' order by `sequence` asc
2.340ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '152' order by `sequence` asc
2.150ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
11.940ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '154' order by `sequence` asc
1.850ms
select `id`, `title` from `functionalities` order by `title` asc
3.980ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.470ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 150, 'Functionality Params', 'FunctionalityParamController', 'index', '/functionality-params?functionality_id=34659', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6InE5R1V4SWx3eXQ2cUZTVmk2dXFEdWc9PSIsInZhbHVlIjoiZGI0Nm1wSHpHcm9rVEVIWXphajdzaFJ6eDAyVlgrWlwvdDc1bjVFcENuemJqUndUVEF1NHNYaGZiTFdaVVorU1oycEY5SDNZZEFcLzRwQUo4YkZJRlwvWlE9PSIsIm1hYyI6IjRjNDMxZmRkMTk2MDFmOTJhMzE5NTBkMDE0NTczYjU5M2EzMGE0ZmQzYWY4YWU2ZTAxNzJmM2ViYzdmZGRiNmQifQ%3D%3D; l_acs_m_session=eyJpdiI6IjZwV3g2STZpNlBFK1kybTNRdUQyT3c9PSIsInZhbHVlIjoicUdJSk9hQ0tZcG1JSzBiK2lWTTJRWVlPZjNLQ1JPRWlWWkFUWm9Cb1Jud1JTK1R2WVZBK0RjWGtnQ3pYbXVIVWhWdWNZMXdFSzU1STY3c2VMZkJ6aUE9PSIsIm1hYyI6ImUwY2U4NDJhZTExZmMyYzE4MDA4MzhiNmE5NGJkN2M1MzNhMzRlYjZkZGVlMGM3OWZmOTU4MzBjNjk3NzI1MzAifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities?is_search=&controller=&title=project","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47370","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionality-params?functionality_id=34659","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"functionality_id=34659","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834731.971,"REQUEST_TIME":1539834731,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"functionality_id":"34659"}', '2018-10-18 11:52:12', '2018-10-18 11:52:12')
469.000ms

2018-10-18 11:52:18
controller: FunctionalityRelationController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.310ms
select `id`, `title` from `functionalities` where `id` > 0 and `disabled` =  order by `title` asc
7.070ms
select count(*) as aggregate from `functionality_relations` where `id` > 0 and `functionality_id` = '34659'
2.340ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = '34659' order by `sequence` asc limit 20 offset 0
3.140ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations'
6.910ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations' order by ordinal_position;
7.080ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 8 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
13.700ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('9', '52', '10', '51') and `disabled` = 0 order by `id` asc
13.590ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
2.960ms
select `id`, `title` from `functionalities` order by `title` asc
4.360ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.700ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 8, 'Functionality Relations', 'FunctionalityRelationController', 'index', '/functionality-relations?functionality_id=34659', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6ImtTU0I4akhqTkpNNit0XC9zTnBNaGtnPT0iLCJ2YWx1ZSI6IlZibnAwM1lxc3luWFR5QlNRdkpZaUtrQ1BvUTBFdERBdVwvQzFNNzdWb0FRaGlVTFZNdVR1dUs5ZWxBVWxvOXRlcFhKQlcrbUJTVjBmeWpReUowZ1ZBZz09IiwibWFjIjoiMjEwZGNkN2ZmODVjNDJjMTNhYmZhYTE0ZmZhYzdiY2Y3MGVlMTViYjBlOWJlZWNiYTIxNTJlYjY5YWJmMGFkYyJ9; l_acs_m_session=eyJpdiI6IkVZTXlEQ2J0WXBCNnRuaFJ4aFhCcFE9PSIsInZhbHVlIjoiXC93NldlMUZPeFZUSnIxNFVaSFUxWGtxb3c4eVNHS0xCYUhYS1hEVUJPYkhtNWpDSWFcL251QjloQlp0Z1FVRmo5cGtQMnRNOUxWckZya1h6Y3lKeXU4QT09IiwibWFjIjoiNTk5MzM1MDA2NTllZjMwNTMyYThkYTE5OTdkNmUxNjBlZTVlM2U5ODE5Yjg0Nzg4YmFlYzVjMmJlNTQ0MzhjNiJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities?is_search=&controller=&title=project","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47386","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionality-relations?functionality_id=34659","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"functionality_id=34659","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834738.0775,"REQUEST_TIME":1539834738,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"functionality_id":"34659"}', '2018-10-18 11:52:18', '2018-10-18 11:52:18')
517.640ms

2018-10-18 11:52:22
controller: FunctionalityRelationController action: edit
select * from `functionalities` where `id` > 0 and `controller` = 'FunctionalityRelationController' and `action` = 'edit'
204.620ms
select * from `functionality_relations` where `functionality_relations`.`id` = '33014' limit 1
237.250ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations'
7.680ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations' order by ordinal_position;
7.930ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 10 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.380ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('8', '51') and `disabled` = 0 order by `id` asc
10.160ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.600ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` is null order by `title` asc
2.320ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 27 order by `title` asc
2.110ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 36 order by `title` asc
1.840ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1875 order by `title` asc
2.490ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1878 order by `title` asc
1.820ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1877 order by `title` asc
2.210ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1971 order by `title` asc
1.980ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1880 order by `title` asc
2.040ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 37 order by `title` asc
1.830ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1876 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1879 order by `title` asc
1.930ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 28 order by `title` asc
2.430ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 29 order by `title` asc
2.320ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 31 order by `title` asc
3.210ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 30 order by `title` asc
2.340ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 32 order by `title` asc
1.960ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 35 order by `title` asc
2.010ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 33 order by `title` asc
2.050ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34 order by `title` asc
2.510ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1881 order by `title` asc
2.200ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1882 order by `title` asc
2.520ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1885 order by `title` asc
1.810ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1883 order by `title` asc
2.160ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1317 order by `title` asc
2.060ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 56 order by `title` asc
1.910ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 142 order by `title` asc
2.030ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1441 order by `title` asc
2.020ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 38 order by `title` asc
2.240ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 39 order by `title` asc
2.380ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 70 order by `title` asc
1.840ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34846 order by `title` asc
2.270ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34847 order by `title` asc
2.100ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34849 order by `title` asc
1.890ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34850 order by `title` asc
2.170ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34848 order by `title` asc
2.040ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 76 order by `title` asc
1.990ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 77 order by `title` asc
2.350ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 80 order by `title` asc
1.880ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 78 order by `title` asc
1.840ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1691 order by `title` asc
2.100ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 79 order by `title` asc
1.860ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1839 order by `title` asc
1.820ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1840 order by `title` asc
2.300ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1843 order by `title` asc
2.050ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1842 order by `title` asc
1.930ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1841 order by `title` asc
2.090ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4452 order by `title` asc
2.110ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4453 order by `title` asc
2.580ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4456 order by `title` asc
1.920ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4454 order by `title` asc
2.140ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4457 order by `title` asc
2.140ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4458 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4455 order by `title` asc
2.160ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4531 order by `title` asc
2.400ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4532 order by `title` asc
1.980ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34802 order by `title` asc
1.930ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4533 order by `title` asc
2.020ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4534 order by `title` asc
1.980ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34658 order by `title` asc
2.330ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34778 order by `title` asc
2.190ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34779 order by `title` asc
2.150ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34782 order by `title` asc
1.920ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34780 order by `title` asc
2.030ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34781 order by `title` asc
2.560ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34792 order by `title` asc
1.910ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34794 order by `title` asc
2.140ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34795 order by `title` asc
2.310ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34793 order by `title` asc
2.270ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34790 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34786 order by `title` asc
1.950ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34789 order by `title` asc
2.280ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34788 order by `title` asc
2.120ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34787 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34659 order by `title` asc
2.340ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34777 order by `title` asc
2.010ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34783 order by `title` asc
1.810ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34660 order by `title` asc
2.230ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34805 order by `title` asc
2.000ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34806 order by `title` asc
2.020ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34807 order by `title` asc
1.990ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34810 order by `title` asc
2.000ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34808 order by `title` asc
1.830ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34809 order by `title` asc
2.310ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34811 order by `title` asc
2.340ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34812 order by `title` asc
2.330ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34815 order by `title` asc
2.030ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34813 order by `title` asc
2.230ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34814 order by `title` asc
1.940ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34565 order by `title` asc
2.210ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34586 order by `title` asc
2.200ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34598 order by `title` asc
2.090ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34589 order by `title` asc
2.380ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34587 order by `title` asc
1.810ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34693 order by `title` asc
2.400ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34694 order by `title` asc
1.830ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34697 order by `title` asc
2.080ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34695 order by `title` asc
2.000ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34696 order by `title` asc
2.020ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34588 order by `title` asc
1.900ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34590 order by `title` asc
1.950ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34591 order by `title` asc
2.200ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34594 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34592 order by `title` asc
1.650ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34593 order by `title` asc
1.730ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34761 order by `title` asc
1.900ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34762 order by `title` asc
1.670ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34765 order by `title` asc
1.650ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34763 order by `title` asc
1.700ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34764 order by `title` asc
1.660ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34583 order by `title` asc
1.880ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34596 order by `title` asc
1.880ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34585 order by `title` asc
1.820ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34584 order by `title` asc
1.840ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34597 order by `title` asc
1.710ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34624 order by `title` asc
1.960ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34625 order by `title` asc
2.170ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34628 order by `title` asc
1.930ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34626 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34627 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34672 order by `title` asc
1.880ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34673 order by `title` asc
3.730ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34676 order by `title` asc
2.050ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34674 order by `title` asc
1.890ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34675 order by `title` asc
1.960ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34609 order by `title` asc
1.960ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34610 order by `title` asc
1.830ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34613 order by `title` asc
1.640ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34611 order by `title` asc
1.700ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34612 order by `title` asc
1.760ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34650 order by `title` asc
1.910ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34651 order by `title` asc
1.820ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34654 order by `title` asc
1.730ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34652 order by `title` asc
3.620ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34801 order by `title` asc
2.230ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34653 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34619 order by `title` asc
2.000ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34620 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34623 order by `title` asc
1.830ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34621 order by `title` asc
1.700ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34698 order by `title` asc
1.900ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34699 order by `title` asc
1.750ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34700 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34622 order by `title` asc
1.680ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34614 order by `title` asc
1.820ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34615 order by `title` asc
1.670ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34618 order by `title` asc
1.690ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34616 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34617 order by `title` asc
1.630ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34604 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34605 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34608 order by `title` asc
1.640ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34606 order by `title` asc
1.650ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34607 order by `title` asc
1.670ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34677 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34678 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34681 order by `title` asc
3.300ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34679 order by `title` asc
4.620ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34800 order by `title` asc
2.110ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34680 order by `title` asc
1.950ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1 order by `title` asc
2.070ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1511 order by `title` asc
2.080ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1512 order by `title` asc
2.540ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1515 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1514 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1513 order by `title` asc
1.810ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1536 order by `title` asc
1.700ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1754 order by `title` asc
1.670ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1537 order by `title` asc
4.380ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1540 order by `title` asc
2.120ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1539 order by `title` asc
2.290ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1553 order by `title` asc
2.050ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1601 order by `title` asc
1.990ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1538 order by `title` asc
1.710ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2 order by `title` asc
6.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4 order by `title` asc
1.890ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 98 order by `title` asc
7.710ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 6 order by `title` asc
3.060ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 5 order by `title` asc
3.070ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4176 order by `title` asc
3.540ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 7 order by `title` asc
1.980ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 141 order by `title` asc
1.920ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 156 order by `title` asc
3.140ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 3 order by `title` asc
2.120ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 150 order by `title` asc
1.840ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 151 order by `title` asc
2.000ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 154 order by `title` asc
1.910ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 152 order by `title` asc
1.940ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 155 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 153 order by `title` asc
1.700ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 8 order by `title` asc
1.900ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 9 order by `title` asc
1.740ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 51 order by `title` asc
4.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 10 order by `title` asc
2.330ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 81 order by `title` asc
2.270ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 52 order by `title` asc
1.930ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 53 order by `title` asc
2.710ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 58 order by `title` asc
2.520ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 60 order by `title` asc
1.890ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 59 order by `title` asc
2.440ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 67 order by `title` asc
3.020ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 57 order by `title` asc
1.970ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 25 order by `title` asc
1.920ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 26 order by `title` asc
1.990ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 66 order by `title` asc
1.830ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 50 order by `title` asc
1.920ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 65 order by `title` asc
1.900ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 143 order by `title` asc
1.860ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 144 order by `title` asc
1.690ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 147 order by `title` asc
3.460ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 145 order by `title` asc
3.000ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 148 order by `title` asc
1.950ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 146 order by `title` asc
2.010ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2246 order by `title` asc
1.920ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2247 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2250 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2248 order by `title` asc
3.380ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2249 order by `title` asc
2.150ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2241 order by `title` asc
2.150ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2242 order by `title` asc
2.710ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2245 order by `title` asc
2.180ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2243 order by `title` asc
2.150ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2244 order by `title` asc
2.080ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 45 order by `title` asc
2.200ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 46 order by `title` asc
1.990ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 49 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 47 order by `title` asc
2.080ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2054 order by `title` asc
2.300ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 64 order by `title` asc
2.320ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 161 order by `title` asc
1.980ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 164 order by `title` asc
1.750ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 163 order by `title` asc
2.820ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1124 order by `title` asc
2.320ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 162 order by `title` asc
1.860ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 48 order by `title` asc
2.300ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 17 order by `title` asc
2.030ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 18 order by `title` asc
2.260ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 21 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 19 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1702 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 20 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1541 order by `title` asc
1.830ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1542 order by `title` asc
1.990ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1545 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1544 order by `title` asc
1.810ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1546 order by `title` asc
1.760ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1543 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2213 order by `title` asc
1.920ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34662 order by `title` asc
1.900ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34663 order by `title` asc
4.500ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34803 order by `title` asc
2.000ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34666 order by `title` asc
2.210ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34851 order by `title` asc
2.630ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34856 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34852 order by `title` asc
2.310ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34855 order by `title` asc
1.880ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34853 order by `title` asc
1.830ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34854 order by `title` asc
6.530ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34668 order by `title` asc
2.210ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34804 order by `title` asc
3.010ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34669 order by `title` asc
2.410ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34670 order by `title` asc
2.430ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34671 order by `title` asc
3.550ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4191 order by `title` asc
2.560ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1974 order by `title` asc
2.450ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1976 order by `title` asc
3.070ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34796 order by `title` asc
2.290ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34797 order by `title` asc
1.820ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34784 order by `title` asc
15.550ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34785 order by `title` asc
4.340ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34798 order by `title` asc
2.330ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34799 order by `title` asc
5.070ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34566 order by `title` asc
2.450ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34578 order by `title` asc
3.940ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34735 order by `title` asc
2.040ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34738 order by `title` asc
1.820ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34736 order by `title` asc
2.030ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34739 order by `title` asc
2.000ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34657 order by `title` asc
1.900ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34734 order by `title` asc
1.820ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34740 order by `title` asc
1.730ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34581 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34723 order by `title` asc
1.830ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34724 order by `title` asc
1.880ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34727 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34725 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34726 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34748 order by `title` asc
2.050ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34749 order by `title` asc
1.990ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34752 order by `title` asc
1.760ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34750 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34751 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34753 order by `title` asc
1.920ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34760 order by `title` asc
1.810ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34758 order by `title` asc
1.700ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34754 order by `title` asc
1.670ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34757 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34755 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34759 order by `title` asc
1.870ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34756 order by `title` asc
2.010ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34573 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34574 order by `title` asc
2.010ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34577 order by `title` asc
1.750ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34575 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34733 order by `title` asc
1.820ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34714 order by `title` asc
1.680ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34720 order by `title` asc
1.740ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34576 order by `title` asc
1.730ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34715 order by `title` asc
1.870ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34840 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34716 order by `title` asc
1.690ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34719 order by `title` asc
1.950ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34717 order by `title` asc
1.890ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34845 order by `title` asc
1.890ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34841 order by `title` asc
1.730ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34844 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34718 order by `title` asc
1.650ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34728 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34729 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34732 order by `title` asc
1.580ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34730 order by `title` asc
6.880ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34731 order by `title` asc
2.010ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34568 order by `title` asc
2.450ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34766 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34569 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34572 order by `title` asc
1.660ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34570 order by `title` asc
1.750ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34571 order by `title` asc
1.630ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34838 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34839 order by `title` asc
1.670ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34629 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34630 order by `title` asc
1.840ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34631 order by `title` asc
1.710ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34634 order by `title` asc
1.570ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34632 order by `title` asc
1.740ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34633 order by `title` asc
1.900ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34701 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34640 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34641 order by `title` asc
1.700ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34644 order by `title` asc
1.670ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34642 order by `title` asc
1.630ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34643 order by `title` asc
1.640ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34635 order by `title` asc
1.710ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34636 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34639 order by `title` asc
1.890ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34637 order by `title` asc
1.570ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34638 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34645 order by `title` asc
1.860ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34702 order by `title` asc
1.680ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34704 order by `title` asc
1.760ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34705 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34703 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34646 order by `title` asc
1.930ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34649 order by `title` asc
2.290ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34647 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34648 order by `title` asc
1.950ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34682 order by `title` asc
1.840ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34688 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34689 order by `title` asc
1.680ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34692 order by `title` asc
1.880ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34690 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34691 order by `title` asc
1.830ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34683 order by `title` asc
1.930ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34684 order by `title` asc
1.840ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34687 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34685 order by `title` asc
1.870ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34686 order by `title` asc
1.600ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4470 order by `title` asc
1.740ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34816 order by `title` asc
1.810ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34827 order by `title` asc
1.620ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34819 order by `title` asc
1.660ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34828 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34818 order by `title` asc
1.690ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34831 order by `title` asc
1.750ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34842 order by `title` asc
1.760ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34843 order by `title` asc
1.880ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34826 order by `title` asc
1.730ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34837 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34817 order by `title` asc
1.680ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34829 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34820 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34830 order by `title` asc
1.650ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34824 order by `title` asc
1.680ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34836 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34823 order by `title` asc
1.690ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34833 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34821 order by `title` asc
1.610ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34832 order by `title` asc
1.740ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34822 order by `title` asc
1.700ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34834 order by `title` asc
1.680ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34825 order by `title` asc
1.610ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34835 order by `title` asc
1.680ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 22 order by `title` asc
1.650ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 125 order by `title` asc
1.910ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 124 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1462 order by `title` asc
1.950ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34742 order by `title` asc
1.910ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34743 order by `title` asc
1.830ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34744 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34747 order by `title` asc
1.540ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34745 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34746 order by `title` asc
1.560ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34708 order by `title` asc
1.830ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34721 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34709 order by `title` asc
1.810ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34712 order by `title` asc
1.610ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34710 order by `title` asc
1.760ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34741 order by `title` asc
1.620ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34711 order by `title` asc
1.860ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
3.190ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 10, 'Edit Relation', 'FunctionalityRelationController', 'edit', '/functionality-relations/33014/edit', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjZKY3IrVUZvZEp0ZWQ4RzQyS0Yyd0E9PSIsInZhbHVlIjoiVms3bkgxTjllYWFcL3JFTTRwNE5tbTBsR0lpWisycTZNQmJ1ZlwvTjZlb0w3MkJxSkpab1R4d2RNUnZHU0Z1NUU5cEtTZXRURTZscTdpYUpEXC9mdlFYVFE9PSIsIm1hYyI6IjYwOTI5NDJiNDVjNDViZWJmNDg4MDZiYWQ2ZTljYjYyNWJjOTBkN2EyMWZhMzE5MDBjMDQwZDBkNDY5NjM5M2MifQ%3D%3D; l_acs_m_session=eyJpdiI6Im84ZUVPTmhac0UwT1VJa2Z2aFJTc2c9PSIsInZhbHVlIjoiUDRDSk5ucVJGXC96bnZMUWxReXNtVGp5cXVnV1REZzMwNVJtZXVzQmZlQkdVeTVDTm5IdmZwUHJUWHJwVml5YmhxcUdTVWVMSnBic0JQWENYYXlWblNRPT0iLCJtYWMiOiIzNzBjMTAzMGU1NDhlNTkzMWJhODUxMGQwMmRhYTE2ODc5MjljZTIzNGY3MDE3YjY2ZmZmMmRlYmZjMmYwZjVmIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionality-relations?functionality_id=34659","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47386","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionality-relations\/33014\/edit","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834740.685,"REQUEST_TIME":1539834740,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:52:22', '2018-10-18 11:52:22')
489.730ms

2018-10-18 11:52:29
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.350ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
5.090ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
185.060ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.310ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.560ms

2018-10-18 11:53:20
controller: FunctionalityRelationController action: edit
select * from `functionality_relations` where `functionality_relations`.`id` = '33014' limit 1
3.370ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations'
7.110ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations' order by ordinal_position;
7.430ms
select * from `functionalities` where `functionalities`.`id` = '34785' limit 1
3.300ms
update `functionality_relations` set `params` = 'id=$this->model->bet_record_id', `updated_at` = '2018-10-18 11:53:20' where `id` = '33014'
1.780ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.740ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 10, 'Edit Relation', 'FunctionalityRelationController', 'edit', '/functionality-relations/33014/edit', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6ImRrZUhTTkZlbTRCWVVpamtqaXhLeFE9PSIsInZhbHVlIjoiVUVveFloU0ZWTThXNGJCY3VmUGZORjJhZEhCcUg4NjhYVWxQUDkraUxUM29cL3BNOERSNmZNcERLd3VXOTlWZTA2OTkxWkg3d1kySGV1bHJWNXpFWkxBPT0iLCJtYWMiOiIzY2QzMTRlYTNmNWE1NWVlNzQ4YTc3MjBmZjUwNzQ3NjgwNTliM2FkYjdjNjllNDUxMzM1ZmVjYzA2YTUyOWJjIn0%3D; l_acs_m_session=eyJpdiI6Ilwvemt2cnhITEZtTld2dXhYUkJCVGhnPT0iLCJ2YWx1ZSI6IndHT0t0ck5yRFEzaGlQVEVoM3JsYUQrRmlFc1d1TGRLck4yQTJsc2NKWXI4dEtqWmVOb2NXYmlINWdWajVrd2FobTBDWFNcL0dnSGtpeHVIZERWOFhNZz09IiwibWFjIjoiNTYyZmQ5MDA3ZTI3MDJlODk0MzBiMzQ1ODc1Yjk4OGRjNWQ3MDBhNDFlNGUzMmMzOTI3MjBjOTkxZDM4MzQ5MyJ9","HTTP_CONTENT_LENGTH":"241","HTTP_CONTENT_TYPE":"application\/x-www-form-urlencoded","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionality-relations\/33014\/edit","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47386","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionality-relations\/33014\/edit","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"241","CONTENT_TYPE":"application\/x-www-form-urlencoded","REQUEST_METHOD":"POST","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834799.9709,"REQUEST_TIME":1539834799,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"_method":"PUT","functionality_id":"34659","r_functionality_id":"34785","position":"1","button_onclick":"","confirm_msg_key":"","label":"Bet Records","precondition":"","params":"id=$this->model->bet_record_id","sequence":"10"}', '2018-10-18 11:53:20', '2018-10-18 11:53:20')
448.000ms

2018-10-18 11:53:21
controller: FunctionalityRelationController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `disabled` =  order by `title` asc
66.230ms
select count(*) as aggregate from `functionality_relations` where `id` > 0 and `functionality_id` = '34659'
58.700ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = '34659' order by `sequence` asc limit 20 offset 0
76.210ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations'
6.890ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations' order by ordinal_position;
9.090ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 8 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
148.910ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('9', '52', '10', '51') and `disabled` = 0 order by `id` asc
4.370ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
4.990ms
select `id`, `title` from `functionalities` order by `title` asc
14.680ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
9.460ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 8, 'Functionality Relations', 'FunctionalityRelationController', 'index', '/functionality-relations?functionality_id=34659', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjlXUDByK3gwZTFiSUZWRlR0VHh2cnc9PSIsInZhbHVlIjoiMnZUd1ZENGlaZzltVzRoQ2VVVWdaTXh1c2gxZXhkMERkNG9SWGh1OVd1MGdhVWo1VmZJcVRQdmtcL1NCVjRCbStzbFNJendETlJDTUU0dFZzNytmck5BPT0iLCJtYWMiOiJiODM3ZWFlMWVlOTgxYTdiMGI5YmQxMGJiYmU4NmY5ZWMyNTQ3ZmVlYTVmNjg1YjM3Y2ZlZWFjZTBlOTIwM2FlIn0%3D; l_acs_m_session=eyJpdiI6IjBcL1prbG1DY2l2ZXgwVmlPVUxSN29nPT0iLCJ2YWx1ZSI6IjBCd2ltellKM1pCMDFWSzFaTXhrd1NWeE1LcHNIQ1dzRjg0VDMwak9HXC9qRzhQeHJhUmJPSzNjTVZQcWk4MGZ4UUFQTWdTbkt3SnVmRm5cL1dnQXpNV2c9PSIsIm1hYyI6IjlhMmUwZTJlOGY1MGYxODNmODJhZmNlNGVmZGU4ZDkzYTIyYWFiMTIwYjZhMWMwZDgxMzM5YzI5OGMzZjg1NTQifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionality-relations\/33014\/edit","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47386","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionality-relations?functionality_id=34659","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"functionality_id=34659","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834800.3405,"REQUEST_TIME":1539834800,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"functionality_id":"34659"}', '2018-10-18 11:53:20', '2018-10-18 11:53:20')
471.950ms

2018-10-18 11:53:29
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.210ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
6.320ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `parent_id` is null
5.830ms
select * from `functionalities` where `id` > 0 and `parent_id` is null order by `sequence` asc limit 20 offset 0
6.360ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
14.320ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.290ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.220ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
5.600ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
2.780ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.560ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Ijk0Q3A4MXcxemtyVm0wRXNUWWNXMnc9PSIsInZhbHVlIjoiWDN0Y1J0MnhqWnZNR29SMkFHcENvaWJxVmFRcWJYeUxiREl2dk9vR0s5bDJqeXVmVlIwQ1g1aTVQNUU3bHFVbDdaZ1FvUW5RNXh2b0NmMXV1bGpKa0E9PSIsIm1hYyI6IjI1NDZlMWUwM2M2MmIzNjdmYjE1ZTliNmI2YTg1MzFiNmYyYTI5NzkwMTYyNjc5MzMwZmVjMWRkMmZmYzg1ZWIifQ%3D%3D; l_acs_m_session=eyJpdiI6InBESmFLUTBVOGtWK2FtTFk5ZzJVM1E9PSIsInZhbHVlIjoiXC80N0xVQ2RGaXR3Nzd0TFRHWGVpcGpWZDlBSVVLaUgxZ1NMTGZhZzZKQ3RMNnRYSVdDcldaZWM5TmZRM2l6YTRrZjRwSkpvVlBrMEkrMFkwSjdNUmhBPT0iLCJtYWMiOiJiYzc4ZjQzYjhhZmFiMzU0ZjNlNTI1NzBlMTdhYWQ3ZDc3NzQxOWQ4YjY2YzM2NTYxYTEwODE4ZGE0YTM5ZThlIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47386","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834808.7194,"REQUEST_TIME":1539834808,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:53:28', '2018-10-18 11:53:28')
430.230ms

2018-10-18 11:53:29
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.580ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.790ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
181.400ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
10.450ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.460ms

2018-10-18 11:53:37
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00'
89.050ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00' order by `id` desc limit 20 offset 0
46.270ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
7.840ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
7.770ms
select `id`, `name` from `merchants` order by `id` asc
116.870ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
304.040ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
27.350ms
select `id`, `name` from `lotteries` order by `id` asc
109.880ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.470ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Im16bmp5YjRwZElUd1F4TlI2VjVaZXc9PSIsInZhbHVlIjoiYUFIQU5DZ2hZYXRZbG1USWhLRCtmTmdpUlwvMkJMK2NiSmpISGs2NW9lcFIyazFzZjNnY2RlT2htaVB2OEVINnptN25wV2NrXC9YVjRpVEhURWZkK3N5dz09IiwibWFjIjoiZTU1YzJjY2UwNzM4ZjM5ZGVlYzkxN2I2YmQxNzYzYjY1MTVkNjM4Y2E3NWE5NGU3NTBkMWFhNjAxOGZiM2M1YiJ9; l_acs_m_session=eyJpdiI6Ik9Md3BUcDg4RjFhSVpQaWVGUlg2b3c9PSIsInZhbHVlIjoiaWpYREN3amF5WlFtd3o4b09QOWgwVlVTY0ttZ2M3eHNKdk1EODlIbEZyR3dsQWhEM1ozVEM3dWYwZWlWamVuZHZcL1E0TzRYMkRzaStzQm1QbkZ4amNnPT0iLCJtYWMiOiI4ZGU2NDczNzk0YmE1MGUxNzUyM2Y5YmYxN2VjYjZmNTgzMjZlMTA4MjFkY2Y4OWRkN2ExN2ZjNzIzNzkyNzQ4In0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47386","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834815.572,"REQUEST_TIME":1539834815,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-18 00:00:00"}', '2018-10-18 11:53:36', '2018-10-18 11:53:36')
763.720ms

2018-10-18 11:53:39
controller: BetRecordsController action: view
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.580ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34785, 'View Bet Records', 'BetRecordsController', 'view', '/bet-records/600/view', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6ImwzNTFiUkV1UHI5OE1YMDdkWmVSSHc9PSIsInZhbHVlIjoiZFB2Zk5selwvN0lLVzVtWWV0WVhlT29mYnFYQXJDdGpOUWRQa1U0cTVsSG5XVDM5RWVmb0ljSzlqc3BFXC9NVHU0eWJESXZ6QldKc0JIUUUwRWFkQ1wvcUE9PSIsIm1hYyI6ImMzYzRiMmI1M2Y2YWRjMmQyNzZiMzk1ZmEzYmRjYmY0NGNiM2IwOGM5YzAxM2JkMzJlYTA0Yzc0ZjZlMzRjOTAifQ%3D%3D; l_acs_m_session=eyJpdiI6IlIzS0NIVDZ1RGk2ZEJzK0pcL2x3MmF3PT0iLCJ2YWx1ZSI6IlVjaWVYZVN5a0JRdTh3N016WGlrblNZRHdsa3BwWUxQNjM2ZXc4SU1ONUwzV2NnYVRsQm5YQ3V0dUZiSXVGQzNzU2RJOEdXRlJGVm1iUXlPMElQTlwvdz09IiwibWFjIjoiZmYwZjEyMmRiZDUxNGIzMmQ4ZWM5YmVlYzlhM2E4NDFkZTcyMGI1NWY1MzJiZTFhMzI5OTQ1NmI5MmJhY2Q1YSJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/projects","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47386","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/bet-records\/600\/view","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834818.8968,"REQUEST_TIME":1539834818,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:53:38', '2018-10-18 11:53:38')
498.530ms

2018-10-18 11:53:43
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00'
4.490ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00' order by `id` desc limit 20 offset 0
5.640ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
11.230ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
7.360ms
select `id`, `name` from `merchants` order by `id` asc
2.360ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
6.950ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
2.350ms
select `id`, `name` from `lotteries` order by `id` asc
3.190ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.250ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6ImwzNTFiUkV1UHI5OE1YMDdkWmVSSHc9PSIsInZhbHVlIjoiZFB2Zk5selwvN0lLVzVtWWV0WVhlT29mYnFYQXJDdGpOUWRQa1U0cTVsSG5XVDM5RWVmb0ljSzlqc3BFXC9NVHU0eWJESXZ6QldKc0JIUUUwRWFkQ1wvcUE9PSIsIm1hYyI6ImMzYzRiMmI1M2Y2YWRjMmQyNzZiMzk1ZmEzYmRjYmY0NGNiM2IwOGM5YzAxM2JkMzJlYTA0Yzc0ZjZlMzRjOTAifQ%3D%3D; l_acs_m_session=eyJpdiI6IlIzS0NIVDZ1RGk2ZEJzK0pcL2x3MmF3PT0iLCJ2YWx1ZSI6IlVjaWVYZVN5a0JRdTh3N016WGlrblNZRHdsa3BwWUxQNjM2ZXc4SU1ONUwzV2NnYVRsQm5YQ3V0dUZiSXVGQzNzU2RJOEdXRlJGVm1iUXlPMElQTlwvdz09IiwibWFjIjoiZmYwZjEyMmRiZDUxNGIzMmQ4ZWM5YmVlYzlhM2E4NDFkZTcyMGI1NWY1MzJiZTFhMzI5OTQ1NmI5MmJhY2Q1YSJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47386","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834822.5389,"REQUEST_TIME":1539834822,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-18 00:00:00"}', '2018-10-18 11:53:42', '2018-10-18 11:53:42')
458.470ms

2018-10-18 11:53:48
controller: FunctionalityRelationController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.590ms
select `id`, `title` from `functionalities` where `id` > 0 and `disabled` =  order by `title` asc
8.280ms
select count(*) as aggregate from `functionality_relations` where `id` > 0
4.200ms
select * from `functionality_relations` where `id` > 0 order by `sequence` asc limit 20 offset 0
3.450ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations'
7.380ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations' order by ordinal_position;
7.380ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 8 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
6.860ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('9', '52', '10', '51') and `disabled` = 0 order by `id` asc
2.750ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.750ms
select `id`, `title` from `functionalities` order by `title` asc
4.410ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.620ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 8, 'Functionality Relations', 'FunctionalityRelationController', 'index', '/functionality-relations', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IndIK0pqKzJmQXhHZFwvU3J1K3ZMamdBPT0iLCJ2YWx1ZSI6Ikk2NlFHaStMYTUzeFRaQzUxdldXbXFXNTllZHFEbVdHRlJkNXY0ZVRKbUltbUFlYjBMTEJGYm1tMDdIMzZJcWlQTFJIU1A4M1RHUWhtNFJDeFZnUXJBPT0iLCJtYWMiOiIwMGUwMjllODdlNDNmMGM0MTdjZmVmMWI1NmEyODI1MDY4NDVkZDI4YjAzMTg2ZGI2NjU2YjFlYzJjMzJmOGVlIn0%3D; l_acs_m_session=eyJpdiI6InhZdXd0S3dFWkh0XC9yQ3BkRzN4bFJRPT0iLCJ2YWx1ZSI6ImZ6TDFLR0hqS1ZickYyQURXVm5oTit6SVR0NTNjamltZmtrVytNM3JSZGlpUWhxSm1EWTU1bVY3TlR6dDB4bDhaNjFXWG84dE1xNEFZMlwvMzgxdFhFZz09IiwibWFjIjoiMTMyOWFiOTk3MWVmZDM0NTljM2UzNWMyYjE4N2YzODc5NjBlNGNlY2E3ZjVkNTdlOTNjZjZhZDliODQ2MzBiNSJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47386","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionality-relations","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834828.1456,"REQUEST_TIME":1539834828,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:53:48', '2018-10-18 11:53:48')
442.110ms

2018-10-18 11:53:49
controller: MenuController action: index
select * from `functionalities` where `id` > 0 and `controller` = 'MenuController' and `action` = 'index'
3.330ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = 53 order by `sequence` asc
66.970ms
select * from `functionalities` where `functionalities`.`id` = 53 limit 1
2.830ms
select * from `search_configs` where `search_configs`.`id` = '47' limit 1
2.860ms
select * from `search_items` where `search_config_id` = 47 order by `sequence` asc
3.900ms
select count(*) as aggregate from `menus` where `id` > 0 and `parent_id` is null
2.870ms
select * from `menus` where `id` > 0 and `parent_id` is null order by `sequence` asc limit 20 offset 0
3.720ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'menus'
7.120ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'menus' order by ordinal_position;
6.950ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 53 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.120ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('53', '58', '57', '59', '60') and `disabled` = 0 order by `id` asc
4.140ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '57' order by `sequence` asc
2.080ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '59' order by `sequence` asc
2.110ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
2.610ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '60' order by `sequence` asc
2.030ms
select `id`, `title` from `menus` order by `title` asc
2.460ms
select `id`, `title` from `functionalities` order by `title` asc
4.030ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.720ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 53, 'Menus Management', 'MenuController', 'index', '/menus', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Iml0YklGSHhcL2RoYVJ0amw4dDlIOXNRPT0iLCJ2YWx1ZSI6IkxYdUd2cXpPeW1vbVwvUkFjcVVSaERkSmhNYVpuSkZQQ0UwTEFwa3ozMURndEJldjhUUWdpaTVcLzZVYlYzTzZkN055aGc4bmZMN0FKbWY2VXBnK0s0Vmc9PSIsIm1hYyI6ImJmM2ZhY2ZjZjA3ODU4YzAyMjM1ZDM5YTdiMjNiZjRjMDcwZTMxYWFjMWZiNTZhNjJhYzU3ODk0MjM0ZThjMjgifQ%3D%3D; l_acs_m_session=eyJpdiI6IkVQdFd5ZHhDWEh5MExENkI4YitUNUE9PSIsInZhbHVlIjoienh5WnNPVkVGVkZkZHlpdk9SWFZiR2E0dExvQWptYzAxRVhCaEQzWFRXU01cL2M0eHJmbDhTTU01SUl4ZmpGS0xQZ0NUZWZZRWplUTEzTnZTNlhKUlNnPT0iLCJtYWMiOiI5YmVkZmY1ZTFkMjMyMDg3YWMxODk1MzAzYTg1ODgwZWExNTAwMjI0ZDc0YjQzMGZmMDg0OTBiNjE2NTczODJmIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47386","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/menus","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834829.2939,"REQUEST_TIME":1539834829,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:53:49', '2018-10-18 11:53:49')
450.660ms

2018-10-18 11:53:52
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.340ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
4.160ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `parent_id` is null
1.860ms
select * from `functionalities` where `id` > 0 and `parent_id` is null order by `sequence` asc limit 20 offset 0
3.520ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
19.570ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
13.360ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.030ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
4.130ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
2.530ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.290ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IlwvdkRJNDQ3VlV0NWorcGxYbExkUG53PT0iLCJ2YWx1ZSI6IlBHalBiOUlhYXhkdFBqblAwZVY5M0tWQlFEQko1OEVsVUV0RFc1UkxaVHBuNnhGc1wvZ2tpd3pPWEY4ekxWV1ErS3N0aVwvZElVQzlDNjRrczlLXC9XbW5BPT0iLCJtYWMiOiIyZDU5ZWVkNDRjMThmOTNhNjVkMzMxZWQ0MjU2NTdlNWU4ZmJlNzZjZDllZjA5ZTkyMzcxM2MzYzE1ZjgzNDJkIn0%3D; l_acs_m_session=eyJpdiI6IjhhdDRVM20xQ2ZHRHVDbCtuamh4T1E9PSIsInZhbHVlIjoidnhCZkRxeURYS1JFYWRmSXZqZG4zRVFYaDFScExFblNjcDFlc0U5WDllQnhRMXJwYk9yRTFUbG9ETmNrSTdDM0JSSkxRWVFoeGtZV1pab09QNzV3ZGc9PSIsIm1hYyI6IjBhZmZhMGJmMzMwNjgwODgwOWJmOTE4ZDVkZjc3NmZkODAxM2I1NWFhZTEzYTY2OWU4ZmJjNWI0NDk5NWI0YmQifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47386","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834832.0754,"REQUEST_TIME":1539834832,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:53:52', '2018-10-18 11:53:52')
579.060ms

2018-10-18 11:53:58
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
30.400ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
17.100ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `title` like '%project%'
3.120ms
select * from `functionalities` where `id` > 0 and `title` like '%project%' order by `sequence` asc limit 20 offset 0
6.420ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
7.600ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.430ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
8.310ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
3.730ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.750ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.510ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities?is_search=&controller=&title=project', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IkpDVXBuM0ZcL0hPSmF1UUdBRWcwWW53PT0iLCJ2YWx1ZSI6Ijd3R1F5b3p0YkJkeklHeTUxaE5wVkltTWVQa1k5Z1lyZWVsSEVHRjE0NFR0YVM2WGJRRXBTaTUxSWNvNk9mYWZVMnZLcFhXMDdYVWNrMjlETU5yRWlRPT0iLCJtYWMiOiJlZmE1OGVmNDAxY2QxNjIwMTllZTYzMWMyZmJjZmUyZDVkZTZlMzRhNzNlM2Y5NDQwN2U0NmM4ZjBiNWQ5NDZkIn0%3D; l_acs_m_session=eyJpdiI6IkRzYXlmdUYrZXg5Qzc1Y0dWRHlvb1E9PSIsInZhbHVlIjoiZkZYU1J3dUlNaXQxSXBUVFVxRFo5SHZOWUhOMlBVTGRKXC8rdFJFQlpaWDJqbzZhdzZkVUF1WE1DNVhlK2llV21NWDV0b0c3MTgrbE91RzNYOEQzVUl3PT0iLCJtYWMiOiJmNmM5ZGU3MzRiNTUxYzE3ZjFjNzNhYTNlZGVhNjVkNTNjNWExZGZkMzI4MzQ4Y2U3MjhlODVhNWFhYzEwNTQ1In0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47386","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities?is_search=&controller=&title=project","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"is_search=&controller=&title=project","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834838.2137,"REQUEST_TIME":1539834838,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"is_search":"","controller":"","title":"project"}', '2018-10-18 11:53:58', '2018-10-18 11:53:58')
496.430ms

2018-10-18 11:54:03
controller: FunctionalityRelationController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
8.130ms
select `id`, `title` from `functionalities` where `id` > 0 and `disabled` =  order by `title` asc
6.670ms
select count(*) as aggregate from `functionality_relations` where `id` > 0 and `functionality_id` = '34659'
2.600ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = '34659' order by `sequence` asc limit 20 offset 0
3.760ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations'
7.590ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations' order by ordinal_position;
7.820ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 8 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
6.940ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('9', '52', '10', '51') and `disabled` = 0 order by `id` asc
2.550ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
2.530ms
select `id`, `title` from `functionalities` order by `title` asc
4.010ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.480ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 8, 'Functionality Relations', 'FunctionalityRelationController', 'index', '/functionality-relations?functionality_id=34659', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6ImNVSXI0Y0tsajBwZjB1V1VmVlNoa2c9PSIsInZhbHVlIjoiamljeWk1bE1ST0xcL1REc3V4djBqejhaaHBBR3I2QVRZWXp5UlJHZ2t4Nlwvb2d4SzZPSGJCUmZDN2VtMHlPQm1pMjQ3QktLWGgrUjdtRDNsTVYwbkp6UT09IiwibWFjIjoiMWNlYTNjOWQ4MWU4ZWY0OGE4YzRlNGFjN2MwNGQxN2EwZDVlMmFkZWRlYjYwYmM2ZjMzMjBhMGRlZDZiOTM0OCJ9; l_acs_m_session=eyJpdiI6ImdRUFZQWlRFNUdQekpjU3V0V0gyMEE9PSIsInZhbHVlIjoiM3BVSzlKcVNZaU5LazhGbjY3WnVNUXRlYmMxSFZ1MlV5U09NRnlsMnhVdzNaTnVCM0pZMjNEOGZsNmxNRVNKSnVpdmhTem9TUVl0ZlBENWF3YjlmNFE9PSIsIm1hYyI6IjZkZTNmZjFhNmZkNTU5Y2FlOTYzYjY5NzNiODRlODVlNTg5MTRlMDNkOGQ4NzkyN2RjZjQwMWI3Mzg5MGU4NjkifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities?is_search=&controller=&title=project","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47386","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionality-relations?functionality_id=34659","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"functionality_id=34659","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834843.081,"REQUEST_TIME":1539834843,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"functionality_id":"34659"}', '2018-10-18 11:54:03', '2018-10-18 11:54:03')
511.520ms

2018-10-18 11:54:22
controller: FunctionalityRelationController action: edit
select * from `functionality_relations` where `functionality_relations`.`id` = '33014' limit 1
2.960ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations'
7.470ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations' order by ordinal_position;
7.580ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 10 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.040ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('8', '51') and `disabled` = 0 order by `id` asc
3.360ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.230ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` is null order by `title` asc
2.030ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 27 order by `title` asc
1.910ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 36 order by `title` asc
1.940ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1875 order by `title` asc
1.700ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1878 order by `title` asc
1.920ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1877 order by `title` asc
2.280ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1971 order by `title` asc
1.590ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1880 order by `title` asc
1.820ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 37 order by `title` asc
1.920ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1876 order by `title` asc
1.820ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1879 order by `title` asc
5.090ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 28 order by `title` asc
3.280ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 29 order by `title` asc
2.290ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 31 order by `title` asc
3.900ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 30 order by `title` asc
4.180ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 32 order by `title` asc
2.520ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 35 order by `title` asc
2.990ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 33 order by `title` asc
2.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34 order by `title` asc
3.480ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1881 order by `title` asc
2.380ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1882 order by `title` asc
2.320ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1885 order by `title` asc
4.370ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1883 order by `title` asc
2.020ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1317 order by `title` asc
2.020ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 56 order by `title` asc
2.020ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 142 order by `title` asc
1.960ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1441 order by `title` asc
3.000ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 38 order by `title` asc
1.880ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 39 order by `title` asc
2.130ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 70 order by `title` asc
2.240ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34846 order by `title` asc
2.140ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34847 order by `title` asc
1.960ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34849 order by `title` asc
1.890ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34850 order by `title` asc
1.880ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34848 order by `title` asc
2.420ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 76 order by `title` asc
2.170ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 77 order by `title` asc
2.080ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 80 order by `title` asc
4.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 78 order by `title` asc
9.570ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1691 order by `title` asc
4.420ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 79 order by `title` asc
2.170ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1839 order by `title` asc
2.230ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1840 order by `title` asc
2.160ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1843 order by `title` asc
1.980ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1842 order by `title` asc
1.990ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1841 order by `title` asc
9.740ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4452 order by `title` asc
2.160ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4453 order by `title` asc
2.050ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4456 order by `title` asc
1.930ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4454 order by `title` asc
1.870ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4457 order by `title` asc
1.930ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4458 order by `title` asc
8.900ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4455 order by `title` asc
2.460ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4531 order by `title` asc
2.360ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4532 order by `title` asc
2.130ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34802 order by `title` asc
10.450ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4533 order by `title` asc
2.160ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4534 order by `title` asc
2.030ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34658 order by `title` asc
2.060ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34778 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34779 order by `title` asc
2.080ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34782 order by `title` asc
1.910ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34780 order by `title` asc
2.650ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34781 order by `title` asc
2.060ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34792 order by `title` asc
2.180ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34794 order by `title` asc
1.980ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34795 order by `title` asc
1.990ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34793 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34790 order by `title` asc
1.820ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34786 order by `title` asc
1.950ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34789 order by `title` asc
2.250ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34788 order by `title` asc
2.300ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34787 order by `title` asc
2.280ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34659 order by `title` asc
2.050ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34777 order by `title` asc
1.910ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34783 order by `title` asc
2.360ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34660 order by `title` asc
1.870ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34805 order by `title` asc
4.400ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34806 order by `title` asc
2.220ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34807 order by `title` asc
1.980ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34810 order by `title` asc
1.920ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34808 order by `title` asc
1.950ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34809 order by `title` asc
1.730ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34811 order by `title` asc
1.820ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34812 order by `title` asc
1.890ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34815 order by `title` asc
1.860ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34813 order by `title` asc
2.180ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34814 order by `title` asc
2.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34565 order by `title` asc
3.590ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34586 order by `title` asc
2.020ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34598 order by `title` asc
1.840ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34589 order by `title` asc
2.060ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34587 order by `title` asc
2.610ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34693 order by `title` asc
2.070ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34694 order by `title` asc
1.890ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34697 order by `title` asc
2.700ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34695 order by `title` asc
1.860ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34696 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34588 order by `title` asc
1.840ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34590 order by `title` asc
4.270ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34591 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34594 order by `title` asc
2.890ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34592 order by `title` asc
10.390ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34593 order by `title` asc
1.910ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34761 order by `title` asc
1.890ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34762 order by `title` asc
1.860ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34765 order by `title` asc
3.340ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34763 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34764 order by `title` asc
1.750ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34583 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34596 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34585 order by `title` asc
1.900ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34584 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34597 order by `title` asc
4.350ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34624 order by `title` asc
1.730ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34625 order by `title` asc
1.570ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34628 order by `title` asc
1.590ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34626 order by `title` asc
1.620ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34627 order by `title` asc
1.690ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34672 order by `title` asc
1.810ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34673 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34676 order by `title` asc
1.680ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34674 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34675 order by `title` asc
1.740ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34609 order by `title` asc
1.700ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34610 order by `title` asc
1.660ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34613 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34611 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34612 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34650 order by `title` asc
2.000ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34651 order by `title` asc
1.710ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34654 order by `title` asc
1.760ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34652 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34801 order by `title` asc
1.760ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34653 order by `title` asc
1.660ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34619 order by `title` asc
1.930ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34620 order by `title` asc
1.700ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34623 order by `title` asc
1.910ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34621 order by `title` asc
1.830ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34698 order by `title` asc
1.940ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34699 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34700 order by `title` asc
1.760ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34622 order by `title` asc
1.820ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34614 order by `title` asc
1.810ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34615 order by `title` asc
1.840ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34618 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34616 order by `title` asc
1.870ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34617 order by `title` asc
1.710ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34604 order by `title` asc
1.750ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34605 order by `title` asc
1.840ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34608 order by `title` asc
1.650ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34606 order by `title` asc
1.660ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34607 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34677 order by `title` asc
1.710ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34678 order by `title` asc
1.830ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34681 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34679 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34800 order by `title` asc
1.680ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34680 order by `title` asc
1.750ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1 order by `title` asc
2.010ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1511 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1512 order by `title` asc
1.890ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1515 order by `title` asc
1.880ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1514 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1513 order by `title` asc
1.740ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1536 order by `title` asc
1.730ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1754 order by `title` asc
1.660ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1537 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1540 order by `title` asc
1.600ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1539 order by `title` asc
1.580ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1553 order by `title` asc
1.630ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1601 order by `title` asc
1.660ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1538 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2 order by `title` asc
1.860ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4 order by `title` asc
1.670ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 98 order by `title` asc
1.760ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 6 order by `title` asc
1.750ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 5 order by `title` asc
1.680ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4176 order by `title` asc
1.890ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 7 order by `title` asc
1.690ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 141 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 156 order by `title` asc
1.700ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 3 order by `title` asc
2.260ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 150 order by `title` asc
1.940ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 151 order by `title` asc
1.860ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 154 order by `title` asc
1.870ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 152 order by `title` asc
1.760ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 155 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 153 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 8 order by `title` asc
1.900ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 9 order by `title` asc
1.940ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 51 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 10 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 81 order by `title` asc
1.670ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 52 order by `title` asc
1.740ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 53 order by `title` asc
1.690ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 58 order by `title` asc
1.760ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 60 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 59 order by `title` asc
1.860ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 67 order by `title` asc
1.690ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 57 order by `title` asc
1.600ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 25 order by `title` asc
2.090ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 26 order by `title` asc
1.820ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 66 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 50 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 65 order by `title` asc
1.830ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 143 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 144 order by `title` asc
1.660ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 147 order by `title` asc
1.750ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 145 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 148 order by `title` asc
1.930ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 146 order by `title` asc
1.730ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2246 order by `title` asc
1.760ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2247 order by `title` asc
1.880ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2250 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2248 order by `title` asc
1.670ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2249 order by `title` asc
1.740ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2241 order by `title` asc
1.950ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2242 order by `title` asc
1.740ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2245 order by `title` asc
1.750ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2243 order by `title` asc
1.990ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2244 order by `title` asc
2.010ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 45 order by `title` asc
1.960ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 46 order by `title` asc
2.040ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 49 order by `title` asc
1.950ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 47 order by `title` asc
1.840ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2054 order by `title` asc
1.750ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 64 order by `title` asc
1.920ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 161 order by `title` asc
2.130ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 164 order by `title` asc
1.910ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 163 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1124 order by `title` asc
1.680ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 162 order by `title` asc
1.700ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 48 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 17 order by `title` asc
1.880ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 18 order by `title` asc
1.830ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 21 order by `title` asc
1.690ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 19 order by `title` asc
1.660ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1702 order by `title` asc
1.970ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 20 order by `title` asc
1.860ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1541 order by `title` asc
1.910ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1542 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1545 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1544 order by `title` asc
1.670ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1546 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1543 order by `title` asc
1.630ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 2213 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34662 order by `title` asc
1.730ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34663 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34803 order by `title` asc
1.730ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34666 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34851 order by `title` asc
1.880ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34856 order by `title` asc
7.980ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34852 order by `title` asc
1.880ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34855 order by `title` asc
1.960ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34853 order by `title` asc
1.820ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34854 order by `title` asc
1.760ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34668 order by `title` asc
1.840ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34804 order by `title` asc
1.670ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34669 order by `title` asc
1.670ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34670 order by `title` asc
1.740ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34671 order by `title` asc
1.620ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4191 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1974 order by `title` asc
1.670ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1976 order by `title` asc
1.540ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34796 order by `title` asc
1.880ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34797 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34784 order by `title` asc
1.730ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34785 order by `title` asc
1.810ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34798 order by `title` asc
1.860ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34799 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34566 order by `title` asc
1.760ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34578 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34735 order by `title` asc
1.710ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34738 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34736 order by `title` asc
1.730ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34739 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34657 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34734 order by `title` asc
1.750ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34740 order by `title` asc
1.710ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34581 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34723 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34724 order by `title` asc
1.940ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34727 order by `title` asc
2.130ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34725 order by `title` asc
1.670ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34726 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34748 order by `title` asc
1.680ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34749 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34752 order by `title` asc
1.730ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34750 order by `title` asc
1.840ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34751 order by `title` asc
1.710ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34753 order by `title` asc
1.920ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34760 order by `title` asc
1.740ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34758 order by `title` asc
1.730ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34754 order by `title` asc
1.760ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34757 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34755 order by `title` asc
1.810ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34759 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34756 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34573 order by `title` asc
2.140ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34574 order by `title` asc
1.860ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34577 order by `title` asc
1.740ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34575 order by `title` asc
2.010ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34733 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34714 order by `title` asc
1.820ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34720 order by `title` asc
1.820ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34576 order by `title` asc
1.830ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34715 order by `title` asc
1.970ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34840 order by `title` asc
1.830ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34716 order by `title` asc
1.840ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34719 order by `title` asc
1.680ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34717 order by `title` asc
1.870ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34845 order by `title` asc
1.860ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34841 order by `title` asc
1.810ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34844 order by `title` asc
1.870ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34718 order by `title` asc
1.600ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34728 order by `title` asc
1.810ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34729 order by `title` asc
1.810ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34732 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34730 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34731 order by `title` asc
1.640ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34568 order by `title` asc
1.950ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34766 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34569 order by `title` asc
1.560ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34572 order by `title` asc
1.810ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34570 order by `title` asc
1.620ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34571 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34838 order by `title` asc
1.750ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34839 order by `title` asc
1.890ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34629 order by `title` asc
1.700ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34630 order by `title` asc
1.740ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34631 order by `title` asc
1.790ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34634 order by `title` asc
1.740ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34632 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34633 order by `title` asc
1.670ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34701 order by `title` asc
1.910ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34640 order by `title` asc
1.630ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34641 order by `title` asc
1.540ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34644 order by `title` asc
1.690ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34642 order by `title` asc
1.620ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34643 order by `title` asc
1.890ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34635 order by `title` asc
1.800ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34636 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34639 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34637 order by `title` asc
1.860ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34638 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34645 order by `title` asc
2.050ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34702 order by `title` asc
1.890ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34704 order by `title` asc
1.660ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34705 order by `title` asc
1.590ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34703 order by `title` asc
1.700ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34646 order by `title` asc
1.740ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34649 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34647 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34648 order by `title` asc
1.590ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34682 order by `title` asc
1.680ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34688 order by `title` asc
1.690ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34689 order by `title` asc
1.700ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34692 order by `title` asc
1.680ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34690 order by `title` asc
1.610ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34691 order by `title` asc
1.690ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34683 order by `title` asc
1.710ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34684 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34687 order by `title` asc
1.750ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34685 order by `title` asc
1.750ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34686 order by `title` asc
1.910ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 4470 order by `title` asc
1.910ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34816 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34827 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34819 order by `title` asc
1.720ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34828 order by `title` asc
1.740ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34818 order by `title` asc
1.770ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34831 order by `title` asc
1.810ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34842 order by `title` asc
1.880ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34843 order by `title` asc
1.810ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34826 order by `title` asc
1.740ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34837 order by `title` asc
1.870ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34817 order by `title` asc
1.610ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34829 order by `title` asc
1.710ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34820 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34830 order by `title` asc
1.840ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34824 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34836 order by `title` asc
1.610ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34823 order by `title` asc
1.650ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34833 order by `title` asc
1.780ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34821 order by `title` asc
1.640ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34832 order by `title` asc
3.260ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34822 order by `title` asc
2.020ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34834 order by `title` asc
1.840ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34825 order by `title` asc
1.890ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34835 order by `title` asc
2.100ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 22 order by `title` asc
2.080ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 125 order by `title` asc
1.970ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 124 order by `title` asc
1.900ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 1462 order by `title` asc
2.180ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34742 order by `title` asc
1.960ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34743 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34744 order by `title` asc
1.960ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34747 order by `title` asc
1.740ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34745 order by `title` asc
2.030ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34746 order by `title` asc
1.910ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34708 order by `title` asc
1.940ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34721 order by `title` asc
1.760ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34709 order by `title` asc
1.600ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34712 order by `title` asc
1.850ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34710 order by `title` asc
1.880ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34741 order by `title` asc
1.940ms
select `id`, `title` from `functionalities` where `id` > 0 and `parent_id` = 34711 order by `title` asc
1.740ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.300ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 10, 'Edit Relation', 'FunctionalityRelationController', 'edit', '/functionality-relations/33014/edit', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Iis5QjFZTURBYVg1MVRkdEk5SjZWQlE9PSIsInZhbHVlIjoiQm00cDRUckpmVGt4c0c0R1lpckpmM0VkcHpSSWhpd1pQMU5WVWdKbllhU1hcL2I2YXpTeGpHR2laZnlYVVwvMEl0Q25zQWlcL1F6WkRaOTFMR0puTU16aHc9PSIsIm1hYyI6IjcyNDViMTlkMzg0NzRkMzJjYTM0ZjNjMDZkMjViNDE1MTUzZDlhY2RhOWQzNGYwYTIyYjFmOGFjMmMyYjk1MzcifQ%3D%3D; l_acs_m_session=eyJpdiI6ImQyNXgra0tqWGNSZFZuNkJGbUZ4NFE9PSIsInZhbHVlIjoiUzA4TkJwdURBY0s4ZW9ONTNUeXcrK2pcL3JRV1I5QU5Oc0VJakJQZTRDVHR4bExBOVwvaDJpT0tJYTRpUXBuaElnMWRMMHYreW5laERQcnZiOXBhOWVSdz09IiwibWFjIjoiODliMGZjZDI1MGU4YTI3MjgwZWVmYzc3MDJmOTkwYWQ4ZTZhNzAxYTMyMjYyMzI1OGU3ZDlhN2I0YzU0NDcyZSJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionality-relations?functionality_id=34659","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47386","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionality-relations\/33014\/edit","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834860.7167,"REQUEST_TIME":1539834860,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:54:21', '2018-10-18 11:54:21')
514.700ms

2018-10-18 11:54:29
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.160ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.630ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
181.150ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.420ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.670ms

2018-10-18 11:54:37
controller: FunctionalityRelationController action: edit
select * from `functionality_relations` where `functionality_relations`.`id` = '33014' limit 1
11.100ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations'
11.610ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations' order by ordinal_position;
9.190ms
update `functionality_relations` set `params` = 'id=$model.bet_record_id', `updated_at` = '2018-10-18 11:54:36' where `id` = '33014'
2.460ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.560ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 10, 'Edit Relation', 'FunctionalityRelationController', 'edit', '/functionality-relations/33014/edit', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IlV4bnpGWkpZSWJjUDdhcUw2YUUwdlE9PSIsInZhbHVlIjoiXC90WEVSWHdmT1VyZFJcL3ljWjJveFArWUc1eGdpd3BNSlwvcmg1MlVxZGNmWGNpNkdPNkYwRG9mY3BsUXI2RzB5WkVDV1RWNWR6eEV6RE1maU1iUTJGS1E9PSIsIm1hYyI6ImMyZjhmNjVkOTQxNGE2ZjdmMTI4YTU1MjQ2ZTc5MmNiNDFiOTgxMWIxYmIyOTQwY2YxNmE1MTE2NDJmYWQ2ZDEifQ%3D%3D; l_acs_m_session=eyJpdiI6IlozNnJSKzhUNHRCYkhJeGRBeTdrM2c9PSIsInZhbHVlIjoieVM5b2xhTmtGVGdhY01pOERmSEpqR0h1TG13TkVJM1ZjaHE5ZytRUytjaTZMUFNiZUpHSkRtc1BTalhKUHBVQVNjaDN5Q3d6MVE1Qk9KdHBcL01xMmVBPT0iLCJtYWMiOiJmZGM1Yjk0MmZhMTkzZmQ3NDBjMTU5ZDYwM2ZmZDliMjAxNGEyZDEzNWI1NTYyMDllYWExMzBhMmJhYjE0ZjgwIn0%3D","HTTP_CONTENT_LENGTH":"230","HTTP_CONTENT_TYPE":"application\/x-www-form-urlencoded","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionality-relations\/33014\/edit","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47386","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionality-relations\/33014\/edit","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"230","CONTENT_TYPE":"application\/x-www-form-urlencoded","REQUEST_METHOD":"POST","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834876.5057,"REQUEST_TIME":1539834876,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"_method":"PUT","functionality_id":"34659","r_functionality_id":"34785","position":"1","button_onclick":"","confirm_msg_key":"","label":"Bet Records","precondition":"","params":"id=$model.bet_record_id","sequence":"10"}', '2018-10-18 11:54:36', '2018-10-18 11:54:36')
416.780ms

2018-10-18 11:54:38
controller: FunctionalityRelationController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
9.630ms
select `id`, `title` from `functionalities` where `id` > 0 and `disabled` =  order by `title` asc
201.050ms
select count(*) as aggregate from `functionality_relations` where `id` > 0 and `functionality_id` = '34659'
2.650ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = '34659' order by `sequence` asc limit 20 offset 0
3.420ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations'
7.470ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations' order by ordinal_position;
9.680ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 8 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
6.840ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('9', '52', '10', '51') and `disabled` = 0 order by `id` asc
4.300ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
14.910ms
select `id`, `title` from `functionalities` order by `title` asc
97.790ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.530ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 8, 'Functionality Relations', 'FunctionalityRelationController', 'index', '/functionality-relations?functionality_id=34659', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Imt3Q3BvREpqWW5VNjdqZ0NpQXI1RHc9PSIsInZhbHVlIjoiSGtUaVwvUUpQcERCMlRKRTZoM2VDWkpjY1pkMlBYMlQ2TVwvM3pmOGNZYk1Bc1VJand6aVZ4WTZIREc3ZXNPTFB1d3lxYm5hM0F5ZHd6Z0E0Y0s1Q1UyZz09IiwibWFjIjoiYjllNmE3ZjE1ZmI3OTdiZGQwZDFjOGQxNDdmYzAyNWJjMTI2M2JmZTU3NGViYWRiOTc1YjQwNjhlZDFmMTRmNCJ9; l_acs_m_session=eyJpdiI6IkFOXC9RYVFaSG5jYVBLbHd5VEhscjZ3PT0iLCJ2YWx1ZSI6IjFhQVpscTBldm9XQ1ZwVXJRREhxVWFhZnlHSzdlMFA1N0t3ZDc1ZDNwdVdFYk54dUFUQTFkbGtwWjVJMmtVOUxaSld4TXh4OUNMeVpEemxXc2JOODFnPT0iLCJtYWMiOiJmMTljOTQ0NTgyNWYwMjgxMTk3NWZlMGRkMjRhYzMzNzRkNWU0ZjJmOTZkYTlhYzI5MzFlOGI3M2EzYWNkY2Y3In0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionality-relations\/33014\/edit","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47386","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionality-relations?functionality_id=34659","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"functionality_id=34659","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834876.886,"REQUEST_TIME":1539834876,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"functionality_id":"34659"}', '2018-10-18 11:54:37', '2018-10-18 11:54:37')
751.820ms

2018-10-18 11:55:01
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00'
4.820ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00' order by `id` desc limit 20 offset 0
5.660ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
8.420ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
11.510ms
select `id`, `name` from `merchants` order by `id` asc
3.000ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
8.080ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
3.790ms
select `id`, `name` from `lotteries` order by `id` asc
2.950ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.700ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6InBpNXNQWlNJRGV2c3hrOEFEXC9GaUVBPT0iLCJ2YWx1ZSI6ImdXUDBFUnMxeXJsRGFvRUh1bldrRjJpK25xSFI1VlZMQlJcL1BrQUVOQWNUa2tTNm8zV1Ixb3l4SE5CVVBzMGtrZGoyMGVMaElWampmeU8xZ2FPQXhadz09IiwibWFjIjoiZGRhMjIwNDllOWE0ZDA0MjM4YjdhMTQ3OWI0NzZiNDIwMGU0MzRiMWZmMWMxN2RlODJiM2ZkMWI3MWMyOWU5ZCJ9; l_acs_m_session=eyJpdiI6Im01T055Q2laWGJYeHliNURBVDc2dGc9PSIsInZhbHVlIjoiR2NBMk1DRm9cL3QzQlVNcTVoWDNoQjE2cDQ4YTdFQStSQlZIaEJQbUx5N3JubDQ5SzhCSHdrRVRYN3hsTHhOXC9JT3lMdlZWenVqbHJ4ZlgzY0hYWlRsdz09IiwibWFjIjoiNjhjNmVjZjVmNmM2MGRkY2Q4MTM3MDA4ZTc3ZTdjMzAyOGQ5MjhmNTc0N2ZlMDkyNzdmYzBkZDZlYzk3YzNmZiJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47442","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834901.231,"REQUEST_TIME":1539834901,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-18 00:00:00"}', '2018-10-18 11:55:01', '2018-10-18 11:55:01')
444.110ms

2018-10-18 11:55:04
controller: BetRecordsController action: view
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.590ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34785, 'View Bet Records', 'BetRecordsController', 'view', '/bet-records/600/view', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IlRpdEJxZFEzcm5wQnJLV1JNWjFFNUE9PSIsInZhbHVlIjoiUDhxWFZmaXFPV1ZyTDc2WjRmY0lralFDSWtQb0U2RFJYNHRtd001N3RVXC9GeG1JTlM3R0kycXNnNjlVUjZBbEdGVHFyM0ZqUW1BOCtcL2tHcmNGZGtwQT09IiwibWFjIjoiN2IzYTBiMzVjMmJhNGMwNDdjOTZiMmYwZTJmM2IwYzNlMzVlNjNjODRlMTNlZDI3MjQ2M2YzZGVjYmRkZjc1ZiJ9; l_acs_m_session=eyJpdiI6IjZ2OEVcL3BcL09QOHpYZXowcDArdVM2UT09IiwidmFsdWUiOiJyZTkzNXNDWW5uSEpjY0VGaE44Q0tyUTFtUmZua0RpQmFaR1VPTm5GT29MU2w0Q1wvWUQ1MlVCS283VEczNTU1NG1hU1h6ZW1RQUFjWkRcL25VUCsrY01nPT0iLCJtYWMiOiI2YzQ0YTY5N2VhNThkZGEwMDEzYTZmZDJkZTA2NGJiNWRiNWQzMzI1NDUxNzgyNjg3OWM4MDZlMDQ3MWQ5YjNjIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/projects","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47442","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/bet-records\/600\/view","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834903.8647,"REQUEST_TIME":1539834903,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:55:03', '2018-10-18 11:55:03')
425.800ms

2018-10-18 11:55:08
controller: ProjectController action: index
select count(*) as aggregate from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00'
47.270ms
select * from `projects` where `id` > 0 and `is_tester` = '0' and `bought_at` >= '2018-10-18 00:00:00' order by `id` desc limit 20 offset 0
22.110ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'projects'
7.250ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'projects' order by ordinal_position;
8.570ms
select `id`, `name` from `merchants` order by `id` asc
2.950ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34659 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.900ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34660', '34785', '34783') and `disabled` = 0 order by `id` asc
3.370ms
select `id`, `name` from `lotteries` order by `id` asc
2.840ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
4.320ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 34659, 'projects', 'ProjectController', 'index', '/projects', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IlRpdEJxZFEzcm5wQnJLV1JNWjFFNUE9PSIsInZhbHVlIjoiUDhxWFZmaXFPV1ZyTDc2WjRmY0lralFDSWtQb0U2RFJYNHRtd001N3RVXC9GeG1JTlM3R0kycXNnNjlVUjZBbEdGVHFyM0ZqUW1BOCtcL2tHcmNGZGtwQT09IiwibWFjIjoiN2IzYTBiMzVjMmJhNGMwNDdjOTZiMmYwZTJmM2IwYzNlMzVlNjNjODRlMTNlZDI3MjQ2M2YzZGVjYmRkZjc1ZiJ9; l_acs_m_session=eyJpdiI6IjZ2OEVcL3BcL09QOHpYZXowcDArdVM2UT09IiwidmFsdWUiOiJyZTkzNXNDWW5uSEpjY0VGaE44Q0tyUTFtUmZua0RpQmFaR1VPTm5GT29MU2w0Q1wvWUQ1MlVCS283VEczNTU1NG1hU1h6ZW1RQUFjWkRcL25VUCsrY01nPT0iLCJtYWMiOiI2YzQ0YTY5N2VhNThkZGEwMDEzYTZmZDJkZTA2NGJiNWRiNWQzMzI1NDUxNzgyNjg3OWM4MDZlMDQ3MWQ5YjNjIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47442","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/projects","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834907.2761,"REQUEST_TIME":1539834907,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"way_id":null,"is_tester":"0","bought_at_from":"2018-10-18 00:00:00"}', '2018-10-18 11:55:07', '2018-10-18 11:55:07')
855.940ms

2018-10-18 11:55:10
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
10.970ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
61.690ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `parent_id` is null
2.510ms
select * from `functionalities` where `id` > 0 and `parent_id` is null order by `sequence` asc limit 20 offset 0
4.220ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
7.410ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.880ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.090ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
4.470ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.090ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.280ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IklsZ3d1MDdEbDFHRGFiNW93SU5wd3c9PSIsInZhbHVlIjoiQURPUU9iVHJQbGRqVUJORmxyNlZVRm1nVGc1MmJUYTJvTUMzQXZ2ekFOZVJhQTBpbzhZeFlPV29pa0t0OFZ4YTVDR0h4cTBJYTNWb0QzOGNDTTMzT3c9PSIsIm1hYyI6IjAzMTI4NTc2ODI0NDM0MTE3ZWJlZjM2YWE5Y2FlYzg5Njc1YjFmYzg0ZTMwZjE1NDBlYWMwYzEwYmRmOGU1ODUifQ%3D%3D; l_acs_m_session=eyJpdiI6IkdBanlsY3dGSTEzbUswZ3VzN0oxcWc9PSIsInZhbHVlIjoiejJzREduc2owVzlzdlF2dHVaWHUzRDgyRnVheVBVZXpaUktuamVYbFhHenhNNDhpRHJsbUtIcm1qT1F2d1RIR0h6NjNYY1Q4WVIxdFdaRWE5V0tEMmc9PSIsIm1hYyI6ImVhOTkxNTdiY2M5ODIxNzk5OTUxZjIzNWEwMjEyYmQwNmNlMWM4N2U5YTRlZWNjZjFkYTU5NTQwMDRjZGYzNzMifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47442","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834909.4738,"REQUEST_TIME":1539834909,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:55:09', '2018-10-18 11:55:09')
410.310ms

2018-10-18 11:55:16
controller: FunctionalityRelationController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.420ms
select `id`, `title` from `functionalities` where `id` > 0 and `disabled` =  order by `title` asc
7.950ms
select count(*) as aggregate from `functionality_relations` where `id` > 0
3.490ms
select * from `functionality_relations` where `id` > 0 order by `sequence` asc limit 20 offset 0
4.060ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations'
7.390ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations' order by ordinal_position;
7.150ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 8 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.170ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('9', '52', '10', '51') and `disabled` = 0 order by `id` asc
2.480ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.170ms
select `id`, `title` from `functionalities` order by `title` asc
4.970ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.510ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 8, 'Functionality Relations', 'FunctionalityRelationController', 'index', '/functionality-relations', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6Ik9hejVBcHhoTlJcL1JkY2RCTm5BdENnPT0iLCJ2YWx1ZSI6IllBa3dST3BVdWp4TE11OE1pRk5vWnVHaGM5c1RKSmJMQzRZVExmK0JhV2pvRUNhY0o5emNlK0hPQ3lUT2xMK0h1eVwvN3RxK2RhZ2twUFZrTGRnTzQ5Zz09IiwibWFjIjoiMjdmYjVlZDI2OGJkN2IyNzgxOGRlYWNmNzNjMDM2ZDI2OTlmMDIxNDYyN2E4NTE3MTlkNjlmYTIzNmZhOTk2YSJ9; l_acs_m_session=eyJpdiI6ImFjR3l5Znh3TEJvRDZXZ3NpRkk3VkE9PSIsInZhbHVlIjoiVUpaZ1Z2V093Slp6RUQ5YThkd0ZqQ1hSOEJMaGhWSzhFbFlXcVVUaEd3T1FnSHhxMm9nT1FhNkxHb3o1UU02Z2FVRUU4S2pROE0wUHJkMVV6N0RHK2c9PSIsIm1hYyI6IjkzYWNhNGQ4M2JhNzEwYzdlOTE5NjBkOGJkMjg2ZTI1MmM5YTkyMTUzOTYxMzIxZTA5M2U0OTk5YjVjMjI1NDIifQ%3D%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47442","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionality-relations","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834915.7123,"REQUEST_TIME":1539834915,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:55:15', '2018-10-18 11:55:15')
567.920ms

2018-10-18 11:55:17
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.570ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
4.380ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `parent_id` is null
2.160ms
select * from `functionalities` where `id` > 0 and `parent_id` is null order by `sequence` asc limit 20 offset 0
3.810ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
13.960ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
40.520ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
23.480ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
5.000ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.680ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.670ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IkZIRnJzY05hNzJDTkNEMWZMc05ZYVE9PSIsInZhbHVlIjoiSWkzaktuVHVJa2dWOEpHcUVsUWpGTG5OXC9yekVvTVZoNmFydHhoYXN4dGlhMFwvOXVPUnBUUnBZUmJnSE9RdnhJUGhMWFQzbnZiNlBnTVlEN3BNQ3NcL0E9PSIsIm1hYyI6IjgxY2NkM2Q2YzM1MzVmNTU3MjNjMDY4OGM4MjY3NDAwNGEwN2NjNGRkOTM5NzhiZjYzODYxZmNmMjhjYTczNjAifQ%3D%3D; l_acs_m_session=eyJpdiI6IndJM2tndmU2T0xyUitTbEk0MjZYZkE9PSIsInZhbHVlIjoiTEpnSUtOdngrVm40TXZmSmc1eEJFaTNtUXZNVUl6ODRHSmlPTjhzZ2FRNmZMSHlEVHVFaGEwTzlqT2h4c1JZRkRzUzhLU3MybFA2VTg2b1Rlc2FLXC93PT0iLCJtYWMiOiJmYTUxNDRkMzZhOWMyYTFkZDdiMjBjODA3MWNmMGUyNzQxZmNjZGUxYzM4NTMwMzhlMWFmNGJmMmJjN2ZkNDgxIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47442","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834916.6798,"REQUEST_TIME":1539834916,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-18 11:55:16', '2018-10-18 11:55:16')
475.490ms

2018-10-18 11:55:23
controller: FunctionalityController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.220ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
4.500ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `title` like '%project%'
2.750ms
select * from `functionalities` where `id` > 0 and `title` like '%project%' order by `sequence` asc limit 20 offset 0
6.010ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
7.280ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
8.000ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.300ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
4.210ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.490ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.480ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities?is_search=&controller=&title=project', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IkFJb1RGYldwNGdvTVdjZ3owUGw3OWc9PSIsInZhbHVlIjoiNmdVak9RanVKQVJvc2xtODJ6RkZ4ZXpIM3NXUVQyVVJUVlZsMVIzUzBVUWRkOGpQb0VTUjk0aE4zdTlSQ2FpMVpqWWlkTzdRanRrcGhCdnJBc3FFaGc9PSIsIm1hYyI6IjM2NGY1MDI3NjJkYWQxOTU0MDhjM2MxOTZkMjJkOWI3MzlmNzYyMzQ0YjBmMDg2NTQyMjdkMzA3Y2FiNmJmNGEifQ%3D%3D; l_acs_m_session=eyJpdiI6IlA3WFIwbVZVamk5QkMzWFJicnNmR0E9PSIsInZhbHVlIjoiQXN2UzZEV2l1MEk5M2hEQ2N3Tjh4cEwwRVd4VU4rVEJMZXFZdDcxRTBzRFlDVjR2WmtzWXpiYjJjYnh2ck9ia2NUTEZPOEJYMGhuVllcL3RXSlo5YWFnPT0iLCJtYWMiOiI1Y2Q0NDkxNjJkOWI4ZjA0YWNkZWQzY2JkMWE0YTkwZWMzYzFjN2MzYTAxMjNmNDNkZGJmYjNlOWQwOWY2NzgzIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47442","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities?is_search=&controller=&title=project","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"is_search=&controller=&title=project","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539834922.7856,"REQUEST_TIME":1539834922,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"is_search":"","controller":"","title":"project"}', '2018-10-18 11:55:22', '2018-10-18 11:55:22')
502.960ms

2018-10-18 11:55:29
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.450ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
3.030ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
181.140ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.810ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.490ms

2018-10-18 11:56:29
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.590ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
3.130ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
181.820ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.370ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.620ms

2018-10-18 11:57:29
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
2.790ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.450ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
176.770ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.360ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.310ms

2018-10-18 11:58:07
controller: FunctionalityRelationController action: index
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
7.890ms
select `id`, `title` from `functionalities` where `id` > 0 and `disabled` =  order by `title` asc
8.820ms
select count(*) as aggregate from `functionality_relations` where `id` > 0 and `functionality_id` = '34659'
2.980ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = '34659' order by `sequence` asc limit 20 offset 0
3.410ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations'
7.750ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionality_relations' order by ordinal_position;
15.390ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 8 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
11.750ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('9', '52', '10', '51') and `disabled` = 0 order by `id` asc
4.970ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.900ms
select `id`, `title` from `functionalities` order by `title` asc
4.010ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.360ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 8, 'Functionality Relations', 'FunctionalityRelationController', 'index', '/functionality-relations?functionality_id=34659', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IjdCTnFwczZuZU03ZDBLdkd2N041SFE9PSIsInZhbHVlIjoiTHg3bWVsU0dqXC9Vb3hUcU9qSDdCNmVaUmxZbHM1MDJmaWR1SzZCXC96K2VDYWJRZ0tJcW9qaWV1SkxNUW9keXdWNlZCbVE4b3VMTlJkblwvaUJSemRib0E9PSIsIm1hYyI6IjUxYmM5N2JmMzY0NWU2MDJkY2UyYmRlOTRjMDhlOTU0ZjE0NDYyZTRiMDI2MGFjNDA2NjUzODQ0NmIwODcyMTMifQ%3D%3D; l_acs_m_session=eyJpdiI6IkN1aXBESXY4MjlhWTdyZkEralQwZ1E9PSIsInZhbHVlIjoiS043YVRnY3N2b2RMb3l6YWFtUjNWQWdNUWY4eTRtdHZjckZsV2ZaUlhwUDE3ZmRXOEE5M2ZBVFwvVDVWUU56aldJUVcxVlwvS2dxdTJEVGFjUTFJM3I3dz09IiwibWFjIjoiYzhmZWQ3MGJmODY5OTZkYWZjN2UxZDM2NWY2NTNjYTAxZDIxZjVkODczNmNhODZkMjU5YjI1NWM3Yzk2YzliYyJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/functionalities?is_search=&controller=&title=project","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"47682","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.14.0","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionality-relations?functionality_id=34659","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"functionality_id=34659","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1539835086.2748,"REQUEST_TIME":1539835086,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"functionality_id":"34659"}', '2018-10-18 11:58:06', '2018-10-18 11:58:06')
553.180ms

2018-10-18 11:58:29
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.830ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.950ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
178.340ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.730ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.600ms

2018-10-18 11:59:29
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.170ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.810ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1540396800 group by `lottery_id`
178.310ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.450ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.650ms

