--Table Creation and constraints

create table Course_Log(
Annual_Term   	char(3),
serial_number	char(2),
Course_ID       char(5),
Start_Date      date,
End_Date        date	
);

alter table Course_log
add constraints pk_courselog_id PRIMARY KEY (Annual_Term, serial_number);

create table Course(
Course_ID       char(5),
Course_Title	varchar(100)	
);

alter table Course
add constraints pk_course_id PRIMARY KEY (Course_ID);


alter table Course_log
add constraints fk_courselog_id FOREIGN KEY (Course_ID)
references Course(Course_ID);

create table Offered_Courses(
Course_ID		char(5),
Start_Date      date,
End_Date        date	
);

alter table Offered_Courses
add constraints pk_offeredcourses_id PRIMARY KEY (Course_ID);

alter table Offered_Courses
add constraints fk_offeredcourses_id FOREIGN KEY (Course_ID)
references Course(Course_ID);


create table Classes(
Class_Grade 	number(2),
Class_Section 	char(1),
Class_Title		varchar(100),
Course_ID       char(5)
);

alter table Classes
add constraints pk_classes_id PRIMARY KEY (Class_Grade, Class_Section);

alter table Classes
add constraints fk_classes_id FOREIGN KEY (Course_ID)
references Offered_Courses(Course_ID);

alter table Classes
add constraints unique_classtitle unique(class_title);


--Data Insertion

--Course
INSERT INTO Course (Course_ID, Course_Title)
VALUES ('C0001','Communication Skills');

INSERT INTO Course (Course_ID, Course_Title)
VALUES ('C0002','Accounting');

INSERT INTO Course (Course_ID, Course_Title)
VALUES ('C0003','English');

INSERT INTO Course (Course_ID, Course_Title)
VALUES	('C0004','General Knowledge');
	
INSERT INTO Course (Course_ID, Course_Title)	
VALUES	('C0005','Science');

INSERT INTO Course (Course_ID, Course_Title)
VALUES ('C0006','Geography');

INSERT INTO Course (Course_ID, Course_Title)
VALUES ('C0007','Art');

INSERT INTO Course (Course_ID, Course_Title)
VALUES ('C0008','General Repairs');

INSERT INTO Course (Course_ID, Course_Title)
VALUES	('C0009','Cooking');
	
INSERT INTO Course (Course_ID, Course_Title)	
VALUES	('C0010','Information Technology');

--Course Log
INSERT INTO Course_log (Annual_Term, serial_number,Course_ID,Start_Date,End_Date)
VALUES ('001','1','C0001',To_Date('12/02/2016', 'DD/MM/YYYY'), To_Date('12/04/2016', 'DD/MM/YYYY'));

INSERT INTO Course_log (Annual_Term, serial_number,Course_ID,Start_Date,End_Date)
VALUES ('001','2','C0005',To_Date('18/04/2016', 'DD/MM/YYYY'), To_Date('18/12/2016', 'DD/MM/YYYY'));

INSERT INTO Course_log (Annual_Term, serial_number,Course_ID,Start_Date,End_Date)
VALUES ('001','3','C0010',To_Date('22/12/2016', 'DD/MM/YYYY'), To_Date('22/04/2017', 'DD/MM/YYYY'));

INSERT INTO Course_log (Annual_Term, serial_number,Course_ID,Start_Date,End_Date)
VALUES ('002','1','C0003',To_Date('28/04/2017', 'DD/MM/YYYY'), To_Date('28/07/2017', 'DD/MM/YYYY'));

INSERT INTO Course_log (Annual_Term, serial_number,Course_ID,Start_Date,End_Date)
VALUES ('002','2','C0001',To_Date('03/08/2017', 'DD/MM/YYYY'), To_Date('03/09/2017', 'DD/MM/YYYY'));

INSERT INTO Course_log (Annual_Term, serial_number,Course_ID,Start_Date,End_Date)
VALUES ('002','3','C0008',To_Date('04/09/2017', 'DD/MM/YYYY'), To_Date('04/12/2017', 'DD/MM/YYYY'));

INSERT INTO Course_log (Annual_Term, serial_number,Course_ID,Start_Date,End_Date)
VALUES ('003','1','C0002',To_Date('01/01/2018', 'DD/MM/YYYY'), To_Date('01/04/2018', 'DD/MM/YYYY'));

