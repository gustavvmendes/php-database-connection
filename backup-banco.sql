PGDMP     #                    {            postgres    15.4    15.4 3    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    5    postgres    DATABASE     s   CREATE DATABASE postgres WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en_US.UTF8';
    DROP DATABASE postgres;
                cloudsqlsuperuser    false            �           0    0    DATABASE postgres    COMMENT     N   COMMENT ON DATABASE postgres IS 'default administrative connection database';
                   cloudsqlsuperuser    false    3991            �           0    0    DATABASE postgres    ACL     /   GRANT ALL ON DATABASE postgres TO "AnaSantos";
                   cloudsqlsuperuser    false    3991            �           0    0    SCHEMA public    ACL     1   GRANT ALL ON SCHEMA public TO cloudsqlsuperuser;
                   pg_database_owner    false    5            �           0    0 4   FUNCTION pg_replication_origin_advance(text, pg_lsn)    ACL     c   GRANT ALL ON FUNCTION pg_catalog.pg_replication_origin_advance(text, pg_lsn) TO cloudsqlsuperuser;
       
   pg_catalog          cloudsqladmin    false    228            �           0    0 +   FUNCTION pg_replication_origin_create(text)    ACL     Z   GRANT ALL ON FUNCTION pg_catalog.pg_replication_origin_create(text) TO cloudsqlsuperuser;
       
   pg_catalog          cloudsqladmin    false    232            �           0    0 )   FUNCTION pg_replication_origin_drop(text)    ACL     X   GRANT ALL ON FUNCTION pg_catalog.pg_replication_origin_drop(text) TO cloudsqlsuperuser;
       
   pg_catalog          cloudsqladmin    false    223            �           0    0 (   FUNCTION pg_replication_origin_oid(text)    ACL     W   GRANT ALL ON FUNCTION pg_catalog.pg_replication_origin_oid(text) TO cloudsqlsuperuser;
       
   pg_catalog          cloudsqladmin    false    233            �           0    0 6   FUNCTION pg_replication_origin_progress(text, boolean)    ACL     e   GRANT ALL ON FUNCTION pg_catalog.pg_replication_origin_progress(text, boolean) TO cloudsqlsuperuser;
       
   pg_catalog          cloudsqladmin    false    229            �           0    0 1   FUNCTION pg_replication_origin_session_is_setup()    ACL     `   GRANT ALL ON FUNCTION pg_catalog.pg_replication_origin_session_is_setup() TO cloudsqlsuperuser;
       
   pg_catalog          cloudsqladmin    false    224            �           0    0 8   FUNCTION pg_replication_origin_session_progress(boolean)    ACL     g   GRANT ALL ON FUNCTION pg_catalog.pg_replication_origin_session_progress(boolean) TO cloudsqlsuperuser;
       
   pg_catalog          cloudsqladmin    false    225            �           0    0 .   FUNCTION pg_replication_origin_session_reset()    ACL     ]   GRANT ALL ON FUNCTION pg_catalog.pg_replication_origin_session_reset() TO cloudsqlsuperuser;
       
   pg_catalog          cloudsqladmin    false    226            �           0    0 2   FUNCTION pg_replication_origin_session_setup(text)    ACL     a   GRANT ALL ON FUNCTION pg_catalog.pg_replication_origin_session_setup(text) TO cloudsqlsuperuser;
       
   pg_catalog          cloudsqladmin    false    227            �           0    0 +   FUNCTION pg_replication_origin_xact_reset()    ACL     Z   GRANT ALL ON FUNCTION pg_catalog.pg_replication_origin_xact_reset() TO cloudsqlsuperuser;
       
   pg_catalog          cloudsqladmin    false    230            �           0    0 K   FUNCTION pg_replication_origin_xact_setup(pg_lsn, timestamp with time zone)    ACL     z   GRANT ALL ON FUNCTION pg_catalog.pg_replication_origin_xact_setup(pg_lsn, timestamp with time zone) TO cloudsqlsuperuser;
       
   pg_catalog          cloudsqladmin    false    221            �           0    0    FUNCTION pg_show_replication_origin_status(OUT local_id oid, OUT external_id text, OUT remote_lsn pg_lsn, OUT local_lsn pg_lsn)    ACL     �   GRANT ALL ON FUNCTION pg_catalog.pg_show_replication_origin_status(OUT local_id oid, OUT external_id text, OUT remote_lsn pg_lsn, OUT local_lsn pg_lsn) TO cloudsqlsuperuser;
       
   pg_catalog          cloudsqladmin    false    231            �            1255    16568    validar_quantidade()    FUNCTION     �  CREATE FUNCTION public.validar_quantidade() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
    -- Verifica se a nova quantidade é negativa após o update
    IF NEW.pro_quantidade < 0 THEN
        -- Se negativa, faz rollback
        RAISE EXCEPTION 'Não é permitido inserir uma quantidade negativa.';
        RETURN NULL;
    ELSE
        -- Se positiva, faz commit
        RETURN NEW;
    END IF;
END;
$$;
 +   DROP FUNCTION public.validar_quantidade();
       public          postgres    false            �            1259    16488    tb_fornecedores    TABLE     q   CREATE TABLE public.tb_fornecedores (
    for_codigo bigint NOT NULL,
    for_descricao character varying(45)
);
 #   DROP TABLE public.tb_fornecedores;
       public         heap    postgres    false            �            1259    16505    tb_funcionarios    TABLE     �   CREATE TABLE public.tb_funcionarios (
    fun_codigo bigint NOT NULL,
    fun_nome character varying(45),
    fun_cpf character varying(45),
    fun_senha character varying(50),
    fun_funcao character varying(50)
);
 #   DROP TABLE public.tb_funcionarios;
       public         heap    postgres    false            �           0    0    TABLE tb_funcionarios    ACL     }   GRANT SELECT ON TABLE public.tb_funcionarios TO "Maria Silva";
GRANT SELECT ON TABLE public.tb_funcionarios TO "MariaSilva";
          public          postgres    false    216            �            1259    16520    tb_itens    TABLE     �   CREATE TABLE public.tb_itens (
    ite_codigo bigint NOT NULL,
    ite_quantidade integer,
    ite_valor_parcial numeric,
    tb_produtos_pro_codigo bigint,
    tb_vendas_ven_codigo bigint
);
    DROP TABLE public.tb_itens;
       public         heap    postgres    false            �            1259    16493    tb_produtos    TABLE     �   CREATE TABLE public.tb_produtos (
    pro_codigo bigint NOT NULL,
    pro_descricao character varying(100),
    pro_valor numeric,
    pro_quantidade integer,
    tb_fornecedores_for_codigo bigint
);
    DROP TABLE public.tb_produtos;
       public         heap    postgres    false            �           0    0    TABLE tb_produtos    ACL     |   GRANT SELECT,UPDATE ON TABLE public.tb_produtos TO "AnaSantos";
GRANT SELECT,UPDATE ON TABLE public.tb_produtos TO gerente;
          public          postgres    false    215            �            1259    16510 	   tb_vendas    TABLE     �   CREATE TABLE public.tb_vendas (
    ven_codigo bigint NOT NULL,
    ven_horario timestamp without time zone,
    ven_valor_total numeric(7,2),
    tb_funcionarios_fun_codigo bigint
);
    DROP TABLE public.tb_vendas;
       public         heap    postgres    false            �           0    0    TABLE tb_vendas    ACL     x   GRANT SELECT,INSERT ON TABLE public.tb_vendas TO "AnaSantos";
GRANT SELECT,INSERT ON TABLE public.tb_vendas TO gerente;
          public          postgres    false    217            �            1259    16545    usuario_pg_associacao    TABLE     �   CREATE TABLE public.usuario_pg_associacao (
    id integer NOT NULL,
    id_usuario_app integer,
    usuario_pg character varying(50)
);
 )   DROP TABLE public.usuario_pg_associacao;
       public         heap    postgres    false            �            1259    16544    usuario_pg_associacao_id_seq    SEQUENCE     �   CREATE SEQUENCE public.usuario_pg_associacao_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.usuario_pg_associacao_id_seq;
       public          postgres    false    220            �           0    0    usuario_pg_associacao_id_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.usuario_pg_associacao_id_seq OWNED BY public.usuario_pg_associacao.id;
          public          postgres    false    219            �           2604    16548    usuario_pg_associacao id    DEFAULT     �   ALTER TABLE ONLY public.usuario_pg_associacao ALTER COLUMN id SET DEFAULT nextval('public.usuario_pg_associacao_id_seq'::regclass);
 G   ALTER TABLE public.usuario_pg_associacao ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    219    220    220            �          0    16488    tb_fornecedores 
   TABLE DATA           D   COPY public.tb_fornecedores (for_codigo, for_descricao) FROM stdin;
    public          postgres    false    214   =       �          0    16505    tb_funcionarios 
   TABLE DATA           _   COPY public.tb_funcionarios (fun_codigo, fun_nome, fun_cpf, fun_senha, fun_funcao) FROM stdin;
    public          postgres    false    216   e=       �          0    16520    tb_itens 
   TABLE DATA              COPY public.tb_itens (ite_codigo, ite_quantidade, ite_valor_parcial, tb_produtos_pro_codigo, tb_vendas_ven_codigo) FROM stdin;
    public          postgres    false    218   ,>       �          0    16493    tb_produtos 
   TABLE DATA           w   COPY public.tb_produtos (pro_codigo, pro_descricao, pro_valor, pro_quantidade, tb_fornecedores_for_codigo) FROM stdin;
    public          postgres    false    215   �>       �          0    16510 	   tb_vendas 
   TABLE DATA           i   COPY public.tb_vendas (ven_codigo, ven_horario, ven_valor_total, tb_funcionarios_fun_codigo) FROM stdin;
    public          postgres    false    217   u?       �          0    16545    usuario_pg_associacao 
   TABLE DATA           O   COPY public.usuario_pg_associacao (id, id_usuario_app, usuario_pg) FROM stdin;
    public          postgres    false    220   �B       �           0    0    usuario_pg_associacao_id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.usuario_pg_associacao_id_seq', 5, true);
          public          postgres    false    219            �           2606    16492 $   tb_fornecedores tb_fornecedores_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.tb_fornecedores
    ADD CONSTRAINT tb_fornecedores_pkey PRIMARY KEY (for_codigo);
 N   ALTER TABLE ONLY public.tb_fornecedores DROP CONSTRAINT tb_fornecedores_pkey;
       public            postgres    false    214            �           2606    16509 $   tb_funcionarios tb_funcionarios_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.tb_funcionarios
    ADD CONSTRAINT tb_funcionarios_pkey PRIMARY KEY (fun_codigo);
 N   ALTER TABLE ONLY public.tb_funcionarios DROP CONSTRAINT tb_funcionarios_pkey;
       public            postgres    false    216            �           2606    16526    tb_itens tb_itens_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.tb_itens
    ADD CONSTRAINT tb_itens_pkey PRIMARY KEY (ite_codigo);
 @   ALTER TABLE ONLY public.tb_itens DROP CONSTRAINT tb_itens_pkey;
       public            postgres    false    218            �           2606    16499    tb_produtos tb_produtos_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.tb_produtos
    ADD CONSTRAINT tb_produtos_pkey PRIMARY KEY (pro_codigo);
 F   ALTER TABLE ONLY public.tb_produtos DROP CONSTRAINT tb_produtos_pkey;
       public            postgres    false    215            �           2606    16514    tb_vendas tb_vendas_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.tb_vendas
    ADD CONSTRAINT tb_vendas_pkey PRIMARY KEY (ven_codigo);
 B   ALTER TABLE ONLY public.tb_vendas DROP CONSTRAINT tb_vendas_pkey;
       public            postgres    false    217            �           2606    16550 0   usuario_pg_associacao usuario_pg_associacao_pkey 
   CONSTRAINT     n   ALTER TABLE ONLY public.usuario_pg_associacao
    ADD CONSTRAINT usuario_pg_associacao_pkey PRIMARY KEY (id);
 Z   ALTER TABLE ONLY public.usuario_pg_associacao DROP CONSTRAINT usuario_pg_associacao_pkey;
       public            postgres    false    220            �           1259    16579    idx_fun_nome    INDEX     L   CREATE INDEX idx_fun_nome ON public.tb_funcionarios USING btree (fun_nome);
     DROP INDEX public.idx_fun_nome;
       public            postgres    false    216            �           2620    16569 &   tb_produtos trigger_validar_quantidade    TRIGGER     �   CREATE TRIGGER trigger_validar_quantidade BEFORE INSERT OR UPDATE ON public.tb_produtos FOR EACH ROW EXECUTE FUNCTION public.validar_quantidade();
 ?   DROP TRIGGER trigger_validar_quantidade ON public.tb_produtos;
       public          postgres    false    215    222            �           2606    16527 -   tb_itens tb_itens_tb_produtos_pro_codigo_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.tb_itens
    ADD CONSTRAINT tb_itens_tb_produtos_pro_codigo_fkey FOREIGN KEY (tb_produtos_pro_codigo) REFERENCES public.tb_produtos(pro_codigo);
 W   ALTER TABLE ONLY public.tb_itens DROP CONSTRAINT tb_itens_tb_produtos_pro_codigo_fkey;
       public          postgres    false    3822    218    215            �           2606    16532 +   tb_itens tb_itens_tb_vendas_ven_codigo_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.tb_itens
    ADD CONSTRAINT tb_itens_tb_vendas_ven_codigo_fkey FOREIGN KEY (tb_vendas_ven_codigo) REFERENCES public.tb_vendas(ven_codigo);
 U   ALTER TABLE ONLY public.tb_itens DROP CONSTRAINT tb_itens_tb_vendas_ven_codigo_fkey;
       public          postgres    false    217    218    3827            �           2606    16500 7   tb_produtos tb_produtos_tb_fornecedores_for_codigo_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.tb_produtos
    ADD CONSTRAINT tb_produtos_tb_fornecedores_for_codigo_fkey FOREIGN KEY (tb_fornecedores_for_codigo) REFERENCES public.tb_fornecedores(for_codigo);
 a   ALTER TABLE ONLY public.tb_produtos DROP CONSTRAINT tb_produtos_tb_fornecedores_for_codigo_fkey;
       public          postgres    false    3820    214    215            �           2606    16515 3   tb_vendas tb_vendas_tb_funcionarios_fun_codigo_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.tb_vendas
    ADD CONSTRAINT tb_vendas_tb_funcionarios_fun_codigo_fkey FOREIGN KEY (tb_funcionarios_fun_codigo) REFERENCES public.tb_funcionarios(fun_codigo);
 ]   ALTER TABLE ONLY public.tb_vendas DROP CONSTRAINT tb_vendas_tb_funcionarios_fun_codigo_fkey;
       public          postgres    false    217    216    3825            �   I   x�3�t�/�KMNM�/Rp�2B�:q#s��L��.\��\W.3d��92ם����e����24@�{q��qqq �
/�      �   �   x�M��
�0D�7��K�l�7���+7W1PMZ~�����f8�)y���"�B���Vuم��.n����U���3p�Q�R�J��]HX��#Qf
:7����M��Fc��i*k�2�/��S|�>O�4�hNԹ�|"h���_���o���|�|�k!l�F+����;�-�09vB���wE�      �   ]   x�=���0��0UH �]��5y���aÄY=u`0N,�l�%�j%:�byM%�n���▙��j)߆�L�y���4�w��������!�c��      �   �   x�M�A�0E�3��0-P([M\�5q�f�&��-��Cx/�`���4����&���	���#�j��
O��ȿ_$n��	2��
��@�Ɏ$:+�0� Y��
k8�@��WC�d����l]����x?�ɇ4����K��Tr����:�7K"�A�&�>D7���/Aa�nn��4J�|j��|υ�k���G���?!sM4      �   G  x�}�ɭ�8E�vN��8i���I�5Q(��"/)�p`@�n�B�PC8@�c'.�+�a�����40]�Txq�E�L��ȓ�A����w��$�q��%���pș����K;/8~�)�-�2p����E�	a��U���5��ߞ��k���+P�X�&>�V.T���ٹ��x[�����9�\�y�AS~�f�6{��g�s�\N(;��Ä�w��NT�!�=O��J[M'҂K�T)�3���me`qX3g8:�`�u�&��=�wZ.��b�խ�(x����a��zN=8�ú=�̉<�6M�ǩ����as��c)'��SǓk�S���>Tv�}�sX0Րl�6k�h�F������<���!b^0����a�Ax�1�;�	'����#5�w�} �pq������<F;�Î��y���;���x�k�;���� �mC�^�x�l���D�k���ܻ�X��/x\]��n��y���7["z-��w$����y�c}�a�c���k1�x�;;�מL���F�{'���%{�~�bǫk�#���DG+����a���iq�ξ���=.���~��c=9O�E����^(w�L0����&�|�)�� ��wJM ��z�Y��x���,/{�'A�z[L����Y���,؜��.߉?AٜT�X����Z�-
:�^���-�	���WM��x�����A;�%B�������O�@_ ��J\\��7����R�@V��e;W��^���?�(�> ����?�g��
\�/b}�&�^���� yA�&��	�{����&Q      �   ]   x�3�4��M,�LT��)K�2�4���?�8_�?'�,5�(�˘Ә�1� 1�$��˄ӄ3 5�(_!8��*�˔Ӕ�'��(Q! ��!F��� ���     