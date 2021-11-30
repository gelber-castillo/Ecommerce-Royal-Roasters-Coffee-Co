create table customer
  ( userID int(5) unsigned not null auto_increment,
    username varchar(50) not null,
    password varchar(50) not null,
    email varchar(25) not null,
    fname varchar (20) not null,
    lname varchar (20) not null,
    address varchar(100) not null,

    primary key (userID)
  );

insert into customer (userID, username, email, fname, lname, address) values
  (00001,'gelcas','test@mail.com','Gelber','Castillo','1 Normal Ave, Montclair, NJ 07043'),
  (00002,'samruf','mail@test.com','Samuel','Rufino','1 Normal Ave, Montclair, NJ 07043');

create table coffee
  (  coffeeID int(4) unsigned not null,
     coffeeName varchar(50) not null,
     origin varchar(30) not null,
     roast varchar(6) not null,
     description text,
     inventory int(3) unsigned not null,
     price float(4,2),
     /*img varchar(50) default 'images/comingsoon.png',*/
     primary key (coffeeID)
 );

 insert into coffee (coffeeID, coffeeName, origin, roast, description, inventory, price) values
   (7001, "Javan Coffee", "Indonesia","dark", "A delicious blend.",10, 9.99),
   (7002, "Colombian Medium", "Colombia","medium", "A delicious blend.", 10, 14.99),
   (7003, "Italian Roast","Italy", "light", "An Italian blend perfect for espressos.", 10, 8.99),
   (7004, "Turkish Coffee","Turkey", "dark", "Flavorful and packs a punch!", 10, 9.99),
   (7005, "Guatemalan Delight", "Guatemala","light", "From the foothills of Lake Atitlan.", 10, 14.99),
   (7006, "Guatemalan House Blend", "Guatemala","dark", "Aromatic blend from Antiguan farms.", 20, 9.99),
   (3593, "Arabian Medium","Jordan", "medium", "A classic blend.", 0, 4.99),
   (2344, "Italian Light", "Italy","light", "A perfect morning blend.", 9, 8.99),
   (4673, "Turkish Light Coffee", "Turkey","light", "All the flavor with less caffine.", 10, 11.99),
   (6894, "Javan Medium Roast", "Indonesia","medium", "A delicious blend.", 10, 4.99),
   (1246, "Colombian Light Medium", "Colombia","light", "Farmed on the foothills of the Andes.", 8, 9.99),
   (9865, "Italian Dark Roast","Italy", "Dark", "A lovely evening blend.", 10, 10.99),
   (3385, "Arabian Light Roast", "Egypt","light", "A blend meant to start your day.", 15, 9.99),
   (8435, "Arabian Medium Roast - Vanilla","Jordan", "medium", "Nothing like it!", 7, 9.99),
   (7653, "Arabian Dark Roast", "Cyprus","dark", "Dark and with an abundance of flavor.", 6, 8.99),
   (5384, "Italian Mocha", "Italy","light", "A delicious blend.", 4, 8.99),
   (8445, "Hawaiian","USA", "medium", "An tropical delight!", 10, 9.99),
   (9759, "Honolulu Blend","USA", "dark", "100% organic and supports local farmers.", 5, 14.99),
   (9765, "Colombian Blend", "Colombia","medium", "A lovely medium roast for any occasion.", 20, 4.99),
   (7983, "English Roast", "United Kingdom","light", "A unique and distinguished flavor.", 14, 8.99),
   (4999, "French Light Blend", "France","light", "Avant garde and moody.", 3, 9.99),
   (5000, "French Medium Blend ", "France","medium", "With a flavor to make you want more.", 10, 9.99),
   (5001, "French Dark Blend", "France","Dark", "A delicious and dark blend.", 2, 9.99),
   (7482, "Alp Light Roast", "Switzerland","medium", "Bringing the best of Italian and French roasts.", 1, 19.99),
   (8475, "Austrian Roast", "Austria","medium", "Artistic perfection.", 10, 24.99),
   (7392, "Tokyo Special Blend", "Japan","dark", "A dark Pacific blend that will leave you craving more.", 10, 14.99),
   (7593, "Ethiopian Light Roast", "Ethiopia","light", "A delicious light African blend.", 15, 9.99),
   (7594, "Ethiopian Medium Roast", "Ethiopia","medium", "A flavor unlike any other.", 10, 9.99),
   (7595, "Ethiopian Dark Roast", "Ethiopia","dark", "A delicious dark blend.", 12, 9.99),
   (9475, "Brazilian Blend", "Brazil","medium", "A taste as wild as the Amazon!", 10, 14.99),
   (7444, "Danish Straits", "Denmark","light", "European artistry.", 7, 24.99);

create table department
  ( deptID int(1) unsigned not null auto_increment,
    deptName varchar(20) not null,
    dept_address varchar(100) not null,
    num_of_emps int not null,
    managerID int(3) unsigned not null,

    primary key (deptID),
    foreign key (managerID) references employee(empID)
  );
insert into department (deptID , deptName , dept_address , num_of_emps , managerID) values
  (1,'Administration','1 Normal Ave, Montclair, NJ 07043',2,100),
  (2,'Roastery','2 Normal Ave, Montclair, NJ 07043',2,101),
  (3,'Distribution','3 Normal Ave, Montclair, NJ 07043',2,104);

create table employee
  ( empID int(3) unsigned not null auto_increment,
    emp_fname varchar (20) not null,
    emp_lname varchar (20) not null,
    emp_address varchar(100) not null,
    position varchar(20) not null,
    ssn char(8) not null,
    managerID int(3) unsigned not null,
    deptID int(1) unsigned not null,

    primary key (empID),
    foreign key (deptID) references department(deptID)
  );

insert into employee (empID, emp_fname, emp_lname, emp_address, position, ssn, managerID, deptID) values
  (100,'Gelber','Castillo','1 Normal Ave, Montclair, NJ 07043','Owner','12345678',100,1),
  (101,'Samuel','Rufino','1 Normal Ave, Montclair, NJ 07043','Co-owner','87654321',101,2),
  (102,'Jane','Doe','10 Test Ave, Hoboken, NJ 07043','Team Member','55555555',100,1),
  (103,'Joe','Shmoe','99 Problems Ave, Alpine, NJ 07043','Roaster','12312312',101,2),
  (104,'Toph','Beifong','111 Washington St., Hoboken, NJ 07043','Manager','99988777',101,3),
  (105,'Eren','Yeagar','Wall Rose St., Newark, NJ 07101','Distributor','10101010',104,3);

create table cart
  ( userID int unsigned not null,
    coffeeID int(4) unsigned not null,
    quantity tinyint unsigned not null,

    foreign key (userID) references customer(userID),
    foreign key (coffeeID) references coffee(coffeeID)
  );

create table orders
  ( userID int unsigned not null,
    ordertime datetime not null,
    coffeeID int(4) unsigned not null,
    quantity int(3) unsigned not null,

    foreign key (userID) references customer(userID),
    foreign key (coffeeID) references coffee(coffeeID)
  );

  insert into orders (userID, ordertime, coffeeID, quantity) values
    (1, '0000-00-00 00:00:00', 7001, 1),
    (1, '0000-00-00 00:00:00', 7002, 2),
    (1, '0000-00-00 00:00:00', 7003, 1),
    (2, '0000-00-00 00:00:00', 7001, 2);
