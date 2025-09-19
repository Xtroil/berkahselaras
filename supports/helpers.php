<?php

function getIp()
{
    foreach (['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR'] as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                $ip = trim($ip); // just to be safe
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                    return $ip;
                }
            }
        }
    }
}

/**
 * Ambil satuan kerja, jika setda maka akan return semua biro,
 * jika bukan maka akan return sesuai parameter
 */
function getSatuanKerjaIds(int $satkerId): array
{
    // jika satkerId = setda, maka ambil setda + semua biro
    if ($satkerId == SATKER_SETDA) {
        return [
            SATKER_SETDA,
            37, // biro kesra
            38, // biro pemotda
            39, // biro perekonomian
            40, // biro organisasi
            41, // biro adpim
            42, // biro hukumham
            43, // biro umum
            44, // biro adpem
            45, // biro barjas
        ];
    }

    return [$satkerId];
}

function setTahunKinerja(int $tahun): void
{
    session(['tahun_kinerja' => $tahun]);
    setEkinerjaDBTahun($tahun);
}

/**
 * get tahun kinerja berdasarkan session tahun kinerja
 * jika tidak ada ambil dari konstanta TAHUN_KINERJA
 */
function getTahunKinerja(): int
{
    return session('tahun_kinerja', TAHUN_KINERJA);
}

/**
 * get tahun mulai berdasarkan getTahunKinerja()
 */
function getTahunMulai(): int
{
    $tahunMulai = BASE_TAHUN_MULAI;
    $tahunKinerja = getTahunKinerja();

    while ($tahunMulai < $tahunKinerja) {
        $tahunMulai += 5; // per 5 tahun
    }

    if (($tahunMulai - $tahunKinerja) % 5 === 0) {
        return $tahunMulai;
    }

    return $tahunMulai - 5;
}

function getKeyTahun(string $key, int $offset = 0): string
{
    $index = (getTahunKinerja() - getTahunMulai()) + 1 + $offset;

    if ($index < 1) {
        $index = 'baseline';
    }

    return "{$key}_{$index}";
}

/**
 * get satuan_kerja_id dengan mengecek apakah biro atau bukan,
 * jika biro maka akan return satuan kerja id setda,
 * jika bukan biro maka akan return sesuai parameter
 */
function parseSatuanKerjaId(int $satkerId): int
{
    return isBiro($satkerId) ? SATKER_SETDA : $satkerId;
}

