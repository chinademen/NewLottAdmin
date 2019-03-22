2018-10-03 11:03:28
controller: AdminUserController action: changePassword
select * from `functionalities` where `id` > 0 and `controller` = 'AdminUserController' and `action` = 'changePassword'
4.100ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = 1317 order by `sequence` asc
5.050ms
select * from `admin_roles` where `admin_roles`.`id` = '1' limit 1
2.110ms
select `id` from `functionalities` where `realm` in (0, 1)
3.380ms
select * from `admin_roles` where `admin_roles`.`id` = 2 limit 1
2.380ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.820ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'admin_users'
87.530ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'admin_users' order by ordinal_position;
6.630ms
select `id`, `name` from `merchants` order by `id` asc
3.120ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 1317 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
6.390ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.760ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 1317, 'Change Password', 'AdminUserController', 'changePassword', '/admin-users/change-password', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IkRUTDh2b1VvSlpKQkM5UGpJNkNcL0RRPT0iLCJ2YWx1ZSI6IkhcL0VIV1JXUEYwbUJWS1JHaGZyN0ZlcHI0U0thTklPejZzbzR5QXpLY2drY1RkMTRsSXBWK1wvR1wva0orQ1RlVnMxRG9TTGZ2bzFmcWpcL2RNK1EzZ1NrQT09IiwibWFjIjoiNGQ3ZGZhYjZjZjg2Y2VjNTJmYjg3MjdiODNjNjY4YWUxNzFkMTE0MGE1MjRhYmU2NzdkZTdlMTFiZTJkZDk2OSJ9; l_acs_m_session=eyJpdiI6ImFBQXFLaWE2Nkx1ZTRvQXNxUjlPNkE9PSIsInZhbHVlIjoiTG03aHdKeWpKaEVMd1NQd1ZScWRQcW1kTVV1VkFEXC9sdG9RUnZrYnlrK3E4UUw0WXl4RFg0Mmp6aDB0SUlEeVNSRzlsNDRRcjlFQWVqOW1DSTdtVklnPT0iLCJtYWMiOiIyOWJiNzA4MjNlOTY5N2ZmYzk2NWMxYjgxNzc3ZGRlZTFkNWFkMWJjZjI5OWQ4ZmE1M2I5MjM1ZDYyNGVhOTA2In0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/auth\/login","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50264","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.10.3","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/admin-users\/change-password","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1538535807.7262,"REQUEST_TIME":1538535807,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-03 11:03:27', '2018-10-03 11:03:27')
589.580ms

