/* Damler, Lucas
   z1761739
   Assign5*/

use BabyName;

/*1.) Shows tables in database;*/
show tables;
 
/*2.) Shows columns in database limited to 10*/
select * from BabyName limit 10;

/*3.) Shows distinct info about tables in database related to name 'Luke'*/
select distinct year from BabyName where name = 'Luke' limit 10;

/*4.) Shows distinct names from birth year 1997*/
select distinct name from BabyName where year = '1997' limit 10;

/*5.) Shows most popular male and female name*/
select max(name) from BabyName where year = '1997' and gender = 'M';
select max(name) from BabyName where year = '1997' and gender = 'F';

/*6.) Shows names similar to 'Luke' organized by alphabetical order within count, within year*/
select distinct name from BabyName where name like '%Luke%' order by name, count, year;

/*7.) Shows how many rows are in table*/
select count(*) from BabyName limit 10;

/*8.) shows name count in year 1960*/
select count(name) from BabyName where year = '1960' limit 10;

/*9.) Shows name count for year 1965*/
select count(name) from BabyName where year = '1965' limit 10;

/*10.) shows distinct name count for each place*/
select place, count(distinct name,place) from BabyName group by place;
