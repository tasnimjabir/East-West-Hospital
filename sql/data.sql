-- Departments -----------------------------------------------------------------

INSERT INTO Departments (Dept_name) VALUES ('Cardiology');
INSERT INTO Departments (Dept_name) VALUES ('Neurology');
INSERT INTO Departments (Dept_name) VALUES ('Orthopedics');
INSERT INTO Departments (Dept_name) VALUES ('Pediatrics');
INSERT INTO Departments (Dept_name) VALUES ('Oncology');
INSERT INTO Departments (Dept_name) VALUES ('Radiology');
INSERT INTO Departments (Dept_name) VALUES ('Dermatology');
INSERT INTO Departments (Dept_name) VALUES ('Gastroenterology');
INSERT INTO Departments (Dept_name) VALUES ('Urology');
INSERT INTO Departments (Dept_name) VALUES ('Emergency');

-- Room ------------------------------------------------------------------------

-- Insert data into Room table
INSERT INTO Room (Room_no, Cost) VALUES (101, 2000);
INSERT INTO Room (Room_no, Cost) VALUES (102, 2000);
INSERT INTO Room (Room_no, Cost) VALUES (103, 2000);
INSERT INTO Room (Room_no, Cost) VALUES (104, 2000);
INSERT INTO Room (Room_no, Cost) VALUES (105, 2000);
INSERT INTO Room (Room_no, Cost) VALUES (201, 2000);
INSERT INTO Room (Room_no, Cost) VALUES (202, 2000);
INSERT INTO Room (Room_no, Cost) VALUES (203, 2000);
INSERT INTO Room (Room_no, Cost) VALUES (204, 2000);
INSERT INTO Room (Room_no, Cost) VALUES (205, 2000);


--Doctors ----------------------------------------------------------------------

-- Cardiology
INSERT INTO Doctors (First_name, Last_name, Dept_id, Qualification, Email)
VALUES ('Abdul', 'Karim', 1, 'MBBS, MD (Cardiology)', 'abdulkarim@ewh.com');
INSERT INTO Doctors (First_name, Last_name, Dept_id, Qualification, Email)
VALUES ('Farid', 'Hasan', 1, 'MBBS, FCPS (Cardiology)', 'faridhasan@ewh.com');

-- Neurology
INSERT INTO Doctors (First_name, Last_name, Dept_id, Qualification, Email)
VALUES ('Jamil', 'Ahmed', 2, 'MBBS, MD (Neurology)', 'jamilahmed@ewh.com');
INSERT INTO Doctors (First_name, Last_name, Dept_id, Qualification, Email)
VALUES ('Samira', 'Rahman', 2, 'MBBS, FCPS (Neurology)', 'samirarahman@ewh.com');

-- Orthopedics
INSERT INTO Doctors (First_name, Last_name, Dept_id, Qualification, Email)
VALUES ('Ashraf', 'Hossain', 3, 'MBBS, MS (Orthopedics)', 'ashrafhossain@ewh.com');
INSERT INTO Doctors (First_name, Last_name, Dept_id, Qualification, Email)
VALUES ('Shafiq', 'Uddin', 3, 'MBBS, FCPS (Orthopedics)', 'shafiquddin@ewh.com');

-- Pediatrics
INSERT INTO Doctors (First_name, Last_name, Dept_id, Qualification, Email)
VALUES ('Nusrat', 'Jahan', 4, 'MBBS, DCH (Pediatrics)', 'nusratjahan@ewh.com');
INSERT INTO Doctors (First_name, Last_name, Dept_id, Qualification, Email)
VALUES ('Rafiqul', 'Islam', 4, 'MBBS, FCPS (Pediatrics)', 'rafiqulislam123@ewh.com');

-- Oncology
INSERT INTO Doctors (First_name, Last_name, Dept_id, Qualification, Email)
VALUES ('Salma', 'Begum', 5, 'MBBS, MD (Oncology)', 'salmabegum@ewh.com');
INSERT INTO Doctors (First_name, Last_name, Dept_id, Qualification, Email)
VALUES ('Habibur', 'Rahman', 5, 'MBBS, FCPS (Oncology)', 'habiburrahman456@ewh.com');

-- Radiology
INSERT INTO Doctors (First_name, Last_name, Dept_id, Qualification, Email)
VALUES ('Mizanur', 'Rahman', 6, 'MBBS, MD (Radiology)', 'mizanurrahman@ewh.com');
INSERT INTO Doctors (First_name, Last_name, Dept_id, Qualification, Email)
VALUES ('Afsana', 'Akter', 6, 'MBBS, FCPS (Radiology)', 'afsanaakter789@ewh.com');

-- Dermatology
INSERT INTO Doctors (First_name, Last_name, Dept_id, Qualification, Email)
VALUES ('Sadia', 'Tabassum', 7, 'MBBS, MD (Dermatology)', 'sadiatabassum@ewh.com');
INSERT INTO Doctors (First_name, Last_name, Dept_id, Qualification, Email)
VALUES ('Fahim', 'Kabir', 7, 'MBBS, FCPS (Dermatology)', 'fahimkabir@ewh.com');

-- Gastroenterology
INSERT INTO Doctors (First_name, Last_name, Dept_id, Qualification, Email)
VALUES ('Arif', 'Chowdhury', 8, 'MBBS, MD (Gastroenterology)', 'arifchowdhury@ewh.com');
INSERT INTO Doctors (First_name, Last_name, Dept_id, Qualification, Email)
VALUES ('Mehnaz', 'Sultana', 8, 'MBBS, FCPS (Gastroenterology)', 'mehnazsultana@ewh.com');