2018-10-03 11:03:47
controller: AdminUserController action: changePassword
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.350ms
select count(*) as aggregate from `admin_users` where `username` = 'loren' and `id` <> 6
2.050ms
update `admin_users` set `password` = '$2y$10$8cM65.iXlx60unzidfz0kOoS1hFW.ZZNOiPB1xE25k6qD/VsxGDVy', `updated_at` = '2018-10-03 11:03:46' where `id` = '6'
2.520ms
update `admin_users` set `pwd_seted_at` = '2018-10-03 11:03:46', `updated_at` = '2018-10-03 11:03:46' where `id` > 0 and `id` = 6
1.700ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.180ms
insert into `admin_pwd_histories` (`admin_user_id`, `password`, `operator_id`, `admin_username`, `operator`, `updated_at`, `created_at`) values (6, '$2y$10$8cM65.iXlx60unzidfz0kOoS1hFW.ZZNOiPB1xE25k6qD/VsxGDVy', 6, 'loren', 'loren', '2018-10-03 11:03:46', '2018-10-03 11:03:46')
0.850ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
87.080ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `request_data`, `updated_at`, `created_at`) values (1, 6, 'loren', 1317, 'Change Password', 'AdminUserController', 'changePassword', '/admin-users/change-password?6', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6InlHSzNGMDZWTEEwNCtOdnBwRHBBalE9PSIsInZhbHVlIjoiam1zWFlLZ1FLTnVIYlJhSmk2c0RoUE1QRjdPOXowampScEdUQ1VrZVhUamhSWGFjdFhmeVB1VVJneUJmcXpMUzhpR2NRNGl5eVZWYnduUGJ3Qm02Q0E9PSIsIm1hYyI6ImVjMTRlMDgzZTRlODYzYzE4ZTljNDZkMmEyZGMzNmI1ODkzNGUwNGNhODRlZmRlOTc3NzFkYTM5MTVlMDVjOGEifQ%3D%3D; l_acs_m_session=eyJpdiI6InJBdGJ1ckludW8rOWVFVUhBN1NiQ1E9PSIsInZhbHVlIjoiQmpQTmhHZmdhcjVwYjRmamluZDlwamZGSGRLcEQzUnRQXC9ZbHFrc0c0MDhubVNlMmo4MlwvUmJwWFdONzAyVkcrYlZ1Tk94em1zaDFvXC9ZY0xod1p5TVE9PSIsIm1hYyI6IjUzZDRhODI3OGViMWNjMGFjYTE4Y2QwMjUzMDk2ZGZkYzg2MjE1OTc0M2ViMTk2ZDJjYWE4NjE4OWI3MzRiYjQifQ%3D%3D","HTTP_CONTENT_LENGTH":"130","HTTP_CONTENT_TYPE":"application\/x-www-form-urlencoded","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/admin-users\/change-password","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50264","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.10.3","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/admin-users\/change-password?6","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"130","CONTENT_TYPE":"application\/x-www-form-urlencoded","REQUEST_METHOD":"POST","QUERY_STRING":"6","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1538535826.4176,"REQUEST_TIME":1538535826,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '{"_method":"PUT","old_password":"1234qwer","password":"1234qwer","password_confirmation":"1234qwer","6":""}', '2018-10-03 11:03:47', '2018-10-03 11:03:47')
780.440ms

2018-10-03 11:04:04
controller: AlarmController action: getAlarmData
select * from `functionalities` where `id` > 0 and `controller` = 'AlarmController' and `action` = 'getAlarmData'
3.430ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = 34849 order by `sequence` asc
2.800ms
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
9.570ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
10.130ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1539100800 group by `lottery_id`
188.080ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
5.050ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.710ms

2018-10-03 11:04:11
controller: MaintenanceController action: makeIssueListForBet
select * from `functionalities` where `id` > 0 and `controller` = 'MaintenanceController' and `action` = 'makeIssueListForBet'
3.600ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = 34839 order by `sequence` asc
1.920ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.920ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34839, 'Make Issues Cache', 'MaintenanceController', 'makeIssueListForBet', '/maintenances/make-issues-cache', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IlFQY0g4Q0FYTUkzQTM1aUJ3MUhWaFE9PSIsInZhbHVlIjoiQk1xbFl0Z0Z2ekdSVGhJeGRTZkhYWVd1NmVVNjBCc2N6cXhDcFdjNzNTTzdVWEJrTGRpanFvMWg3QnY0dnArcVUyK1ptXC85b1B1XC9ZTVVnMEdOcTM0Zz09IiwibWFjIjoiNWEzMmU5NjA5MzRjNTE2NDA0Yjk2MjBlNTMxNTNiMDM5Yzk5Yzc2MDYxZDVjZjIxNDA4ZWQ2MWQ4ZWUzODYyMCJ9; l_acs_m_session=eyJpdiI6ImpXcmc3VzBnXC9BSnlSMUN3MnJOVDlnPT0iLCJ2YWx1ZSI6IkJPaFRlR2pDMjE1U3hqSTgwR2ZvVG10SlYxWHMxSHBjbHdcL1RyaGMrSCtHVlZETml5d0Nyb0xhK1NlcmxlRW1mbzVWeVo3WGdVWDFPNldvU3hpY0J2dz09IiwibWFjIjoiNzY5MjA3ZGZlODA2NjU5NzkyMWI4MjdiMzZkZDc4MTQ0MGUzOWUzNDhkZTRjNTYzZTE2OWMwNzMxYTllODA5OSJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50276","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.10.3","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/maintenances\/make-issues-cache","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1538535850.6799,"REQUEST_TIME":1538535850,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-03 11:04:11', '2018-10-03 11:04:11')
433.350ms

2018-10-03 11:04:14
controller: UserController action: index
select * from `functionalities` where `id` > 0 and `controller` = 'UserController' and `action` = 'index'
4.140ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = 34708 order by `sequence` asc
3.470ms
select * from `functionalities` where `functionalities`.`id` = 34708 limit 1
2.470ms
select * from `search_configs` where `search_configs`.`id` = '30207' limit 1
2.870ms
select * from `search_items` where `search_config_id` = 30207 order by `sequence` asc
3.980ms
select count(*) as aggregate from `users` where `id` > 0
2.840ms
select * from `users` where `id` > 0 limit 20 offset 0
3.140ms
select * from `accounts` where `accounts`.`user_id` in (1, 3, 4, 17, 20, 21, 22, 23, 24, 25, 26, 27)
3.160ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'users'
6.410ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'users' order by ordinal_position;
6.560ms
select `id`, `name` from `merchants` order by `id` asc
2.930ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 34708 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.330ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('34709', '34711', '34721', '34741', '34668', '34798') and `disabled` = 0 order by `id` asc
3.580ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34711' order by `sequence` asc
2.110ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '34721' order by `sequence` asc
2.060ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.640ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 34708, 'Users', 'UserController', 'index', '/users', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IlFQY0g4Q0FYTUkzQTM1aUJ3MUhWaFE9PSIsInZhbHVlIjoiQk1xbFl0Z0Z2ekdSVGhJeGRTZkhYWVd1NmVVNjBCc2N6cXhDcFdjNzNTTzdVWEJrTGRpanFvMWg3QnY0dnArcVUyK1ptXC85b1B1XC9ZTVVnMEdOcTM0Zz09IiwibWFjIjoiNWEzMmU5NjA5MzRjNTE2NDA0Yjk2MjBlNTMxNTNiMDM5Yzk5Yzc2MDYxZDVjZjIxNDA4ZWQ2MWQ4ZWUzODYyMCJ9; l_acs_m_session=eyJpdiI6ImpXcmc3VzBnXC9BSnlSMUN3MnJOVDlnPT0iLCJ2YWx1ZSI6IkJPaFRlR2pDMjE1U3hqSTgwR2ZvVG10SlYxWHMxSHBjbHdcL1RyaGMrSCtHVlZETml5d0Nyb0xhK1NlcmxlRW1mbzVWeVo3WGdVWDFPNldvU3hpY0J2dz09IiwibWFjIjoiNzY5MjA3ZGZlODA2NjU5NzkyMWI4MjdiMzZkZDc4MTQ0MGUzOWUzNDhkZTRjNTYzZTE2OWMwNzMxYTllODA5OSJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50276","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.10.3","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/users","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1538535853.7371,"REQUEST_TIME":1538535853,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-03 11:04:13', '2018-10-03 11:04:13')
427.980ms

2018-10-03 11:04:17
controller: FunctionalityController action: index
select * from `functionalities` where `id` > 0 and `controller` = 'FunctionalityController' and `action` = 'index'
3.690ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = 2 order by `sequence` asc
3.300ms
select * from `functionalities` where `functionalities`.`id` = 2 limit 1
2.700ms
select * from `search_configs` where `search_configs`.`id` = '1' limit 1
2.290ms
select * from `search_items` where `search_config_id` = 1 order by `sequence` asc
3.430ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
6.770ms
select `controller` from `functionalities` where `id` > 0 and `disabled` =  order by `controller` asc
4.380ms
select count(*) as aggregate from `functionalities` where `id` > 0 and `parent_id` is null
2.120ms
select * from `functionalities` where `id` > 0 and `parent_id` is null order by `sequence` asc limit 20 offset 0
4.280ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities'
6.070ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'functionalities' order by ordinal_position;
6.960ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 2 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
6.500ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('2', '98', '150', '8', '4', '2054', '3', '5', '6', '156', '141', '4176') and `disabled` = 0 order by `id` asc
4.670ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '150' order by `sequence` asc
3.100ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '8' order by `sequence` asc
3.080ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '2054' order by `sequence` asc
3.040ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '3' order by `sequence` asc
2.370ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '5' order by `sequence` asc
2.290ms
select * from `popups` where `popups`.`id` = '1' limit 1
4.360ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.300ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '6' order by `sequence` asc
2.330ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.680ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 2, 'Functionalities', 'FunctionalityController', 'index', '/functionalities', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IkJFOEFnMHMrK3FcLzlsVXFzaHJhZkp3PT0iLCJ2YWx1ZSI6Ink0WlZjbTJvajdFalFsdUQ3Y1NFN29wRkJ0VHQxdU93dDVCMVY3TjZtTnF0bElCZ25STFdYeVpyUkp4eURZeGRBTGdBZmZzVVZcLzI0UkNqbDU0SXhWZz09IiwibWFjIjoiOTRkZDU4OTU5MWI1MzVlNDg5OGZmZjVmYWZhZWI0NGMwMmJlMWRjMTAxOGQ0NDhlNzk4NGFiY2IzOWU5OGMyNyJ9; l_acs_m_session=eyJpdiI6InhHQm9LK0Rwa0N3KzI5OEk3UE5Ec2c9PSIsInZhbHVlIjoibGxQdTZqUUNRSzV3MTQ1b1Qyd2ppSk5cL0xrVkdKNEhmd2hBNFRCMVp5ZEM1cVhGSjlzYUFVNHRNbzRxejlPVmFmTHhYY1JDRUg3cTBoN3R5S0pUbHZ3PT0iLCJtYWMiOiJiNmNkZjQyZWVhZGU4N2Q4NzIxYWY1NjQxNzgyOTg4OGMzN2FlMjNhNmUzYzMxZjRiYTdmNWE1NDA5NjhmMDYyIn0%3D","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50276","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.10.3","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/functionalities","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1538535856.9175,"REQUEST_TIME":1538535856,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-03 11:04:17', '2018-10-03 11:04:17')
376.900ms

2018-10-03 11:04:19
controller: DictionaryController action: index
select * from `functionalities` where `id` > 0 and `controller` = 'DictionaryController' and `action` = 'index'
3.760ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = 1536 order by `sequence` asc
2.900ms
select * from `functionalities` where `functionalities`.`id` = 1536 limit 1
2.400ms
select * from `search_configs` where `search_configs`.`id` = '45' limit 1
2.060ms
select * from `search_items` where `search_config_id` = 45 order by `sequence` asc
3.100ms
select count(*) as aggregate from `dictionaries` where `id` > 0
3.190ms
select * from `dictionaries` where `id` > 0 limit 20 offset 0
70.250ms
select column_name as `column_name` from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries'
7.240ms
select column_name, data_type from information_schema.columns where table_schema = 'lottery' and table_name = 'dictionaries' order by ordinal_position;
6.250ms
select * from `functionality_relations` where `id` > 0 and `functionality_id` = 1536 and `realm` in (0, 1) and `disabled` = 0 and `r_functionality_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 25, 26, 45, 46, 47, 48, 49, 50, 51, 52, 53, 57, 58, 59, 60, 64, 65, 66, 67, 77, 78, 80, 81, 98, 141, 143, 144, 145, 146, 147, 148, 150, 151, 152, 153, 154, 155, 156, 161, 162, 163, 164, 1124, 1511, 1512, 1513, 1514, 1515, 1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1553, 1601, 1702, 1754, 1875, 1877, 1878, 2054, 2213, 4176, 22, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 56, 70, 76, 79, 124, 125, 142, 1317, 1441, 1462, 1691, 1839, 1840, 1841, 1842, 1843, 1876, 1879, 1880, 1881, 1882, 1883, 1885, 1971, 1974, 1976, 2241, 2242, 2243, 2244, 2245, 2246, 2247, 2248, 2249, 2250, 4191, 4452, 4453, 4454, 4455, 4456, 4457, 4458, 4470, 4531, 4532, 4533, 4534, 34560, 34565, 34566, 34568, 34569, 34570, 34571, 34572, 34573, 34574, 34575, 34576, 34577, 34578, 34581, 34583, 34584, 34585, 34586, 34587, 34588, 34589, 34590, 34591, 34592, 34593, 34594, 34596, 34597, 34598, 34604, 34605, 34606, 34607, 34608, 34609, 34610, 34611, 34612, 34613, 34614, 34615, 34616, 34617, 34618, 34619, 34620, 34621, 34622, 34623, 34624, 34625, 34626, 34627, 34628, 34629, 34630, 34631, 34632, 34633, 34634, 34635, 34636, 34637, 34638, 34639, 34640, 34641, 34642, 34643, 34644, 34645, 34646, 34647, 34648, 34649, 34650, 34651, 34652, 34653, 34654, 34657, 34658, 34659, 34660, 34662, 34663, 34666, 34668, 34669, 34670, 34671, 34672, 34673, 34674, 34675, 34676, 34677, 34678, 34679, 34680, 34681, 34682, 34683, 34684, 34685, 34686, 34687, 34688, 34689, 34690, 34691, 34692, 34693, 34694, 34695, 34696, 34697, 34698, 34699, 34700, 34701, 34702, 34703, 34704, 34705, 34708, 34709, 34710, 34711, 34712, 34714, 34715, 34716, 34717, 34718, 34719, 34720, 34721, 34723, 34724, 34725, 34726, 34727, 34728, 34729, 34730, 34731, 34732, 34733, 34734, 34735, 34736, 34738, 34739, 34740, 34741, 34742, 34743, 34744, 34745, 34746, 34747, 34748, 34749, 34750, 34751, 34752, 34753, 34754, 34755, 34756, 34757, 34758, 34759, 34760, 34761, 34762, 34763, 34764, 34765, 34766, 34777, 34778, 34779, 34780, 34781, 34782, 34783, 34784, 34785, 34786, 34787, 34788, 34789, 34790, 34792, 34793, 34794, 34795, 34796, 34797, 34798, 34799, 34800, 34801, 34802, 34803, 34804, 34805, 34806, 34807, 34808, 34809, 34810, 34811, 34812, 34813, 34814, 34815, 34816, 34817, 34818, 34819, 34820, 34821, 34822, 34823, 34824, 34825, 34826, 34827, 34828, 34829, 34830, 34831, 34832, 34833, 34834, 34835, 34836, 34837, 34838, 34839, 34840, 34841, 34842, 34843, 34844, 34845, 34846, 34847, 34848, 34849, 34850, 34851, 34852, 34853, 34854, 34855, 34856, '1908', '1796', '61') order by `sequence` asc
7.230ms
select `id`, `title`, `controller`, `action`, `button_type`, `button_onclick`, `confirm_msg_key`, `popup_id`, `popup_title` from `functionalities` where `id` in ('1541', '1601', '1537', '1538', '1539', '1754', '1540', '1546', '1553') and `disabled` = 0 order by `id` asc
4.010ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '1541' order by `sequence` asc
2.910ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '1538' order by `sequence` asc
1.830ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '1539' order by `sequence` asc
2.180ms
select `label`, `field`, `type`, `required` from `popup_items` where `popup_id` = 1 order by `sequence` asc
3.010ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '1540' order by `sequence` asc
2.140ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '1546' order by `sequence` asc
2.310ms
select `id`, `name`, `type`, `default_value`, `limit_when_null`, `sequence` from `functionality_params` where `functionality_id` = '1553' order by `sequence` asc
1.950ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.700ms
insert into `admin_logs` (`is_admin`, `user_id`, `username`, `functionality_id`, `functionality_title`, `controller`, `action`, `request_uri`, `ip`, `proxy_ip`, `domain`, `env`, `updated_at`, `created_at`) values (1, 6, 'loren', 1536, 'Dictionaries', 'DictionaryController', 'index', '/dictionaries', '127.0.0.1', '127.0.0.1', 'admin.newlott-manage.com', '{"USER":"www-data","HOME":"\/var\/www","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_CONNECTION":"keep-alive","HTTP_COOKIE":"XSRF-TOKEN=eyJpdiI6IkdCNmd4WU1ZSGhFejVwSWc2NkFhVlE9PSIsInZhbHVlIjoicVg4QUhJSVR4cnpFN09QZlhrWW1SVEJoVlNJdlA0cTYzTFhuZStsRlwveEl0bjZnc0phZXY3Sm03UTBxMFRLZTNmSzByTHRXQlp2N2VNOGg2OGs4S0JBPT0iLCJtYWMiOiI1MTM2YjM0MDljOTllNmU3MTA2OTkyOTY1N2MwZmM4OTg2M2QxMzcyNWE2MDA0NWI1YWE2NDdlNDA0ODczMTg5In0%3D; l_acs_m_session=eyJpdiI6IjNYREpOcUhtOXNHWWp6Z0llV3RLRVE9PSIsInZhbHVlIjoiZ1lRSFNGXC9hc0dNZXhEcTUzWHBzY0F5SzRweFJmXC9hSWpnSDZ3NHVYSjBEUlYxNFBRVHFma3owcEVxU0lnbDJYTW8zYlgxY0lJSXdONHZRMmFXS1pIdz09IiwibWFjIjoiNzlmMmZlZTZkZWNhZTYxODZmNDc4ODFmM2Y4MDIyNmY2NThmMDY5OGQwZmI0ZTYxZjMwOWQ4ZDNmNDVjMDlmNiJ9","HTTP_REFERER":"http:\/\/admin.newlott-manage.com\/","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_ACCEPT_LANGUAGE":"zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,*\/*;q=0.8","HTTP_USER_AGENT":"Mozilla\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\/20100101 Firefox\/62.0","HTTP_HOST":"admin.newlott-manage.com","REDIRECT_STATUS":"200","SERVER_NAME":"admin.newlott-manage.com","SERVER_PORT":"80","SERVER_ADDR":"127.0.0.1","REMOTE_PORT":"50276","REMOTE_ADDR":"127.0.0.1","SERVER_SOFTWARE":"nginx\/1.10.3","GATEWAY_INTERFACE":"CGI\/1.1","REQUEST_SCHEME":"http","SERVER_PROTOCOL":"HTTP\/1.1","DOCUMENT_ROOT":"\/var\/www\/html\/NewLott-core\/public","DOCUMENT_URI":"\/index.php","REQUEST_URI":"\/dictionaries","SCRIPT_NAME":"\/index.php","CONTENT_LENGTH":"","CONTENT_TYPE":"","REQUEST_METHOD":"GET","QUERY_STRING":"","SCRIPT_FILENAME":"\/var\/www\/html\/NewLott-core\/public\/index.php","PATH_INFO":"","FCGI_ROLE":"RESPONDER","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1538535859.012,"REQUEST_TIME":1538535859,"APP_NAME":"CSS","APP_ENV":"local","APP_KEY":"base64:ht6vQ1wqLRkeV38NTmrPL+TxJKobE9wzpPlSBd8ULDw=","APP_DEBUG":"true","APP_LOG_LEVEL":"debug","APP_URL":"http:\/\/localhost","DB_CONNECTION":"mysql","DB_HOST":"172.16.100.161","DB_PORT":"4000","DB_DATABASE":"lottery","DB_USERNAME":"newlott","DB_PASSWORD":"123456","BROADCAST_DRIVER":"log","CACHE_DRIVER":"redis","SESSION_DRIVER":"redis","QUEUE_DRIVER":"beanstalkd","REDIS_HOST":"127.0.0.1","REDIS_PASSWORD":"null","REDIS_PORT":"6379","MAIL_DRIVER":"smtp","MAIL_HOST":"smtp.mailtrap.io","MAIL_PORT":"2525","MAIL_USERNAME":"null","MAIL_PASSWORD":"null","MAIL_ENCRYPTION":"null","PUSHER_APP_ID":"","PUSHER_APP_KEY":"","PUSHER_APP_SECRET":"","STATIC_RES_URL":"http:\/\/static.acoin-manage.com"}', '2018-10-03 11:04:19', '2018-10-03 11:04:19')
566.470ms

2018-10-03 11:05:04
controller: AlarmController action: getAlarmData
select * from `alarms` where `id` > 0 and `is_closed` = '0' order by `sequence` asc
3.160ms
select count(*) as aggregate from `risk_projects` where `id` > 0 and `status` = 0
2.840ms
select `lottery_id` from `issues` where `id` > 0 and `status` = 1 and `begin_time` > 1539100800 group by `lottery_id`
193.760ms
select `id`, `name` from `lotteries` where (`status` = 3) order by `id` asc
3.490ms
select * from `admin_users` where `admin_users`.`id` = 6 limit 1
2.410ms

