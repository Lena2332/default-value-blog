# {OKBlog} Demo project #

Fullstack development demo project

## Local development #

The project can be run with Apache/Nginx and is compatible with Default Value Docker infrastructure. Alternatively, you can add a MySQL 8.0 container to this composition and bind Apache 80/443 ports to run it.

To start project with Default Value Docker infrastructure:

    Clone the project
    Generate SSL certificate
    Append certificate information to ${PROJECTS_ROOT_DIR}/docker_infrastructure/local_infrastructure/configuration/certificates.toml
    Add domains to the /etc/hosts file
    Start Docker composition
    Install Composer dependencies
    Create MySQL user, DB and grant permissions
    Setup DB schema and data
    Optional: generate test data

# 1. Clone the project
cd $PROJECTS_ROOT_DIR
git clone https://gitlab.allbugs.info/olenak/olena-kupriiets-blog.git

# 2. Generate SSL certificate
cd $SSL_CERTIFICATES_DIR
mkcert -cert-file=olena-kupriiets-blog.loc+1.pem -key-file=olena-kupriiets-blog.loc+1-key.pem olena-kupriiets-blog.loc www.olena-kupriiets-blog.loc

# 3. Append certificate information
echo '
[[tls.certificates]]
certFile = "/certs/olena-kupriiets-blog.loc+1.pem"
keyFile = "/certs/olena-kupriiets-blog.loc+1-key.pem"
' >> ${PROJECTS_ROOT_DIR}/docker_infrastructure/local_infrastructure/configuration/certificates.toml

# 4. Add domains to the `/etc/hosts` file
echo '127.0.0.1 olena-kupriiets-blog.loc www.olena-kupriiets-blog.loc' | sudo tee -a /etc/hosts

# 5. Start Docker composition
cd ${PROJECTS_ROOT_DIR}olena-kupriiets-blog/
docker-compose up -d

# 6. Install Composer dependencies
docker exec -it olena-kupriiets-blog.loc composer install

# 7. Create MySQL user, DB and grant permissions
mysql -uroot -proot -h127.0.0.1 --port=3380 -e 'SOURCE config/init.sql'

# 8. Setup DB schema and data
curl https://olena-kupriiets-blog.loc/install

# 9. Optional: generate test data
docker exec -it olena-kupriiets-blog.loc php bin/console install:generate-data