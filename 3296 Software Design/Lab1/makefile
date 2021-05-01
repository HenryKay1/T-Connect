CFLAGS = -O3
OBJS =-lmysqlclient
INC =-I../mysql-connector/include
all: touch mijk mikj mkji mkij mjki mjik
mijk : mijk.c
	cc $(CFLAGS) $(INC) -Dn=$(SIZE) -o mijk mijk.c $(OBJS)
mikj : mikj.c
	cc $(CFLAGS) $(INC) -Dn=$(SIZE) -o mikj mikj.c $(OBJS)
mkji : mkji.c
	cc $(CFLAGS) $(INC) -Dn=$(SIZE) -o mkji mkji.c $(OBJS)
mkij : mkij.c
	cc $(CFLAGS) $(INC) -Dn=$(SIZE) -o mkij mkij.c $(OBJS)
mjki : mjki.c
	cc $(CFLAGS) $(INC) -Dn=$(SIZE) -o mjki mjki.c $(OBJS)
mjik : mjik.c
	cc $(CFLAGS) $(INC) -Dn=$(SIZE) -o mjik mjik.c $(OBJS)
touch :
	touch *.c
