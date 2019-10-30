

-- ----------------------------
-- Sequence structure for articulo_id_articulo_seq
-- ----------------------------
DROP SEQUENCE "public"."articulo_id_articulo_seq";
CREATE SEQUENCE "public"."articulo_id_articulo_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1691
 CACHE 1;
SELECT setval('"public"."articulo_id_articulo_seq"', 1691, true);

-- ----------------------------
-- Sequence structure for empresa_id_empresa_seq
-- ----------------------------
DROP SEQUENCE "public"."empresa_id_empresa_seq";
CREATE SEQUENCE "public"."empresa_id_empresa_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 3
 CACHE 1;
SELECT setval('"public"."empresa_id_empresa_seq"', 3, true);


DROP SEQUENCE "public"."persona_id_persona_seq";
CREATE SEQUENCE "public"."persona_id_persona_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 143
 CACHE 1;
SELECT setval('"public"."persona_id_persona_seq"', 143, true);


DROP SEQUENCE "public"."precios_articulo_id_precio_articulo_seq";
CREATE SEQUENCE "public"."precios_articulo_id_precio_articulo_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1663
 CACHE 1;
SELECT setval('"public"."precios_articulo_id_precio_articulo_seq"', 1663, true);


DROP SEQUENCE "public"."roles_usuario_id_roles_seq";
CREATE SEQUENCE "public"."roles_usuario_id_roles_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 2
 CACHE 1;
SELECT setval('"public"."roles_usuario_id_roles_seq"', 2, true);

DROP SEQUENCE "public"."secuencia_id";
CREATE SEQUENCE "public"."secuencia_id"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 22
 CACHE 1;
SELECT setval('"public"."secuencia_id"', 22, true);

-- ----------------------------
-- Sequence structure for secuencia_id_cantidad_articulos
-- ----------------------------
DROP SEQUENCE "public"."secuencia_id_cantidad_articulos";
CREATE SEQUENCE "public"."secuencia_id_cantidad_articulos"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1055
 CACHE 1;
SELECT setval('"public"."secuencia_id_cantidad_articulos"', 1055, true);

DROP SEQUENCE "public"."secuencia_id_cliente";
CREATE SEQUENCE "public"."secuencia_id_cliente"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 97
 CACHE 1;
SELECT setval('"public"."secuencia_id_cliente"', 97, true);


DROP SEQUENCE "public"."secuencia_id_detalle_devolucion";
CREATE SEQUENCE "public"."secuencia_id_detalle_devolucion"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 89
 CACHE 1;
SELECT setval('"public"."secuencia_id_detalle_devolucion"', 89, true);

DROP SEQUENCE "public"."secuencia_id_detalle_entrega";
CREATE SEQUENCE "public"."secuencia_id_detalle_entrega"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

DROP SEQUENCE "public"."secuencia_id_factura";
CREATE SEQUENCE "public"."secuencia_id_factura"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 613
 CACHE 1;
SELECT setval('"public"."secuencia_id_factura"', 613, true);

DROP SEQUENCE "public"."sucursal_id_sucursal_seq";
CREATE SEQUENCE "public"."sucursal_id_sucursal_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 44
 CACHE 1;
SELECT setval('"public"."sucursal_id_sucursal_seq"', 44, true);

DROP SEQUENCE "public"."sucursales_usuario_id_sucursales_usuario_seq";
CREATE SEQUENCE "public"."sucursales_usuario_id_sucursales_usuario_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 18
 CACHE 1;
SELECT setval('"public"."sucursales_usuario_id_sucursales_usuario_seq"', 18, true);

DROP SEQUENCE "public"."usuario_id_usuario_seq";
CREATE SEQUENCE "public"."usuario_id_usuario_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 140
 CACHE 1;
SELECT setval('"public"."usuario_id_usuario_seq"', 140, true);


DROP TABLE IF EXISTS "public"."area";
CREATE TABLE "public"."area" (
"id_area" int4 DEFAULT nextval('area_id_area_seq'::regclass) NOT NULL,
"nombre_area" varchar(300) COLLATE "default",
"ubicacion" text COLLATE "default",
"direccion" varchar(256) COLLATE "default",
"telefono_area" varchar(32) COLLATE "default",
"id_empresa" int4
)
WITH (OIDS=TRUE)

