<template>
  <div class="sidebar">
    <div class="sidebar-inner">
      <!-- ### $Sidebar Header ### -->
      <div class="sidebar-logo">
        <div class="peers ai-c fxw-nw">
          <div class="peer peer-greed">
            <nuxt-link to="/" class="sidebar-link td-n">
              <div class="peers ai-c fxw-nw">
                <div class="peer">
                  <div
                    class="logo text-center align-items-center justify-content-center"
                    style="display: flex"
                  >
                    <img
                      src="~/assets/images/berkah2.png"
                      alt=""
                      style="height: 50px"
                    />
                  </div>
                </div>
              </div>
            </nuxt-link>
          </div>
          <div class="peer">
            <div class="mobile-toggle sidebar-toggle">
              <a href="" class="td-n c-white">
                <i class="ti-arrow-circle-left"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- ### $Sidebar Menu ### -->
      <ul class="sidebar-menu scrollable pos-r bg-lightyellow">
        <template v-if="$role.isValidatorBappeda()">
          <li class="nav-item">
            <nuxt-link
              class="sidebar-link"
              to="/kamus-indikator-validasi-bappeda"
            >
              <span class="icon-holder">
                <i class="text-info ti-bookmark-alt"></i>
              </span>
              <span class="title">Validasi Kamus Indikator Bappeda</span>
            </nuxt-link>
          </li>
          <li class="nav-item">
            <nuxt-link class="sidebar-link" to="/kinerja-sub-kegiatan/validasi">
              <span class="icon-holder">
                <i class="text-info ti-bookmark-alt"></i>
              </span>
              <span class="title">Validasi Kinerja Sub Kegiatan</span>
            </nuxt-link>
          </li>
        </template>

        <template
          v-else-if="$role.isValidatorLKE() || $role.isValidatorPleno()"
        >
          <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);">
              <span class="icon-holder">
                <i class="c-grey-800 ti-bookmark-alt"></i>
              </span>
              <span class="font-weight-bold title">LKE</span>
              <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <nuxt-link class="sidebar-link" to="/lke/penilaian"
                  >Penilaian Awal</nuxt-link
                >
              </li>
              <li>
                <nuxt-link class="sidebar-link" to="/lke/penilaian-2"
                  >Penilaian Akhir</nuxt-link
                >
              </li>
              <li>
                <nuxt-link class="sidebar-link" to="/lke/hasil-penilaian"
                  >Hasil Penilaian Awal dan Akhir</nuxt-link
                >
              </li>
              <li>
                <nuxt-link class="sidebar-link" to="/lke/penilaian-humanis"
                  >Hasil Pleno</nuxt-link
                >
              </li>
              <li>
                <nuxt-link class="sidebar-link" to="/lke/rekap-pd"
                  >Rekapitulasi Nilai</nuxt-link
                >
              </li>
              <li>
                <nuxt-link class="sidebar-link" to="/lke/hasil-self-assessment"
                  >Hasil Self Assessment dan Perbaikan</nuxt-link
                >
              </li>
            </ul>
          </li>
        </template>

        <template
          v-else-if="
            $role.isValidatorPerencanaan1() ||
            $role.isValidatorPerencanaan2() ||
            $role.isValidatorPerencanaan3()
          "
        >
          <li class="nav-item mT-30 actived">
            <nuxt-link class="sidebar-link" to="/validasi-perencanaan">
              <span class="icon-holder">
                <i class="text-info ti-bookmark-alt"></i>
              </span>
              <span class="title">Validasi Perencanaan</span>
            </nuxt-link>
          </li>
        </template>

        <template v-else>
          <li class="nav-item mT-30 actived">
            <nuxt-link class="sidebar-link" to="/dashboard">
              <span class="icon-holder">
                <i class="text-info ti-bookmark-alt"></i>
              </span>
              <span class="title">Dashboard</span>
            </nuxt-link>
          </li>
          <li class="nav-item">
            <nuxt-link class="sidebar-link" to="/visi-misi-rpjmd">
              <span class="icon-holder">
                <i class="text-info ti-bookmark-alt"></i>
              </span>
              <span class="title">Visi, Misi & Tujuan RPJMD</span>
            </nuxt-link>
          </li>
          <li class="nav-item">
            <nuxt-link class="sidebar-link" to="/sasaran-strategis-rpjmd">
              <span class="icon-holder">
                <i class="text-info ti-bookmark-alt"></i>
              </span>
              <span class="title"
                >Sasaran Strategis RPJMD & IKU<br />
                Bupati Banggai Kepulauan</span
              >
            </nuxt-link>
          </li>
          <li class="nav-item">
            <nuxt-link class="sidebar-link" to="/kinerja-cross-cutting">
              <span class="icon-holder">
                <i class="text-info ti-bookmark-alt"></i>
              </span>
              <span class="title">Kinerja Cross-Cutting</span>
            </nuxt-link>
          </li>
          <li class="nav-item">
            <nuxt-link class="sidebar-link" to="/sasaran-strategis-pd">
              <span class="icon-holder">
                <i class="text-info ti-bookmark-alt"></i>
              </span>
              <span class="title"
                >Sasaran Strategis <br />
                Perangkat Daerah</span
              >
            </nuxt-link>
          </li>
          <li class="nav-item">
            <nuxt-link class="sidebar-link" to="/kinerja-program">
              <span class="icon-holder">
                <i class="text-info ti-bookmark-alt"></i>
              </span>
              <span class="title">Kinerja Program</span>
            </nuxt-link>
          </li>
          <li class="nav-item">
            <nuxt-link class="sidebar-link" to="/kinerja-kegiatan">
              <span class="icon-holder">
                <i class="text-info ti-bookmark-alt"></i>
              </span>
              <span class="title">Kinerja Kegiatan</span>
            </nuxt-link>
          </li>
          <li class="nav-item">
            <nuxt-link class="sidebar-link" to="/kinerja-sub-kegiatan">
              <span class="icon-holder">
                <i class="text-info ti-bookmark-alt"></i>
              </span>
              <span class="title">Kinerja Sub Kegiatan</span>
            </nuxt-link>
          </li>
          <li class="nav-item">
            <nuxt-link class="sidebar-link" to="/kinerja-langkah-aksi">
              <span class="icon-holder">
                <i class="text-info ti-bookmark-alt"></i>
              </span>
              <span class="title">Kinerja Langkah Aksi</span>
            </nuxt-link>
          </li>
          <li class="nav-item">
            <nuxt-link
              class="sidebar-link"
              to="/kinerja-langkah-aksi-terintegrasi"
            >
              <span class="icon-holder">
                <i class="text-info ti-bookmark-alt"></i>
              </span>
              <span class="title">Rencana Aksi Terintegrasi</span>
            </nuxt-link>
          </li>
          <li class="nav-item">
            <nuxt-link
              class="sidebar-link"
              to="/kinerja-langkah-aksi-terintegrasi/realisasi"
            >
              <span class="icon-holder">
                <i class="text-info ti-bookmark-alt"></i>
              </span>
              <span class="title">Realisasi Rencana Aksi Terintegrasi</span>
            </nuxt-link>
          </li>
          <li class="nav-item">
            <nuxt-link class="sidebar-link" to="/kamus-indikator">
              <span class="icon-holder">
                <i class="text-info ti-bookmark-alt"></i>
              </span>
              <span class="title">Kamus Indikator</span>
            </nuxt-link>
          </li>
          <li class="nav-item">
            <nuxt-link class="sidebar-link" to="/kamus-indikator-fungsional">
              <span class="icon-holder">
                <i class="text-info ti-bookmark-alt"></i>
              </span>
              <span class="title">Kamus Indikator Fungsional</span>
            </nuxt-link>
          </li>
          <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);">
              <span class="icon-holder">
                <i class="c-grey-800 ti-bookmark-alt"></i>
              </span>
              <span class="font-weight-bold title">Display Kinerja Makro</span>
              <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <nuxt-link class="sidebar-link" to="/display-makro/rpjmd"
                  >RPJMD Provinsi Sulawesi Tengah</nuxt-link
                >
              </li>
              <li>
                <nuxt-link class="sidebar-link" to="/display-makro/rkpd"
                  >RKPD Provinsi Sulawesi Tengah</nuxt-link
                >
              </li>
              <li>
                <nuxt-link
                  class="sidebar-link"
                  to="/display-makro/perjanjian-kinerja"
                  >Perjanjian Kinerja Gubernur Suulawesi Tengah</nuxt-link
                >
              </li>
              <li>
                <nuxt-link class="sidebar-link" to="/display-makro/rencana-aksi"
                  >Rencana Aksi Gubernur Sulawesi Tengah</nuxt-link
                >
              </li>
              <li>
                <nuxt-link
                  class="sidebar-link"
                  to="/display-makro/capaian-kinerja-pemda"
                  >Capaian Kinerja Pemda</nuxt-link
                >
              </li>
              <li>
                <nuxt-link
                  class="sidebar-link"
                  to="/display-makro/capaian-kinerja-efisiensi-anggaran"
                  >Capaian Kinerja dan Efisiensi Anggaran</nuxt-link
                >
              </li>
              <li>
                <nuxt-link
                  class="sidebar-link"
                  to="/display-makro/capaian-kinerja-keuangan"
                  >Capaian Kinerja dan Keuangan</nuxt-link
                >
              </li>
              <li>
                <nuxt-link
                  class="sidebar-link"
                  to="/display-makro/program-inovatif"
                  >Program Inovatif</nuxt-link
                >
              </li>
              <li>
                <nuxt-link
                  class="sidebar-link"
                  to="/display-makro/capaian-kinerja-kegiatan"
                  >Capaian Kinerja Kegiatan</nuxt-link
                >
              </li>
              <li>
                <nuxt-link
                  class="sidebar-link"
                  to="/display-makro/capaian-kinerja-sub-kegiatan"
                  >Capaian Kinerja Sub Kegiatan</nuxt-link
                >
              </li>
              <li>
                <nuxt-link
                  class="sidebar-link"
                  to="/display-makro/capaian-kinerja-aktivitas"
                  >Capaian Kinerja Aktivitas</nuxt-link
                >
              </li>
              <li>
                <nuxt-link class="sidebar-link" to="/display-makro/cascading"
                  >Cascading</nuxt-link
                >
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);">
              <span class="icon-holder">
                <i class="c-grey-800 ti-bookmark-alt"></i>
              </span>
              <span class="font-weight-bold title">Display Kinerja Mikro</span>
              <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <nuxt-link class="sidebar-link" to="/display-mikro/renstra"
                  >Renstra</nuxt-link
                >
              </li>
              <li>
                <nuxt-link class="sidebar-link" to="/display-mikro/rkt"
                  >RKT</nuxt-link
                >
              </li>
              <li>
                <nuxt-link
                  class="sidebar-link"
                  to="/display-mikro/perjanjian-kinerja"
                  >Perjanjian Kinerja</nuxt-link
                >
              </li>
              <li>
                <nuxt-link class="sidebar-link" to="/display-mikro/rencana-aksi"
                  >Rencana Aksi Perangkat Daerah</nuxt-link
                >
              </li>
              <li>
                <nuxt-link
                  class="sidebar-link"
                  to="/display-mikro/capaian-kinerja-pd"
                  >Capaian Kinerja Perangkat Daerah</nuxt-link
                >
              </li>
              <li>
                <nuxt-link
                  class="sidebar-link"
                  to="/display-mikro/capaian-kinerja-efisiensi-anggaran"
                  >Capaian Kinerja dan Efisiensi Anggaran</nuxt-link
                >
              </li>
              <li>
                <nuxt-link
                  class="sidebar-link"
                  to="/display-mikro/capaian-kinerja-keuangan"
                  >Capaian Kinerja dan Keuangan Perangkat Daerah</nuxt-link
                >
              </li>
              <li>
                <nuxt-link
                  class="sidebar-link"
                  to="/display-mikro/program-inovatif"
                  >Program Inovatif</nuxt-link
                >
              </li>
              <li>
                <nuxt-link
                  class="sidebar-link"
                  to="/display-mikro/capaian-kinerja-kegiatan"
                  >Capaian Kinerja Kegiatan</nuxt-link
                >
              </li>
              <li>
                <nuxt-link
                  class="sidebar-link"
                  to="/display-mikro/capaian-kinerja-sub-kegiatan"
                  >Capaian Kinerja Sub Kegiatan</nuxt-link
                >
              </li>
              <li>
                <nuxt-link
                  class="sidebar-link"
                  to="/display-mikro/capaian-kinerja-langkah-aksi"
                  >Capaian Kinerja Langkah Aksi</nuxt-link
                >
              </li>
              <li>
                <nuxt-link class="sidebar-link" to="/display-mikro/cascading"
                  >Cascading</nuxt-link
                >
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <nuxt-link class="sidebar-link" to="/capaian-iku">
              <span class="icon-holder">
                <i class="text-info ti-bookmark-alt"></i>
              </span>
              <span class="title">Capaian IKU</span>
            </nuxt-link>
          </li>
          <li
            class="nav-item dropdown"
            v-if="!$role.isSuper() && !$role.isSetda()"
          >
            <a class="dropdown-toggle" href="javascript:void(0);">
              <span class="icon-holder">
                <i class="c-grey-800 ti-bookmark-alt"></i>
              </span>
              <span class="font-weight-bold title">LKIP</span>
              <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <nuxt-link class="sidebar-link" to="/lkip/bab-1"
                  >BAB I</nuxt-link
                >
              </li>
              <li>
                <nuxt-link class="sidebar-link" to="/lkip/bab-2"
                  >BAB II</nuxt-link
                >
              </li>
              <li>
                <nuxt-link class="sidebar-link" to="/lkip/bab-3"
                  >BAB III</nuxt-link
                >
              </li>
              <li>
                <nuxt-link class="sidebar-link" to="/lkip/narasi-pemda"
                  >Narasi Pemda</nuxt-link
                >
              </li>
              <li>
                <nuxt-link class="sidebar-link" to="/lkip/narasi-pd"
                  >Narasi PD</nuxt-link
                >
              </li>
            </ul>
          </li>
          <template v-if="!$role.isSetda()">
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-grey-800 ti-bookmark-alt"></i>
                </span>
                <span class="font-weight-bold title">Rapor Kinerja</span>
                <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <nuxt-link class="sidebar-link" to="/rapor-kinerja/1/diagram"
                    >Diagram Rapor Kinerja</nuxt-link
                  >
                </li>
                <li>
                  <nuxt-link class="sidebar-link" to="/rapor-kinerja/1/data"
                    >Data Rapor Kinerja</nuxt-link
                  >
                </li>
                <li>
                  <nuxt-link class="sidebar-link" to="/rapor-kinerja/1/rank"
                    >Ranking Raport Kinerja</nuxt-link
                  >
                </li>
                <li
                  v-if="
                    ($role.isPemerintahDaerah() || $role.isPerangkatDaerah()) &&
                    $helper.getTahunKinerja() == 2023
                  "
                >
                  <nuxt-link
                    class="sidebar-link"
                    to="/rapor-kinerja/penambahan-jumlah-output"
                    >Penambahan Jumlah Output</nuxt-link
                  >
                </li>
                <li>
                  <nuxt-link
                    class="sidebar-link"
                    to="/rapor-kinerja/1/langkah-aksi-perbaikan"
                    >Langkah Aksi Perbaikan</nuxt-link
                  >
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-grey-800 ti-bookmark-alt"></i>
                </span>
                <span class="font-weight-bold title"
                  >Rapor Kinerja<br />Sasaran Strategis PD</span
                >
                <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <nuxt-link
                    class="sidebar-link"
                    to="/rapor-kinerja-sasaran-strategis-pd/1/diagram"
                    >Diagram Rapor Kinerja</nuxt-link
                  >
                </li>
              </ul>
            </li>
          </template>
          <li v-if="$role.isSuper()" class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);">
              <span class="icon-holder">
                <i class="c-grey-800 ti-bookmark-alt"></i>
              </span>
              <span class="font-weight-bold title">Nilai Jenjang Kinerja</span>
              <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <nuxt-link class="sidebar-link" to="/nilai-jenjang-kinerja"
                  >Input Data</nuxt-link
                >
              </li>
              <li>
                <nuxt-link
                  class="sidebar-link"
                  to="/nilai-jenjang-kinerja/rekap"
                  >Rekap</nuxt-link
                >
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown" v-if="!$role.isSetda()">
            <a class="dropdown-toggle" href="javascript:void(0);">
              <span class="icon-holder">
                <i class="c-grey-800 ti-bookmark-alt"></i>
              </span>
              <span class="font-weight-bold title">LKE</span>
              <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <template v-if="$role.isSuper()">
                <li>
                  <nuxt-link class="sidebar-link" to="/lke/rekap-pd"
                    >Rekapitulasi Nilai</nuxt-link
                  >
                </li>
              </template>
              <template v-else>
                <li>
                  <nuxt-link class="sidebar-link" to="/lke/eviden"
                    >Input Evidence Self Assessment
                  </nuxt-link>
                </li>
                <li>
                  <nuxt-link class="sidebar-link" to="/lke/eviden-2"
                    >Input Eviden Perbaikan</nuxt-link
                  >
                </li>
                <li>
                  <nuxt-link
                    class="sidebar-link"
                    to="/lke/hasil-self-assessment"
                    >Hasil Self Assessment dan Perbaikan</nuxt-link
                  >
                </li>
                <li>
                  <nuxt-link class="sidebar-link" to="/lke/hasil-akhir"
                    >Hasil Evaluasi Akhir</nuxt-link
                  >
                </li>
              </template>
            </ul>
          </li>
        </template>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    if ($(window).width() < 992) {
      $(".sidebar-link").click(function () {
        document.body.classList.toggle("is-collapsed");
      });
    }
  },
};
</script>
