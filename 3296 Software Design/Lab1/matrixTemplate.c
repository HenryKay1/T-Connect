#include <stdio.h>
#include <unistd.h>
#include <stdlib.h>
#include <time.h>
#include "my_global.h"
#include "mysql.h"

int A [n][n];
int B [n][n];
int C [n][n];

int main(int argc, char* argv[]) {

 MYSQL *con; // MySQL connection 
 MYSQL_RES *result; // MySQL result set 
 MYSQL_ROW row;
 char *server = "cis-linux2.temple.edu";
 char *user = "tul46491";
 char *password = "ainumoob"; 
 char *database = "FA20_3296_tul46491"; 
 char query[1024], host[1024];
 char timeBuffer[20];
 time_t now = time(NULL);
 clock_t start, end;
 double elapsed_Time,Mflops;

 gethostname(host, sizeof(host)); //Get host Name
 strftime(timeBuffer, 20, "%Y-%m-%d %H:%M:%S", localtime(&now));

 //Open mySqlConnection
 con = mysql_init(NULL); // get a connection
 if (!mysql_real_connect(con, server, user, password, database, 0, NULL, 0))
 { 
	perror(mysql_error(con));           
	exit(-1);
 }

 //Fill matrices
 int i,j,k;

 for ( i =0; i< n; i++){
  for ( j =0; j< n; j++){
     A[i][j] = (rand() % 6) + 1; //Random number between 1 and 10
     B[i][j]= (rand() % 6) + 1;
     C[i][j]= 0;
  }
 }
/**
 printf("Matrix A\n");
 for (int i =0; i< n; i++){
  printf(" \n");
  for (int j =0; j< n; j++){
     printf("%d ", A[i][j]);
  }
 } 

 printf("\n\nMatrix B");
 for (int i =0; i< n; i++){
  printf(" \n");
  for (int j =0; j< n; j++){
     printf("%d ", B[i][j]);
  }
 }
*/

 start = clock();
 for ( #1=0; #1< n; #1++){
   for ( #2=0; #2< n; #2++){
    for ( #3=0; #3< n; #3++){
      C[i][j] += A[i][k] * B[k][j];
    }
   }
 }
 end = clock();

 if (n <=5) {
   printf("\n\nMatix C: A*B (#1-#2-#3)\n");
   for (i =0; i< n; i++){
      for (j =0; j< n; j++){
        printf("%d ", C[i][j]);
      }
      printf(" \n");
   }
 }

 elapsed_Time = ((double) (end - start))/1000000;
 Mflops = (double)(n/elapsed_Time*n/1000000*n);
 printf("\nSize: %d\nElapsed Time: %f seconds\nMflops: %f\n",n, elapsed_Time,Mflops);

 sprintf(query,
    "insert into PLogs(Timestamp,Host,Size,ElapsedTime,MFLOPS,LoopOrder) values  (\"%s\",\"%s\",%d,%f,%f,\"#1-#2-#3\")",
    timeBuffer, host, n, elapsed_Time, Mflops);
 // Execute it
 if (mysql_query(con, query)) { 
    perror(mysql_error(con));                
    return(-2);
 }
}