INSERT INTO Course_log (Annual_Term, serial_number,Course_ID,Start_Date,End_Date)
VALUES ('003','2','C0004',To_Date('02/04/2018', 'DD/MM/YYYY'), To_Date('02/05/2018', 'DD/MM/YYYY'));

INSERT INTO Course_log (Annual_Term, serial_number,Course_ID,Start_Date,End_Date)
VALUES ('003','3','C0006',To_Date('05/05/2018', 'DD/MM/YYYY'), To_Date('05/10/2018', 'DD/MM/YYYY'));

INSERT INTO Course_log (Annual_Term, serial_number,Course_ID,Start_Date,End_Date)
VALUES ('003','4','C0003',To_Date('10/10/2018', 'DD/MM/YYYY'), To_Date('10/12/2018', 'DD/MM/YYYY'));

--Offered_Courses
insert into offered_courses (Course_ID,Start_Date,End_Date)
values ('C0009',To_Date('01/01/2019', 'DD/MM/YYYY'), To_Date('01/01/2019', 'DD/MM/YYYY'));

--Classes
Insert INTO classes (class_grade, class_section, class_title, Course_ID)
VALUES (1,'A', 'Lahore','C0009');

Insert INTO classes (class_grade, class_section, class_title, Course_ID)
VALUES (1,'B', 'Karachi','C0009');

Insert INTO classes (class_grade, class_section, class_title, Course_ID)
VALUES (2,'A', 'Multan','C0009');

Insert INTO classes (class_grade, class_section, class_title, Course_ID)
VALUES (2,'B', 'Peshawar','C0009');

Insert INTO classes (class_grade, class_section, class_title, Course_ID)
VALUES (2,'C', 'Sialkot','C0009');

Insert INTO classes (class_grade, class_section, class_title, Course_ID)
VALUES (3,'A', 'Rawalpindi','C0009');

Insert INTO classes (class_grade, class_section, class_title, Course_ID)
VALUES (7,'B', 'Islamabad','C0009');

Insert INTO classes (class_grade, class_section, class_title, Course_ID)
VALUES (9,'B', 'Gujranwala','C0009');   

Insert INTO classes (class_grade, class_section, class_title, Course_ID)
VALUES (1,'C', 'Abbotabad','C0009');   

Insert INTO classes (class_grade, class_section, class_title, Course_ID)
VALUES (7,'A', 'Nasirabad','C0009');   

Insert INTO classes (class_grade, class_section, class_title, Course_ID)
VALUES (4,'A', 'Larkana','C0009');   

Insert INTO classes (class_grade, class_section, class_title, Course_ID)
VALUES (8,'A', 'Hyderabad','C0009');   

Insert INTO classes (class_grade, class_section, class_title, Course_ID)
VALUES (5,'B', 'Murree','C0009');   
                                                     
Insert INTO classes (class_grade, class_section, class_title, Course_ID)
VALUES (9,'A', 'Faisalabad','C0009'); 

-- SANA QUERIES START
create table Father (
FatherID char(5) NOT NULL,
fname varchar2(50),
cnic varchar2(15) UNIQUE,
address varchar2(100),
dob date,
bloodgroup varchar(3),
status char(1),
email varchar2(30),
contactNo varchar2(15),
addNeeds char(1)
);

alter table Father
add constraints
pk_Father_id primary key (FatherID);

insert into Father (FatherID)
values('00000');

insert into Father (FatherID, fname, cnic, address, dob, bloodgroup, status, email, contactno, addneeds)
values('89012', 'Shahzad Khattak', '43251-3674819-6', 'House 12, Street 63, Machar Colony, Rawalpindi', To_Date('26/06/1987', 'DD/MM/YYYY'), 'A+', '1', 'shahzadkhattak@gmail.com', '03125338407', '0');

insert into Father (FatherID, fname, cnic, address, dob, bloodgroup, status, email, contactno, addneeds)
values('44700', 'Mehran Siddiqui', '72407-7386114-5', 'House 32, Street 25, Sector C, Faiz Colony', To_Date('28/07/1971', 'DD/MM/YYYY'), 'B-', '0', 'mehransiddiqui@gmail.com', '03018409462', '0');

