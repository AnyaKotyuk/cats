docker exec cats-mysql /bin/bash -c "mysqldump -u root -p\"pass\" cats_db > /storage/dump.sql"
