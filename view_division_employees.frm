TYPE=VIEW
query=select `e`.`employee_id` AS `employee_id`,`e`.`name` AS `name`,`e`.`email` AS `email`,`d`.`division_name` AS `division_name`,`d`.`budget` AS `budget` from (`se_nerissatobing`.`employees` `e` join `se_nerissatobing`.`divisions` `d` on(`e`.`division_id` = `d`.`division_id`))
md5=988a4b91dfa5129694a1a4ecc045c9cc
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=0001740476421686783
create-version=2
source=SELECT e.employee_id, e.name, e.email, d.division_name, d.budget\nFROM employees e\nJOIN divisions d ON e.division_id = d.division_id
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `e`.`employee_id` AS `employee_id`,`e`.`name` AS `name`,`e`.`email` AS `email`,`d`.`division_name` AS `division_name`,`d`.`budget` AS `budget` from (`se_nerissatobing`.`employees` `e` join `se_nerissatobing`.`divisions` `d` on(`e`.`division_id` = `d`.`division_id`))
mariadb-version=100432
