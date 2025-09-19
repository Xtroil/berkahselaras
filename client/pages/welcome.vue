<script>
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel.css";
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";
import DiagramCapaianIKU from "~/components/global/DiagramCapaianIKU.vue";
import axios from "axios";

export default {
  layout: "guest",

  components: {
    VueSlickCarousel,
    DiagramCapaianIKU,
  },

  data() {
    return {
      c1: undefined,
      c2: undefined,
      settingsC2: {
        responsive: [
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
            },
          },
        ],
      },
      isBusy: {
        getIkuGubernur: false,
        getIkuPD: false,
      },
      data: [],
      tahunKinerja: this.$helper.getTahunKinerjaPublic(),
    };
  },

  mounted() {
    this.getData();
  },

  methods: {
    async getData() {
      this.isBusy.getIkuGubernur = true;

      const { data } = await axios.get("diagram-iku-gubernur", {
        params: {
          tahun_kinerja: this.tahunKinerja,
        },
      });

      this.data = data;
      this.isBusy.getIkuGubernur = false;

      setTimeout(this.initCarousel, 1000);
    },
    initCarousel() {
      this.c1 = this.$refs.c1;
      this.c2 = this.$refs.c2;
    },
  },
};
</script>

<template>
  <div>
    <div class="my-3">
      <b-container fluid>
        <b-card>
          <b-row>
            <b-col>
              <h3 class="my-0 py-0">BERKAH SELARAS</h3>
              Struktur Logical Framework Kinerja Terintegrasi Perangkat Daerah
            </b-col>
            <b-col>
              <img
                src="~assets/images/bangkep.png"
                class="float-right"
                style="width: 180px"
                alt=""
              />
            </b-col>
          </b-row>
          <div>
            <img src="img/bangkep2025.jpeg" width="100%" />
          </div>
          <b-row v-if="false" class="mt-4">
            <b-col class="order-lg-last mb-3 text-center">
              <h5 v-if="isBusy.getIkuGubernur">Memuat data...</h5>
              <b-container v-if="data.length">
                <VueSlickCarousel
                  ref="c1"
                  :asNavFor="c2"
                  :arrows="false"
                  :focusOnSelect="true"
                  :pauseOnHover="true"
                  :autoplay="false"
                  :autoplaySpeed="5000"
                >
                  <DiagramCapaianIKU
                    v-for="iku of data"
                    :key="iku.id"
                    :data="iku"
                    :tahun-kinerja="tahunKinerja"
                  />
                </VueSlickCarousel>
                <VueSlickCarousel
                  ref="c2"
                  :asNavFor="c1"
                  :slidesToShow="5"
                  :focusOnSelect="true"
                  :pauseOnHover="true"
                  v-bind="settingsC2"
                  :centerMode="true"
                >
                  <div v-for="iku of data" :key="iku.id">
                    <h5 class="slide-thumb bg-blue text-light">
                      IKU {{ iku.nomor }}
                    </h5>
                  </div>
                </VueSlickCarousel>
              </b-container>
            </b-col>
          </b-row>
        </b-card>
      </b-container>
    </div>
  </div>
</template>

<style scoped lang="scss">
/deep/ {
  .slick-prev::before,
  .slick-next::before {
    color: black;
  }
  .slick-current .slide-thumb {
    background: #28a745 !important;
  }
}
@media (max-width: 767px) {
  /deep/ .diagram-container {
    margin: -160px 0;
  }
}
</style>
