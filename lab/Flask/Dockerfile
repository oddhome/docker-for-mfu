FROM ubuntu:20.04

#Environment
RUN export DEBIAN_FRONTEND=noninteractive
ENV TZ=Asia/Bangkok
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Install Require Ubuntu Package
RUN apt-get update
RUN apt-get install -y  python3-pip python3-dev build-essential libssl-dev libffi-dev python3-setuptools uwsgi-plugin-python3 nginx supervisor

# Install Python Package
WORKDIR /app
ADD requirements.txt .
RUN pip3 install -r requirements.txt


EXPOSE 80

WORKDIR /app
ADD myproject.py .
ADD myproject.ini .
ADD wsgi.py .

WORKDIR /app

RUN rm /etc/nginx/sites-enabled/default

ADD default.conf /etc/nginx/conf.d

COPY supervisord.conf /etc/supervisor/
CMD ["/usr/bin/supervisord"]