insert into Father (FatherID, fname, cnic, address, dob, bloodgroup, status, email, contactno, addneeds)
values('35747', 'Adil Awan Ahmed', '42673-4729759-1', 'House 24, block F-8, Islamabad', To_Date('19/09/1988', 'DD/MM/YYYY'), 'O+', '1', 'aaahmed@gmail.com', '03126773209', '0');

insert into Father (FatherID, fname, cnic, address, dob, bloodgroup, status, email, contactno, addneeds)
values('83864', 'Javed Khan', '46783-3847563-9', 'Ali Farms, Siala, Bahawalpur',	 To_Date('30/12/1995', 'DD/MM/YYYY'), 'O+', '1', 'javed.khan21@gmail.com', '03124000293', '1');

insert into Father (FatherID, fname, cnic, address, dob, bloodgroup, status, email, contactno, addneeds)
values('18004', 'Azfar Imran', '12803-4769855-4', 'House number 54, block G5, Iqbal Colony', To_Date('25/03/1972', 'DD/MM/YYYY'), 'B+', '1', 'azfarimran1990@gmail.com', '03167116620',	'0');

insert into Father (FatherID, fname, cnic, address, dob, bloodgroup, status, email, contactno, addneeds)
values('70741', 'Ahsan Ali Rashid',	'87654-3245654-2', 'House #12, sector A, Askari 12',	To_Date('06/09/1975', 'DD/MM/YYYY'), 'AB+',	'1', 'ahsanalirashid@gmail.com', '03235547111', '0');

insert into Father (FatherID, fname, cnic, address, dob, bloodgroup, status, email, contactno, addneeds)
values('24050', 'Ismail Waleed', '76775-5785669-5', 'House 44, Street 1, Pirwidhai Mor', To_Date('28/08/1984', 'DD/MM/YYYY'), 'A-', '0', 'ismailwaleed3@gmail.com', '03127447600', '0');

insert into Father (FatherID, fname, cnic, address, dob, bloodgroup, status, email, contactno, addneeds)
values('45000', 'Tariq Suleman', '65349-4789354-8', 'House 1, Valley Lane, Westridge Rawalpindi', To_Date('27/04/1992', 'DD/MM/YYYY'), 'A+', '1', 'suleman.tariq@gmail.com', '03014445478', '0');	

insert into Father (FatherID, fname, cnic, address, dob, bloodgroup, status, email, contactno, addneeds)
values('55788', 'Zubair Hameed', '54679-7432895-3',	'House #3, Sector D, Bahria Phase 3, Islamabad', To_Date('20/04/1990', 'DD/MM/YYYY'), 'O+', '1', 'zubairhameed29@gmail.com', '03234977815',	'0');

insert into Father (FatherID, fname, cnic, address, dob, bloodgroup, status, email, contactno, addneeds)
values('27892', 'Fahad Jaffery', '82309-7489466-6', 'House 23-A, block F3, Khayaban-e-Johar, Lahore', To_Date('27/08/1989', 'DD/MM/YYYY'), 'B+',  '1', 'fhjaffery@gmail.com', '03165549819', '0');

create table Mother (
MotherID char(5) NOT NULL,
fname varchar2(50),
cnic varchar2(15) UNIQUE,
address varchar2(100),
dob date,
bloodgroup varchar(3),
status char(1),
email varchar2(30),
contactNo varchar2(15),
addNeeds char(1),
pregnancyStatus char(1)
);

alter table Mother
add constraints
pk_Mother_id primary key (MotherID);

insert into Mother (MotherID)
values('00000');

insert into Mother (MotherID, fname, cnic, address, dob, bloodgroup, status, email, contactno, addneeds, pregnancyStatus)
values('44859', 'Rakhshanda Sameer', '39329-2457667-1', 'House 12, Street 63, Machar Colony, Rawalpindi', To_Date('29/07/1984', 'DD/MM/YYYY'), 'O+', '0', 'rakh.sameer@gmail.com', '08820387363', '0', '0');

insert into Mother (MotherID, fname, cnic, address, dob, bloodgroup, status, email, contactno, addneeds, pregnancyStatus)
values('79346', 'Samina Shahid', '48927-8943578-8', 'House 32, Street 25, Sector C, Faiz Colony', To_Date('02/05/1981', 'DD/MM/YYYY'), 'B+', '1', 'saminashahid@gmail.com', '0973459489', '0', '1');

