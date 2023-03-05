echo "CREATE DATABASE IF NOT EXISTS \`blog-test\` ;" | "${mysql[@]}"
echo "GRANT ALL ON \`blog-test\`.* TO '"$MYSQL_USER"'@'%' ;" | "${mysql[@]}"
echo 'FLUSH PRIVILEGES ;' | "${mysql[@]}"
