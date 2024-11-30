CREATE TABLE nurse_applications (
	id INT AUTO_INCREMENT PRIMARY KEY,
	last_name VARCHAR(255),
	first_name VARCHAR(255),
	email VARCHAR(255),
	gender VARCHAR(255),
	address VARCHAR(255),
	nationality VARCHAR(255),
	date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE nurse_applications
ADD COLUMN added_by VARCHAR(255),
ADD COLUMN last_updated_by VARCHAR(255),
ADD COLUMN last_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;


INSERT INTO nurse_applications (last_name, first_name, email, gender, address, nationality)
VALUES
('Smith', 'John', 'john.smith@example.com', 'Male', '123 Elm St, Springfield', 'American'),
('Doe', 'Jane', 'jane.doe@example.com', 'Female', '456 Maple Ave, Riverside', 'Canadian'),
('Brown', 'Michael', 'michael.brown@example.com', 'Male', '789 Oak Blvd, Greenfield', 'British'),
('Johnson', 'Emily', 'emily.johnson@example.com', 'Female', '321 Pine Lane, Fairview', 'Australian'),
('Williams', 'Emma', 'emma.williams@example.com', 'Female', '654 Cedar St, Hilltop', 'Irish'),
('Jones', 'Chris', 'chris.jones@example.com', 'Male', '789 Birch Rd, Brookside', 'New Zealander'),
('Taylor', 'Sophia', 'sophia.taylor@example.com', 'Female', '951 Spruce Dr, Sunnyside', 'South African'),
('Lee', 'James', 'james.lee@example.com', 'Male', '159 Fir Ave, Lakeview', 'Singaporean'),
('Harris', 'Olivia', 'olivia.harris@example.com', 'Female', '753 Palm Blvd, Oceanside', 'American'),
('Clark', 'Ethan', 'ethan.clark@example.com', 'Male', '852 Redwood Ln, Mountainview', 'Canadian'),
('Lewis', 'Ava', 'ava.lewis@example.com', 'Female', '246 Cypress Way, Valleyfield', 'Australian'),
('Walker', 'Liam', 'liam.walker@example.com', 'Male', '369 Willow Ave, Meadowlands', 'British'),
('Allen', 'Isabella', 'isabella.allen@example.com', 'Female', '741 Aspen St, Woodland', 'Irish'),
('Scott', 'Mason', 'mason.scott@example.com', 'Male', '159 Cherry Rd, Seaview', 'South African'),
('Young', 'Mia', 'mia.young@example.com', 'Female', '357 Pinecone Ln, Lakeshore', 'New Zealander'),
('King', 'Benjamin', 'benjamin.king@example.com', 'Male', '753 Maplewood Blvd, Rivertown', 'American'),
('Hill', 'Charlotte', 'charlotte.hill@example.com', 'Female', '852 Elmwood Dr, Foresthill', 'British'),
('Green', 'Lucas', 'lucas.green@example.com', 'Male', '951 Birchview Ave, Summerland', 'Australian'),
('Adams', 'Amelia', 'amelia.adams@example.com', 'Female', '123 Sprucemont Rd, Riverbend', 'Canadian'),
('Nelson', 'Henry', 'henry.nelson@example.com', 'Male', '456 Firwood Ln, Sunsetview', 'Irish'),
('Carter', 'Ella', 'ella.carter@example.com', 'Female', '789 Redwood Ct, Cliffside', 'South African'),
('Mitchell', 'Jack', 'jack.mitchell@example.com', 'Male', '321 Palmview St, Bluewater', 'Singaporean'),
('Perez', 'Chloe', 'chloe.perez@example.com', 'Female', '654 Willow Ct, Highland', 'New Zealander'),
('Roberts', 'Samuel', 'samuel.roberts@example.com', 'Male', '753 Aspen Rd, Hillview', 'American'),
('Turner', 'Grace', 'grace.turner@example.com', 'Female', '852 Pinewood Dr, Bayside', 'British');
