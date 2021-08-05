# Student Registration System
A web application for a school, facilitating the registration of students. Built using HTML/CSS, PHP and Oracle.

## Included Files
- **table_creation.sql** : has sql code for creating and populating all tables
- **reports** : there is a php file for each report, and the various queries used are also mentioned separately in the respective txt files
- **forms** : there is a php file for each form

## Requirements
Hamarey Bachchey is a NGO with the goal to reform education for children. They offer weekly classes for children below the age of 15. They wish to develop a database system.

The NGO is organized in the following ways.

After signing up, each student has to register for a course, and can only be registered to one course at a time. Once the course is completed, the student can register for a new course. After registration, the student is split into different classes based on their age (eg 3-4 years to class 1, 4-6 years to class 2, etc). Each class will be taught the same subjects, in a manner best suited to their age group. Each class can have multiple sections, depending on the need. Classes can also be further separated into groups based on students’ gender. Classes can also be given a custom title.

Each students’ personal information will be saved, including photos which may need to be updated every year. The most crucial information will be that of the parents/guardian. The Email, phone number, address and CNIC of both parents need to be recorded for each student. In the event of any incident where the parents will be unavailable, a guardian also needs to be available, in which case their details and relation to the students also need to be recorded. A history needs to be maintained for whenever base information of students/parents/guardian is changed.

For the earlier classes with very young students, the mother needs to be present with the child. If for whatever reason the mother cannot come, a female guardian must be present instead. In such cases, the NGO needs to be informed ahead of time of the individual accompanying the child, and other such information, including whether the individual is pregnant and/or needs assistance in any way. The fee each student has to pay is different, depending on their class. If a parent admits more than 3 children, they may be offered a discount. Moreover, if the parents can’t pay for legitimate reasons, they will be offered a discount. There will be no fee for a child of a Hamarey Bachchey staff member. Payment of fee is made before course registration to a third-party which provides the parents a challan or voucher number, which the parents then enter during course registration process.

## Forms
- student admission
- student accompanying form
- class assignment form
- student per class form (with search)

## Reports
- A report of a list of students grouped by classes along with add, search, delete, and edit
student features. Search can be performed using student name or id.

-  A report of a list of classes with number of students per class and student count per gender.
Search can be performed using class name.

- A report of a list of all students who have been dormant for given number of months/years.
Search can be performed using months or years.

- A report of all info on a given student (parents, guardian, siblings, class history). Search can
be performed using student name or id.

- A report of all info on a given parent (all children, classes of each child, designated guardian).
Search can be performed using parent name or id.