insert into Mother (MotherID, fname, cnic, address, dob, bloodgroup, status, email, contactno, addneeds, pregnancyStatus)
values('78266', 'Rukhsana Asif', '49888-1938455-3', 'House 24, block F-8, Islamabad', To_Date('12/07/1982', 'DD/MM/YYYY'), 'O-', '1', 'rukhsanasif@gmail.com', '03498746490','0', '0');

insert into Mother (MotherID, fname, cnic, address, dob, bloodgroup, status, email, contactno, addneeds, pregnancyStatus)
values('63872', 'Bilqees Qamar', '91846-2489505-5', 'Ali Farms, Siala, Bahawalpur', To_Date('16/01/1995', 'DD/MM/YYYY'), 'O+', '1', 'bilqeesqamar45@gmail.com', '08983247568', '1', '0');

insert into Mother (MotherID, fname, cnic, address, dob, bloodgroup, status, email, contactno, addneeds, pregnancyStatus)
values('98384', 'Bushra Saleem', '39165-4587333-6', 'House number 54, block G5, Iqbal Colony', To_Date('15/11/1975', 'DD/MM/YYYY'), 'B+', '1', 'bushrasaleeem@gmail.com', '08093489579', '0', '0');

insert into Mother (MotherID, fname, cnic, address, dob, bloodgroup, status, email, contactno, addneeds, pregnancyStatus)
values('43729', 'Nandini Sahiwal', '89458-4892324-7', 'House #12, sector A, Askari 12', To_Date('30/07/1990', 'DD/MM/YYYY'), 'A+', '1', 'nandini89@gmail.com', '09348584673', '0', '0');

insert into Mother (MotherID, fname, cnic, address, dob, bloodgroup, status, email, contactno, addneeds, pregnancyStatus)
values('34785', 'Samreen Bilal', '89472-2093485-4', 'House 44, Street 1, Pirwidhai Mor', To_Date('04/04/1984', 'DD/MM/YYYY'), 'O+', '1', 'samreenbilal@gmail.com', '08880785984', '0', '0');

insert into Mother (MotherID, fname, cnic, address, dob, bloodgroup, status, email, contactno, addneeds, pregnancyStatus)
values('73846', 'Tahira Ghauri', '59361-2498756-6', 'House 1, Valley Lane, Westridge Rawalpindi', To_Date('02/07/1994', 'DD/MM/YYYY'), 'AB+', '1', 'tahira2010@gmail.com', '02657568329', '0', '0');	

insert into Mother (MotherID, fname, cnic, address, dob, bloodgroup, status, email, contactno, addneeds, pregnancyStatus)
values('37824', 'Ghazala Hameed', '93726-2457685-9', 'House #3, Sector D, Bahria Phase 3, Islamabad', To_Date('25/03/1987', 'DD/MM/YYYY'), 'AB-', '1', 'ghazalayhameed@gmail.com', '02384759867', '0', '0');

insert into Mother (MotherID, fname, cnic, address, dob, bloodgroup, status, email, contactno, addneeds, pregnancyStatus)
values('58743', 'Halima Patel', '49275-8349756-2', 'House 5, Lane 10, Street 17, Sector C, Model Colony', To_Date('18/05/1993', 'DD/MM/YYYY'), 'A+', '1', 'halimapatel@gmail.com', '04893208457', '0', '0');

create table Guardian (
GuardianID char(5) NOT NULL,
relation varchar2(15),
fname varchar2(50),
gender char(1),
cnic varchar2(15) UNIQUE,
address varchar2(100),
dob date,
bloodgroup varchar(3),
status char(1),
email varchar2(30),
contactNo varchar2(15),
addNeeds char(1),
pregnancyStatus char(1)
);

alter table Guardian
add constraints
pk_Guardian_id primary key (GuardianID);

insert into Guardian (GuardianID)
values('00000');

insert into Guardian (GuardianID, relation, fname, gender, cnic, address, dob, bloodgroup, status, email, contactno, addneeds, pregnancyStatus)
values('48629', 'Uncle', 'Ahmed Sameer', 'M', '39329-5783764-4', 'House 90, Street 5, Askari 4, Rawalpindi', To_Date('29/07/1984', 'DD/MM/YYYY'), 'A+', '1', 'ahmed.sameer@gmail.com', '08274687363', '0', '0');

