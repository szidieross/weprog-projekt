DROP DATABASE IF EXISTS rendelo;

CREATE DATABASE IF NOT EXISTS rendelo;

USE rendelo;

DROP TABLE IF EXISTS users;

CREATE TABLE users(
    `user_id` int(10) NOT NULL AUTO_INCREMENT,
    `first_name` varchar(100) NOT NULL,
    `last_name` varchar(100) NOT NULL,
    `username` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `password` varchar(100) NOT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`user_id`)
);

INSERT INTO users (
    `first_name`,
    `last_name`,
    `username`,
    `email`,
    `password`
)
VALUES
    ('Anna', 'Kis', 'kisanna', 'kis.anna@gmail.com', '123456789'),
    ('Adrienn', 'Nagy', 'nagyadri', 'nagy.adri@gmail.com', '123456789'),
    ('Hanna', 'Kiss', 'kisshanna', 'kiss.hanna@gmail.com', '123456789'),
    ('Imola', 'Ferencz', 'imolaferencz', 'imolaferencz@gmail.com', '123456789'),
    ('Hajnalka', 'Erdely', 'erdelyhajni', 'erdelyhajni@gmail.com', '123456789'),
    ('Mate', 'Nagy', 'nagymate', 'nagymate@gmail.com', '123456789'),
    ('Tamas', 'Ballo', 'ballotamas', 'ballotamas@gmail.com', '123456789');

DROP TABLE IF EXISTS appointments;

CREATE TABLE appointments(
    `appointment_id` int(10) NOT NULL AUTO_INCREMENT,
    `user_id` int(10),
    `date` date NOT NULL,
    `time` time NOT NULL,
    `taken` boolean NOT NULL,
    PRIMARY KEY (`appointment_id`),
    FOREIGN KEY (`user_id`) REFERENCES users(`user_id`)
);

INSERT INTO appointments (`date`, `time`, `taken`)
VALUES
    ('2023-02-06', '08:00:00', false),
    ('2023-02-06', '09:00:00', false),
    ('2023-02-06', '10:00:00', false),
    ('2023-02-06', '11:00:00', false),
    ('2023-02-06', '12:00:00', false),
    ('2023-02-06', '13:00:00', false),
    ('2023-02-06', '14:00:00', false),
    ('2023-02-06', '15:00:00', false),
    ('2023-02-06', '16:00:00', false),
    ('2023-02-06', '17:00:00', false),
    ('2023-02-07', '08:00:00', false),
    ('2023-02-07', '09:00:00', false),
    ('2023-02-07', '10:00:00', false),
    ('2023-02-07', '11:00:00', false),
    ('2023-02-07', '12:00:00', false),
    ('2023-02-07', '13:00:00', false),
    ('2023-02-07', '14:00:00', false),
    ('2023-02-07', '15:00:00', false),
    ('2023-02-07', '16:00:00', false),
    ('2023-02-07', '17:00:00', false),
    ('2023-02-07', '08:00:00', false),
    ('2023-02-08', '09:00:00', false),
    ('2023-02-08', '10:00:00', false),
    ('2023-02-08', '11:00:00', false),
    ('2023-02-08', '12:00:00', false),
    ('2023-02-08', '13:00:00', false),
    ('2023-02-08', '14:00:00', false),
    ('2023-02-08', '15:00:00', false),
    ('2023-02-08', '16:00:00', false),
    ('2023-02-08', '17:00:00', false);

UPDATE appointments SET user_id = 1, taken = true WHERE appointment_id IN (1, 2, 3, 4, 5);










<!-- <?php

?>




DROP DATABASE IF EXISTS rendelo;

CREATE DATABASE IF NOT EXISTS rendelo;

DROP TABLE IF EXISTS users;

CREATE TABLE users(
    `user_id` int(10) NOT NULL AUTO_INCREMENT,
    `first_name` varchar(100) NOT NULL,
    `last_name` varchar(100) NOT NULL,
    `username` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `password` varchar(100) NOT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`user_id`)
);

INSERT INTO
    users(
        `first_name`,
        `last_name`,
        `username`,
        `email`,
        `password`
    )
VALUES
    (
        'Anna',
        'Kis',
        'kisanna',
        'kis.anna@gmail.com',
        '123456789'
    ),
    (
        'Adrienn',
        'Nagy',
        'nagyadri',
        'nagy.adri@gmail.com',
        '123456789'
    ),
    (
        'Hanna',
        'Kiss',
        'kisshanna',
        'kiss.hanna@gmail.com',
        '123456789'
    ),
    (
        'Imola',
        'Ferencz',
        'imolaferencz',
        'imolaferencz@gmail.com',
        '123456789'
    ),
    (
        'Hajnalka',
        'Erdely',
        'erdelyhajni',
        'erdelyhajni@gmail.com',
        '123456789'
    ),
    (
        'Mate',
        'Nagy',
        'nagymate',
        'nagymate@gmail.com',
        '123456789'
    ),
    (
        'Tamas',
        'Ballo',
        'ballotamas',
        'ballotamas@gmail.com',
        '123456789'
    );

