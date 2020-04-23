## PJ Test

##### Installing using Docker

Clone repository 
```bash
git clone git@github.com:yiicom/pj-test.git
```

Start the docker
```bash 
docker-compose up -d
```

Run install script
```bash 
docker-compose run --rm backend sh install.sh
```

install.sh contains:
 - fix permissions on assets and runtime folders
 - composer install
 - run migrate
    
Access it in your browser by opening
    
- frontend: http://127.0.0.1:20080
- backend: http://127.0.0.1:21080
    
All API functionality is in the app/modules/depot/backend   
 
API requests examples:
```text
# List of Drivers
http://127.0.0.1:21080/depot/api/driver/list
http://127.0.0.1:21080/depot/api/driver/list?page=2
http://127.0.0.1:21080/depot/api/driver/list?name=Назар

# List of Buses
http://127.0.0.1:21080/depot/api/bus/list
http://127.0.0.1:21080/depot/api/bus/list?speed=110

# Travel time
http://127.0.0.1:21080/depot/api/driver/time?from=Москва&to=Тула

```