PGDMP     8                    w            maria_project #   10.9 (Ubuntu 10.9-0ubuntu0.18.04.1) #   10.9 (Ubuntu 10.9-0ubuntu0.18.04.1) 5    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            �           1262    24693    maria_project    DATABASE        CREATE DATABASE maria_project WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'ru_RU.UTF-8' LC_CTYPE = 'ru_RU.UTF-8';
    DROP DATABASE maria_project;
             maria    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            �           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    3                        3079    13043    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            �           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    24699    jewels    TABLE     q   CREATE TABLE public.jewels (
    id integer NOT NULL,
    type character varying NOT NULL,
    active boolean
);
    DROP TABLE public.jewels;
       public         maria    false    3            �            1259    24705    jewels_id_seq    SEQUENCE     �   CREATE SEQUENCE public.jewels_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.jewels_id_seq;
       public       maria    false    3    196            �           0    0    jewels_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.jewels_id_seq OWNED BY public.jewels.id;
            public       maria    false    197            �            1259    24707    mined    TABLE     /  CREATE TABLE public.mined (
    id integer NOT NULL,
    type_id integer NOT NULL,
    gnome_id integer NOT NULL,
    status_mineral_id integer NOT NULL,
    mined_at bigint,
    elf_id integer,
    master_gnome_id integer,
    purporsed_at bigint,
    conformed_at_elf bigint,
    automatic boolean
);
    DROP TABLE public.mined;
       public         maria    false    3            �            1259    24710    mined_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mined_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.mined_id_seq;
       public       maria    false    3    198            �           0    0    mined_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.mined_id_seq OWNED BY public.mined.id;
            public       maria    false    199            �            1259    24712    prioriti    TABLE     {   CREATE TABLE public.prioriti (
    id integer NOT NULL,
    types_id integer,
    elf_id integer,
    preferred boolean
);
    DROP TABLE public.prioriti;
       public         maria    false    3            �            1259    24715    prioriti_id_seq    SEQUENCE     �   CREATE SEQUENCE public.prioriti_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.prioriti_id_seq;
       public       maria    false    200    3            �           0    0    prioriti_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.prioriti_id_seq OWNED BY public.prioriti.id;
            public       maria    false    201            �            1259    24717    roles    TABLE     \   CREATE TABLE public.roles (
    id integer NOT NULL,
    role character varying NOT NULL
);
    DROP TABLE public.roles;
       public         maria    false    3            �            1259    24723    roles_id_seq    SEQUENCE     �   CREATE SEQUENCE public.roles_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.roles_id_seq;
       public       maria    false    3    202            �           0    0    roles_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;
            public       maria    false    203            �            1259    24725    sessions    TABLE     k   CREATE TABLE public.sessions (
    id character varying(40) NOT NULL,
    data bytea,
    expire bigint
);
    DROP TABLE public.sessions;
       public         maria    false    3            �            1259    24731    status_mineral    TABLE     g   CREATE TABLE public.status_mineral (
    id integer NOT NULL,
    status character varying NOT NULL
);
 "   DROP TABLE public.status_mineral;
       public         maria    false    3            �            1259    24737    status_mineral_id_seq    SEQUENCE     �   CREATE SEQUENCE public.status_mineral_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.status_mineral_id_seq;
       public       maria    false    205    3            �           0    0    status_mineral_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.status_mineral_id_seq OWNED BY public.status_mineral.id;
            public       maria    false    206            �            1259    24739    users    TABLE     ,  CREATE TABLE public.users (
    id integer NOT NULL,
    username character varying(30),
    password character varying(140),
    role_id integer,
    fname character varying(40),
    status_user boolean,
    created_at bigint,
    last_login bigint,
    last_logout bigint,
    updated_at bigint
);
    DROP TABLE public.users;
       public         maria    false    3            �            1259    24742    users_id_seq    SEQUENCE     �   CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public       maria    false    207    3            �           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
            public       maria    false    208            
           2604    24745 	   jewels id    DEFAULT     f   ALTER TABLE ONLY public.jewels ALTER COLUMN id SET DEFAULT nextval('public.jewels_id_seq'::regclass);
 8   ALTER TABLE public.jewels ALTER COLUMN id DROP DEFAULT;
       public       maria    false    197    196                       2604    24746    mined id    DEFAULT     d   ALTER TABLE ONLY public.mined ALTER COLUMN id SET DEFAULT nextval('public.mined_id_seq'::regclass);
 7   ALTER TABLE public.mined ALTER COLUMN id DROP DEFAULT;
       public       maria    false    199    198                       2604    24747    prioriti id    DEFAULT     j   ALTER TABLE ONLY public.prioriti ALTER COLUMN id SET DEFAULT nextval('public.prioriti_id_seq'::regclass);
 :   ALTER TABLE public.prioriti ALTER COLUMN id DROP DEFAULT;
       public       maria    false    201    200                       2604    24748    roles id    DEFAULT     d   ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);
 7   ALTER TABLE public.roles ALTER COLUMN id DROP DEFAULT;
       public       maria    false    203    202                       2604    24749    status_mineral id    DEFAULT     v   ALTER TABLE ONLY public.status_mineral ALTER COLUMN id SET DEFAULT nextval('public.status_mineral_id_seq'::regclass);
 @   ALTER TABLE public.status_mineral ALTER COLUMN id DROP DEFAULT;
       public       maria    false    206    205                       2604    24750    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public       maria    false    208    207            �          0    24699    jewels 
   TABLE DATA               2   COPY public.jewels (id, type, active) FROM stdin;
    public       maria    false    196   �4       �          0    24707    mined 
   TABLE DATA               �   COPY public.mined (id, type_id, gnome_id, status_mineral_id, mined_at, elf_id, master_gnome_id, purporsed_at, conformed_at_elf, automatic) FROM stdin;
    public       maria    false    198   	5       �          0    24712    prioriti 
   TABLE DATA               C   COPY public.prioriti (id, types_id, elf_id, preferred) FROM stdin;
    public       maria    false    200   �5       �          0    24717    roles 
   TABLE DATA               )   COPY public.roles (id, role) FROM stdin;
    public       maria    false    202   �5       �          0    24725    sessions 
   TABLE DATA               4   COPY public.sessions (id, data, expire) FROM stdin;
    public       maria    false    204   �5       �          0    24731    status_mineral 
   TABLE DATA               4   COPY public.status_mineral (id, status) FROM stdin;
    public       maria    false    205   z6       �          0    24739    users 
   TABLE DATA               �   COPY public.users (id, username, password, role_id, fname, status_user, created_at, last_login, last_logout, updated_at) FROM stdin;
    public       maria    false    207   �6       �           0    0    jewels_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.jewels_id_seq', 5, true);
            public       maria    false    197            �           0    0    mined_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.mined_id_seq', 30, true);
            public       maria    false    199            �           0    0    prioriti_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.prioriti_id_seq', 1, false);
            public       maria    false    201            �           0    0    roles_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.roles_id_seq', 3, true);
            public       maria    false    203            �           0    0    status_mineral_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.status_mineral_id_seq', 3, true);
            public       maria    false    206            �           0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 15, true);
            public       maria    false    208                       2606    24752    sessions  session_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT " session_pkey" PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.sessions DROP CONSTRAINT " session_pkey";
       public         maria    false    204                       2606    24756    jewels jewels_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.jewels
    ADD CONSTRAINT jewels_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.jewels DROP CONSTRAINT jewels_pkey;
       public         maria    false    196                       2606    24758    mined mined_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.mined
    ADD CONSTRAINT mined_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.mined DROP CONSTRAINT mined_pkey;
       public         maria    false    198                       2606    24760    prioriti prioriti_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.prioriti
    ADD CONSTRAINT prioriti_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.prioriti DROP CONSTRAINT prioriti_pkey;
       public         maria    false    200                       2606    24762    roles roles_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.roles DROP CONSTRAINT roles_pkey;
       public         maria    false    202                       2606    24764 "   status_mineral status_mineral_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.status_mineral
    ADD CONSTRAINT status_mineral_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.status_mineral DROP CONSTRAINT status_mineral_pkey;
       public         maria    false    205                       2606    24766    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public         maria    false    207            �   B   x�3�L�M-J�I�,�2�L�M-ɨ,.r�8S2s��@Ɯŉ�E�@�!gQiR%����� �<�      �   l   x��л�0E��ſ8Y�	��"���.�^qو��Ƭ��t��v�QM���e�tL$R1aL��H�e���7�?��FM��@b@��/	UKd@��c+����r"      �      x������ � �      �   %   x�3�L�I�2�L���M�2��M,.I-��pc���� �2	�      �   �   x����� D��1���.�/^#XEmKL?�����4ɛ�ˌ�ڼ�h�z� B9�6sLϮ��nrEҌ�%<�xuB�QiT��iG �%�:���6=B)c�t�d���0�R��[VS��s�î�u����cFǤ��R��D      �   +   x�3���/QH,(���+IM�2�D��9����2�r��=... Y�(      �   �  x�U��r�JFǝ�����nh~����"
