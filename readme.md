# Lumen Docker 

### **Description**

This will create a dockerized stack for a Lumen application, consisted of the following containers:
-  **app**, PHP application container

        Nginx, PHP7.4 PHP7.4-fpm, Composer, NPM, Node.js v10.x
    
-  **mysql**, MySQL database container ([mysql](https://hub.docker.com/_/mysql/) official Docker image)

#### **Directory Structure**
```
+-- src <project root>
+-- resources
|   +-- default
|   +-- nginx.conf
|   +-- supervisord.conf
|   +-- www.conf
+-- .gitignore
+-- Dockerfile
+-- docker-compose.yml
+-- readme.md <this file>
```

### **Setup instructions**

**Prerequisites:** 

* Depending on your OS, the appropriate version of Docker Community Edition has to be installed on your machine.  ([Download Docker Community Edition](https://hub.docker.com/search/?type=edition&offering=community))

**steps:** 

1. Access te bash app and run migrate

    **Lumen**

    ```
    $ docker exec -it app bash
    $ php artisan migrate --seed
    ```

2. Use [http://localhost](http://localhost) in postman ou other xxx.

3. Use Artisan command for import cities

   **Lumen**

    ```
    $ docker exec -it app bash
    $ php artisan ibge:cities:import UF
    ```
*inform only two caracters for uf's in Brasil

**Default configuration values** 

The following values should be replaced in your `.env` file if you're willing to keep them as defaults:
    
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=appdb
    DB_USERNAME=user
    DB_PASSWORD=myuserpass
    
