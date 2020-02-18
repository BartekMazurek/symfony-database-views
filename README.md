# databaseView - example of database views in Symfony with frontend KNP pagination
databaseView is a small proof of concept, based on Symfony and database views. Sometimes you may want to query for data from a database view (projection created from other tables), rather than from tables directly. Main reason why you should use views instead tables while querying for a large amount of data is performance. The security of the stored data is the second most important factor.

The main concept in this example is to create an entity (**PostReportView.php** in the project) that reflects the database view you are going to create in the next step (based on other entities - Author, Comment, Post). In the migration file for that entity, just modify the SQL stement and replace "create table..." clause on "create view..." (as shown in migration file **Version20200217193748**.php). To generate random data for a frontend view, use command **./bin/console doctrine:fixtures:load --append**

![Stocks API image](http://bartekblog.prv.pl/symfonyviews/dbv5.png)
![Stocks API image](http://bartekblog.prv.pl/symfonyviews/dbv4.png)
![Stocks API image](http://bartekblog.prv.pl/symfonyviews/dbv3.png)
![Stocks API image](http://bartekblog.prv.pl/symfonyviews/dbv2.png)
![Stocks API image](http://bartekblog.prv.pl/symfonyviews/dbv1.png)

# Requirements
**1** - PHP 7.2+

**2** - MySql 8+

**3** - Composer

# How to set up 
**1** - Download Symfony dependencies, run the following command in the project root directory: **composer install**

**2** - Set proper database credentials in **.env** file and create the database: **doctrine:database:create**

**3** - To run the application in development mode run the terminal command: **symfony server:start**

**4** - Fetch data with random fixtures: **doctrine:fixtures:load --append** (--append option is important in that case because Doctrine is trying to execute DELETE clause on every entity by default, but you can't use this statement on the view). Generating random data can take a while (even up to 1 hour). If you want to generate less random data, just uncomment if statement in **PostCommentFixtures.php**.
