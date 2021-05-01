#include <stdio.h>
#include <stdlib.h>

int main(int argc, char **argv) {
 char commandLine[102];
 int i;
 
 // Generate six ijk orders for N=5
 sprintf(commandLine, "cp matrixTemplate.c mijk.c");
 system(commandLine);
 sprintf(commandLine, "sed -i s/#1/i/g mijk.c");
 system(commandLine);
 sprintf(commandLine, "sed -i s/#2/j/g mijk.c");
 system(commandLine);
 sprintf(commandLine, "sed -i s/#3/k/g mijk.c");
 system(commandLine);

 sprintf(commandLine, "cp matrixTemplate.c mikj.c");
 system(commandLine);
 sprintf(commandLine, "sed -i s/#1/i/g mikj.c");
 system(commandLine);
 sprintf(commandLine, "sed -i s/#2/k/g mikj.c");
 system(commandLine);
 sprintf(commandLine, "sed -i s/#3/j/g mikj.c");
 system(commandLine);
 
 sprintf(commandLine, "cp matrixTemplate.c mkji.c");
 system(commandLine);
 sprintf(commandLine, "sed -i s/#1/k/g mkji.c");
 system(commandLine);
 sprintf(commandLine, "sed -i s/#2/j/g mkji.c");
 system(commandLine);
 sprintf(commandLine, "sed -i s/#3/i/g mkji.c");
 system(commandLine);
 
 sprintf(commandLine, "cp matrixTemplate.c mkij.c");
 system(commandLine);
 sprintf(commandLine, "sed -i s/#1/k/g mkij.c");
 system(commandLine);
 sprintf(commandLine, "sed -i s/#2/i/g mkij.c");
 system(commandLine);
 sprintf(commandLine, "sed -i s/#3/j/g mkij.c");
 system(commandLine);
 
 sprintf(commandLine, "cp matrixTemplate.c mjki.c");
 system(commandLine);
 sprintf(commandLine, "sed -i s/#1/j/g mjki.c");
 system(commandLine);
 sprintf(commandLine, "sed -i s/#2/k/g mjki.c");
 system(commandLine);
 sprintf(commandLine, "sed -i s/#3/i/g mjki.c");
 system(commandLine);
 
 sprintf(commandLine, "cp matrixTemplate.c mjik.c");
 system(commandLine);
 sprintf(commandLine, "sed -i s/#1/j/g mjik.c");
 system(commandLine);
 sprintf(commandLine, "sed -i s/#2/i/g mjik.c");
 system(commandLine);
 sprintf(commandLine, "sed -i s/#3/k/g mjik.c");
 system(commandLine);
 
 sprintf(commandLine, "make SIZE=2");
 system(commandLine);
 system("mijk");
 system("mikj");
 system("mkji");
 system("mkij");
 system("mjki");
 system("mjik");
 
}
