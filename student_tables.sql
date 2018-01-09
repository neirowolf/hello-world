CREATE TABLE `students`
(
	`id_students` INTEGER AUTO_INCREMENT PRIMARY KEY,
	`birth_date` TIMESTAMP,
	`is_in_educate`	BOOLEAN,
	`average_score`	FLOAT
);

CREATE TABLE `students_lang`
(
	`id_students` INTEGER NOT NULL PRIMARY KEY,
	`id_lang` INT NOT NULL,
	`name` VARCHAR(255)
);
