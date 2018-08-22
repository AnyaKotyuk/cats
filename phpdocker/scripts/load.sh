mysql -u root -p"pass" -e "CREATE DATABASE cats_db; USE cats_db; SOURCE /storage/dump.sql;"
echo "Dump is imported!"