# owasp

docker build -t tutum/lamp .
docker run -d -p 80:80 -p 3306:3306 tutum/lamp

docker ps
docker stop