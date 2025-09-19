-- Table: public.v_pegawai_data

-- DROP TABLE IF EXISTS public.v_pegawai_data;

CREATE TABLE IF NOT EXISTS public.v_pegawai_data
(
    peg_id bigint NOT NULL,
    peg_nip text COLLATE pg_catalog."default",
    peg_nip_lama text COLLATE pg_catalog."default",
    peg_nama text COLLATE pg_catalog."default",
    peg_nama_lengkap text COLLATE pg_catalog."default",
    satuan_kerja_id bigint,
    satuan_kerja_nama text COLLATE pg_catalog."default",
    CONSTRAINT v_pegawai_data_pkey PRIMARY KEY (peg_id)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.v_pegawai_data
    OWNER to postgres;