�	(6� %O�4���v�`��6�Q������¶|S��v�ϗ�e�y�ә?�R�R��y�{���Ƶ�~K�S����� b�ü�D|��7T/��r�Z���/�%C��'���v�(m�0Q>vͨ��+&>�n8#B�/^ ��2�ľ��gz[�'%��6|�:��٘�S�$_q�����֤r��U3^o��?x�I��Q���!m�A/�Hܛ�VV�h3��l}[�{"k,�_�i�9��@�> �E����N�%��6��~ظ��6�.�V�k~��["�áY��d}t1�V_� 1O�?��9dp�N����\�z#��O��"����C��i�kף�R=�����|{@��,��(KX��s��]'����3�ިw���;�s�l�����I��<�?�n�oTɰMy��-&����dL/�T@��(�%�H�-�FE�o��x�!�b!�Y-�H\�\�]��s����Mk��l�.XZG$BPA$9n�A/�OV;�d,��¡�(��"(�2���XL驛eW=�3�`rM�,����z�mh�!����0
����`vg��E������k(��W mռjs��F���v�Ā�Q�E��W����Ƕ37B/�r�%bz�\3�X�_�{@�!E��L�x�����gz��_��n��[;���*�`D}J�Zۄ����,��T�;c4�^�/�����B�     