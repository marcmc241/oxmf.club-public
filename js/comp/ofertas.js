"use strict";
const ofertasTemplate = {props: {}, 
    data(){
      return{
        loading:false,
        shared:this.$root.shared,//shared data with main vue
        year:2017,
        disableclick:false
      }
    },
    methods:{
      increaselim(){
        this.$root.increaselim();
      },
      showof(ido,foto,nombre, estado){
        this.shared.openof= {
          Ido: ido,
          foto: foto,
          nombrep: nombre,
          estado: estado
        };

        
        setTimeout(function(){
          router.push({ name: 'detalles', params: { ido: ido }});

          var element1 = document.getElementsByClassName('a-img'+ido)[0];
          var element2 = document.getElementsByClassName('ramjetanimend')[0];

          element1.classList.remove('imghidden');

          ramjet.transform( element1, element2, {
                easing: ramjet.easeInOut,
                duration: 500,
                done: function () {
                  element2.classList.remove('imghidden');
                }
              } );

          element2.classList.add('imghidden');
          element1.classList.add('imghidden');

         }, 0);
        
      },
      product(_nombrep){//search offers of that product
        if (this.disableclick===false) {
          this.$root.filtro.nombre = _nombrep;
          this.$root.filtro.categorias = [];
          this.$root.filtro.tiendas = [];
          this.$root.filtro.envios = [];
          this.$root.filtro.garantias = [];
          this.$root.filtro.agotado = true;
          this.$root.filtro.min = '';
          this.$root.filtro.max = '';
          this.$root.routefilter(0);
          $('html, body').animate({ scrollTop: 0 }, 300);
        }
        
      }
    },
    mounted: function () {
      window.document.title = "Ofertas Xiaomi Fans Club";
      $('meta[name=description]').attr('content', "Las mejores ofertas de productos Xiaomi y todo su ecosistema. Todos los productos Xiaomi, Mijia, Redmi, Yeelight, Roidmi, 1 More, Mitu, Aqara... al mejor precio, recopilados a diario por miembros del staff de @masquefans");
      
      this.shared.detectscr=true;

      var _scr=this.shared.scrollpos;

      if (this.shared.scrolldown==true) {
        if (_scr<3000) {
          setTimeout(function(){$('html, body').animate({ scrollTop: _scr }, 400, 'easeInOutCubic');}, 500);
        }else{
          setTimeout(function(){$(window).scrollTop(_scr);}, 400);
        }
      }
      this.shared.scrolldown=true;

      //adjust floating buttons
      if ($(window).scrollTop()>250) {
        this.shared.top=false;
      }
      if ($(window).scrollTop()<5){
        this.shared.top=true;
      }

      this.year=(new Date()).getFullYear();
      this.$root.updatetimelazy();

      var currentUrl = location.href;
      _paq.push(['setReferrerUrl', currentUrl]);//matomo
      currentUrl = '' + window.location.hash.substr(1);
      _paq.push(['setCustomUrl', currentUrl]);
      _paq.push(['setDocumentTitle', "Ofertas Xiaomi Fans Club"]);
      _paq.push(['setGenerationTimeMs', 0]);
      _paq.push(['trackPageView']);
    },
    template:`
    <transition name="fade" mode="out-in">
    <div id="offers" class="offers" ref="offers">

      <div class="promodiv" v-if="$root.promo.active">
        <transition name="promobtn">
          <md-button class="md-raised md-accent promobtn" name="Banner" @click="$root.promo.dialog = true" v-if="shared.prodsearch == null" :style="{ backgroundImage: 'url('+$root.promo.img+')' }"></md-button>
        </transition>
      </div>

      <transition name="productresults">
        <div class="productresults" v-if="shared.prodsearch != null">
          <p class="md-caption">Productos relacionados</p>
          <md-content class="md-scrollbar" v-dragscroll v-on:dragscrollstart="disableclick=true" v-on:dragscrollend="setTimeout( function(){disableclick=false;}, 50);">
            <div>
              <transition-group name="flip-list" tag="div">
                <div v-for="prod in shared.prodsearch" :key="prod.Idp" class="md-layout-item md-xlarge-size-11 md-large-size-15 md-medium-size-19 md-small-size-30 md-xsmall-size-40 ofertacard" @click="product(prod.nombrep)">
                  <md-card md-with-hover>
                    <md-ripple>
                      <md-card-media>
                        <div class="prodresimage" v-bind:style="{ backgroundImage: 'url(https://oxmf.club/images_s/' + prod.foto + ')' }"></div>
                      </md-card-media>
                      <md-card-header>
                        <div class="md-subhead">{{prod.nombrep}}</div>
                      </md-card-header>
                    </md-ripple>
                  </md-card>
                </div>
              </transition-group>
            </div>
          </md-content>
        </div>
      </transition>
      
      <p class="md-caption filtrodescription" v-if="shared.searchactivo">{{shared.filtrodescription}}</p>

      <div class="emptystatediv" v-if="shared.filterno">
        <md-empty-state
          md-rounded
          md-icon="loyalty"
          md-label="Ninguna oferta"
          md-description="No se ha encontrado nada, cambia o revisa los parámetros de la búsqueda o filtro.">
          <p class="md-caption">Si no encuentras lo que buscas, pregúntanos en <a href="https://t.me/masquefans" target="_blank" rel="noreferrer">t.me/masquefans</a></p>
        </md-empty-state>
      </div>
      <div v-if="$root.network.fetchfail">
        <div class="emptystatediv" v-if="$root.network.error">
          <md-empty-state
            md-rounded
            md-icon="signal_wifi_off"
            md-label="No hay conexión"
            md-description="Vaya, parece que no tienes conexión y no podemos recuperar las ofertas">
            <md-button class="md-raised md-primary" @click="$root.retry();">Reintentar</md-button>
          </md-empty-state>
        </div>
        <div class="emptystatediv" v-else>
          <md-empty-state
            md-rounded
            md-icon="error"
            md-label="Error al recuperar ofertas">
            <p class="md-caption">Si este error te aparece frecuentemente, puedes informar en <a href="https://t.me/masquefans" target="_blank" rel="noreferrer">t.me/masquefans</a></p>
            <md-button class="md-raised md-primary" @click="$root.retry();">Reintentar</md-button>
          </md-empty-state>
        </div>
      </div>

      <div>

        <transition-group name="flip-list" tag="div" class="offerlist" v-if="shared.ofertas.length > 0">
        <div v-for="of in shared.ofertas" :key="of.Ido" class="md-layout-item md-xlarge-size-20 md-large-size-25 md-medium-size-33 md-small-size-50 md-xsmall-size-100 ofertacard mainofcard" @click="showof(of.Ido,of.foto,of.nombrep,of.estado)">
          
          <ofertacard v-bind:off="of"></ofertacard>

        </div>
        </transition-group>
        
        
        <div class="md-layout-item md-xlarge-size-100 md-large-size-100 md-medium-size-100 md-small-size-100 md-xsmall-size-100 loadmorediv" v-if="shared.ofertas.length > 0">
          <md-button class="md-raised md-primary showmore" @click="increaselim()" :disabled="loading" v-if="!shared.filterno">Mostrar Más</md-button>
        </div>

        <detalles class="detalles" v-bind:class="{ hidden: !shared.detalles }" v-on:snackbar="$root.showsnackbar"></detalles>
        
        <mainfooter></mainfooter>

        <transition name="btntop">
            <md-button class="md-icon-button md-raised md-primary gotop" @click="$root.gotop()" v-if="!shared.top">
              <md-tooltip md-direction="top">Ir al inicio</md-tooltip>
              <md-icon>expand_less</md-icon>
            </md-button>
        </transition>
      </div>
      
    </div>
    </transition>
`
};