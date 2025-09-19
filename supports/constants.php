<?php

/**
 * Beberapa isi gile ini harus sinkron dengan client\plugins\constants.js
 */

/**
 * base tahun mulai
 * sinkron dengan client\plugins\constants.js
 * jangan diubah!
 */
const BASE_TAHUN_MULAI = 2025;

/**
 * default tahun_kinerja
 * ubah manual per tahun
 * sinkron client\plugins\constants.js
 * jangan panggil variabel ini, panggil helper getTahunKinerja() supaya dinamis berdasarkan filter tahun kinerja
 */
const TAHUN_KINERJA = 2025;

const SATKER_SETDA = 49;
const SATKER_SETWAN = 46;
const SATKER_DINKES = 12;
const SATKER_DISDUKCAPIL = 22;
const SATKER_DPMPTSP = 28;
const SATKER_BANHUB = 9;

/**
 * @var array<int, array<string>>
 */
const TRIWULAN_BULAN = [
    1 => ['jan', 'feb', 'mar'],
    2 => ['jan', 'feb', 'mar', 'apr', 'may', 'jun'],
    3 => ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep'],
    4 => ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'],
];

const MONTHS = [
    ['jan', 'Januari'],
    ['feb', 'Februari'],
    ['mar', 'Maret'],
    ['apr', 'April'],
    ['may', 'Mei'],
    ['jun', 'Juni'],
    ['jul', 'Juli'],
    ['aug', 'Agustus'],
    ['sep', 'September'],
    ['oct', 'Oktober'],
    ['nov', 'November'],
    ['dec', 'Desember'],
];
