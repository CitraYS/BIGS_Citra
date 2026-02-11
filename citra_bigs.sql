--
-- PostgreSQL database dump
--

\restrict Q2GJRNeYUqVUdXwDBMRENCXxvqv1nt6dMTLhm260l1uzxxppiS8XZFGYtTcP02a

-- Dumped from database version 16.11
-- Dumped by pg_dump version 16.11

-- Started on 2026-02-11 20:13:34

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 218 (class 1259 OID 16426)
-- Name: data_form_id_form_data_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.data_form_id_form_data_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 217 (class 1259 OID 16407)
-- Name: data_form; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.data_form (
    id_form_data bigint DEFAULT nextval('public.data_form_id_form_data_seq'::regclass) NOT NULL,
    id_form bigint,
    id_registrasi bigint,
    data json,
    is_delete boolean DEFAULT false,
    create_by bigint,
    update_by bigint,
    create_time_at timestamp(6) without time zone,
    update_time_at timestamp(6) without time zone
);


--
-- TOC entry 216 (class 1259 OID 16400)
-- Name: registrasi; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.registrasi (
    id_registrasi bigint NOT NULL,
    no_registrasi bigint,
    no_rekam_medis bigint,
    nama_pasien character varying(255),
    tanggal_lahir date,
    nik bigint,
    create_by bigint,
    create_time_at time(6) without time zone,
    update_by bigint,
    update_time_at time(6) without time zone
);


--
-- TOC entry 215 (class 1259 OID 16399)
-- Name: registrasi_id_registrasi_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.registrasi_id_registrasi_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 4906 (class 0 OID 0)
-- Dependencies: 215
-- Name: registrasi_id_registrasi_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.registrasi_id_registrasi_seq OWNED BY public.registrasi.id_registrasi;


--
-- TOC entry 219 (class 1259 OID 16428)
-- Name: user; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public."user" (
    id_user bigint NOT NULL,
    nama_user character varying(255),
    poliklinik character varying(255)
);


--
-- TOC entry 4744 (class 2604 OID 16403)
-- Name: registrasi id_registrasi; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.registrasi ALTER COLUMN id_registrasi SET DEFAULT nextval('public.registrasi_id_registrasi_seq'::regclass);


--
-- TOC entry 4898 (class 0 OID 16407)
-- Dependencies: 217
-- Data for Name: data_form; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.data_form (id_form_data, id_form, id_registrasi, data, is_delete, create_by, update_by, create_time_at, update_time_at) FROM stdin;
9	111	3	"{\\"id_form\\":\\"111\\",\\"cara_masuk\\":\\"Jalan tanpa bantuan\\",\\"anamnesis_tipe\\":\\"Autoanamnesis\\",\\"alonemnesis_diperoleh\\":\\"\\",\\"alonemnesis_hubungan\\":\\"\\",\\"alergi\\":\\"-\\",\\"keluhan_utama\\":\\"Nyeri bagian punggung\\",\\"keadaan_umum\\":\\"Sedang\\",\\"warna_kulit\\":\\"Normal\\",\\"kesadaran\\":\\"Compos Mentis\\",\\"td\\":\\"138\\\\/92\\",\\"p\\":\\"44\\",\\"nadi\\":\\"124\\",\\"suhu\\":\\"36\\",\\"alat_bantu\\":\\"-\\",\\"prothesa\\":\\"-\\",\\"cacat_tubuh\\":\\"-\\",\\"adl\\":\\"Mandiri\\",\\"riwayat_jatuh\\":\\"-\\",\\"bb\\":\\"92\\",\\"tb\\":\\"190\\",\\"pb\\":\\"180\\",\\"lk\\":\\"70\\",\\"imt\\":\\"25.48\\",\\"status_gizi\\":\\"Gemuk\\",\\"r_penyakit_baru\\":\\"-\\",\\"r_penyakit_lama\\":\\"DM\\",\\"r_penyakit\\":\\"Tidak\\",\\"r_penyakit_keluarga\\":\\"-\\",\\"is_operasi\\":\\"Ya\\",\\"operasi_apa\\":\\"APP\\",\\"operasi_kapan\\":\\"2017\\",\\"is_dirawat\\":\\"Ya\\",\\"penyakit_apa\\":\\"POST APP\\",\\"penyakit_kapan\\":\\"2017\\",\\"skor_jatuh_1\\":\\"25\\",\\"skor_jatuh_2\\":\\"15\\",\\"resiko_3\\":\\"0\\",\\"skor_jatuh_4\\":\\"20\\",\\"resiko_5\\":\\"0\\",\\"resiko_6\\":\\"0\\",\\"total_jatuh\\":\\"60\\",\\"label_intervensi\\":\\"Lakukan Intervensi Jatuh Resiko Tinggi\\"}"	f	1	\N	2026-02-11 13:59:15	\N
\.


--
-- TOC entry 4897 (class 0 OID 16400)
-- Dependencies: 216
-- Data for Name: registrasi; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.registrasi (id_registrasi, no_registrasi, no_rekam_medis, nama_pasien, tanggal_lahir, nik, create_by, create_time_at, update_by, update_time_at) FROM stdin;
3	98912	123098	Citra	1997-11-06	14713123123	1	11:06:10	2	11:06:10
4	2	98	Budi	2026-02-10	57575757557	3	11:07:00	1	11:07:00
6	666	678	Cantika	2025-11-04	4564533453	2	13:09:00	2	13:09:00
\.


--
-- TOC entry 4900 (class 0 OID 16428)
-- Dependencies: 219
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public."user" (id_user, nama_user, poliklinik) FROM stdin;
1	Ani	KLINIK OBGYN
2	Cici	KLINIK OBGYN
3	Budi	KLINIK OBGYN
\.


--
-- TOC entry 4907 (class 0 OID 0)
-- Dependencies: 218
-- Name: data_form_id_form_data_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.data_form_id_form_data_seq', 9, true);


--
-- TOC entry 4908 (class 0 OID 0)
-- Dependencies: 215
-- Name: registrasi_id_registrasi_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.registrasi_id_registrasi_seq', 6, true);


--
-- TOC entry 4750 (class 2606 OID 16416)
-- Name: data_form data_form_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.data_form
    ADD CONSTRAINT data_form_pkey PRIMARY KEY (id_form_data);


--
-- TOC entry 4748 (class 2606 OID 16406)
-- Name: registrasi registrasi_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.registrasi
    ADD CONSTRAINT registrasi_pkey PRIMARY KEY (id_registrasi);


--
-- TOC entry 4752 (class 2606 OID 16434)
-- Name: user user_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id_user);


-- Completed on 2026-02-11 20:13:34

--
-- PostgreSQL database dump complete
--

\unrestrict Q2GJRNeYUqVUdXwDBMRENCXxvqv1nt6dMTLhm260l1uzxxppiS8XZFGYtTcP02a

