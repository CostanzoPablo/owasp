# owasp
	INSTALL DOCKER
		apt install docker.io

	DOWNLOAD
		git clone https://github.com/CostanzoPablo/owasp

	BUILD
		cd owasp
		./build.sh
	RUN
		./run.sh

	TEST	
		curl http://localhost/

	STOP
		docker ps
		docker stop

	DELETE
		docker ps
		
