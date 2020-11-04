FROM python:3

RUN pip install flask
RUN pip install cx_Oracle

RUN apt-get update
RUN apt-get install -y zip


WORKDIR /opt/oracle
ADD instantclient-basic-linux.x64-19.9.0.0.0dbru.zip /opt/oracle
RUN unzip instantclient-basic-linux.x64-19.9.0.0.0dbru.zip

WORKDIR /opt/oracle/instantclient_19_9
RUN apt-get install -y libaio1
RUN sh -c "echo /opt/oracle/instantclient_19_9 > /etc/ld.so.conf.d/oracle-instantclient.conf"
RUN ldconfig


WORKDIR /app
ADD app.py /app/

EXPOSE 5000

CMD ["python","app.py"]
