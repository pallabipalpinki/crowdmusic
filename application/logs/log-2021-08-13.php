<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-08-13 05:04:28 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 05:04:28 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 05:04:29 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 05:05:26 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 05:05:26 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 05:05:38 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 05:05:38 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 05:05:52 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 05:05:52 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 05:05:52 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 05:06:06 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 05:06:06 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 05:06:41 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 05:06:41 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 05:06:41 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 05:16:20 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 05:16:20 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 05:16:20 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 05:16:20 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 05:16:22 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 05:16:22 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 05:16:22 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 05:43:44 --> Query error: Unknown column 'content_data.role_name' in 'field list' - Invalid query: SELECT `users`.*, `content_data`.`role_name`
FROM `users`
LEFT JOIN `content_data` ON `content_user_id`=`users`.`id`
WHERE `content_user_type` = '2'
ORDER BY `id` ASC
ERROR - 2021-08-13 05:43:44 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\crowdmusic\application\models\User_model.php 216
ERROR - 2021-08-13 05:44:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LEFT JOIN `content_data` ON `content_user_id`=`users`.`id`
WHERE `content_use...' at line 2 - Invalid query: SELECT `users`.*, `content_data`.`role_name`
LEFT JOIN `content_data` ON `content_user_id`=`users`.`id`
WHERE `content_user_type` = '2'
ORDER BY `id` ASC
ERROR - 2021-08-13 05:45:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LEFT JOIN `content_data` ON `content_user_id`=`users`.`id`
WHERE `content_use...' at line 2 - Invalid query: SELECT `users`.*, `content_data`.*
LEFT JOIN `content_data` ON `content_user_id`=`users`.`id`
WHERE `content_user_type` = '2'
ORDER BY `id` ASC
ERROR - 2021-08-13 05:45:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LEFT JOIN `content_data` ON `content_data`.`content_user_id`=`users`.`id`
WHE...' at line 2 - Invalid query: SELECT `users`.*, `content_data`.*
LEFT JOIN `content_data` ON `content_data`.`content_user_id`=`users`.`id`
WHERE `content_user_type` = '2'
ORDER BY `id` ASC
ERROR - 2021-08-13 05:46:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LEFT JOIN `content_data` ON `content_data`.`content_user_id`=`users`.`id`
WHE...' at line 2 - Invalid query: SELECT `users`.*, `content_data`.*
LEFT JOIN `content_data` ON `content_data`.`content_user_id`=`users`.`id`
WHERE `content_user_type` = 2
ORDER BY `id` ASC
ERROR - 2021-08-13 05:47:50 --> Query error: Unknown column 'content_data' in 'from clause' - Invalid query: SELECT `users`.*, `content_data`.*
FROM `users`
JOIN `content_data` USING (`content_data`)
WHERE `content_user_type` = 2
ORDER BY `id` ASC
ERROR - 2021-08-13 06:30:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LEFT JOIN `content_data` ON `content_user_id`=`users`.`id`
WHERE `content_use...' at line 2 - Invalid query: SELECT `users`.*, `content_data`.*
LEFT JOIN `content_data` ON `content_user_id`=`users`.`id`
WHERE `content_user_type` = 2
ORDER BY `id` ASC
ERROR - 2021-08-13 06:31:06 --> Query error: Not unique table/alias: 'content_data' - Invalid query: SELECT `users`.*, `content_data`.*
FROM (`users`, `content_data`)
LEFT JOIN `content_data` ON `content_user_id`=`users`.`id`
WHERE `content_user_type` = 2
ORDER BY `id` ASC
ERROR - 2021-08-13 06:32:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LEFT JOIN `content_data` ON `content_data`.`content_user_id`=`users`.`id`
WHE...' at line 2 - Invalid query: SELECT `users`.*, `content_data`.*
LEFT JOIN `content_data` ON `content_data`.`content_user_id`=`users`.`id`
WHERE `content_user_type` = 2
ORDER BY `id` ASC
ERROR - 2021-08-13 06:34:27 --> Severity: error --> Exception: syntax error, unexpected variable "$this" C:\xampp\htdocs\crowdmusic\application\models\User_model.php 205
ERROR - 2021-08-13 06:35:38 --> Severity: error --> Exception: explode(): Argument #2 ($string) must be of type string, array given C:\xampp\htdocs\crowdmusic\system\database\DB_query_builder.php 1232
ERROR - 2021-08-13 06:36:55 --> Severity: error --> Exception: explode(): Argument #2 ($string) must be of type string, array given C:\xampp\htdocs\crowdmusic\system\database\DB_query_builder.php 1232
ERROR - 2021-08-13 06:37:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'INNER JOIN `content_data` ON `content_data`.`content_user_id`=`users`.`id`
WH...' at line 2 - Invalid query: SELECT `users`.*, `content_data`.*
INNER JOIN `content_data` ON `content_data`.`content_user_id`=`users`.`id`
WHERE `content_data`.`content_user_type` = 2
ERROR - 2021-08-13 06:39:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LEFT JOIN `content_data` ON `content_data`.`content_user_id`=`users`.`id`
WHE...' at line 2 - Invalid query: SELECT `users`.*, `content_data`.*
LEFT JOIN `content_data` ON `content_data`.`content_user_id`=`users`.`id`
WHERE `content_data`.`content_user_type` = 2
ERROR - 2021-08-13 06:40:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LEFT JOIN `content_data` ON `content_data`.`content_user_id`=`users`.`id`
WHE...' at line 2 - Invalid query: SELECT `users`.*, `content_data`.*
LEFT JOIN `content_data` ON `content_data`.`content_user_id`=`users`.`id`
WHERE `users`.`user_role` = 2
ERROR - 2021-08-13 06:44:33 --> Query error: Unknown column 'content_data.id' in 'order clause' - Invalid query: SELECT `users`.*, `content_data`.*
FROM `users`
LEFT JOIN `content_data` ON `content_user_id`=`users`.`id`
WHERE `users`.`user_role` = 2
ORDER BY `content_data`.`id` ASC
ERROR - 2021-08-13 06:44:33 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\crowdmusic\application\models\User_model.php 217
ERROR - 2021-08-13 06:53:54 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 06:53:54 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 06:55:31 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 06:56:40 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 06:57:06 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 07:13:49 --> Severity: error --> Exception: Cannot use object of type stdClass as array C:\xampp\htdocs\crowdmusic\application\views\user\modules\profile\contributorshow.php 100
ERROR - 2021-08-13 07:13:49 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:13:49 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:14:19 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 07:14:19 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:14:19 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:14:19 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 07:23:40 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 07:23:40 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:23:40 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:23:40 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 07:25:06 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 07:25:06 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:25:06 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:25:06 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 07:45:38 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:45:38 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 07:45:38 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:49:53 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 07:49:53 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:49:54 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:51:23 --> Query error: Not unique table/alias: 'content_data' - Invalid query: SELECT `users`.*, `content_data`.*
FROM `content_data`
LEFT JOIN `content_data` ON `content_user_id`=`users`.`id`
WHERE `users`.`user_role` = 2
ORDER BY `content_data`.`content_id` ASC
ERROR - 2021-08-13 07:51:23 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\crowdmusic\application\models\User_model.php 240
ERROR - 2021-08-13 07:54:55 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 07:54:55 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:54:55 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:54:55 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 07:57:27 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 07:57:27 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:57:27 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:57:27 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 07:57:58 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:57:58 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 07:57:58 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:58:16 --> Severity: error --> Exception: Object of class stdClass could not be converted to string C:\xampp\htdocs\crowdmusic\application\views\user\modules\profile\contributorshow.php 136
ERROR - 2021-08-13 07:58:16 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:58:16 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:59:05 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:59:05 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:59:34 --> Severity: error --> Exception: Cannot use object of type stdClass as array C:\xampp\htdocs\crowdmusic\application\views\user\modules\profile\contributorshow.php 137
ERROR - 2021-08-13 07:59:34 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 07:59:34 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 08:00:05 --> Severity: error --> Exception: Object of class stdClass could not be converted to string C:\xampp\htdocs\crowdmusic\application\views\user\modules\profile\contributorshow.php 137
ERROR - 2021-08-13 08:00:05 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 08:00:05 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 08:00:07 --> Severity: error --> Exception: Object of class stdClass could not be converted to string C:\xampp\htdocs\crowdmusic\application\views\user\modules\profile\contributorshow.php 137
ERROR - 2021-08-13 08:00:07 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 08:01:26 --> Severity: error --> Exception: Object of class stdClass could not be converted to string C:\xampp\htdocs\crowdmusic\application\views\user\modules\profile\contributorshow.php 137
ERROR - 2021-08-13 08:01:26 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 08:01:51 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 08:01:51 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 08:02:13 --> Severity: error --> Exception: Cannot use object of type stdClass as array C:\xampp\htdocs\crowdmusic\application\views\user\modules\profile\contributorshow.php 137
ERROR - 2021-08-13 08:02:13 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 08:02:40 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 08:02:40 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 08:02:40 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 08:03:24 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 08:03:24 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 08:03:24 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 08:03:41 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 08:03:41 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 08:03:41 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 08:03:45 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 08:03:46 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 08:03:46 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 08:04:36 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 08:04:36 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 08:04:36 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 08:04:37 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 08:05:07 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 08:05:07 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 08:05:07 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 08:07:14 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 08:07:14 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 08:07:14 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 08:10:30 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 08:10:30 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 08:10:30 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 08:13:06 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 08:13:06 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 08:13:06 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 09:24:31 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 09:24:31 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 09:24:31 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 09:42:35 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 09:42:35 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 09:42:35 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 09:42:35 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 09:47:55 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 09:47:55 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 09:47:55 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 09:49:14 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 09:49:14 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 09:49:14 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 09:49:18 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 09:49:18 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 09:49:18 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 09:49:22 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 09:49:22 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 09:49:31 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 09:49:32 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 09:49:32 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 09:53:42 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 09:53:42 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 09:55:19 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 09:55:21 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 09:55:28 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 09:55:31 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:08:47 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:08:47 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 10:08:47 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:09:30 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:09:30 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 10:09:30 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:09:34 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:11:23 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:11:23 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:30:33 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:30:33 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 10:30:33 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:32:06 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:32:06 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:32:59 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:32:59 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:34:48 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:35:00 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 10:35:22 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:35:22 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 10:35:50 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:35:55 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:35:57 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 10:36:00 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:37:38 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:37:38 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 10:37:40 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:39:02 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 10:39:02 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:39:03 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:41:40 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:41:40 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:41:54 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:41:54 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:42:18 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 10:42:18 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:42:18 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:43:44 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:43:44 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:44:19 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:44:19 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:44:22 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:44:22 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:44:36 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:44:36 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:45:39 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:45:39 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:46:26 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 10:46:41 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:46:43 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:52:27 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:52:27 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 10:58:22 --> Severity: error --> Exception: Unclosed '{' on line 50 C:\xampp\htdocs\crowdmusic\application\views\user\modules\profile\contributorshow.php 65
ERROR - 2021-08-13 10:58:22 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 10:59:03 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 10:59:04 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:00:55 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:00:55 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:00:55 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:01:18 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:01:19 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:01:32 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:01:32 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:01:32 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:01:35 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:01:35 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:02:43 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:02:44 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:04:26 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:04:27 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:08:02 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:08:02 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:08:03 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:10:50 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:10:50 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:10:50 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:13:06 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:13:06 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:13:07 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:14:08 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:14:08 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:14:11 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:14:11 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:14:12 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:15:04 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:15:04 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:15:04 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:16:03 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:16:03 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:16:41 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:16:41 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:22:00 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:22:00 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:22:15 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:22:15 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:28:25 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:28:25 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:28:25 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:30:24 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:30:24 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:30:25 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:30:54 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:30:54 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:30:54 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:30:55 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:30:55 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:31:42 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:31:42 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:31:42 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:31:43 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:31:43 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:31:46 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:31:46 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:31:46 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:32:39 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:32:40 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:32:40 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:32:40 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:32:40 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:33:50 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:33:50 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:33:50 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:33:51 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:33:51 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:35:21 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:35:22 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:35:22 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:35:22 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:37:16 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:37:16 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:37:17 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:39:01 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:39:01 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:39:01 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:39:02 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:40:54 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:40:54 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:40:54 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:41:18 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:41:19 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:41:57 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:41:57 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:41:58 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:45:15 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 11:45:15 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 11:45:16 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 12:02:27 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 12:02:27 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 12:18:16 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 12:18:16 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 12:18:17 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 12:18:22 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 12:18:22 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 12:18:23 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 12:38:55 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 12:38:55 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 12:38:55 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 12:38:58 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 12:38:58 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 12:40:11 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 12:40:11 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 12:40:11 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 13:21:46 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 13:21:46 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 13:21:46 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 13:22:12 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 13:22:12 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 13:22:12 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 13:22:50 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 13:22:50 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 13:22:50 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 13:24:06 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 13:24:06 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 13:24:06 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 13:24:45 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 13:24:45 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 13:25:22 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-13 13:25:22 --> 404 Page Not Found: Assets/images