;

-- ----------------------------
-- Records of area
-- ----------------------------
INSERT INTO "public"."area" VALUES ('101', 'Distrbuidora La Paz Casa Matriz', 'Sopocachi', 'Av. Jaimes Freyre Nro 9 Edif. IMPEXPAP II Piso 5 Dpto. 5', null, null);
INSERT INTO "public"."area" VALUES ('136', 'Sucursal ECOBOL', 'ECOBOL Zona Central', 'Av. Mariscal Santa Cruz Nro 1240 Edif ECOBOL Zona Central', null, null);
INSERT INTO "public"."area" VALUES ('137', 'Sucursal 2 Megacenter', 'Mega Center', 'Av. Rafael Pabon s/n Edif Megacenter 3d Nivel', null, null);
INSERT INTO "public"."area" VALUES ('138', 'Sucursal Villa Tunari', 'Villa Tunari', 'Calle Villa Tunari Nro s/n Localidad Villa Tunari', null, null);
INSERT INTO "public"."area" VALUES ('139', 'Sucursal Villa Fatima', 'Villa Fatima', 'Villa Fatima, calle Mayor Lopera Nro 230 entre c. Puente Villa y Alto Beni', null, null);
INSERT INTO "public"."area" VALUES ('140', 'Sucursal Floria Tarija', 'Tarija', 'Calle Junin Nro 930 Zona Florida', null, null);

-- ----------------------------
-- Table structure for articulo
-- ----------------------------
DROP TABLE IF EXISTS "public"."articulo";
CREATE TABLE "public"."articulo" (
"id_articulo" int4 DEFAULT nextval('articulo_id_articulo_seq'::regclass) NOT NULL,
"codigo_articulo" varchar(15) COLLATE "default",
"descripcion_articulo" varchar(300) COLLATE "default",
"unidad_medida" varchar(15) COLLATE "default",
"cantidad_representativa" numeric(16,5),
"unidad_representativa" varchar(100) COLLATE "default",
"id_empresa" int4,
"estado_articulo" bool DEFAULT true NOT NULL
)
WITH (OIDS=TRUE)

;

-- ----------------------------
-- Records of articulo
-- ----------------------------

