#include <mysql/mysql.h>
#include <iostream>

using namespace std;

#define host "courses"
#define user "z1761739"
#define passwd "eWarner@123"
#define database "z1761739"

int main(void)
	{
		
	MYSQL *conn, mysql;
	MYSQL_RES *res;
	MYSQL_ROW row;

	mysql_library_init(0, NULL, NULL);
		//{
		//fprintf(stderr, "could not initialize MySQL client library\n");
		//exit(1);
		//}
		
	conn = mysql_init(&mysql);
		
	mysql_real_connect(conn, host, user, passwd, database, 0, NULL, 0);
	
	mysql_query(conn, "show tables");
	res = mysql_store_result(conn);
		
	while((row = mysql_fetch_row(res)) != NULL)
		printf("%s \n", row[0]);
		
	mysql_close(conn);
	
	mysql_library_end();
	
	return 0;
	}
