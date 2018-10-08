docker stop owasp
docker rm owasp
docker rmi owasp --force
docker build -t owasp --rm -f Dockerfile .

