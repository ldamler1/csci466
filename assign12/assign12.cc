#include <mysql/mysql.h>
#include <iostream>
#include <iomanip>

using namespace std;

#define host ""
#define user ""
#define passwd ""
#define database ""

int main(void)
	{
		
	MYSQL *conn, mysql;
	MYSQL_RES *res;
	MYSQL_ROW row;

	mysql_library_init(0, NULL, NULL);
		
	conn = mysql_init(&mysql);
		
	mysql_real_connect(conn, host, user, passwd, database, 0, NULL, 0);
	
	const char* q1 = "select * from Marina";
	const char* q2 = "select LastName, FirstName, City from Owner";
	const char* q3 = "select BoatName from MarinaSlip join Owner on MarinaSlip.OwnerNum = Owner.OwnerNum";
	
	mysql_query(conn, q1);
	res = mysql_store_result(conn);
	int nFields = mysql_num_fields(res);
	
	while((row = mysql_fetch_row(res)))
		{
		unsigned long *lengths;
		lengths = mysql_fetch_lengths(res);
		
		for(int i = 0; i < nFields; i++)
			{
			printf("%.*s   ", (int) lengths[i], row[i] ? row[i] : "NULL");
			
			MYSQL_RES *res2;
			MYSQL_ROW row2;
			mysql_query(conn, q3);
			res2 = mysql_store_result(conn);
			int nFields2 = mysql_num_fields(res2);
			while((row2 = mysql_fetch_row(res2)))
				{
				for(int i = 0; i < nFields2; i++)
					printf("%.*s   ", (int) lengths[i], row[i] ? row[i] : "NULL");
				}
			mysql_free_result(res2);
			}
		printf("\n");
		}
	
	mysql_free_result(res);
	
/*	
	mysql_query(conn, q2);
	res = mysql_store_result(conn);
	nFields = mysql_num_fields(res);
	
	while((row = mysql_fetch_row(res)))
		{
		unsigned long *lengths;
		lengths = mysql_fetch_lengths(res);
		
		for(int i = 0; i < nFields; i++)
			{printf("%.*s   ", (int) lengths[i], row[i] ? row[i] : "NULL");}
		printf("\n");
		}
	mysql_free_result(res);
	
	mysql_query(conn, q3);
	res = mysql_store_result(conn);
	nFields = mysql_num_fields(res);
	
	while((row = mysql_fetch_row(res)))
		{
		unsigned long *lengths;
		lengths = mysql_fetch_lengths(res);
		
		for(int i = 0; i < nFields; i++)
			{printf("%.*s   ", (int) lengths[i], row[i] ? row[i] : "NULL");}
		printf("\n");
		}
	mysql_free_result(res);
*/
	
	mysql_close(conn);
	
	mysql_library_end();
	
	return 0;
	}