-- Urology
INSERT INTO Doctors (First_name, Last_name, Dept_id, Qualification, Email)
VALUES ('Naim', 'Ahmed', 9, 'MBBS, MS (Urology)', 'naimahmed123@ewh.com');
INSERT INTO Doctors (First_name, Last_name, Dept_id, Qualification, Email)
VALUES ('Shahnaz', 'Parvin', 9, 'MBBS, FCPS (Urology)', 'shahnazparvin@ewh.com');

-- Emergency
INSERT INTO Doctors (First_name, Last_name, Dept_id, Qualification, Email)
VALUES ('Rahat', 'Hossain', 10, 'MBBS, FCPS (Emergency Medicine)', 'rahathossain@ewh.com');
INSERT INTO Doctors (First_name, Last_name, Dept_id, Qualification, Email)
VALUES ('Asma', 'Khatun', 10, 'MBBS, MD (Emergency Medicine)', 'asmakhatun@ewh.com');

-- Pateints -----------------------------------------------------------------------------------------------

-- For Doctor_id 1 (Abdul Karim - Cardiology)
INSERT INTO Patients (First_name, Last_name, Age, Gender, Email, Passwords, Address)
VALUES ('Rafiqul', 'Islam', 45, 'M', 'rafiqulislam3412@gmail.com', 'password123', 'Dhaka');
INSERT INTO Patients (First_name, Last_name, Age, Gender, Email, Passwords, Address)
VALUES ('Nurul', 'Hasan', 52, 'M', 'nurulhasan7810@gmail.com', 'password123', 'Chittagong');

-- For Doctor_id 2 (Farid Hasan - Cardiology)
INSERT INTO Patients (First_name, Last_name, Age, Gender, Email, Passwords, Address)
VALUES ('Hasina', 'Begum', 60, 'F', 'hasinabegum9231@gmail.com', 'password123', 'Rajshahi');
INSERT INTO Patients (First_name, Last_name, Age, Gender, Email, Passwords, Address)
VALUES ('Latif', 'Chowdhury', 38, 'M', 'latifchowdhury4682@gmail.com', 'password123', 'Sylhet');

-- For Doctor_id 4 (Nusrat Jahan - Pediatrics)
INSERT INTO Patients (First_name, Last_name, Age, Gender, Email, Passwords, Address)
VALUES ('Fahima', 'Akter', 5, 'F', 'fahimaakter2710@gmail.com', 'password123', 'Barisal');
INSERT INTO Patients (First_name, Last_name, Age, Gender, Email, Passwords, Address)
VALUES ('Sohag', 'Miah', 8, 'M', 'sohagmiah6732@gmail.com', 'password123', 'Khulna');

-- For Doctor_id 6 (Mizanur Rahman - Radiology)
INSERT INTO Patients (First_name, Last_name, Age, Gender, Email, Passwords, Address)
VALUES ('Mahbub', 'Rahman', 35, 'M', 'mahbubrahman8712@gmail.com', 'password123', 'Dhaka');
INSERT INTO Patients (First_name, Last_name, Age, Gender, Email, Passwords, Address)
VALUES ('Nazma', 'Sultana', 42, 'F', 'nazmasultana2319@gmail.com', 'password123', 'Sylhet');

-- For Doctor_id 10 (Rahat Hossain - Emergency)
INSERT INTO Patients (First_name, Last_name, Age, Gender, Email, Passwords, Address)
VALUES ('Sakib', 'Khan', 29, 'M', 'sakibkhan7819@gmail.com', 'password123', 'Comilla');
INSERT INTO Patients (First_name, Last_name, Age, Gender, Email, Passwords, Address)
VALUES ('Shamima', 'Begum', 50, 'F', 'shamimabegum1945@gmail.com', 'password123', 'Tangail');

-- delete from Patients;
-- delete from Doctors;
-- delete from Departments;

select * from Patients;
select * from Doctors;
select * from Departments;
select * from Appoint;

SELECT * FROM departments;

SELECT 
        Patients.patient_id, 
        Patients.first_name || ' ' || Patients.last_name as PATIENT_NAME, 
        Patients.age, 
        Patients.gender, 
        Patients.email, 
        Patients.address,
        Doctors.doctor_id, 
        Doctors.first_name || ' ' || Doctors.last_name AS doctor_name, 
        Departments.dept_id, 
        Departments.dept_name, 
        Appoint.dateofvisit
        FROM Appoint
        JOIN Patients ON Appoint.patient_id = Patients.patient_id
        JOIN Doctors ON Appoint.doctor_id = Doctors.doctor_id
        JOIN Departments ON Doctors.dept_id = Departments.dept_id
        ORDER BY Appoint.dateofvisit DESC;


commit;

select table_name from user_tables;

INSERT INTO Patients (First_name, Last_name, Age, Gender, Email, Passwords, Address)
VALUES ('John', 'Doe', 30, 'M', 'john.doe@example.com', 'password123', '123 Street Name');


INSERT INTO Patients (First_name, Last_name, Age, Gender, Email, Passwords, Address)
VALUES ('Jane', 'Smith', 25, 'F', 'jane.smith2@example.com', 'securepass', '456 Another St');



