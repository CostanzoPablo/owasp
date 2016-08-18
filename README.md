# owasp

	DOWNLOAD
		tutum/lamp Docker / Lamp configuration from https://github.com/tutumcloud/lamp
		move all files form tutum/lamp to owasp directory
	
	RUN
		docker build -no-cache -t tutum/lamp .
		service apache2 stop
		service mysql stop
		docker run -d -p 80:80 -p 3306:3306 tutum/lamp

	STOP
		docker ps
		docker stop

	MYSQL
		GET password
			sudo docker logs 2976a81f1a9b19787d9bde893c831b7e6586d7c8391ccd222ad29b02c282d896
		
		GET IP
			sudo docker inspect 2976a81f1a9b19787d9bde893c831b7e6586d7c8391ccd222ad29b02c282d896

		CONNECT
			mysql -uadmin -pJcM5FCphMOp4 -h 172.17.42.1 -P 3306
			
		CONFIGURE DATABASE
			CREATE DATABASE owasp;
			USE owasp;
			SOURCE /var/www/html/owasp/owasp.sql
