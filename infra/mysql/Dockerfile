FROM mysql/mysql-server:8.0

ENV MYSQL_DATABASE=googlemap \
  MYSQL_USER=root \
  TZ=Asia/Tokyo

COPY ./my.cnf /etc/my.cnf
RUN chmod 644 /etc/my.cnf