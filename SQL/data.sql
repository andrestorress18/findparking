--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.10
-- Dumped by pg_dump version 9.6.10

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
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


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: _tbl_categoria_puc; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._tbl_categoria_puc (
    catp_id character varying(1) DEFAULT NULL::character varying,
    catp_nombre character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._tbl_categoria_puc OWNER TO rebasedata;

--
-- Name: _tbl_cuentas; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._tbl_cuentas (
    cuen_id character varying(1) DEFAULT NULL::character varying,
    cuen_valo character varying(1) DEFAULT NULL::character varying,
    cuen_des character varying(1) DEFAULT NULL::character varying,
    cuen_fec character varying(1) DEFAULT NULL::character varying,
    cuen_esta_fk character varying(1) DEFAULT NULL::character varying,
    cuen_usua_fk character varying(1) DEFAULT NULL::character varying,
    cuen_cpuc_fk character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._tbl_cuentas OWNER TO rebasedata;

--
-- Name: _tbl_cuentas_puc; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._tbl_cuentas_puc (
    cpuc_id character varying(1) DEFAULT NULL::character varying,
    cpuc_des character varying(1) DEFAULT NULL::character varying,
    cpuc_cate_fk character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._tbl_cuentas_puc OWNER TO rebasedata;

--
-- Name: _tbl_entidad; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._tbl_entidad (
    enti_cod character varying(1) DEFAULT NULL::character varying,
    enti_nom character varying(1) DEFAULT NULL::character varying,
    enti_nit character varying(1) DEFAULT NULL::character varying,
    enti_ema character varying(1) DEFAULT NULL::character varying,
    enti_tit character varying(1) DEFAULT NULL::character varying,
    enti_des character varying(1) DEFAULT NULL::character varying,
    enti_img character varying(1) DEFAULT NULL::character varying,
    enti_tip character varying(1) DEFAULT NULL::character varying,
    enti_ciu character varying(1) DEFAULT NULL::character varying,
    enti_pai character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._tbl_entidad OWNER TO rebasedata;

--
-- Name: _tbl_estado; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._tbl_estado (
    esta_id character varying(1) DEFAULT NULL::character varying,
    esta_nom character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._tbl_estado OWNER TO rebasedata;

--
-- Name: _tbl_usuario; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._tbl_usuario (
    usua_cod character varying(1) DEFAULT NULL::character varying,
    usua_ced character varying(1) DEFAULT NULL::character varying,
    usua_nom character varying(1) DEFAULT NULL::character varying,
    usua_cel character varying(1) DEFAULT NULL::character varying,
    usua_ema character varying(1) DEFAULT NULL::character varying,
    usua_pas character varying(1) DEFAULT NULL::character varying,
    usua_img character varying(1) DEFAULT NULL::character varying,
    usua_dir character varying(1) DEFAULT NULL::character varying,
    usua_rol character varying(1) DEFAULT NULL::character varying,
    usua_est character varying(1) DEFAULT NULL::character varying,
    usua_enti_fk character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._tbl_usuario OWNER TO rebasedata;

--
-- Data for Name: _tbl_categoria_puc; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._tbl_categoria_puc (catp_id, catp_nombre) FROM stdin;
\.


--
-- Data for Name: _tbl_cuentas; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._tbl_cuentas (cuen_id, cuen_valo, cuen_des, cuen_fec, cuen_esta_fk, cuen_usua_fk, cuen_cpuc_fk) FROM stdin;
\.


--
-- Data for Name: _tbl_cuentas_puc; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._tbl_cuentas_puc (cpuc_id, cpuc_des, cpuc_cate_fk) FROM stdin;
\.


--
-- Data for Name: _tbl_entidad; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._tbl_entidad (enti_cod, enti_nom, enti_nit, enti_ema, enti_tit, enti_des, enti_img, enti_tip, enti_ciu, enti_pai) FROM stdin;
\.


--
-- Data for Name: _tbl_estado; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._tbl_estado (esta_id, esta_nom) FROM stdin;
\.


--
-- Data for Name: _tbl_usuario; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._tbl_usuario (usua_cod, usua_ced, usua_nom, usua_cel, usua_ema, usua_pas, usua_img, usua_dir, usua_rol, usua_est, usua_enti_fk) FROM stdin;
\.


--
-- PostgreSQL database dump complete
--

