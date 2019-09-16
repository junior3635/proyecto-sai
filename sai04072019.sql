--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.7
-- Dumped by pg_dump version 9.6.7

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: alumnos; Type: TABLE; Schema: public; Owner: jutineo
--

CREATE TABLE alumnos (
    id bigint NOT NULL,
    idpersona bigint NOT NULL,
    condicionalum character varying(191),
    procedenciaalum character varying(191),
    idrepresentante bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE alumnos OWNER TO jutineo;

--
-- Name: alumnos_id_seq; Type: SEQUENCE; Schema: public; Owner: jutineo
--

CREATE SEQUENCE alumnos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE alumnos_id_seq OWNER TO jutineo;

--
-- Name: alumnos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jutineo
--

ALTER SEQUENCE alumnos_id_seq OWNED BY alumnos.id;


--
-- Name: estado; Type: TABLE; Schema: public; Owner: jutineo
--

CREATE TABLE estado (
    id integer NOT NULL,
    nombre character varying(191) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE estado OWNER TO jutineo;

--
-- Name: estado_id_seq; Type: SEQUENCE; Schema: public; Owner: jutineo
--

CREATE SEQUENCE estado_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE estado_id_seq OWNER TO jutineo;

--
-- Name: estado_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jutineo
--

ALTER SEQUENCE estado_id_seq OWNED BY estado.id;


--
-- Name: grados; Type: TABLE; Schema: public; Owner: jutineo
--

CREATE TABLE grados (
    id bigint NOT NULL,
    grado integer NOT NULL,
    descripciongrado character varying(191) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE grados OWNER TO jutineo;

--
-- Name: grados_id_seq; Type: SEQUENCE; Schema: public; Owner: jutineo
--

CREATE SEQUENCE grados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE grados_id_seq OWNER TO jutineo;

--
-- Name: grados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jutineo
--

ALTER SEQUENCE grados_id_seq OWNED BY grados.id;


--
-- Name: inscripcions; Type: TABLE; Schema: public; Owner: jutineo
--

CREATE TABLE inscripcions (
    id bigint NOT NULL,
    codigoinscripcion bigint NOT NULL,
    fecha date NOT NULL,
    idseccion bigint NOT NULL,
    idalum bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE inscripcions OWNER TO jutineo;

--
-- Name: inscripcions_id_seq; Type: SEQUENCE; Schema: public; Owner: jutineo
--

CREATE SEQUENCE inscripcions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE inscripcions_id_seq OWNER TO jutineo;

--
-- Name: inscripcions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jutineo
--

ALTER SEQUENCE inscripcions_id_seq OWNED BY inscripcions.id;


--
-- Name: medidas; Type: TABLE; Schema: public; Owner: jutineo
--

CREATE TABLE medidas (
    id bigint NOT NULL,
    idalumno bigint NOT NULL,
    pesoalum double precision,
    estaturaalum double precision,
    tallcamalum integer,
    tallpantalum integer,
    tallzapalum integer,
    circunferenciadebrazo integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE medidas OWNER TO jutineo;

--
-- Name: medidas_id_seq; Type: SEQUENCE; Schema: public; Owner: jutineo
--

CREATE SEQUENCE medidas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE medidas_id_seq OWNER TO jutineo;

--
-- Name: medidas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jutineo
--

ALTER SEQUENCE medidas_id_seq OWNED BY medidas.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: jutineo
--

CREATE TABLE migrations (
    id integer NOT NULL,
    migration character varying(191) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE migrations OWNER TO jutineo;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: jutineo
--

CREATE SEQUENCE migrations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE migrations_id_seq OWNER TO jutineo;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jutineo
--

ALTER SEQUENCE migrations_id_seq OWNED BY migrations.id;


--
-- Name: municipio; Type: TABLE; Schema: public; Owner: jutineo
--

CREATE TABLE municipio (
    id integer NOT NULL,
    nombre character varying(191) NOT NULL,
    estado_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE municipio OWNER TO jutineo;

--
-- Name: municipio_id_seq; Type: SEQUENCE; Schema: public; Owner: jutineo
--

CREATE SEQUENCE municipio_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE municipio_id_seq OWNER TO jutineo;

--
-- Name: municipio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jutineo
--

ALTER SEQUENCE municipio_id_seq OWNED BY municipio.id;


--
-- Name: parroquia; Type: TABLE; Schema: public; Owner: jutineo
--

CREATE TABLE parroquia (
    id integer NOT NULL,
    nombre character varying(191) NOT NULL,
    municipio_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE parroquia OWNER TO jutineo;

--
-- Name: parroquia_id_seq; Type: SEQUENCE; Schema: public; Owner: jutineo
--

CREATE SEQUENCE parroquia_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE parroquia_id_seq OWNER TO jutineo;

--
-- Name: parroquia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jutineo
--

ALTER SEQUENCE parroquia_id_seq OWNED BY parroquia.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: jutineo
--

CREATE TABLE password_resets (
    email character varying(191) NOT NULL,
    token character varying(191) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE password_resets OWNER TO jutineo;

--
-- Name: periodo_academicos; Type: TABLE; Schema: public; Owner: jutineo
--

CREATE TABLE periodo_academicos (
    id bigint NOT NULL,
    periodo character varying(191) NOT NULL,
    ano integer NOT NULL,
    descripcionperiodo character varying(191) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE periodo_academicos OWNER TO jutineo;

--
-- Name: periodo_academicos_id_seq; Type: SEQUENCE; Schema: public; Owner: jutineo
--

CREATE SEQUENCE periodo_academicos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE periodo_academicos_id_seq OWNER TO jutineo;

--
-- Name: periodo_academicos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jutineo
--

ALTER SEQUENCE periodo_academicos_id_seq OWNED BY periodo_academicos.id;


--
-- Name: personas; Type: TABLE; Schema: public; Owner: jutineo
--

CREATE TABLE personas (
    id bigint NOT NULL,
    cedula integer NOT NULL,
    nombres character varying(191) NOT NULL,
    apellidos character varying(191) NOT NULL,
    lugnacimiento character varying(191) NOT NULL,
    fechnacimiento date NOT NULL,
    sexo character varying(191) NOT NULL,
    telefono bigint NOT NULL,
    celular bigint NOT NULL,
    direccion character varying(191) NOT NULL,
    correo character varying(191) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE personas OWNER TO jutineo;

--
-- Name: personas_id_seq; Type: SEQUENCE; Schema: public; Owner: jutineo
--

CREATE SEQUENCE personas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE personas_id_seq OWNER TO jutineo;

--
-- Name: personas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jutineo
--

ALTER SEQUENCE personas_id_seq OWNED BY personas.id;


--
-- Name: profesors; Type: TABLE; Schema: public; Owner: jutineo
--

CREATE TABLE profesors (
    id bigint NOT NULL,
    idpersona bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE profesors OWNER TO jutineo;

--
-- Name: profesors_id_seq; Type: SEQUENCE; Schema: public; Owner: jutineo
--

CREATE SEQUENCE profesors_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE profesors_id_seq OWNER TO jutineo;

--
-- Name: profesors_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jutineo
--

ALTER SEQUENCE profesors_id_seq OWNED BY profesors.id;


--
-- Name: representantes; Type: TABLE; Schema: public; Owner: jutineo
--

CREATE TABLE representantes (
    id bigint NOT NULL,
    idpersona bigint NOT NULL,
    parentesco character varying(191) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE representantes OWNER TO jutineo;

--
-- Name: representantes_id_seq; Type: SEQUENCE; Schema: public; Owner: jutineo
--

CREATE SEQUENCE representantes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE representantes_id_seq OWNER TO jutineo;

--
-- Name: representantes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jutineo
--

ALTER SEQUENCE representantes_id_seq OWNED BY representantes.id;


--
-- Name: seccions; Type: TABLE; Schema: public; Owner: jutineo
--

CREATE TABLE seccions (
    id bigint NOT NULL,
    nomsecc character varying(191) NOT NULL,
    idgrado bigint NOT NULL,
    capacidad integer NOT NULL,
    turno character varying(191) NOT NULL,
    idperiodo bigint NOT NULL,
    idprofesor bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    descripcionseccion character varying(191)
);


ALTER TABLE seccions OWNER TO jutineo;

--
-- Name: seccions_id_seq; Type: SEQUENCE; Schema: public; Owner: jutineo
--

CREATE SEQUENCE seccions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seccions_id_seq OWNER TO jutineo;

--
-- Name: seccions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jutineo
--

ALTER SEQUENCE seccions_id_seq OWNED BY seccions.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: jutineo
--

CREATE TABLE users (
    id bigint NOT NULL,
    nombre character varying(191) NOT NULL,
    apellido character varying(191) NOT NULL,
    email character varying(191) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(191) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE users OWNER TO jutineo;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: jutineo
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO jutineo;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jutineo
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: alumnos id; Type: DEFAULT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY alumnos ALTER COLUMN id SET DEFAULT nextval('alumnos_id_seq'::regclass);


--
-- Name: estado id; Type: DEFAULT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY estado ALTER COLUMN id SET DEFAULT nextval('estado_id_seq'::regclass);


--
-- Name: grados id; Type: DEFAULT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY grados ALTER COLUMN id SET DEFAULT nextval('grados_id_seq'::regclass);


--
-- Name: inscripcions id; Type: DEFAULT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY inscripcions ALTER COLUMN id SET DEFAULT nextval('inscripcions_id_seq'::regclass);


--
-- Name: medidas id; Type: DEFAULT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY medidas ALTER COLUMN id SET DEFAULT nextval('medidas_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY migrations ALTER COLUMN id SET DEFAULT nextval('migrations_id_seq'::regclass);


--
-- Name: municipio id; Type: DEFAULT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY municipio ALTER COLUMN id SET DEFAULT nextval('municipio_id_seq'::regclass);


--
-- Name: parroquia id; Type: DEFAULT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY parroquia ALTER COLUMN id SET DEFAULT nextval('parroquia_id_seq'::regclass);


--
-- Name: periodo_academicos id; Type: DEFAULT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY periodo_academicos ALTER COLUMN id SET DEFAULT nextval('periodo_academicos_id_seq'::regclass);


--
-- Name: personas id; Type: DEFAULT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY personas ALTER COLUMN id SET DEFAULT nextval('personas_id_seq'::regclass);


--
-- Name: profesors id; Type: DEFAULT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY profesors ALTER COLUMN id SET DEFAULT nextval('profesors_id_seq'::regclass);


--
-- Name: representantes id; Type: DEFAULT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY representantes ALTER COLUMN id SET DEFAULT nextval('representantes_id_seq'::regclass);


--
-- Name: seccions id; Type: DEFAULT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY seccions ALTER COLUMN id SET DEFAULT nextval('seccions_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: alumnos; Type: TABLE DATA; Schema: public; Owner: jutineo
--

COPY alumnos (id, idpersona, condicionalum, procedenciaalum, idrepresentante, created_at, updated_at) FROM stdin;
1	2	regular	uen caracas	1	2019-06-27 16:40:21	2019-06-27 16:40:21
2	4	regular	u,e,n ida	1	2019-06-27 18:37:37	2019-06-27 18:37:37
\.


--
-- Name: alumnos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jutineo
--

SELECT pg_catalog.setval('alumnos_id_seq', 2, true);


--
-- Data for Name: estado; Type: TABLE DATA; Schema: public; Owner: jutineo
--

COPY estado (id, nombre, created_at, updated_at) FROM stdin;
\.


--
-- Name: estado_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jutineo
--

SELECT pg_catalog.setval('estado_id_seq', 1, false);


--
-- Data for Name: grados; Type: TABLE DATA; Schema: public; Owner: jutineo
--

COPY grados (id, grado, descripciongrado, created_at, updated_at) FROM stdin;
1	1	1er Grado	\N	\N
2	2	2do Grado	\N	\N
3	3	3er Grado	\N	\N
4	4	4to Grado	\N	\N
5	5	5to Grado	\N	\N
6	6	6to Grado	\N	\N
\.


--
-- Name: grados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jutineo
--

SELECT pg_catalog.setval('grados_id_seq', 1, false);


--
-- Data for Name: inscripcions; Type: TABLE DATA; Schema: public; Owner: jutineo
--

COPY inscripcions (id, codigoinscripcion, fecha, idseccion, idalum, created_at, updated_at) FROM stdin;
32	100232312311	2019-06-25	1	1	2019-06-27 18:56:32	2019-06-27 18:56:32
42	100125521	2019-06-28	1	2	2019-06-28 16:08:48	2019-06-28 16:08:48
43	100232312312	2019-06-28	2	1	2019-06-28 16:11:10	2019-06-28 16:11:10
\.


--
-- Name: inscripcions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jutineo
--

SELECT pg_catalog.setval('inscripcions_id_seq', 43, true);


--
-- Data for Name: medidas; Type: TABLE DATA; Schema: public; Owner: jutineo
--

COPY medidas (id, idalumno, pesoalum, estaturaalum, tallcamalum, tallpantalum, tallzapalum, circunferenciadebrazo, created_at, updated_at) FROM stdin;
\.


--
-- Name: medidas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jutineo
--

SELECT pg_catalog.setval('medidas_id_seq', 1, false);


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: jutineo
--

COPY migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_users_table	1
2	2014_10_12_100000_create_password_resets_table	1
3	2019_01_07_193851_create_estado_table	1
4	2019_01_07_194117_create_municipio_table	1
5	2019_01_07_195045_create_parroquia_table	1
6	2019_04_28_164648_create_personas_table	1
7	2019_05_07_151600_create_grados_table	1
8	2019_05_07_185509_create_profesors_table	1
9	2019_05_07_185549_create_representantes_table	1
10	2019_05_07_185550_create_alumnos_table	1
11	2019_05_07_185612_create_periodo_academicos_table	1
12	2019_05_07_185620_create_seccions_table	1
13	2019_05_07_185659_create_inscripcions_table	1
14	2019_05_30_161440_create_medidas_table	1
\.


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jutineo
--

SELECT pg_catalog.setval('migrations_id_seq', 14, true);


--
-- Data for Name: municipio; Type: TABLE DATA; Schema: public; Owner: jutineo
--

COPY municipio (id, nombre, estado_id, created_at, updated_at) FROM stdin;
\.


--
-- Name: municipio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jutineo
--

SELECT pg_catalog.setval('municipio_id_seq', 1, false);


--
-- Data for Name: parroquia; Type: TABLE DATA; Schema: public; Owner: jutineo
--

COPY parroquia (id, nombre, municipio_id, created_at, updated_at) FROM stdin;
\.


--
-- Name: parroquia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jutineo
--

SELECT pg_catalog.setval('parroquia_id_seq', 1, false);


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: jutineo
--

COPY password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: periodo_academicos; Type: TABLE DATA; Schema: public; Owner: jutineo
--

COPY periodo_academicos (id, periodo, ano, descripcionperiodo, created_at, updated_at) FROM stdin;
1	1	2019	2018-2019	2019-06-27 16:41:26	2019-06-27 16:41:26
\.


--
-- Name: periodo_academicos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jutineo
--

SELECT pg_catalog.setval('periodo_academicos_id_seq', 1, true);


--
-- Data for Name: personas; Type: TABLE DATA; Schema: public; Owner: jutineo
--

COPY personas (id, cedula, nombres, apellidos, lugnacimiento, fechnacimiento, sexo, telefono, celular, direccion, correo, created_at, updated_at) FROM stdin;
1	25253131	junior	tineo	Caracas	2019-06-14	masculino	4141405614	4141405614	Av sucre calle toro casa 2611	j@j.com	2019-06-27 16:38:15	2019-06-27 16:38:15
2	23231231	manuel	ribas	caracas	2019-06-27	masculino	1525125	12512512	wachintong	a@a.com	2019-06-27 16:38:48	2019-06-27 16:38:48
4	12552	katarina	morgues	Caracas	2009-06-03	femenino	4141405614	4141405614	Av sucre calle toro casa 2611	x@gmail.com	2019-06-27 18:37:07	2019-06-27 18:37:07
3	5895235	profesor	briseño	Caracas	2019-06-05	masculino	5614	5614	Av sucre calle toro casa 2611	yns@gmail.com	2019-06-27 16:39:14	2019-07-04 13:39:40
\.


--
-- Name: personas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jutineo
--

SELECT pg_catalog.setval('personas_id_seq', 5, true);


--
-- Data for Name: profesors; Type: TABLE DATA; Schema: public; Owner: jutineo
--

COPY profesors (id, idpersona, created_at, updated_at) FROM stdin;
1	3	2019-06-27 16:40:32	2019-06-27 16:40:32
\.


--
-- Name: profesors_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jutineo
--

SELECT pg_catalog.setval('profesors_id_seq', 1, true);


--
-- Data for Name: representantes; Type: TABLE DATA; Schema: public; Owner: jutineo
--

COPY representantes (id, idpersona, parentesco, created_at, updated_at) FROM stdin;
1	1	Padre	2019-06-27 16:39:47	2019-06-27 16:39:47
\.


--
-- Name: representantes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jutineo
--

SELECT pg_catalog.setval('representantes_id_seq', 1, true);


--
-- Data for Name: seccions; Type: TABLE DATA; Schema: public; Owner: jutineo
--

COPY seccions (id, nomsecc, idgrado, capacidad, turno, idperiodo, idprofesor, created_at, updated_at, descripcionseccion) FROM stdin;
1	A	2	31	mañana	1	1	2019-06-27 16:43:53	2019-06-27 16:43:53	2-A-mañana
2	B	2	31	Mañana	1	1	2019-06-28 16:10:42	2019-06-28 16:10:42	2-B-Mañana
\.


--
-- Name: seccions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jutineo
--

SELECT pg_catalog.setval('seccions_id_seq', 2, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: jutineo
--

COPY users (id, nombre, apellido, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
1	junior	tineo	juniorxdj56@gmail.com	\N	$2y$10$cBMWwtTI1TEA0p7bZshg9e3gBW42MzL1MDrOZJFB59HdlxrvLOazK	\N	2019-07-04 13:35:17	2019-07-04 13:35:17
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jutineo
--

SELECT pg_catalog.setval('users_id_seq', 1, true);


--
-- Name: alumnos alumnos_pkey; Type: CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY alumnos
    ADD CONSTRAINT alumnos_pkey PRIMARY KEY (id);


--
-- Name: estado estado_pkey; Type: CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY estado
    ADD CONSTRAINT estado_pkey PRIMARY KEY (id);


--
-- Name: grados grados_pkey; Type: CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY grados
    ADD CONSTRAINT grados_pkey PRIMARY KEY (id);


--
-- Name: inscripcions inscripcions_pkey; Type: CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY inscripcions
    ADD CONSTRAINT inscripcions_pkey PRIMARY KEY (id);


--
-- Name: medidas medidas_pkey; Type: CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY medidas
    ADD CONSTRAINT medidas_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: municipio municipio_pkey; Type: CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT municipio_pkey PRIMARY KEY (id);


--
-- Name: parroquia parroquia_pkey; Type: CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY parroquia
    ADD CONSTRAINT parroquia_pkey PRIMARY KEY (id);


--
-- Name: periodo_academicos periodo_academicos_pkey; Type: CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY periodo_academicos
    ADD CONSTRAINT periodo_academicos_pkey PRIMARY KEY (id);


--
-- Name: personas personas_pkey; Type: CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY personas
    ADD CONSTRAINT personas_pkey PRIMARY KEY (id);


--
-- Name: profesors profesors_pkey; Type: CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY profesors
    ADD CONSTRAINT profesors_pkey PRIMARY KEY (id);


--
-- Name: representantes representantes_pkey; Type: CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY representantes
    ADD CONSTRAINT representantes_pkey PRIMARY KEY (id);


--
-- Name: seccions seccions_pkey; Type: CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY seccions
    ADD CONSTRAINT seccions_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: jutineo
--

CREATE INDEX password_resets_email_index ON password_resets USING btree (email);


--
-- Name: alumnos alumnos_idpersona_foreign; Type: FK CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY alumnos
    ADD CONSTRAINT alumnos_idpersona_foreign FOREIGN KEY (idpersona) REFERENCES personas(id);


--
-- Name: alumnos alumnos_idrepresentante_foreign; Type: FK CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY alumnos
    ADD CONSTRAINT alumnos_idrepresentante_foreign FOREIGN KEY (idrepresentante) REFERENCES representantes(id);


--
-- Name: inscripcions inscripcions_idalum_foreign; Type: FK CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY inscripcions
    ADD CONSTRAINT inscripcions_idalum_foreign FOREIGN KEY (idalum) REFERENCES alumnos(id);


--
-- Name: inscripcions inscripcions_idseccion_foreign; Type: FK CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY inscripcions
    ADD CONSTRAINT inscripcions_idseccion_foreign FOREIGN KEY (idseccion) REFERENCES seccions(id);


--
-- Name: medidas medidas_idalumno_foreign; Type: FK CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY medidas
    ADD CONSTRAINT medidas_idalumno_foreign FOREIGN KEY (idalumno) REFERENCES alumnos(id);


--
-- Name: municipio municipio_estado_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT municipio_estado_id_foreign FOREIGN KEY (estado_id) REFERENCES estado(id);


--
-- Name: parroquia parroquia_municipio_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY parroquia
    ADD CONSTRAINT parroquia_municipio_id_foreign FOREIGN KEY (municipio_id) REFERENCES municipio(id);


--
-- Name: profesors profesors_idpersona_foreign; Type: FK CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY profesors
    ADD CONSTRAINT profesors_idpersona_foreign FOREIGN KEY (idpersona) REFERENCES personas(id);


--
-- Name: representantes representantes_idpersona_foreign; Type: FK CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY representantes
    ADD CONSTRAINT representantes_idpersona_foreign FOREIGN KEY (idpersona) REFERENCES personas(id);


--
-- Name: seccions seccions_idgrado_foreign; Type: FK CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY seccions
    ADD CONSTRAINT seccions_idgrado_foreign FOREIGN KEY (idgrado) REFERENCES grados(id);


--
-- Name: seccions seccions_idperiodo_foreign; Type: FK CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY seccions
    ADD CONSTRAINT seccions_idperiodo_foreign FOREIGN KEY (idperiodo) REFERENCES periodo_academicos(id);


--
-- Name: seccions seccions_idprofesor_foreign; Type: FK CONSTRAINT; Schema: public; Owner: jutineo
--

ALTER TABLE ONLY seccions
    ADD CONSTRAINT seccions_idprofesor_foreign FOREIGN KEY (idprofesor) REFERENCES profesors(id);


--
-- PostgreSQL database dump complete
--

