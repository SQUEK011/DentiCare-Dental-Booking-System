CREATE TABLE IF NOT EXISTS user_accounts(
    user_name VARCHAR(30) primary key,
    pass_word VARCHAR(30),
    admin_rights VARCHAR(3)
);

CREATE TABLE IF NOT EXISTS user_profile(
    user_name VARCHAR(30),
    full_name VARCHAR(30),
    nric VARCHAR(8),
    nationality VARCHAR(10),
    D_O_B date,
    gender VARCHAR(10),
    occupation VARCHAR(20),
    mobile_no VARCHAR(8),
    email VARCHAR(50),
    address_1 VARCHAR(50),
    address_2 VARCHAR(50),
    postal_code VARCHAR(6),
    emergency_contact_name VARCHAR(30),
    emergency_contact_no VARCHAR(8),
    emergency_contact_relation VARCHAR(30),
    FOREIGN KEY (user_name) REFERENCES user_accounts(user_name)
);

CREATE TABLE IF NOT EXISTS doctors(
    doctor_name VARCHAR (30) PRIMARY KEY,
    service_1 VARCHAR(30),
    service_2 VARCHAR(30),
    service_3 VARCHAR(30),
    about_doctor VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS appointments(
    appt_date date,
    appt_time time,
    doctor_name VARCHAR(30), 
    service_selected VARCHAR(30),
    user_name VARCHAR(30),
    FOREIGN KEY (user_name) REFERENCES user_accounts(user_name),
    FOREIGN KEY (doctor_name) REFERENCES doctors(doctor_name)
);

CREATE TABLE IF NOT EXISTS available_appointments (
    appt_date date,
    appt_time time,
    doctor_name VARCHAR(30), 
    taken VARCHAR(3),
    FOREIGN KEY (doctor_name) REFERENCES doctors(doctor_name)
);