function convertSatuanKerjaId(int $satkerId): int
{
    //convert idsatuan kerja saliara ke satuan kerja siap sulteng
    if ($satkerId == 1) {
        $idskpd = 1035;
    } elseif ($satkerId == 2) {
        $idskpd = 1030;
    } elseif ($satkerId == 3) {
        $idskpd = 1034;
    } elseif ($satkerId == 4) {
        $idskpd = 1033;
    } elseif ($satkerId == 5) {
        $idskpd = 1036;
    } elseif ($satkerId == 6) {
        $idskpd = 1032;
    } elseif ($satkerId == 7) {
        $idskpd = 1039;
    } elseif ($satkerId == 8) {
        $idskpd = 1031;
    } elseif ($satkerId == 9) {
        $idskpd = 1040;
    } elseif ($satkerId == 10) {
        $idskpd = 1003;
    } elseif ($satkerId == 11) {
        $idskpd = 1029;
    } elseif ($satkerId == 12) {
        $idskpd = 1004;
    } elseif ($satkerId == 13) {
        $idskpd = 1028;
    } elseif ($satkerId == 14) {
        $idskpd = 1005;
    } elseif ($satkerId == 15) {
        $idskpd = 1006;
    } elseif ($satkerId == 16) {
        $idskpd = 1007;
    } elseif ($satkerId == 17) {
        $idskpd = 1008;
    } elseif ($satkerId == 18) {
        $idskpd = 1009;
    } elseif ($satkerId == 19) {
        $idskpd = 1010;
    } elseif ($satkerId == 20) {
        $idskpd = 1024;
    } elseif ($satkerId == 21) {
        $idskpd = 1011;
    } elseif ($satkerId == 22) {
        $idskpd = 1013;
    } elseif ($satkerId == 23) {
        $idskpd = 1012;
    } elseif ($satkerId == 24) {
        $idskpd = 1014;
    } elseif ($satkerId == 25) {
        $idskpd = 1016;
    } elseif ($satkerId == 26) {
        $idskpd = 1027;
    } elseif ($satkerId == 27) {
        $idskpd = 1018;
    } elseif ($satkerId == 28) {
        $idskpd = 1020;
    } elseif ($satkerId == 29) {
        $idskpd = 1021;
    } elseif ($satkerId == 30) {
        $idskpd = 1022;
    } elseif ($satkerId == 31) {
        $idskpd = 1023;
    } elseif ($satkerId == 32) {
        $idskpd = 1025;
    } elseif ($satkerId == 33) {
        $idskpd = 1026;
    } elseif ($satkerId == 34) {
        $idskpd = 1019;
    } elseif ($satkerId == 35) {
        $idskpd = 1015;
    } elseif ($satkerId == 36) {
        $idskpd = 1017;
    } elseif ($satkerId == 37) {
        $idskpd = 9;
    } elseif ($satkerId == 38) {
        $idskpd = 2;
    } elseif ($satkerId == 39) {
        $idskpd = 73;
    } elseif ($satkerId == 40) {
        $idskpd = 145;
    } elseif ($satkerId == 41) {
        $idskpd = 175;
    } elseif ($satkerId == 42) {
        $idskpd = 59;
    } elseif ($satkerId == 43) {
        $idskpd = 158;
    } elseif ($satkerId == 44) {
        $idskpd = 131;
    } elseif ($satkerId == 45) {
        $idskpd = 118;
    } elseif ($satkerId == 46) {
        $idskpd = 1002;
    } elseif ($satkerId == 47) {
        $idskpd = 1038;
    } elseif ($satkerId == 48) {
        $idskpd = 1037;
    } elseif ($satkerId == 49) {
        $idskpd = 1001;
    }

    return isBiro($satkerId) ? '1001' : $idskpd;
}


function convertBiroId(int $satkerId): int
{
    //convert idsatuan kerja saliara ke satuan kerja biro siap sulteng
    if ($satkerId == 37) {
        $idskpd = 9;
    } elseif ($satkerId == 38) {
        $idskpd = 2;
    } elseif ($satkerId == 39) {
        $idskpd = 73;
    } elseif ($satkerId == 40) {
        $idskpd = 145;
    } elseif ($satkerId == 41) {
        $idskpd = 175;
    } elseif ($satkerId == 42) {
        $idskpd = 59;
    } elseif ($satkerId == 43) {
        $idskpd = 158;
    } elseif ($satkerId == 44) {
        $idskpd = 131;
    } elseif ($satkerId == 45) {
        $idskpd = 118;
    }

    return $idskpd;
}


/**
 * Cek apakah biro berdasarkan satuan kerja id
 */
function isBiro(?int $satkerId): bool
{
    return $satkerId != SATKER_SETDA && isBiroOrSetda($satkerId);
}

/**
 * Cek apakah dinkes berdasarkan satuan kerja id
 */
function isDinkes(?int $satkerId): bool
{
    if ($satkerId == SATKER_DINKES) {
        return true;
    } else {
        return false;
    }
}


/**
 * Cek apakah biro atau setda berdasarkan satuan kerja id
 */
function isBiroOrSetda(?int $satkerId): bool
{
    $list_id_biro = array(37, 38, 39, 40, 41, 42, 43, 44, 45);

    if (in_array($satkerId, $list_id_biro)) {
        return true;
    } else {
        return false;
    }
}
/**
 * Generate `role` middleware by `role_id`
 */
function roleMiddleware(int|array $roles): string
{
    $roles = is_array($roles) ? $roles : func_get_args();
    $roles = implode(',', $roles);

    return "role:{$roles}";
}

function setEkinerjaDBTahun(int $tahun): void
{
    config([
        'database.connections.ekinerja' => config("database.connections.ekinerja_{$tahun}"),
    ]);
}