insert into Guardian (GuardianID, relation, fname, gender, cnic, address, dob, bloodgroup, status, email, contactno, addneeds, pregnancyStatus)
values('98437',	'Cousin', 'Armeen Shahid', 'F', '82974-9361549-8', 'House 2, Street 5, Sector C, DHA 1', To_Date('01/01/2000',	'DD/MM/YYYY'), 'B+', '1', 'armeenshahid@gmail.com', '09734918289', '0', '0');

insert into Guardian (GuardianID, relation, fname, gender, cnic, address, dob, bloodgroup, status, email, contactno, addneeds, pregnancyStatus)
values('29471',	'Grandfather', 'Hassan Ahmed', 'M', '92716-7947196-3', 'House 878, block I-8, Islamabad', To_Date('24/11/1952', 'DD/MM/YYYY'), 'O+', '1', 'hassanahmed@gmail.com', '08381746490', '0', '0');

insert into Guardian (GuardianID, relation, fname, gender, cnic, address, dob, bloodgroup, status, email, contactno, addneeds, pregnancyStatus)
values('38474',	'Aunt', 'Farkhanda Qamar', 'F', '91846-7591642-5', 'Bahria Phase 4', To_Date('21/02/1992', 'DD/MM/YYYY'), 'A+', '1', 'fkqamar@gmail.com', '08991857293', '0', '1');

insert into Guardian (GuardianID, relation, fname, gender, cnic, address, dob, bloodgroup, status, email, contactno, addneeds, pregnancyStatus)
values('23747',	'Grandmother', 'Javeria Imran',	'F', '94714-7848278-6', 'House number 12, Street 34, Askari 10', To_Date('17/10/1950', 'DD/MM/YYYY'), 'AB+', '1', 'jvimran@gmail.com', '0971692579',	'0', '0');

insert into Guardian (GuardianID, relation, fname, gender, cnic, address, dob, bloodgroup, status, email, contactno, addneeds, pregnancyStatus)
values('49827',	'Aunt', 'Imrana Kazmi', 'F', '95723-952843-4', 'H11 Islamabad', To_Date('1/10/1980', 'DD/MM/YYYY'), 'AB+', '1', 'imranakazmi@gmail.com', '0937528579', '1', '1');

insert into Guardian (GuardianID, relation, fname, gender, cnic, address, dob, bloodgroup, status, email, contactno, addneeds, pregnancyStatus)
values('92855',	'Uncle', 'Usman Aleem', 'M', '92614-7175378-6', 'House number 12, Street 34, Askari 10', To_Date('30/09/1990', 'DD/MM/YYYY'), 'O+', '1', 'usmanaleem@gmail.com', '0971826591',	'0', '0');

insert into Guardian (GuardianID, relation, fname, gender, cnic, address, dob, bloodgroup, status, email, contactno, addneeds, pregnancyStatus)
values('01924',	'Uncle', 'Kamran Sajid', 'M', '28462-9274518-7', 'Westridge St 11', To_Date('11/08/1991', 'DD/MM/YYYY'), 'O+', '1', 'kamransajid@gmail.com', '8275492579', '0', '0');

insert into Guardian (GuardianID, relation, fname, gender, cnic, address, dob, bloodgroup, status, email, contactno, addneeds, pregnancyStatus)
values('00482',	'Uncle', 'Iftikhar Mehmood', 'M', '74920-9261278-7', '25 house, Gulrez', To_Date('09/12/1985', 'DD/MM/YYYY'), 'A-', '1', 'm.iftikhar@gmail.com', '0992847379', '1', '0');

insert into Guardian (GuardianID, relation, fname, gender, cnic, address, dob, bloodgroup, status, email, contactno, addneeds, pregnancyStatus)
values('00038',	'Cousin', 'Atif Munir',	'M', '72649-0048362-9', 'Rabia Bungalows Street 11 House 9', To_Date('16/04/1995', 'DD/MM/YYYY'), 'O-', '1', 'aitfmunir11@gmail.com', '087184579', '0', '0');



