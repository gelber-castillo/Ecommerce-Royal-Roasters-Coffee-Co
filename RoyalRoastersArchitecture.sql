create table customer
  ( userID int(5) unsigned not null auto_increment,
    username varchar(50) not null,
    passwd varchar(50) not null,
    email varchar(25) not null,
    fname varchar (20) not null,
    lname varchar (20) not null,
    address varchar(100) not null,

    primary key (userID)
  );

insert into customer (userID, username, passwd, email, fname, lname, address) values
  (00001,'gelcas','root','test@mail.com','Gelber','Castillo','1 Normal Ave, Montclair, NJ 07043'),
  (00002,'samruf','root','mail@test.com','Samuel','Rufino','1 Normal Ave, Montclair, NJ 07043');

create table coffee
  (  coffeeID int(4) unsigned not null,
     coffeeName varchar(50) not null,
     origin varchar(30) not null,
     roast varchar(6) not null,
     description text,
     inventory int(3) unsigned not null,
     price float(5,2) not null,
     primary key (coffeeID)
 );

 insert into coffee (coffeeID, coffeeName, origin, roast, description, inventory, price) values
   (9001,"Stone Street","Kenya","medium","Rated as the best tasting brand",15,27.99),
   (9002,"Death Wish Coffee","Colombia","dark","The World\’s Strongest Coffee",16,19.99),
   (9003,"Spirit Animal Coffee","Honduras","medium","Best organic coffee brand",10,22.99),
   (9004,"Real Good Coffee Co.","USA","medium","Best budget",10,12.99),
   (9005,"Volcanica Coffee","Ethiopia","medium","Best Arabica coffee brand",10,25.99),
   (9006,"Nescafe Azera Intenso","England","medium","Best instant coffee brand",12,11.99),
   (9007,"Trade Coffee","USA","light","Best USA coffee brand",10,19.99),
   (9008,"Bizzy Organic","Guatemala","dark","Best cold brew coffee brand",15,29.99),
   (9009,"Cardiology Coffee","Honduras","medium","Best low acid coffee brand",10,22.99),
   (9010,"Fresh Roasted Coffee","Mexico","light","Best Mexican coffee brand",12,18.99),
   (9011,"Sea Island","USA","light","Best Hawaiian coffee brand",5,100.00),
   (9012,"Lavazza","Italy","medium","Best Italian coffee brand",20,19.99),
   (9013,"Don Francisco\'s","Cuba","dark","Best-flavoured coffee brand",15,19.99),
   (9014,"Caribou Coffee","Brazil","light","Best light roast coffee brand",10,14.99),
   (9015,"High Voltage","Colombia","dark,","The kick-start you deserve from your morning coffee",10,15.99),
   (9016,"Chameleon","Guatemala","medium","Way way awesome beans, sourced from Huehuetenango",15,19.99),
   (9017,"Lifeboost","Kenya","dark","Unique, rare Pacamara beans",10,39.99),
   (9018,"JO","Colombia","medium","Delicious gourmet coffee that is grown naturally",10,17.99),
   (9019,"Blue Mountain Coffee","Panama","medium","Prominent fruit flavors, light acidity",10,15.99),
   (9020,"New England Coffee","USA","medium","Butter pecan",10,19.99),
   (9021,"Stumptown Coffee Roasters","Indonesia","medium","Hair Bender Whole Bean Coffee",15,24.99),
   (9022,"Peet\’s Coffee","Ethiopia","medium","Big Bang",10,19.99),
   (9023,"La Colombe","Brazil","dark","Chocolate, red wine, and spices",13,21.99),
   (9024,"Intelligentsia","El Salvador","dark","Frequency Blend",15,19.99),
   (9025,"Counter Culture Coffee","Papua New Guinea","medium","Roasted on the day that they are shipped",10,29.99),
   (9026,"Mount Hagen","Papua New Guinea","medium","Quick, easy, efficient, and delicious",12,19.99),
   (9027,"Red Bay Coffee","Tanzania","light","East Fourteenth Tanzanian Coffee Beans",7,24.99),
   (9028,"Peerless","France","dark","Direct Trade Organic French Roast",15,27.99),
   (9029,"Koffee Kult","Guatemala","dark","Enjoy warming notes of cinnamon and cocoa",16,17.99),
   (9030,"Black Ivory Coffee","Thailand","light","Passed through an elephant's digestive system",2,150.00);

create table department
  ( deptID int(1) unsigned not null auto_increment,
    deptName varchar(20) not null,
    dept_address varchar(100) not null,
    managerID int(3) unsigned not null,

    primary key (deptID),
    foreign key (managerID) references employee(empID)
  );
insert into department (deptID , deptName , dept_address , managerID) values
  (1,'Administration','1 Normal Ave, Montclair, NJ 07043',100),
  (2,'Roastery','2 Normal Ave, Montclair, NJ 07043',101),
  (3,'Distribution','3 Normal Ave, Montclair, NJ 07043',104);

create table employee
  ( empID int(3) unsigned not null auto_increment,
    emp_fname varchar (20) not null,
    emp_lname varchar (20) not null,
    emp_address varchar(100) not null,
    position tinyint not null,
    ssn char(9) not null,
    managerID int(3) unsigned not null,
    deptID int(1) unsigned not null,
    e_username varchar(20) not null,
    e_passwd varchar(50) not null,

    primary key (empID),
    foreign key (deptID) references department(deptID)
  );

insert into employee (empID, emp_fname, emp_lname, emp_address, position, ssn, managerID, deptID, e_username, e_passwd) values
  (100,'Gelber','Castillo','1 Normal Ave, Montclair, NJ 07043',1,'123456789',100,1, 'gelber', '123456'),
  (101,'Samuel','Rufino','1 Normal Ave, Montclair, NJ 07043',1,'987654321',101,2,'samuel', '123456'),
  (102,'Jane','Doe','10 Test Ave, Hoboken, NJ 07043',2,'555555555',100,1,'janed', '123456'),
  (103,'Joe','Shmoe','99 Problems Ave, Alpine, NJ 07043',2,'123123123',101,2,'joesh', '123456'),
  (104,'Toph','Beifong','111 Washington St., Hoboken, NJ 07043',3,'999887777',101,3,'toph', '123456'),
  (105,'Eren','Yeagar','Wall Rose St., Newark, NJ 07101',3,'101010101',104,3,'ereny', '123456');

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
    total float(4,2),

    foreign key (userID) references customer(userID),
    foreign key (coffeeID) references coffee(coffeeID)
  );

  insert into orders (userID, ordertime, coffeeID, quantity, total) values
    (1, '2021-01-01 01:00:00', 9001, 1, 9.99),
    (1, '2021-05-01 01:00:00', 9002, 2, 29.98),
    (1, '2021-05-01 01:00:00', 9003, 1, 8.99),
    (2, '2021-04-11 01:00:00', 9001, 2, 19.98);
