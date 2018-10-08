docker run -p 3306:3306 --name my_mysql -e MYSQL_ROOT_PASSWORD=r00tp4ssw0rd15gggg -e MYSQL_USER=owasp -e MYSQL_PASSWORD=mys3cr3tp4ssw0rd23 -d mysql

docker run -p 80:80 -p 9000:9000 --name my_owasp -v ../pentest:/var/www --link my_mysql:mysqldb -d ttaranto/docker-nginx-php7
