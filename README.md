# owasp
	INSTALL DOCKER
		apt install docker.io

	DOWNLOAD
		git clone https://github.com/CostanzoPablo/owasp

	RUN
		cd owasp/container
		docker build --no-cache -t tutum/lamp .
		#service apache2 stop
		#service mysql stop
		cd ../owasp/pentest
		docker build --no-cache -t costanzopablo/owasp .
		docker run -d -p 80:80 -p 3306:3306 costanzopablo/owasp

	TEST	
		curl http://localhost/

	STOP
		docker ps
		docker stop

	MYSQL
		GET password
			sudo docker logs 2976a81f1a9b19787d9bde893c831b7e6586d7c8391ccd222ad29b02c282d896
		
		GET IP
			sudo docker inspect 2976a81f1a9b19787d9bde893c831b7e6586d7c8391ccd222ad29b02c282d896
