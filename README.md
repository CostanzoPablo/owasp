# owasp
	INSTALL DOCKER
		sudo apt install docker.io

	DOWNLOAD
		git clone https://github.com/CostanzoPablo/owasp

    IN CASE OF HUMAN
        sudo systemctl start docker

    IN CASE OF UBUNTU MASKED DAEMON
        sudo systemctl unmask docker.service
        sudo systemctl unmask docker.socket
        sudo systemctl start docker.service
        sudo systemctl status docker

	BUILD
		cd install
		sudo ./build.sh
	RUN
		./run.sh

	TEST	
		curl http://localhost/

	STOP
		docker ps
		docker stop [id]		
