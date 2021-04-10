drop database if exists gong;
create database gong;
use gong;

CREATE TABLE soci(
	nif VARCHAR (9) PRIMARY KEY NOT NULL,
	nom VARCHAR (15) NOT NULL,
    cognoms VARCHAR (15) NOT NULL,
    adreca VARCHAR (15) NOT NULL,
    poblacio VARCHAR (15) NOT NULL,
    comarca VARCHAR (15) NOT NULL,
    fixe integer NOT NULL,
    mobil integer NOT NULL,
    email VARCHAR (15) NOT NULL,
    dataAlta date NOT NULL,
    quotaMes integer NOT NULL,
    aportAny integer (15) NOT NULL
);

CREATE TABLE ong(
	cif numeric (10) PRIMARY KEY NOT NULL,
	nom VARCHAR (15) NOT NULL,
	adreca VARCHAR (15) NOT NULL,
	poblacio VARCHAR (30) NOT NULL,
	comarca VARCHAR (15) NOT NULL,
	tipus VARCHAR (15) NOT NULL,
	utpublica BOOLEAN NOT NULL
);

CREATE TABLE tenen(
	cif numeric (8) NOT NULL,
	nif VARCHAR (9) NOT NULL,
    primary key (cif, nif),

    FOREIGN KEY (cif) REFERENCES ong (cif),
    FOREIGN KEY (nif) REFERENCES soci (nif)
);


CREATE TABLE treballador(
	nif VARCHAR (9) PRIMARY KEY NOT NULL,
	nom VARCHAR (15) NOT NULL,
    cognoms VARCHAR (15) NOT NULL,
    adreca VARCHAR (15) NOT NULL,
    poblacio VARCHAR (15) NOT NULL,
    comarca VARCHAR (15) NOT NULL,
    fixe integer NOT NULL,
    mobil integer NOT NULL,
    email VARCHAR (15) NOT NULL,
    dataIngres date NOT NULL,
	cif numeric (8) NOT NULL,

   	FOREIGN KEY (cif) REFERENCES ong (cif)
);

CREATE TABLE voluntari(
	nif VARCHAR (9) PRIMARY KEY NOT NULL,
	edat integer NOT NULL,
	professio VARCHAR (15) NOT NULL,
	hDedicades integer NOT NULL,

    FOREIGN KEY (nif) REFERENCES treballador (nif)
);

CREATE TABLE professional(
	nif VARCHAR (9) PRIMARY KEY NOT NULL,
	carrec VARCHAR (20) NOT NULL,
	pagamentSegSocial integer NOT NULL,
    percntIRPF integer NOT NULL,

    FOREIGN KEY (nif) REFERENCES treballador (nif)
);


CREATE TABLE usuari(
	username VARCHAR (20) PRIMARY KEY NOT NULL,
	passwd VARCHAR (32) NOT NULL,
	nom VARCHAR (20) NOT NULL,
	cognoms VARCHAR (20) NOT NULL,
	email VARCHAR (40) NOT NULL,
	mobil integer NOT NULL,
	admin boolean NOT NULL
);

INSERT INTO usuari VALUES ('SysAdmin',MD5('Qwerty1'),'System','Administrator','GONGsysAdmin@gmail.com','636589632',TRUE);

CREATE USER IF NOT EXISTS 'SysAdmin'@'localhost' IDENTIFIED BY 'Qwerty1';
GRANT ALL ON gong.* TO 'SysAdmin'@'localhost';