-- ----------------------------
-- Table structure for cantidad_articulos_factura
-- ----------------------------
DROP TABLE IF EXISTS "public"."cantidad_articulos_factura";
CREATE TABLE "public"."cantidad_articulos_factura" (
"id_cantidad_articulos" int4 DEFAULT nextval('secuencia_id_cantidad_articulos'::regclass) NOT NULL,
"id_factura" int4 NOT NULL,
"id_articulo" int4 NOT NULL,
"cantidad" int4,
"id_precio_articulo" int4 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of cantidad_articulos_factura
-- ----------------------------

-- ----------------------------
-- Table structure for cantidad_articulos_factura_vista
-- ----------------------------
DROP TABLE IF EXISTS "public"."cantidad_articulos_factura_vista";
CREATE TABLE "public"."cantidad_articulos_factura_vista" (
"id_cantidad_articulos" int4 DEFAULT nextval('secuencia_id_cantidad_articulos'::regclass) NOT NULL,
"id_factura" int4 NOT NULL,
"id_articulo" int4 NOT NULL,
"cantidad" int4,
"id_precio_articulo" int4 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of cantidad_articulos_factura_vista
-- ----------------------------

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS "public"."cliente";
CREATE TABLE "public"."cliente" (
"nit_carnet" varchar(255) COLLATE "default",
"cliente" varchar(255) COLLATE "default",
"id_cliente" int4 DEFAULT nextval('secuencia_id_cliente'::regclass) NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO "public"."cliente" VALUES ('0', 'S/N', '88');

-- ----------------------------
-- Table structure for cliente_vista
-- ----------------------------
DROP TABLE IF EXISTS "public"."cliente_vista";
CREATE TABLE "public"."cliente_vista" (
"nit_carnet" varchar(255) COLLATE "default",
"cliente" varchar(255) COLLATE "default",
"id_cliente" int4 DEFAULT nextval('secuencia_id_cliente'::regclass) NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of cliente_vista
-- ----------------------------
INSERT INTO "public"."cliente_vista" VALUES ('0', 'S/N', '93');

-- ----------------------------
-- Table structure for dosificacion
-- ----------------------------
DROP TABLE IF EXISTS "public"."dosificacion";
CREATE TABLE "public"."dosificacion" (
"id_dosificacion" int4 DEFAULT nextval('secuencia_id'::regclass) NOT NULL,
"numero_autorizacion" varchar(30) COLLATE "default" NOT NULL,
"fecha_emision" date NOT NULL,
"llave_dosificacion" varchar(100) COLLATE "default" NOT NULL,
"leyenda_factura" int4 NOT NULL,
"actividad_economica" char(255) COLLATE "default" NOT NULL,
"nit_area" varchar(30) COLLATE "default" NOT NULL,
"fecha_actualizada" timestamp(6) NOT NULL,
"estado_dosificacion" int4 NOT NULL,
"id_sucursal" int4 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of dosificacion
-- ----------------------------

-- ----------------------------
-- Table structure for empresa
-- ----------------------------
DROP TABLE IF EXISTS "public"."empresa";
CREATE TABLE "public"."empresa" (
"id_empresa" int4 DEFAULT nextval('empresa_id_empresa_seq'::regclass) NOT NULL,
"nombre_empresa" char(100) COLLATE "default",
"direccion_empresa" char(200) COLLATE "default",
"ubicacion_empresa" char(200) COLLATE "default",
"telefono" char(20) COLLATE "default",
"nombre_completo" char(200) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of empresa
-- ----------------------------
INSERT INTO "public"."empresa" VALUES ('1', 'LACTEOSBOL                                                                                          ', 'Av. Jaimes Freyre Nro 9 Edif. IMPEXPAP II Piso 5 Dpto 5 Zona Sopocachi                                                                                                                                  ', 'LA PAZ                                                                                                                                                                                                  ', '2123132             ', 'EMPRESA PUBLICA PRODUCTIVA LACTEOS DE BOLIVIA                                                                                                                                                           ');
INSERT INTO "public"."empresa" VALUES ('2', 'EBA                                                                                                 ', 'Av. Jaimes Freyre Nro 9 Edif. IMPEXPAP II Piso 5 Dpto 5 Zona Sopocachi                                                                                                                                  ', 'LA PAZ                                                                                                                                                                                                  ', '2132132             ', 'EMPRESA BOLIVIANA DE ALMENDRAS Y DERIVADOS                                                                                                                                                              ');
INSERT INTO "public"."empresa" VALUES ('3', 'PAPELBOL                                                                                            ', 'Av. Jaimes Freyre Nro 9 Edif. IMPEXPAP II Piso 5 Dpto 5 Zona Sopocachi                                                                                                                                  ', 'LA PAZ                                                                                                                                                                                                  ', '21316561            ', 'EMPRESA PUBLICA PRODUCTIVA PAPELES DE BOLIVIA                                                                                                                                                           ');

-- ----------------------------
-- Table structure for estado
-- ----------------------------
DROP TABLE IF EXISTS "public"."estado";
CREATE TABLE "public"."estado" (
"id_estado" varchar(5) COLLATE "default" NOT NULL,
"estado" varchar(300) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of estado
-- ----------------------------
INSERT INTO "public"."estado" VALUES ('A', 'Activo');
INSERT INTO "public"."estado" VALUES ('I', 'Inactivo');

-- ----------------------------
-- Table structure for factura
-- ----------------------------
DROP TABLE IF EXISTS "public"."factura";
CREATE TABLE "public"."factura" (
"id_factura" int4 DEFAULT nextval('secuencia_id_factura'::regclass) NOT NULL,
"id_usuario" int4 NOT NULL,
"id_sucursal" int4 NOT NULL,
"id_dosificacion" int4 NOT NULL,
"id_cliente" int4 NOT NULL,
"codigo_control" char(20) COLLATE "default" NOT NULL,
"estado_factura" int4,
"numero_factura" int4 NOT NULL,
"fecha_factura" date NOT NULL,
"fechahora_aud_factura" timestamp(6) DEFAULT now() NOT NULL,
"numero_conjunta" int4,
"id_area" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of factura
-- ----------------------------

-- ----------------------------
-- Table structure for factura_vista
-- ----------------------------
DROP TABLE IF EXISTS "public"."factura_vista";
CREATE TABLE "public"."factura_vista" (
"id_factura" int4 DEFAULT nextval('secuencia_id_factura'::regclass) NOT NULL,
"id_usuario" int4 NOT NULL,
"id_sucursal" int4 NOT NULL,
"id_dosificacion" int4 NOT NULL,
"id_cliente" int4 NOT NULL,
"codigo_control" char(20) COLLATE "default" NOT NULL,
"estado_factura" int4,
"numero_factura" int4 NOT NULL,
"fecha_factura" date NOT NULL,
"fechahora_aud_factura" timestamp(6) DEFAULT now() NOT NULL,
"numero_conjunta" int4,
"id_area" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of factura_vista
-- ----------------------------

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS "public"."persona";
CREATE TABLE "public"."persona" (
"id_persona" int4 DEFAULT nextval('persona_id_persona_seq'::regclass) NOT NULL,
"paterno" varchar(300) COLLATE "default",
"materno" varchar(300) COLLATE "default",
"nombres" varchar(300) COLLATE "default" NOT NULL,
"sexo" char(1) COLLATE "default",
"fecha_nacimiento" date,
"correo" varchar(250) COLLATE "default",
"telefono" varchar(15) COLLATE "default",
"movil" varchar(15) COLLATE "default",
"usr_registro" int4,
"ci" varchar(15) COLLATE "default"
)
WITH (OIDS=TRUE)

;

-- ----------------------------
-- Records of persona
-- ----------------------------
INSERT INTO "public"."persona" VALUES ('118', 'admin', 'admin', 'admin', 'M', '1990-01-01', 'admin@sedem.gob.bo', null, null, '0', '1234567');

-- ----------------------------
-- Table structure for precios_articulo
-- ----------------------------
DROP TABLE IF EXISTS "public"."precios_articulo";
CREATE TABLE "public"."precios_articulo" (
"id_precio_articulo" int4 DEFAULT nextval('precios_articulo_id_precio_articulo_seq'::regclass) NOT NULL,
"id_articulo" int4 NOT NULL,
"timestamp_registro" timestamp(6) DEFAULT ('now'::text)::timestamp without time zone NOT NULL,
"id_usuario" int4 NOT NULL,
"precio_articulo" numeric(18,5),
"estado_precio_articulo" bool DEFAULT true NOT NULL,
"id_sucursal" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of precios_articulo
-- ----------------------------

-- ----------------------------
-- Table structure for roles_usuario
-- ----------------------------
DROP TABLE IF EXISTS "public"."roles_usuario";
CREATE TABLE "public"."roles_usuario" (
"id_roles" int4 DEFAULT nextval('roles_usuario_id_roles_seq'::regclass) NOT NULL,
"tipo_usuario" varchar(200) COLLATE "default",
"descripcion" varchar(200) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of roles_usuario
-- ----------------------------
INSERT INTO "public"."roles_usuario" VALUES ('1', 'Administrador', 'Ingresa lor precios, Nuevos productos o actualizacion de dosificaciones');
INSERT INTO "public"."roles_usuario" VALUES ('2', 'Distribuidor', 'Distribuir la venta generada de las diferentes empresas');

-- ----------------------------
-- Table structure for sucursal
-- ----------------------------
DROP TABLE IF EXISTS "public"."sucursal";
CREATE TABLE "public"."sucursal" (
"id_sucursal" int4 DEFAULT nextval('sucursal_id_sucursal_seq'::regclass) NOT NULL,
"id_empresa" int4 NOT NULL,
"direccion_sucursal" varchar(255) COLLATE "default" NOT NULL,
"estado" bool DEFAULT true NOT NULL,
"ubicacion_sucursal" varchar(255) COLLATE "default",
"telefono" varchar(255) COLLATE "default",
"nombre_sucursal" varchar(255) COLLATE "default",
"situacion" bool DEFAULT true NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of sucursal
-- ----------------------------
INSERT INTO "public"."sucursal" VALUES ('16', '1', 'Av. Jaimes Freyre Nro 9 Edif. IMPEXPAP II Piso 5 Dpto 5 Zona Sopocachi', 't', 'La Paz', '256516615', 'Casa Matriz', 't');
INSERT INTO "public"."sucursal" VALUES ('17', '1', 'Av. Mariscal Santa Cruz Nro 1240 Edif. ECOBOL Zona Central', 't', 'La Paz', '256516615', 'Sucursal 12', 't');
INSERT INTO "public"."sucursal" VALUES ('18', '2', 'Av. Jaimes Freyre Nro 9 Edif. IMPEXPAP II Piso 5 Dpto 5 Zona Sopocachi', 't', 'La Paz', '2651651', 'Casa Matriz', 't');
INSERT INTO "public"."sucursal" VALUES ('19', '2', 'Av. Mariscal Santa Cruz Nro 1240 Edif. ECOBOL Zona Central', 't', 'La Paz', '25465465', 'Sucursal 1', 't');
INSERT INTO "public"."sucursal" VALUES ('20', '3', 'Av. Jaimes Freyre Nro 9 Edif. IMPEXPAP II Piso 5 Dpto 5 Zona Sopocachi', 't', 'La Paz', '2652626', 'Casa Matriz', 't');
INSERT INTO "public"."sucursal" VALUES ('21', '3', 'Av. Mariscal Santa Cruz Nro 1240 Edif. ECOBOL Zona Central', 't', 'La Paz', '26465465', 'Sucursal 1', 't');
INSERT INTO "public"."sucursal" VALUES ('23', '1', 'Av. Rafael Pabon s/n Edif. Megacenter 2do Nivel', 't', 'La Paz', '256516615', 'Sucursal 13', 't');
INSERT INTO "public"."sucursal" VALUES ('24', '3', 'Av. Rafael Pabon s/n Edif. Megacenter 2do Nivel', 't', 'La Paz', '22564564', 'Sucursal 2', 't');
INSERT INTO "public"."sucursal" VALUES ('25', '2', 'Calle Mayor Lopera Nro 230 Zona Villa Fatima', 't', 'La Paz', '356565165', 'Sucursal 9', 't');
INSERT INTO "public"."sucursal" VALUES ('28', '1', 'Carretera Villa Tunari S/N Comunidad Villa Tunari', 't', 'Cochabamba', '256516615', 'Sucursal 18', 't');
INSERT INTO "public"."sucursal" VALUES ('30', '1', 'Villa Fatima, Calle Mayor Lopera Nro 230 entre c. Puente Villa y Alto Tunari', 't', 'La Paz', '256516615', 'Sucursal 15', 't');
INSERT INTO "public"."sucursal" VALUES ('32', '1', 'Calle Junin Nro 930 Zona Florida', 't', 'Tarija', '256516615', 'Sucursal 17', 't');
INSERT INTO "public"."sucursal" VALUES ('33', '2', 'Av. Rafael Pabon s/n Edif. Megacenter 2do Nivel', 't', 'La Paz', '256454564', 'Sucursal 11', 't');
INSERT INTO "public"."sucursal" VALUES ('36', '2', 'Calle Villa Tunari Nro S/N Zona/Barrio Villa Tunari Cbba', 't', 'Cochabamba', '28645654', 'Sucursal 13', 't');
INSERT INTO "public"."sucursal" VALUES ('38', '2', 'Calle Junin Nro 930, Zona La Pampa Tarija', 't', 'Tarija', '25654654', 'Sucursal 14', 't');
INSERT INTO "public"."sucursal" VALUES ('42', '3', 'Calle Mayor Lopera Nro 230 entre Calles Puente Villa y Alto Beni', 't', 'La Paz', '5456645', 'Sucursal 15', 't');
INSERT INTO "public"."sucursal" VALUES ('43', '3', 'Calle Junin Nro 930, Zona Florida', 't', 'Tarija', '235513', 'Sucursal 8', 't');
INSERT INTO "public"."sucursal" VALUES ('44', '3', 'Calle Villa Tunari Nro s/n Localidad Villa Tunari', 't', 'Cochabamba', '2655666', 'Sucursal 6', 't');

-- ----------------------------
-- Table structure for sucursales_usuario
-- ----------------------------
DROP TABLE IF EXISTS "public"."sucursales_usuario";
CREATE TABLE "public"."sucursales_usuario" (
"id_sucursales_usuario" int4 DEFAULT nextval('sucursales_usuario_id_sucursales_usuario_seq'::regclass) NOT NULL,
"id_usuario" int4,
"id_sucursal" int4,
"estado" bool DEFAULT true NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of sucursales_usuario
-- ----------------------------

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS "public"."usuario";
CREATE TABLE "public"."usuario" (
"id_usuario" int4 DEFAULT nextval('usuario_id_usuario_seq'::regclass) NOT NULL,
"usuario" varchar(250) COLLATE "default" NOT NULL,
"clave" text COLLATE "default" NOT NULL,
"fecha_registro" timestamp(6) DEFAULT now(),
"id_estado" varchar(5) COLLATE "default" NOT NULL,
"id_persona" int4 NOT NULL,
"id_area" int4,
"usr_registro" int4 NOT NULL,
"id_rol" int4
)
WITH (OIDS=TRUE)

;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO "public"."usuario" VALUES ('1', 'admin.admin', '202cb962ac59075b964b07152d234b70', '2016-05-05 16:32:08', 'A', '118', '101', '6', '1');

-- ----------------------------
-- View structure for view_articulos
-- ----------------------------
CREATE OR REPLACE VIEW "public"."view_articulos" AS 
 SELECT a.id_articulo,
    ((btrim((a.codigo_articulo)::text) || ' '::text) || btrim((a.descripcion_articulo)::text)) AS items
   FROM articulo a;

-- ----------------------------
-- View structure for view_personas
-- ----------------------------
CREATE OR REPLACE VIEW "public"."view_personas" AS 
 SELECT p.id_persona,
    ((((btrim((p.nombres)::text) || ' '::text) || btrim((p.paterno)::text)) || ' '::text) || btrim((p.materno)::text)) AS persona
   FROM persona p;

-- ----------------------------
-- Alter Sequences Owned By 
-- ----------------------------
ALTER SEQUENCE "public"."articulo_id_articulo_seq" OWNED BY "articulo"."id_articulo";
ALTER SEQUENCE "public"."empresa_id_empresa_seq" OWNED BY "empresa"."id_empresa";
ALTER SEQUENCE "public"."persona_id_persona_seq" OWNED BY "persona"."id_persona";
ALTER SEQUENCE "public"."roles_usuario_id_roles_seq" OWNED BY "roles_usuario"."id_roles";
ALTER SEQUENCE "public"."sucursales_usuario_id_sucursales_usuario_seq" OWNED BY "sucursales_usuario"."id_sucursales_usuario";

-- ----------------------------
-- Primary Key structure for table area
-- ----------------------------
ALTER TABLE "public"."area" ADD PRIMARY KEY ("id_area");

-- ----------------------------
-- Uniques structure for table articulo
-- ----------------------------
ALTER TABLE "public"."articulo" ADD UNIQUE ("codigo_articulo");

-- ----------------------------
-- Primary Key structure for table articulo
-- ----------------------------
ALTER TABLE "public"."articulo" ADD PRIMARY KEY ("id_articulo");

-- ----------------------------
-- Primary Key structure for table cantidad_articulos_factura
-- ----------------------------
ALTER TABLE "public"."cantidad_articulos_factura" ADD PRIMARY KEY ("id_cantidad_articulos");

-- ----------------------------
-- Primary Key structure for table cantidad_articulos_factura_vista
-- ----------------------------
ALTER TABLE "public"."cantidad_articulos_factura_vista" ADD PRIMARY KEY ("id_cantidad_articulos");

-- ----------------------------
-- Primary Key structure for table cliente
-- ----------------------------
ALTER TABLE "public"."cliente" ADD PRIMARY KEY ("id_cliente");

-- ----------------------------
-- Primary Key structure for table cliente_vista
-- ----------------------------
ALTER TABLE "public"."cliente_vista" ADD PRIMARY KEY ("id_cliente");

-- ----------------------------
-- Primary Key structure for table dosificacion
-- ----------------------------
ALTER TABLE "public"."dosificacion" ADD PRIMARY KEY ("id_dosificacion");

-- ----------------------------
-- Primary Key structure for table empresa
-- ----------------------------
ALTER TABLE "public"."empresa" ADD PRIMARY KEY ("id_empresa");

-- ----------------------------
-- Primary Key structure for table estado
-- ----------------------------
ALTER TABLE "public"."estado" ADD PRIMARY KEY ("id_estado");

-- ----------------------------
-- Primary Key structure for table factura
-- ----------------------------
ALTER TABLE "public"."factura" ADD PRIMARY KEY ("id_factura");

-- ----------------------------
-- Primary Key structure for table factura_vista
-- ----------------------------
ALTER TABLE "public"."factura_vista" ADD PRIMARY KEY ("id_factura");

-- ----------------------------
-- Primary Key structure for table persona
-- ----------------------------
ALTER TABLE "public"."persona" ADD PRIMARY KEY ("id_persona");

-- ----------------------------
-- Primary Key structure for table precios_articulo
-- ----------------------------
ALTER TABLE "public"."precios_articulo" ADD PRIMARY KEY ("id_precio_articulo");

-- ----------------------------
-- Primary Key structure for table roles_usuario
-- ----------------------------
ALTER TABLE "public"."roles_usuario" ADD PRIMARY KEY ("id_roles");

-- ----------------------------
-- Primary Key structure for table sucursal
-- ----------------------------
ALTER TABLE "public"."sucursal" ADD PRIMARY KEY ("id_sucursal");

-- ----------------------------
-- Primary Key structure for table sucursales_usuario
-- ----------------------------
ALTER TABLE "public"."sucursales_usuario" ADD PRIMARY KEY ("id_sucursales_usuario");

-- ----------------------------
-- Primary Key structure for table usuario
-- ----------------------------
ALTER TABLE "public"."usuario" ADD PRIMARY KEY ("id_usuario");

-- ----------------------------
-- Foreign Key structure for table "public"."articulo"
-- ----------------------------
ALTER TABLE "public"."articulo" ADD FOREIGN KEY ("id_empresa") REFERENCES "public"."empresa" ("id_empresa") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."cantidad_articulos_factura"
-- ----------------------------
ALTER TABLE "public"."cantidad_articulos_factura" ADD FOREIGN KEY ("id_precio_articulo") REFERENCES "public"."precios_articulo" ("id_precio_articulo") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."cantidad_articulos_factura" ADD FOREIGN KEY ("id_factura") REFERENCES "public"."factura" ("id_factura") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."cantidad_articulos_factura" ADD FOREIGN KEY ("id_articulo") REFERENCES "public"."articulo" ("id_articulo") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."dosificacion"
-- ----------------------------
ALTER TABLE "public"."dosificacion" ADD FOREIGN KEY ("id_sucursal") REFERENCES "public"."sucursal" ("id_sucursal") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."factura"
-- ----------------------------
ALTER TABLE "public"."factura" ADD FOREIGN KEY ("id_usuario") REFERENCES "public"."usuario" ("id_usuario") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."factura" ADD FOREIGN KEY ("id_cliente") REFERENCES "public"."cliente" ("id_cliente") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."factura" ADD FOREIGN KEY ("id_dosificacion") REFERENCES "public"."dosificacion" ("id_dosificacion") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."precios_articulo"
-- ----------------------------
ALTER TABLE "public"."precios_articulo" ADD FOREIGN KEY ("id_articulo") REFERENCES "public"."articulo" ("id_articulo") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."precios_articulo" ADD FOREIGN KEY ("id_usuario") REFERENCES "public"."usuario" ("id_usuario") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."precios_articulo" ADD FOREIGN KEY ("id_sucursal") REFERENCES "public"."sucursal" ("id_sucursal") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."sucursal"
-- ----------------------------
ALTER TABLE "public"."sucursal" ADD FOREIGN KEY ("id_empresa") REFERENCES "public"."empresa" ("id_empresa") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."sucursales_usuario"
-- ----------------------------
ALTER TABLE "public"."sucursales_usuario" ADD FOREIGN KEY ("id_sucursal") REFERENCES "public"."sucursal" ("id_sucursal") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."sucursales_usuario" ADD FOREIGN KEY ("id_usuario") REFERENCES "public"."usuario" ("id_usuario") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."usuario"
-- ----------------------------
ALTER TABLE "public"."usuario" ADD FOREIGN KEY ("id_rol") REFERENCES "public"."roles_usuario" ("id_roles") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."usuario" ADD FOREIGN KEY ("id_estado") REFERENCES "public"."estado" ("id_estado") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."usuario" ADD FOREIGN KEY ("id_persona") REFERENCES "public"."persona" ("id_persona") ON DELETE NO ACTION ON UPDATE NO ACTION;