--ALI QUERIES START
create table student_archive(
student_id char(5),
name char (50),
gender char(1),
start_date date,
CNIC char(15),
father_id char(5),
mother_id char(5),
guardian_id char(5), 
Home_address varchar2(50),
Date_of_birth date,
Blood_group char(3),
Status char(20) CHECK ( Status = 'Transfer' OR Status = 'Dropout' OR Status = 'Graduate' OR Status = 'Current' OR Status = 'Break'),
Email varchar2(30),
Contact_number varchar2(20),
Constraint student_archive_student_id_pk primary key(student_id),
Constraint student_archive_father_id_fk foreign key(father_id) REFERENCES father(fatherid),
Constraint student_archive_mother_id_fk foreign key(mother_id) REFERENCES mother(motherid),
Constraint student_archive_guardian_id_fk foreign key(guardian_id) REFERENCES guardian(guardianid));
alter table student_archive
rename column start_date to enroll_date;


Insert into student_archive (student_id, name, gender, enroll_date, CNIC, father_id, mother_id, guardian_id, Home_address, Date_of_birth, Blood_group, status, Email, Contact_number)
Values ('10000', 'Ibrahim Khattak', 'M', to_date('10/08/2015', 'DD/MM/YYYY'), '43251-2695821-1', '89012', '44859', '48629', 'House 12, Street 63, Machar Colony, Rawalpindi', to_date('06/02/2011', 'DD/MM/YYYY'), 'A+', 'Current', NULL, NULL) ;

Insert into student_archive (student_id, name, gender, enroll_date, CNIC, father_id, mother_id, guardian_id, Home_address, Date_of_birth, Blood_group, status, Email, Contact_number)
Values ('10050', 'Fatima Siddiqui', 'F', to_date('20/10/2010', 'DD/MM/YYYY'), '72407-5217721-3', '44700', '79346', '98437', 'House 32, Street 25, Sector C, Faiz Colony', to_date('27/01/2002', 'DD/MM/YYYY'), 'B-', 'Graduate', 'fatim_asid2@gmail.com', '03331424217') ;

Insert into student_archive (student_id, name, gender, enroll_date, CNIC, father_id, mother_id, guardian_id, Home_address, Date_of_birth, Blood_group, status, Email, Contact_number)
Values ('10051', 'Junaid Siddiqui', 'M', to_date('20/08/2013', 'DD/MM/YYYY'), '72407-5635212-1', '44700', '79346', '98437', 'House 32, Street 25, Sector C, Faiz Colony', to_date('27/01/2009', 'DD/MM/YYYY'), 'B-', 'Current', 'junaid_sid09@gmail.com', NULL) ;

Insert into student_archive (student_id, name, gender, enroll_date, CNIC, father_id, mother_id, guardian_id, Home_address, Date_of_birth, Blood_group, status, Email, Contact_number)
Values ('12171', 'Farhan Awan Ahmed' , 'M', to_date('20/08/2018', 'DD/MM/YYYY'), '42673-8686212-1', '35747', '78266', '29471', 'House 24, block F-8, Islamabad', to_date('30/06/2015', 'DD/MM/YYYY'), 'O+', 'Current', NULL,NULL) ;
Insert into student_archive (student_id, name, gender, enroll_date, CNIC, father_id, mother_id, guardian_id, Home_address, Date_of_birth, Blood_group, status, Email, Contact_number)
Values ('11131', 'Safa Khan' , 'F', to_date('27/08/2017', 'DD/MM/YYYY'), '46783-9695976-2', '83864', '63872', '38474', 'Ali Farms, Siala, Bahawalpur', to_date('12/12/2010', 'DD/MM/YYYY'), 'O+', 'Break', NULL, NULL) ;

Insert into student_archive (student_id, name, gender, enroll_date, CNIC, father_id, mother_id, guardian_id, Home_address, Date_of_birth, Blood_group, status, Email, Contact_number)
Values ('11291', 'Zahid Imran', 'M', to_date('27/08/2011', 'DD/MM/YYYY'), '12803-1114241-1', '18004', '98384', '23747', 'House number 54, block G5, Iqbal Colony', to_date('12/12/2007', 'DD/MM/YYYY'), 'B+', 'Current', 'zimran2007@yahoo.com' , '03235107081') ;

