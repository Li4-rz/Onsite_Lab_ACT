CREATE TABLE employees (
    employee_id INT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    gender VARCHAR(10),
    age INT,
    position VARCHAR(50),
    team VARCHAR(10),
    specialty VARCHAR(50),
    start_date DATE
);

-- Insert 50 employees
INSERT INTO employees (employee_id, first_name, last_name, gender, age, position, team, specialty, start_date)
VALUES
(1, 'John', 'Doe', 'Male', 35, 'Senior Developer', 'A', 'Front-end', '2015-06-01'),
(2, 'Jane', 'Smith', 'Female', 28, 'Junior Developer', 'B', 'Back-end', '2019-09-15'),
(3, 'Mark', 'Johnson', 'Male', 22, 'Intern', 'C', 'Database', '2023-01-10'),
(4, 'Anna', 'Williams', 'Female', 30, 'Senior Developer', 'A', 'DevOps', '2016-03-12'),
(5, 'David', 'Brown', 'Male', 40, 'Senior Developer', 'D', 'Cloud', '2013-10-22'),
(6, 'Emily', 'Davis', 'Female', 26, 'Junior Developer', 'A', 'Front-end', '2021-04-19'),
(7, 'Michael', 'Miller', 'Male', 45, 'Senior Developer', 'C', 'Security', '2010-01-03'),
(8, 'Sarah', 'Wilson', 'Female', 32, 'Senior Developer', 'B', 'Back-end', '2017-07-30'),
(9, 'Chris', 'Moore', 'Male', 27, 'Junior Developer', 'D', 'Mobile', '2020-08-11'),
(10, 'Jessica', 'Taylor', 'Female', 24, 'Junior Developer', 'C', 'Database', '2022-02-14'),
(11, 'Robert', 'Anderson', 'Male', 33, 'Senior Developer', 'A', 'Front-end', '2016-05-18'),
(12, 'Olivia', 'Thomas', 'Female', 29, 'Junior Developer', 'B', 'Back-end', '2019-11-22'),
(13, 'Daniel', 'Jackson', 'Male', 38, 'Senior Developer', 'C', 'DevOps', '2014-12-03'),
(14, 'Sophia', 'White', 'Female', 25, 'Junior Developer', 'D', 'Cloud', '2020-09-10'),
(15, 'James', 'Harris', 'Male', 50, 'Senior Developer', 'A', 'Security', '2008-04-07'),
(16, 'Isabella', 'Martin', 'Female', 31, 'Senior Developer', 'B', 'Front-end', '2017-02-27'),
(17, 'Matthew', 'Thompson', 'Male', 26, 'Junior Developer', 'C', 'Mobile', '2021-06-14'),
(18, 'Mia', 'Garcia', 'Female', 28, 'Junior Developer', 'D', 'Database', '2020-01-20'),
(19, 'Ethan', 'Martinez', 'Male', 35, 'Senior Developer', 'A', 'Back-end', '2015-09-08'),
(20, 'Ava', 'Robinson', 'Female', 33, 'Senior Developer', 'B', 'Cloud', '2018-03-05'),
(21, 'Liam', 'Clark', 'Male', 30, 'Junior Developer', 'C', 'Security', '2019-12-25'),
(22, 'Amelia', 'Rodriguez', 'Female', 27, 'Junior Developer', 'D', 'Front-end', '2021-10-16'),
(23, 'Noah', 'Lewis', 'Male', 34, 'Senior Developer', 'A', 'Mobile', '2016-07-22'),
(24, 'Harper', 'Lee', 'Female', 29, 'Junior Developer', 'B', 'DevOps', '2020-11-01'),
(25, 'Lucas', 'Walker', 'Male', 25, 'Intern', 'C', 'Back-end', '2023-05-05'),
(26, 'Ella', 'Hall', 'Female', 26, 'Junior Developer', 'D', 'Cloud', '2022-04-19'),
(27, 'William', 'Young', 'Male', 32, 'Senior Developer', 'A', 'Security', '2017-08-11'),
(28, 'Charlotte', 'King', 'Female', 27, 'Junior Developer', 'B', 'Front-end', '2020-06-28'),
(29, 'Henry', 'Scott', 'Male', 37, 'Senior Developer', 'C', 'DevOps', '2014-09-15'),
(30, 'Abigail', 'Green', 'Female', 30, 'Senior Developer', 'D', 'Mobile', '2019-03-21'),
(31, 'Sebastian', 'Adams', 'Male', 28, 'Junior Developer', 'A', 'Back-end', '2020-08-13'),
(32, 'Avery', 'Baker', 'Female', 34, 'Senior Developer', 'B', 'Cloud', '2018-05-29'),
(33, 'Jack', 'Gonzalez', 'Male', 31, 'Junior Developer', 'C', 'Security', '2019-11-17'),
(34, 'Lily', 'Nelson', 'Female', 23, 'Intern', 'D', 'Front-end', '2023-01-25'),
(35, 'Alexander', 'Carter', 'Male', 35, 'Senior Developer', 'A', 'Mobile', '2015-11-02'),
(36, 'Hannah', 'Mitchell', 'Female', 29, 'Junior Developer', 'B', 'DevOps', '2021-02-12'),
(37, 'Mason', 'Perez', 'Male', 33, 'Senior Developer', 'C', 'Back-end', '2017-06-06'),
(38, 'Grace', 'Roberts', 'Female', 28, 'Junior Developer', 'D', 'Cloud', '2020-12-14'),
(39, 'Logan', 'Turner', 'Male', 30, 'Senior Developer', 'A', 'Security', '2016-04-30'),
(40, 'Chloe', 'Phillips', 'Female', 32, 'Junior Developer', 'B', 'Front-end', '2019-05-20'),
(41, 'Benjamin', 'Campbell', 'Male', 27, 'Junior Developer', 'C', 'DevOps', '2022-03-07'),
(42, 'Ella', 'Parker', 'Female', 24, 'Intern', 'D', 'Back-end', '2023-06-15'),
(43, 'Michael', 'Evans', 'Male', 36, 'Senior Developer', 'A', 'Cloud', '2015-01-27'),
(44, 'Sofia', 'Edwards', 'Female', 25, 'Junior Developer', 'B', 'Security', '2020-09-18'),
(45, 'Oliver', 'Collins', 'Male', 28, 'Junior Developer', 'C', 'Mobile', '2021-07-03'),
(46, 'Luna', 'Stewart', 'Female', 31, 'Senior Developer', 'D', 'Database', '2017-10-21'),
(47, 'Jackson', 'Sanchez', 'Male', 34, 'Senior Developer', 'A', 'DevOps', '2014-02-13'),
(48, 'Scarlett', 'Morris', 'Female', 29, 'Junior Developer', 'B', 'Cloud', '2020-12-08'),
(49, 'Aiden', 'Rogers', 'Male', 22, 'Intern', 'C', 'Security', '2023-09-14'),
(50, 'Zoe', 'Reed', 'Female', 23, 'Intern', 'D', 'Front-end', '2023-08-10');