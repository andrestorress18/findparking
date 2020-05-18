DROP DATABASE IF EXISTS findparking_db;

CREATE DATABASE IF NOT EXISTS findparking_db;

USE findparking_db;

CREATE TABLE tbl_usuario (
  usua_cod int(5) AUTO_INCREMENT PRIMARY KEY, -- Codigo del usuario
  usua_ced varchar(12) NOT NULL UNIQUE,   -- Cedula del usuario
  usua_nom varchar(255) NOT NULL, -- Nombre del usuario
  usua_cel varchar(11) NOT NULL,  -- Celular del usuario
  usua_ema varchar(80) NOT NULL UNIQUE, -- Correo del usuario
  usua_pas varchar(40) NOT NULL, -- Contraseña del usuario
  usua_img varchar(40) NOT NULL, -- Imagen del usuario
  usua_dir varchar(50) NOT NULL,  -- Dirección del usuario
  usua_rol varchar(50) NOT NULL,  -- Rol del usuario
  usua_est varchar(25) NOT NULL -- Estado del usuario (Activo - Inactivo)
);


CREATE TABLE tbl_parqueadero(
  parq_id int(5) AUTO_INCREMENT PRIMARY KEY, -- Identificador de la parqueadero
  parq_nom varchar(50) NOT NULL, -- Nombre de la parqueadero
  parq_des varchar(100),         -- Descripción de la parqueadero
  parq_tar varchar(10) NOT NULL, -- Tarifa de la parqueadero
  parq_log varchar(50) NOT NULL, -- Longitud del parqueadero
  parq_lat varchar(50) NOT NULL, -- Latitud del parqueadero
  parq_fot varchar(50) NOT NULL -- Foto del parqueadero
);

CREATE TABLE tbl_gestor(
  gest_id int(5) AUTO_INCREMENT PRIMARY KEY, -- Codigo del gestor del parqueadero
  gest_parq_fk int(5) NOT NULL, -- Codigo del parqueadero
  gest_usua_fk int(5) NOT NULL, -- Codigo del usuario que gestiona
  FOREIGN KEY (gest_parq_fk) REFERENCES tbl_parqueadero(parq_id) 
    ON DELETE CASCADE ON UPDATE NO ACTION,
  FOREIGN KEY (gest_usua_fk) REFERENCES tbl_usuario(usua_cod) 
    ON DELETE CASCADE ON UPDATE NO ACTION
);

CREATE TABLE tbl_cupo(
  cupo_cod int(10) AUTO_INCREMENT PRIMARY KEY, -- Identificador del cupo
  cupo_ref varchar(15) NOT NULL -- Referencia del cupo
);
CREATE TABLE tbl_cupo_parqueadero(
  cupa_cod int(10) AUTO_INCREMENT PRIMARY KEY, -- Codigo del parqueadero y cupo
  cupa_est int(5) NOT NULL, -- Estado del cupo
  cupa_cub boolean NOT NULL, -- Cupo cubierto
  cupa_dim varchar(10) NOT NULL, -- Dimesiones del cupo
  cupa_parq_fk int(5) NOT NULL, -- Parqueadero al que pertenece el cupo
  cupa_cupo_fk int(10) NOT NULL, -- Cupo del parqueadero
  FOREIGN KEY (cupa_parq_fk) REFERENCES tbl_parqueadero(parq_id) 
    ON DELETE CASCADE ON UPDATE NO ACTION,
  FOREIGN KEY (cupa_cupo_fk) REFERENCES tbl_cupo(cupo_cod) 
    ON DELETE CASCADE ON UPDATE NO ACTION
);

CREATE TABLE tbl_vehiculo(
  vehi_cod int(2) AUTO_INCREMENT PRIMARY KEY, -- Identificador del vehiculo
  vehi_pla varchar(8) NOT NULL, -- Placa del vehiculo
  vehi_col varchar(10) NOT NULL, -- Color del vehiculo
  vehi_con varchar(50) NOT NULL -- Conductor del vehiculo
);

CREATE TABLE tbl_comprobante(
  comp_cod int(6) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY, -- Identificador del sistema para el comprobante
  comp_fin date NOT NULL, -- Fecha de ingreso del vehiculo
  comp_hin time NOT NULL, -- Hora de ingreso del vehiculo
  comp_fsa date,  -- Fecha de salida del vehiculo
  comp_hsa time, -- Hora de salida del vehiculo
  comp_val varchar(10), -- Valor total a pagar
  comp_cupo_fk int(10) NOT NULL, -- Llave foranea del cupo en uso
  comp_vehi_fk int(5) NOT NULL, -- Llave foranea del vehiculo que usa el cupo
  FOREIGN KEY (comp_cupo_fk) REFERENCES tbl_cupo_parqueadero(cupa_cod) 
    ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (comp_vehi_fk) REFERENCES tbl_vehiculo(vehi_cod) 
    ON DELETE NO ACTION ON UPDATE NO ACTION
);