Insert into student_archive (student_id, name, gender, enroll_date, CNIC, father_id, mother_id, guardian_id, Home_address, Date_of_birth, Blood_group, status, Email, Contact_number)
Values ('11292', 'Zaedah Imran', 'F', to_date('27/08/2011', 'DD/MM/YYYY'), '12803-1114278-2', '18004', '98384', '23747', 'House number 54, block G5, Iqbal Colony', to_date('12/12/2007', 'DD/MM/YYYY'), 'B+', 'Current', 'zahidaimran635@yahoo.com' , '03476102212') ;

Insert into student_archive (student_id, name, gender, enroll_date, CNIC, father_id, mother_id, guardian_id, Home_address, Date_of_birth, Blood_group, status, Email, Contact_number)
Values ('11399', 'Javeria Imran', 'F', to_date('31/08/2013', 'DD/MM/YYYY'), '12803-1982412-3', '18004', '98384', '23747', 'House number 54, block G5, Iqbal Colony', to_date('12/12/2010', 'DD/MM/YYYY'), 'B+', 'Current', NULL , NULL) ;

Insert into student_archive (student_id, name, gender, enroll_date, CNIC, father_id, mother_id, guardian_id, Home_address, Date_of_birth, Blood_group, status, Email, Contact_number)
Values ('10099', 'Ibrar Ali Rashid', 'M', to_date('05/09/2013', 'DD/MM/YYYY'), '87654-1543212-1', '70741', '43729', '49827', 'House #12, sector A, Askari 12', to_date('12/12/2009', 'DD/MM/YYYY'), 'A+', 'Current', 'ialirashid@gmail.com' , NULL) ;
Insert into student_archive (student_id, name, gender, enroll_date, CNIC, father_id, mother_id, guardian_id, Home_address, Date_of_birth, Blood_group, status, Email, Contact_number)
Values ('12129', 'Nayyar Waleed', 'M', to_date('05/09/2019', 'DD/MM/YYYY'), '76775-8593851-3', '24050', '34785', '92855', 'House 44, Street 1, Pirwidhai Mor', to_date('27/09/2015', 'DD/MM/YYYY'), 'A-', 'Current', NULL , NULL) ;
Insert into student_archive (student_id, name, gender, enroll_date, CNIC, father_id, mother_id, guardian_id, Home_address, Date_of_birth, Blood_group, status, Email, Contact_number)
Values ('10997', 'Faraz Suleman', 'M', to_date('15/11/2018', 'DD/MM/YYYY'), '65349-0957491-1', '45000', '73846', '01924', 'House 1, Valley Lane, Westridge Rawalpindi', to_date('06/11/2014', 'DD/MM/YYYY'), 'A+', 'Current', NULL , NULL) ;
Insert into student_archive (student_id, name, gender, enroll_date, CNIC, father_id, mother_id, guardian_id, Home_address, Date_of_birth, Blood_group, status, Email, Contact_number)
Values ('10999', 'Shiza Hameed', 'F', to_date('15/01/2020', 'DD/MM/YYYY'), '54679-1312209-4', '55788', '37824', '00482', 'House #3, Sector D, Bahria Phase 3, Islamabad', to_date('06/03/2016', 'DD/MM/YYYY'), 'AB-', 'Current', NULL , NULL) ;

Insert into student_archive (student_id, name, gender, enroll_date, CNIC, father_id, mother_id, guardian_id, Home_address, Date_of_birth, Blood_group, status, Email, Contact_number)
Values ('09996', 'Ali Jaffery' , 'M', to_date('11/04/2016', 'DD/MM/YYYY'), '82309-7865621-1', '27892', '58743', '00038', 'House 23-A, block F3, Khayaban-e-Johar, Lahore', to_date('07/05/2012', 'DD/MM/YYYY'), 'B+', 'Current', NULL , NULL) ;

create table current_student (
student_id char(5),
class_grade number(2),
class_section char(1),
constraint current_student_student_id_pk primary key(student_id)
);
alter table current_student
add constraints
current_student_student_id_fk foreign key(student_id) REFERENCES student_archive(student_id);

alter table current_student
add constraints current_student_class_fk foreign key(Class_Grade, Class_Section)
references classes(Class_Grade, Class_Section);


