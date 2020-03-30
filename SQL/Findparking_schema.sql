DROP DATABASE IF EXISTS icash_db;

CREATE DATABASE IF NOT EXISTS icash_db;

USE icash_db;

CREATE TABLE tbl_entidad (
  enti_cod int(5) AUTO_INCREMENT PRIMARY KEY,
  enti_nom text NOT NULL,
  enti_nit varchar(100),
  enti_ema varchar(80),
  enti_tit varchar(50) NOT NULL,
  enti_des varchar(100) NOT NULL,
  enti_img text NOT NULL,
  enti_tip varchar(25) NOT NULL,
  enti_ciu varchar(25) NOT NULL,
  enti_pai varchar(25) NOT NULL
);

CREATE TABLE tbl_usuario (
  usua_cod int(5) AUTO_INCREMENT PRIMARY KEY,
  usua_ced varchar(12) NOT NULL UNIQUE,
  usua_nom varchar(255) NOT NULL,
  usua_cel varchar(11) NOT NULL,
  usua_ema varchar(80) NOT NULL UNIQUE,
  usua_pas text NOT NULL,
  usua_img text NOT NULL,
  usua_dir varchar(50) NOT NULL,
  usua_rol varchar(50) NOT NULL,
  usua_est varchar(25) NOT NULL,
  usua_enti_fk int(5) NOT NULL,
  FOREIGN KEY (usua_enti_fk) REFERENCES tbl_entidad(enti_cod) 
    ON DELETE RESTRICT ON UPDATE NO ACTION
);


CREATE TABLE tbl_categoria_puc(
	catp_id int(2) AUTO_INCREMENT PRIMARY KEY, -- Identificador de la categoria
	catp_nombre varchar(20) NOT NULL -- Nombre de la categoria
);
CREATE TABLE tbl_cuentas_puc(
	cpuc_id varchar(10) PRIMARY KEY, -- Identificador de la cuenta puc
	cpuc_des text NOT NULL, -- Descripción de la cuenta puc}
	cpuc_cate_fk int(2) NOT NULL,
	FOREIGN KEY (cpuc_cate_fk) REFERENCES tbl_categoria_puc(catp_id) 
		ON DELETE CASCADE ON UPDATE NO ACTION
);

CREATE TABLE tbl_estado(
	esta_id int(2) AUTO_INCREMENT PRIMARY KEY, -- Identificador de estado
	esta_nom varchar(15) NOT NULL -- Nombre del estado (Activo Inactivo)
);

CREATE TABLE tbl_cuentas(
	cuen_id int(5) AUTO_INCREMENT PRIMARY KEY, -- Identificador del sistema para el cuenta
  	cuen_valo varchar(12) NOT NULL UNIQUE, -- Numero de Identificación Tributario del cuenta
  	cuen_des text NOT NULL, -- Nombre del cuenta
  	cuen_fec date NOT NULL,
	cuen_esta_fk int(2) NOT NULL, -- Llave foranea para el estado del cuenta
	cuen_usua_fk int(5) NOT NULL, -- Llave foranea del usuario creador del cuenta
	cuen_cpuc_fk varchar(10) NOT NULL, -- Llave foranea del usuario creador del cuenta
	FOREIGN KEY (cuen_cpuc_fk) REFERENCES tbl_cuentas_puc(cpuc_id) 
		ON DELETE CASCADE ON UPDATE NO ACTION,
	FOREIGN KEY (cuen_esta_fk) REFERENCES tbl_estado(esta_id) 
		ON DELETE CASCADE ON UPDATE NO ACTION,
	FOREIGN KEY (cuen_usua_fk) REFERENCES tbl_usuario(usua_cod) 
		ON DELETE CASCADE ON UPDATE NO ACTION
);
