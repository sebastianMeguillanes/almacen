PGDMP     3    7                {         
   almacenUCB    15.2    15.2 o    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    82674 
   almacenUCB    DATABASE     �   CREATE DATABASE "almacenUCB" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Bolivia.1252';
    DROP DATABASE "almacenUCB";
                postgres    false            �            1259    82675    almacen    TABLE     �   CREATE TABLE public.almacen (
    idalmacen integer NOT NULL,
    nombre character varying(75),
    idlocacion integer,
    fecha_reg timestamp without time zone NOT NULL,
    borrado character(1) NOT NULL,
    id_usuario integer
);
    DROP TABLE public.almacen;
       public         heap    postgres    false            �            1259    82678    almacen_idalmacen_seq    SEQUENCE     �   CREATE SEQUENCE public.almacen_idalmacen_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.almacen_idalmacen_seq;
       public          postgres    false    214            �           0    0    almacen_idalmacen_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.almacen_idalmacen_seq OWNED BY public.almacen.idalmacen;
          public          postgres    false    215            �            1259    82679    articulo    TABLE     �  CREATE TABLE public.articulo (
    idarticulo integer NOT NULL,
    nombrearticulo character varying(50) NOT NULL,
    codigobarra character varying(50),
    articulostock integer NOT NULL,
    idcategoria integer,
    fecha_reg timestamp without time zone NOT NULL,
    borrado character(1) NOT NULL,
    id_usuario integer,
    CONSTRAINT articulo_articulostock_check CHECK ((articulostock >= 0))
);
    DROP TABLE public.articulo;
       public         heap    postgres    false            �            1259    82683    articulo_idarticulo_seq    SEQUENCE     �   CREATE SEQUENCE public.articulo_idarticulo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.articulo_idarticulo_seq;
       public          postgres    false    216            �           0    0    articulo_idarticulo_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.articulo_idarticulo_seq OWNED BY public.articulo.idarticulo;
          public          postgres    false    217            �            1259    82684 
   asistencia    TABLE       CREATE TABLE public.asistencia (
    idasistencia integer NOT NULL,
    fecha date NOT NULL,
    ingreso character(1) NOT NULL,
    idusuario integer,
    fecha_reg timestamp without time zone NOT NULL,
    borrado character(1) NOT NULL,
    id_usuario integer
);
    DROP TABLE public.asistencia;
       public         heap    postgres    false            �            1259    82687    asistencia_idasistencia_seq    SEQUENCE     �   CREATE SEQUENCE public.asistencia_idasistencia_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.asistencia_idasistencia_seq;
       public          postgres    false    218            �           0    0    asistencia_idasistencia_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.asistencia_idasistencia_seq OWNED BY public.asistencia.idasistencia;
          public          postgres    false    219            �            1259    82688 	   categoria    TABLE     �   CREATE TABLE public.categoria (
    idcategoria integer NOT NULL,
    nombrecategoria character varying(50) NOT NULL,
    borrado character(1) NOT NULL
);
    DROP TABLE public.categoria;
       public         heap    postgres    false            �            1259    82691    categoria_idcategoria_seq    SEQUENCE     �   CREATE SEQUENCE public.categoria_idcategoria_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.categoria_idcategoria_seq;
       public          postgres    false    220            �           0    0    categoria_idcategoria_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.categoria_idcategoria_seq OWNED BY public.categoria.idcategoria;
          public          postgres    false    221            �            1259    82692 
   existencia    TABLE     �   CREATE TABLE public.existencia (
    cantidad integer,
    idalmacen integer NOT NULL,
    idarticulo integer NOT NULL,
    fecha_reg timestamp without time zone NOT NULL,
    borrado character(1) NOT NULL,
    id_usuario integer
);
    DROP TABLE public.existencia;
       public         heap    postgres    false            �            1259    82695    kardex    TABLE     S  CREATE TABLE public.kardex (
    idkardex integer NOT NULL,
    fechakardex date NOT NULL,
    accion character varying(30) NOT NULL,
    idalmacen integer,
    idusuario integer,
    idarticulo integer,
    fecha_reg timestamp without time zone NOT NULL,
    borrado character(1) NOT NULL,
    id_usuario integer,
    cantidad integer
);
    DROP TABLE public.kardex;
       public         heap    postgres    false            �            1259    82698    kardex_idkardex_seq    SEQUENCE     �   CREATE SEQUENCE public.kardex_idkardex_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.kardex_idkardex_seq;
       public          postgres    false    223            �           0    0    kardex_idkardex_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.kardex_idkardex_seq OWNED BY public.kardex.idkardex;
          public          postgres    false    224            �            1259    82699    locacion    TABLE     �   CREATE TABLE public.locacion (
    idlocacion integer NOT NULL,
    ubicacion character varying(100) NOT NULL,
    fecha_reg timestamp without time zone NOT NULL,
    borrado character(1) NOT NULL,
    id_usuario integer
);
    DROP TABLE public.locacion;
       public         heap    postgres    false            �            1259    82702    locacion_idlocacion_seq    SEQUENCE     �   CREATE SEQUENCE public.locacion_idlocacion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.locacion_idlocacion_seq;
       public          postgres    false    225            �           0    0    locacion_idlocacion_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.locacion_idlocacion_seq OWNED BY public.locacion.idlocacion;
          public          postgres    false    226            �            1259    82703    lote    TABLE     �   CREATE TABLE public.lote (
    idlote integer NOT NULL,
    fecha date NOT NULL,
    idproveedor integer,
    fecha_reg timestamp without time zone NOT NULL,
    borrado character(1) NOT NULL,
    id_usuario integer
);
    DROP TABLE public.lote;
       public         heap    postgres    false            �            1259    82706    lote_idlote_seq    SEQUENCE     �   CREATE SEQUENCE public.lote_idlote_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.lote_idlote_seq;
       public          postgres    false    227            �           0    0    lote_idlote_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.lote_idlote_seq OWNED BY public.lote.idlote;
          public          postgres    false    228            �            1259    82707    objeto    TABLE       CREATE TABLE public.objeto (
    idobjeto integer NOT NULL,
    nombre character varying(50) NOT NULL,
    unidad character varying(30) NOT NULL,
    fecha_reg timestamp without time zone NOT NULL,
    borrado character(1) NOT NULL,
    id_usuario integer
);
    DROP TABLE public.objeto;
       public         heap    postgres    false            �            1259    82710    objeto_idobjeto_seq    SEQUENCE     �   CREATE SEQUENCE public.objeto_idobjeto_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.objeto_idobjeto_seq;
       public          postgres    false    229            �           0    0    objeto_idobjeto_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.objeto_idobjeto_seq OWNED BY public.objeto.idobjeto;
          public          postgres    false    230            �            1259    82711    persona    TABLE     n  CREATE TABLE public.persona (
    idpersona integer NOT NULL,
    nombrepersona character varying(100) NOT NULL,
    telefonopersona character varying(15),
    cipersona character varying(20) NOT NULL,
    correopersona character varying(100) NOT NULL,
    fecha_reg timestamp without time zone NOT NULL,
    borrado character(1) NOT NULL,
    id_usuario integer
);
    DROP TABLE public.persona;
       public         heap    postgres    false            �            1259    82714    persona_idpersona_seq    SEQUENCE     �   CREATE SEQUENCE public.persona_idpersona_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.persona_idpersona_seq;
       public          postgres    false    231            �           0    0    persona_idpersona_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.persona_idpersona_seq OWNED BY public.persona.idpersona;
          public          postgres    false    232            �            1259    82715 	   proveedor    TABLE     S  CREATE TABLE public.proveedor (
    idproveedor integer NOT NULL,
    nombreproveedor character varying(100) NOT NULL,
    correoproveedor character varying(100) NOT NULL,
    telefonoproveedor character varying(20) NOT NULL,
    fecha_reg timestamp without time zone NOT NULL,
    borrado character(1) NOT NULL,
    id_usuario integer
);
    DROP TABLE public.proveedor;
       public         heap    postgres    false            �            1259    82718    proveedor_idproveedor_seq    SEQUENCE     �   CREATE SEQUENCE public.proveedor_idproveedor_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.proveedor_idproveedor_seq;
       public          postgres    false    233            �           0    0    proveedor_idproveedor_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.proveedor_idproveedor_seq OWNED BY public.proveedor.idproveedor;
          public          postgres    false    234            �            1259    82719    rol    TABLE     �   CREATE TABLE public.rol (
    idrol integer NOT NULL,
    nombrerol character varying(30) NOT NULL,
    borrado character(1) NOT NULL
);
    DROP TABLE public.rol;
       public         heap    postgres    false            �            1259    82722    rol_idrol_seq    SEQUENCE     �   CREATE SEQUENCE public.rol_idrol_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.rol_idrol_seq;
       public          postgres    false    235            �           0    0    rol_idrol_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.rol_idrol_seq OWNED BY public.rol.idrol;
          public          postgres    false    236            �            1259    82723    usuario    TABLE     7  CREATE TABLE public.usuario (
    idusuario integer NOT NULL,
    usuario character varying(100) NOT NULL,
    contrasenia character varying(100) NOT NULL,
    idpersona integer,
    idrol integer,
    fecha_reg timestamp without time zone NOT NULL,
    borrado character(1) NOT NULL,
    id_usuario integer
);
    DROP TABLE public.usuario;
       public         heap    postgres    false            �            1259    82726    usuario_idusuario_seq    SEQUENCE     �   CREATE SEQUENCE public.usuario_idusuario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.usuario_idusuario_seq;
       public          postgres    false    237            �           0    0    usuario_idusuario_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.usuario_idusuario_seq OWNED BY public.usuario.idusuario;
          public          postgres    false    238            �            1259    82727 
   utilitario    TABLE     L  CREATE TABLE public.utilitario (
    idutilitario integer NOT NULL,
    cantidad integer NOT NULL,
    ingresosalida character varying(10) NOT NULL,
    fecha date NOT NULL,
    idusuario integer,
    idobjeto integer,
    fecha_reg timestamp without time zone NOT NULL,
    borrado character(1) NOT NULL,
    id_usuario integer
);
    DROP TABLE public.utilitario;
       public         heap    postgres    false            �            1259    82730    utilitario_idutilitario_seq    SEQUENCE     �   CREATE SEQUENCE public.utilitario_idutilitario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.utilitario_idutilitario_seq;
       public          postgres    false    239            �           0    0    utilitario_idutilitario_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.utilitario_idutilitario_seq OWNED BY public.utilitario.idutilitario;
          public          postgres    false    240            �           2604    82731    almacen idalmacen    DEFAULT     v   ALTER TABLE ONLY public.almacen ALTER COLUMN idalmacen SET DEFAULT nextval('public.almacen_idalmacen_seq'::regclass);
 @   ALTER TABLE public.almacen ALTER COLUMN idalmacen DROP DEFAULT;
       public          postgres    false    215    214            �           2604    82732    articulo idarticulo    DEFAULT     z   ALTER TABLE ONLY public.articulo ALTER COLUMN idarticulo SET DEFAULT nextval('public.articulo_idarticulo_seq'::regclass);
 B   ALTER TABLE public.articulo ALTER COLUMN idarticulo DROP DEFAULT;
       public          postgres    false    217    216            �           2604    82733    asistencia idasistencia    DEFAULT     �   ALTER TABLE ONLY public.asistencia ALTER COLUMN idasistencia SET DEFAULT nextval('public.asistencia_idasistencia_seq'::regclass);
 F   ALTER TABLE public.asistencia ALTER COLUMN idasistencia DROP DEFAULT;
       public          postgres    false    219    218            �           2604    82734    categoria idcategoria    DEFAULT     ~   ALTER TABLE ONLY public.categoria ALTER COLUMN idcategoria SET DEFAULT nextval('public.categoria_idcategoria_seq'::regclass);
 D   ALTER TABLE public.categoria ALTER COLUMN idcategoria DROP DEFAULT;
       public          postgres    false    221    220            �           2604    82735    kardex idkardex    DEFAULT     r   ALTER TABLE ONLY public.kardex ALTER COLUMN idkardex SET DEFAULT nextval('public.kardex_idkardex_seq'::regclass);
 >   ALTER TABLE public.kardex ALTER COLUMN idkardex DROP DEFAULT;
       public          postgres    false    224    223            �           2604    82736    locacion idlocacion    DEFAULT     z   ALTER TABLE ONLY public.locacion ALTER COLUMN idlocacion SET DEFAULT nextval('public.locacion_idlocacion_seq'::regclass);
 B   ALTER TABLE public.locacion ALTER COLUMN idlocacion DROP DEFAULT;
       public          postgres    false    226    225            �           2604    82737    lote idlote    DEFAULT     j   ALTER TABLE ONLY public.lote ALTER COLUMN idlote SET DEFAULT nextval('public.lote_idlote_seq'::regclass);
 :   ALTER TABLE public.lote ALTER COLUMN idlote DROP DEFAULT;
       public          postgres    false    228    227            �           2604    82738    objeto idobjeto    DEFAULT     r   ALTER TABLE ONLY public.objeto ALTER COLUMN idobjeto SET DEFAULT nextval('public.objeto_idobjeto_seq'::regclass);
 >   ALTER TABLE public.objeto ALTER COLUMN idobjeto DROP DEFAULT;
       public          postgres    false    230    229            �           2604    82739    persona idpersona    DEFAULT     v   ALTER TABLE ONLY public.persona ALTER COLUMN idpersona SET DEFAULT nextval('public.persona_idpersona_seq'::regclass);
 @   ALTER TABLE public.persona ALTER COLUMN idpersona DROP DEFAULT;
       public          postgres    false    232    231            �           2604    82740    proveedor idproveedor    DEFAULT     ~   ALTER TABLE ONLY public.proveedor ALTER COLUMN idproveedor SET DEFAULT nextval('public.proveedor_idproveedor_seq'::regclass);
 D   ALTER TABLE public.proveedor ALTER COLUMN idproveedor DROP DEFAULT;
       public          postgres    false    234    233            �           2604    82741 	   rol idrol    DEFAULT     f   ALTER TABLE ONLY public.rol ALTER COLUMN idrol SET DEFAULT nextval('public.rol_idrol_seq'::regclass);
 8   ALTER TABLE public.rol ALTER COLUMN idrol DROP DEFAULT;
       public          postgres    false    236    235            �           2604    82742    usuario idusuario    DEFAULT     v   ALTER TABLE ONLY public.usuario ALTER COLUMN idusuario SET DEFAULT nextval('public.usuario_idusuario_seq'::regclass);
 @   ALTER TABLE public.usuario ALTER COLUMN idusuario DROP DEFAULT;
       public          postgres    false    238    237            �           2604    82743    utilitario idutilitario    DEFAULT     �   ALTER TABLE ONLY public.utilitario ALTER COLUMN idutilitario SET DEFAULT nextval('public.utilitario_idutilitario_seq'::regclass);
 F   ALTER TABLE public.utilitario ALTER COLUMN idutilitario DROP DEFAULT;
       public          postgres    false    240    239            j          0    82675    almacen 
   TABLE DATA           `   COPY public.almacen (idalmacen, nombre, idlocacion, fecha_reg, borrado, id_usuario) FROM stdin;
    public          postgres    false    214   e�       l          0    82679    articulo 
   TABLE DATA           �   COPY public.articulo (idarticulo, nombrearticulo, codigobarra, articulostock, idcategoria, fecha_reg, borrado, id_usuario) FROM stdin;
    public          postgres    false    216   !�       n          0    82684 
   asistencia 
   TABLE DATA           m   COPY public.asistencia (idasistencia, fecha, ingreso, idusuario, fecha_reg, borrado, id_usuario) FROM stdin;
    public          postgres    false    218   ��       p          0    82688 	   categoria 
   TABLE DATA           J   COPY public.categoria (idcategoria, nombrecategoria, borrado) FROM stdin;
    public          postgres    false    220   ։       r          0    82692 
   existencia 
   TABLE DATA           e   COPY public.existencia (cantidad, idalmacen, idarticulo, fecha_reg, borrado, id_usuario) FROM stdin;
    public          postgres    false    222   /�       s          0    82695    kardex 
   TABLE DATA           �   COPY public.kardex (idkardex, fechakardex, accion, idalmacen, idusuario, idarticulo, fecha_reg, borrado, id_usuario, cantidad) FROM stdin;
    public          postgres    false    223   ��       u          0    82699    locacion 
   TABLE DATA           Y   COPY public.locacion (idlocacion, ubicacion, fecha_reg, borrado, id_usuario) FROM stdin;
    public          postgres    false    225   w�       w          0    82703    lote 
   TABLE DATA           Z   COPY public.lote (idlote, fecha, idproveedor, fecha_reg, borrado, id_usuario) FROM stdin;
    public          postgres    false    227   &�       y          0    82707    objeto 
   TABLE DATA           Z   COPY public.objeto (idobjeto, nombre, unidad, fecha_reg, borrado, id_usuario) FROM stdin;
    public          postgres    false    229   ݌       {          0    82711    persona 
   TABLE DATA           �   COPY public.persona (idpersona, nombrepersona, telefonopersona, cipersona, correopersona, fecha_reg, borrado, id_usuario) FROM stdin;
    public          postgres    false    231   h�       }          0    82715 	   proveedor 
   TABLE DATA           �   COPY public.proveedor (idproveedor, nombreproveedor, correoproveedor, telefonoproveedor, fecha_reg, borrado, id_usuario) FROM stdin;
    public          postgres    false    233   3�                 0    82719    rol 
   TABLE DATA           8   COPY public.rol (idrol, nombrerol, borrado) FROM stdin;
    public          postgres    false    235   ɏ       �          0    82723    usuario 
   TABLE DATA           t   COPY public.usuario (idusuario, usuario, contrasenia, idpersona, idrol, fecha_reg, borrado, id_usuario) FROM stdin;
    public          postgres    false    237   �       �          0    82727 
   utilitario 
   TABLE DATA           �   COPY public.utilitario (idutilitario, cantidad, ingresosalida, fecha, idusuario, idobjeto, fecha_reg, borrado, id_usuario) FROM stdin;
    public          postgres    false    239   �       �           0    0    almacen_idalmacen_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.almacen_idalmacen_seq', 6, true);
          public          postgres    false    215            �           0    0    articulo_idarticulo_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.articulo_idarticulo_seq', 6, true);
          public          postgres    false    217            �           0    0    asistencia_idasistencia_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.asistencia_idasistencia_seq', 13, true);
          public          postgres    false    219            �           0    0    categoria_idcategoria_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.categoria_idcategoria_seq', 5, true);
          public          postgres    false    221            �           0    0    kardex_idkardex_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.kardex_idkardex_seq', 6, true);
          public          postgres    false    224            �           0    0    locacion_idlocacion_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.locacion_idlocacion_seq', 9, true);
          public          postgres    false    226            �           0    0    lote_idlote_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.lote_idlote_seq', 8, true);
          public          postgres    false    228            �           0    0    objeto_idobjeto_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.objeto_idobjeto_seq', 6, true);
          public          postgres    false    230            �           0    0    persona_idpersona_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.persona_idpersona_seq', 3, true);
          public          postgres    false    232            �           0    0    proveedor_idproveedor_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.proveedor_idproveedor_seq', 13, true);
          public          postgres    false    234            �           0    0    rol_idrol_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.rol_idrol_seq', 4, true);
          public          postgres    false    236            �           0    0    usuario_idusuario_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.usuario_idusuario_seq', 3, true);
          public          postgres    false    238            �           0    0    utilitario_idutilitario_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.utilitario_idutilitario_seq', 10, true);
          public          postgres    false    240            �           2606    82745    almacen almacen_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.almacen
    ADD CONSTRAINT almacen_pkey PRIMARY KEY (idalmacen);
 >   ALTER TABLE ONLY public.almacen DROP CONSTRAINT almacen_pkey;
       public            postgres    false    214            �           2606    82747    articulo articulo_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT articulo_pkey PRIMARY KEY (idarticulo);
 @   ALTER TABLE ONLY public.articulo DROP CONSTRAINT articulo_pkey;
       public            postgres    false    216            �           2606    82749    asistencia asistencia_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.asistencia
    ADD CONSTRAINT asistencia_pkey PRIMARY KEY (idasistencia);
 D   ALTER TABLE ONLY public.asistencia DROP CONSTRAINT asistencia_pkey;
       public            postgres    false    218            �           2606    82751    categoria categoria_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.categoria
    ADD CONSTRAINT categoria_pkey PRIMARY KEY (idcategoria);
 B   ALTER TABLE ONLY public.categoria DROP CONSTRAINT categoria_pkey;
       public            postgres    false    220            �           2606    82753    existencia existencia_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY public.existencia
    ADD CONSTRAINT existencia_pkey PRIMARY KEY (idalmacen, idarticulo);
 D   ALTER TABLE ONLY public.existencia DROP CONSTRAINT existencia_pkey;
       public            postgres    false    222    222            �           2606    82755    kardex kardex_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.kardex
    ADD CONSTRAINT kardex_pkey PRIMARY KEY (idkardex);
 <   ALTER TABLE ONLY public.kardex DROP CONSTRAINT kardex_pkey;
       public            postgres    false    223            �           2606    82757    locacion locacion_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.locacion
    ADD CONSTRAINT locacion_pkey PRIMARY KEY (idlocacion);
 @   ALTER TABLE ONLY public.locacion DROP CONSTRAINT locacion_pkey;
       public            postgres    false    225            �           2606    82759    lote lote_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.lote
    ADD CONSTRAINT lote_pkey PRIMARY KEY (idlote);
 8   ALTER TABLE ONLY public.lote DROP CONSTRAINT lote_pkey;
       public            postgres    false    227            �           2606    82761    objeto objeto_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.objeto
    ADD CONSTRAINT objeto_pkey PRIMARY KEY (idobjeto);
 <   ALTER TABLE ONLY public.objeto DROP CONSTRAINT objeto_pkey;
       public            postgres    false    229            �           2606    82763    persona persona_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.persona
    ADD CONSTRAINT persona_pkey PRIMARY KEY (idpersona);
 >   ALTER TABLE ONLY public.persona DROP CONSTRAINT persona_pkey;
       public            postgres    false    231            �           2606    82765    proveedor proveedor_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.proveedor
    ADD CONSTRAINT proveedor_pkey PRIMARY KEY (idproveedor);
 B   ALTER TABLE ONLY public.proveedor DROP CONSTRAINT proveedor_pkey;
       public            postgres    false    233            �           2606    82767    rol rol_pkey 
   CONSTRAINT     M   ALTER TABLE ONLY public.rol
    ADD CONSTRAINT rol_pkey PRIMARY KEY (idrol);
 6   ALTER TABLE ONLY public.rol DROP CONSTRAINT rol_pkey;
       public            postgres    false    235            �           2606    82769    usuario usuario_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (idusuario);
 >   ALTER TABLE ONLY public.usuario DROP CONSTRAINT usuario_pkey;
       public            postgres    false    237            �           2606    82771    utilitario utilitario_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.utilitario
    ADD CONSTRAINT utilitario_pkey PRIMARY KEY (idutilitario);
 D   ALTER TABLE ONLY public.utilitario DROP CONSTRAINT utilitario_pkey;
       public            postgres    false    239            �           2606    82772    almacen almacen_idlocacion_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.almacen
    ADD CONSTRAINT almacen_idlocacion_fkey FOREIGN KEY (idlocacion) REFERENCES public.locacion(idlocacion);
 I   ALTER TABLE ONLY public.almacen DROP CONSTRAINT almacen_idlocacion_fkey;
       public          postgres    false    214    3264    225            �           2606    82777 "   articulo articulo_idcategoria_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT articulo_idcategoria_fkey FOREIGN KEY (idcategoria) REFERENCES public.categoria(idcategoria);
 L   ALTER TABLE ONLY public.articulo DROP CONSTRAINT articulo_idcategoria_fkey;
       public          postgres    false    216    3258    220            �           2606    82782 $   asistencia asistencia_idusuario_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.asistencia
    ADD CONSTRAINT asistencia_idusuario_fkey FOREIGN KEY (idusuario) REFERENCES public.usuario(idusuario);
 N   ALTER TABLE ONLY public.asistencia DROP CONSTRAINT asistencia_idusuario_fkey;
       public          postgres    false    3276    218    237            �           2606    82787 $   existencia existencia_idalmacen_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.existencia
    ADD CONSTRAINT existencia_idalmacen_fkey FOREIGN KEY (idalmacen) REFERENCES public.almacen(idalmacen);
 N   ALTER TABLE ONLY public.existencia DROP CONSTRAINT existencia_idalmacen_fkey;
       public          postgres    false    3252    214    222            �           2606    82792 %   existencia existencia_idarticulo_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.existencia
    ADD CONSTRAINT existencia_idarticulo_fkey FOREIGN KEY (idarticulo) REFERENCES public.articulo(idarticulo);
 O   ALTER TABLE ONLY public.existencia DROP CONSTRAINT existencia_idarticulo_fkey;
       public          postgres    false    222    3254    216            �           2606    82797    kardex kardex_idalmacen_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.kardex
    ADD CONSTRAINT kardex_idalmacen_fkey FOREIGN KEY (idalmacen) REFERENCES public.almacen(idalmacen);
 F   ALTER TABLE ONLY public.kardex DROP CONSTRAINT kardex_idalmacen_fkey;
       public          postgres    false    214    3252    223            �           2606    82802    kardex kardex_idarticulo_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.kardex
    ADD CONSTRAINT kardex_idarticulo_fkey FOREIGN KEY (idarticulo) REFERENCES public.articulo(idarticulo);
 G   ALTER TABLE ONLY public.kardex DROP CONSTRAINT kardex_idarticulo_fkey;
       public          postgres    false    223    216    3254            �           2606    82807    kardex kardex_idusuario_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.kardex
    ADD CONSTRAINT kardex_idusuario_fkey FOREIGN KEY (idusuario) REFERENCES public.usuario(idusuario);
 F   ALTER TABLE ONLY public.kardex DROP CONSTRAINT kardex_idusuario_fkey;
       public          postgres    false    237    3276    223            �           2606    82812    lote lote_idproveedor_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.lote
    ADD CONSTRAINT lote_idproveedor_fkey FOREIGN KEY (idproveedor) REFERENCES public.proveedor(idproveedor);
 D   ALTER TABLE ONLY public.lote DROP CONSTRAINT lote_idproveedor_fkey;
       public          postgres    false    3272    227    233            �           2606    82817    usuario usuario_idpersona_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_idpersona_fkey FOREIGN KEY (idpersona) REFERENCES public.persona(idpersona);
 H   ALTER TABLE ONLY public.usuario DROP CONSTRAINT usuario_idpersona_fkey;
       public          postgres    false    231    3270    237            �           2606    82822    usuario usuario_idrol_fkey    FK CONSTRAINT     x   ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_idrol_fkey FOREIGN KEY (idrol) REFERENCES public.rol(idrol);
 D   ALTER TABLE ONLY public.usuario DROP CONSTRAINT usuario_idrol_fkey;
       public          postgres    false    235    3274    237            �           2606    82827 #   utilitario utilitario_idobjeto_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.utilitario
    ADD CONSTRAINT utilitario_idobjeto_fkey FOREIGN KEY (idobjeto) REFERENCES public.objeto(idobjeto);
 M   ALTER TABLE ONLY public.utilitario DROP CONSTRAINT utilitario_idobjeto_fkey;
       public          postgres    false    3268    229    239            �           2606    82832 $   utilitario utilitario_idusuario_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.utilitario
    ADD CONSTRAINT utilitario_idusuario_fkey FOREIGN KEY (idusuario) REFERENCES public.usuario(idusuario);
 N   ALTER TABLE ONLY public.utilitario DROP CONSTRAINT utilitario_idusuario_fkey;
       public          postgres    false    239    237    3276            j   �   x�M�I�0�uz�\�Q<��U4�R�0���9�(
H��?�cX��r*{���|0#�YF��#8kc�������.[�n`��.������Y��k���O�\�3M�l�񡨫ۣ��!�x�ۤ����|-�R�K7:f�Z-�)1��FC��:�%6A���a� $<@      l   �   x�]�Kn�0D��)� V�m����`	'Y���1��(������ۖ�u; �"(#˄:1�D	CB������ǖ����b0���Gj"LjN��������R�u��-�����hl�#U�P��ԭ���O�&�)霐�q�P{� ��e-���u��H��HB�ߎ
uϹ�YP��3���]�s"r��H.��ax ��AJ      n   �   x��һ�0�Z���~@�!Ҹ��sD�R��]��� $e�ʾ��%�)\ĻZ�F֚�-I��|��&�����֣����v�۷��B����M}�V�(��M�ᕘ=B��k�|$@�3��\P��{J=|���ǂԌ�9@�]?@���: r� tA����Y~�t�K�[e���E��S�=\�����)�Ór�//^os      p   I   x���� ��g�&P�@-�����=��Цu�?�5�U� �f���D[�H*�K惡�Ka��D�t��      r   u   x�]��� Dѳ���h%$@E��_G������N %�&�T*z�LQƄŢ��@�?�e���%}�:��úne?9O`yl��d3�����4�e���&VE����c�}�ͥ�B$;      s   �   x��O;n�0��S��GR��)�dq �c��:��A�%���~CG�B����I��x�k�u��uY�	�P;������n��X,��t�'��@Ñ]'�v���6R�>���q�����/ORY�]��M��:0�9����oqh�����:�[�O���Z�3\$]sJ�b�F�      u   �   x�m�9
�0@�zt
]�b�4�.��@���;���cC�?�g���,��	��Q��6�`���<���v)��+�,ƪ�wW���RRiZZ;z�y�t9Ru$ז�(�~Y���<��VK>{�ۺo�\05}��`�e����OZ��ں��llt�-��C8�      w   �   x�]��!г����."�\��(�H�Xz�0�\�/&�c��Cs������؅r,�%ԃ�MWSZZv\>܋VJ:r� #ѥ��&K���6�g��}?�W�
�����WU�_�nA�l����p|y�l�{�4���u��-��13�֯VJyb�A�      y   {   x�e�A
� ���x
/�<Gg���B��t����)	t��{����q_I@�R�h5HEe�A�pB��sR�K�>��2���zJ�ȣ)l������a�%>�d�d�MJ������-:�!,"B      {   �   x�u�1n!��z�\`�Ry���$H���?G�8���+~}z��2��ܫ�SS��\D�
br��:��_|X�R6����n6~FR��ɳv��*�ꄰ�%�OS��z�m@06����7{���	9٨������_E�v�e�0�O3�Af��^���YRr��'O�O���i�e�>r      }   �  x����n� F��S�A0��wU��SGX��Uo�����ꦩT�e��g�|����y�)���a���tc?��42$����K�qEl@)��2{�;wc�`��k�(�vBI��7�?�䘻����AK���4W6�K*��t��sz�3/�o��nn�7,�+�ݑȯ���V:6�$�X���v��%p�@�u/U)[�J�KY�!�.�>ϩ�)?"�l #,xG�~�ٰ�3S��+��X�+k�|B@����m8�p�XK���9���O�O!�i��	�{�U��@XY`5���G\�_]i-}uu���5,��f[;��~?b��uX�DV�ؗ�_R?-�%�ȎS)i�R:��2L�]�Ct��=W:HZdj�Zob��} ��         9   x�3�tt����	rt����2��su񂹌8�}<]�B\�2&�@�=... a�      �   �   x����j�@@��W�����]�5J�hq2��C6�)� A����I�t���HI�Y3�;T��T�B7U�[
��	qCT�p*5�.s}}�WTL�=�}� a�q�J�
�TƩ�NqR�}�����K5:��y���d��_ ���yλ���@�V[�6v4Z,��^?��)D)��B.䏇e ۲y�\U�$�"	Uf�����|�{�.-�/ڸR�as�v�w�7�[C��d"�Q* �"���ux���U]�      �   �   x�m�K
�0@��)r���%����� �����ijU���<�KZ"H��z9�F<B�&��%cs"+d��Ҕ�PS�o��Q�N�@Y�I�T�e:�O��cy�E������?�Q��#�&�[B�/��@����Ы9�Wyc5V~�mo]?�6G)l�#j-�^�_-<w�F���V���Q�ax�_O�     