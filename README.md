# owasp

	DOWNLOAD
	tutum/lamp Docker / Lamp configuration
		
		git clone https://github.com/tutumcloud/lamp

	RUN
		docker build -no-cache -t tutum/lamp .
		service apache2 stop
		service mysql stop
		docker run -d -p 80:80 -p 3306:3306 tutum/lamp
		
	REPLACING TUTUM/LAMP "Hello World" application 

		In order to replace the "Hello World" application that comes bundled with this docker image, create a new Dockerfile in an empty folder with the following contents:
		
		FROM tutum/lamp:latest
		RUN rm -fr /app && git clone https://github.com/username/customapp.git /app
		EXPOSE 80 3306
		CMD ["/run.sh"]
		replacing https://github.com/username/customapp.git with your application's GIT repository. After that, build the new Dockerfile:
		
		docker build -t username/my-lamp-app .
		And test it:
		
		docker run -d -p 80:80 -p 3306:3306 username/my-lamp-app
		Test your deployment:
		
		curl http://localhost/


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