Insert into current_student(student_id,class_grade,class_section)
Values('10000', '5', 'B');
Insert into current_student(student_id,class_grade,class_section)
Values('10051', '8', 'A');

Insert into current_student(student_id,class_grade,class_section)
Values('12171', '3', 'A');
Insert into current_student(student_id,class_grade,class_section)
Values('12129', '2', 'A');
Insert into current_student(student_id,class_grade,class_section)
Values('10997', '3', 'A');
Insert into current_student(student_id,class_grade,class_section)
Values('10999', '1', 'C');
Insert into current_student(student_id,class_grade,class_section)
Values('09996', '4', 'A');
Insert into current_student(student_id,class_grade,class_section)
Values('11292', '9', 'A');
Insert into current_student(student_id,class_grade,class_section)
Values('11399', '7', 'B');
Insert into current_student(student_id,class_grade,class_section)
Values('10099', '7', 'A');
Insert into current_student(student_id,class_grade,class_section)
Values('11291', '9', 'B');

Create table student_log(
student_id char(5),
serial_no varchar2(3),
change_type varchar2(30) CHECK (change_type = 'Father ID' OR change_type = 'Father Name' OR change_type = 'Father CNIC' OR change_type = 'Father Address' OR change_type = 'Father DOB' OR change_type = 'Father Blood Group' OR change_type = 'Father Status' OR change_type = 'Father Email' OR change_type = 'Father Contact' OR change_type = 'Father Needs' OR change_type = 'Mother ID' OR change_type = 'Mother Name' OR change_type = 'Mother CNIC' OR change_type = 'Mother Address' OR change_type = 'Mother DOB' OR change_type = 'Mother Blood Group' OR change_type = 'Mother Status' OR change_type = 'Mother Email' OR change_type = 'Mother Contact' OR change_type = 'Mother Needs' OR change_type = 'Mother Pregnancy' OR change_type = 'Guardian ID' OR change_type = 'Guardian Relationship' OR change_type = 'Guardian Name' OR change_type = 'Guardian Gender' OR change_type = 'Guardian Blood Group' OR change_type = 'Guardian CNIC' OR change_type = 'Guardian Address' OR change_type = 'Guardian DOB' OR change_type = 'Guardian Status' OR change_type = 'Guardian Email' OR change_type = 'Guardian Contact' OR change_type = 'Guardian Needs' OR change_type = 'Guardian Pregnancy' OR change_type = 'Student Address' OR change_type = 'Student Status' OR change_type = 'Student Email' OR change_type = 'Student Contact' OR change_type = 'Student Grade' OR change_type = 'Student Section' ),
change varchar2(50),
date_time TIMESTAMP,
Constraint student_log_ck primary key(student_id,serial_no),
Constraint student_log_student_id_fk foreign key(student_id) REFERENCES student_archive(student_id));

Insert into student_log (student_id, serial_no, change_type, change,date_time)
Values ('09996', '100', 'Student Address','House 19, block A3, Wapda Town, Lahore', to_date ('12/08/2017 10:25:18', 'DD/MM/YYYY HH24:MI:SS'));
 
Insert into student_log (student_id, serial_no, change_type, change,date_time)
Values ('12129', '100', 'Student Address', 'House 99, Street 15, Pirwidhai Mor', to_date('01/01/2020 11:01:11', 'DD/MM/YYYY HH24:MI:SS'));
 
Insert into student_log (student_id, serial_no, change_type, change,date_time)
Values ('11131', '100' ,'Student Status', 'Current',to_date('29/07/2019 09:37:45', 'DD/MM/YYYY HH24:MI:SS'));
 
Insert into student_log (student_id, serial_no, change_type, change,date_time)
Values ('11292', '100', 'Student Contact', '03331943212', to_date('10/10/2017 13:25:40', 'DD/MM/YYYY HH24:MI:SS'));

create table Dormant_Student(
student_id char(5),
dormant_start_date date
);

alter table Dormant_Student
add constraints pk_dormantstudent_id PRIMARY KEY (student_id);


alter table Dormant_Student
add constraints fk_dormantstudent_id FOREIGN KEY (student_id)
REFERENCES student_archive;


INSERT INTO Dormant_Student (student_id, dormant_start_date)
VALUES ('11131',to_date('10/12/2019', 'DD/MM/YYYY'));