DROP TABLE IF EXISTS appointments;

CREATE TABLE appointments(
    `appointment_id` int(10) NOT NULL AUTO_INCREMENT,
    `user_id` int(10),
    `date` date NOT NULL,
    `time` time NOT NULL,
    `taken` boolean NOT NULL,
    PRIMARY KEY (`appointment_id`),
    FOREIGN KEY (`user_id`) REFERENCES users(user_id),
    FOREIGN KEY (`doctor_id`) REFERENCES doctors(doctor_id)
);

INSERT INTO
    appointments(`date`, `time`, `taken`)
VALUES
    ('2023-02-06', '08:00:00', false),
    ('2023-02-06', '09:00:00', false),
    ('2023-02-06', '10:00:00', false),
    ('2023-02-06', '11:00:00', false),
    ('2023-02-06', '12:00:00', false),
    ('2023-02-06', '13:00:00', false),
    ('2023-02-06', '14:00:00', false),
    ('2023-02-06', '15:00:00', false),
    ('2023-02-06', '16:00:00', false),
    ('2023-02-06', '17:00:00', false),
    ('2023-02-07', '08:00:00', false),
    ('2023-02-07', '09:00:00', false),
    ('2023-02-07', '10:00:00', false),
    ('2023-02-07', '11:00:00', false),
    ('2023-02-07', '12:00:00', false),
    ('2023-02-07', '13:00:00', false),
    ('2023-02-07', '14:00:00', false),
    ('2023-02-07', '15:00:00', false),
    ('2023-02-07', '16:00:00', false),
    ('2023-02-07', '17:00:00', false),
    ('2023-02-07', '08:00:00', false),
    ('2023-02-08', '09:00:00', false),
    ('2023-02-08', '10:00:00', false),
    ('2023-02-08', '11:00:00', false),
    ('2023-02-08', '12:00:00', false),
    ('2023-02-08', '13:00:00', false),
    ('2023-02-08', '14:00:00', false),
    ('2023-02-08', '15:00:00', false),
    ('2023-02-08', '16:00:00', false),
    ('2023-02-08', '17:00:00', false);

UPDATE
    appointments
SET
    user_id = 1,
    taken = true
WHERE
    appointment_id = 1;

UPDATE
    appointments
SET
    user_id = 1,
    taken = true
WHERE
    appointment_id = 2;

UPDATE
    appointments
SET
    user_id = 1,
    taken = true
WHERE
    appointment_id = 3;

UPDATE
    appointments
SET
    user_id = 1,
    taken = true
WHERE
    appointment_id = 4;

UPDATE
    appointments
SET
    user_id = 1,
    taken = true
WHERE
    appointment_id = 5;

-- DROP TABLE IF EXISTS doctors;

-- CREATE TABLE doctors(
--     `doctor_id` int(10) NOT NULL AUTO_INCREMENT,
--     `d_first_name` varchar(100) NOT NULL,
--     `d_last_name` varchar(100) NOT NULL,
--     `d_username` varchar(100) NOT NULL,
--     `d_email` varchar(100) NOT NULL,
--     `d_password` varchar(100) NOT NULL,
--     `specialization` varchar(100) NOT NULL,
--     PRIMARY KEY (`doctor_id`)
-- );

-- INSERT INTO
--     doctors(
--         `d_first_name`,
--         `d_last_name`,
--         `d_username`,
--         `d_email`,
--         `d_password`,
--         `specialization`
--     )
-- VALUES
--     (
--         'Kinga',
--         'Imre',
--         'imrekinga',
--         'imrekinga@gmail.com',
--         '123456789',
--         'kardiológus'
--     ),
--     (
--         'András',
--         'Német',
--         'nemetandras',
--         'nemetandras@gmail.com',
--         '123456789',
--         'általános orvos'
--     );

-- INSERT INTO
--     doctors(
--         `d_first_name`,
--         `d_last_name`,
--         `d_username`,
--         `d_email`,
--         `d_password`,
--         `specialization`
--     )
-- VALUES
--     (
--         'Istvan',
--         'Benedek',
--         'benedekistvan',
--         'benedekistvan@gmail.com',
--         '123456789',
--         'urulógus'
--     ); -->