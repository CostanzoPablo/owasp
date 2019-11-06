docker stop owasp
docker rm owasp
docker rmi owasp --force
docker build  --no-cache -t owasp --rm -f Dockerfile .

