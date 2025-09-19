/**
 * Beberapa isi file ini harus sinkron dengan supports\constants.php
 */

export default ({ app }, inject) => {
  /**
   * base tahun mulai
   * sinkron dengan supports\constants.php
   * jangan diubah!
   */
  const base_tahun_mulai = 2025;

  /**
   * default tahun_kinerja
   * ubah manual per tahun
   * sinkron dengan supports\constants.php
   * jangan panggil variabel ini, panggil helper getTahunKinerja() supaya dinamis berdasarkan filter tahun kinerja
   */
  const tahun_kinerja = 2025;

  inject("const", {
    tahun_mulai_list: [
      // per 5 tahun
      2019, 2025,
    ],
    tahun_kinerja_list: [2025, 2026, 2027, 2028, 2029],
    base_tahun_mulai,
    tahun_kinerja,
    months: [
      ["jan", "Januari"],
      ["feb", "Februari"],
      ["mar", "Maret"],
      ["apr", "April"],
      ["may", "Mei"],
      ["jun", "Juni"],
      ["jul", "Juli"],
      ["aug", "Agustus"],
      ["sep", "September"],
      ["oct", "Oktober"],
      ["nov", "November"],
      ["dec", "Desember"],
    ],
    SATKER_SETDA: 49,
    SATKER_DPMPTSP: 28,
  });
};
