#!/bin/bash
#docker pull ttaranto/docker-nginx-php7

#docker ps | grep "mysql" | wc -l > 0 (parar y volver a correr)
docker run -p 3306:3306 --name my_mysql -e MYSQL_ROOT_PASSWORD=r00tp4ssw0rd15gggg -e MYSQL_USER=owasp -e MYSQL_PASSWORD=mys3cr3tp4ssw0rd23 -d mysql:5.6

#docker ps | grep "owasp" | wc -l > 0 (parar antes de que corra)
docker run -p 80:80 -p 9000:9000 --name owasp --link my_mysql:mysqldb -d owasp
