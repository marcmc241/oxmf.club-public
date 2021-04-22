"use strict";
Vue.component('detalles', {
    data(){
      return{
        shared:this.$root.shared,
        loading:true,
        load1:true,
        ido:null,
        sharedialog:false,
        timedialog:false,
        url:'',
        try:0,
        timetoload:0,
        reportdialog:false,
        relprods: null,
        disableclick: false,
        chart:{
          lim: 5,
          config:null,
          myChart:null,
          fechas:[],
          esph:[],
          espo:[],
          ofids:[]
        },
        network:{
          fetchfail: false
        }
      }
    },
    methods:{
      getdata(request){
        var self=this;
        this.reportdialog=false;
        return fetch(request)
        .then(function(response) {
          
          
          if (!response.ok) {
            throw new Error("HTTP error, status = " + response.status);
          }
          self.network.fetchfail = false;
          var contentType = response.headers.get("content-type");
          if(contentType && contentType.includes("application/json")) {
              return response.json();
          }
          throw new TypeError("Response is not JSON");
        })
        .catch(function(error) {
          self.network.fetchfail = true;
          self.loading=false;
        });
      },
      getdetalles(){
        var self = this;
        this.loading=true;

        var req = new Request('func/getdetails.php?ido='+this.ido , {
          method: "GET",
          mode: "same-origin",
          cache: "no-cache",
          credentials: "include",
          redirect: "follow",
          referrer: "client",
        });

        this.getdata(req).then(function(resposta) {
          if(resposta.result!=="true"){
              throw new Error("Response: "+resposta.msg);
          }

          self.shared.openof={Ido:resposta.ofertas[0].Ido,
                          Idp:resposta.ofertas[0].Idp,
                          nombrep:resposta.ofertas[0].nombrep,
                          foto:resposta.ofertas[0].foto,
                          descripcion:resposta.ofertas[0].descripcion,
                          fechap:resposta.ofertas[0].fechap,
                          diff:resposta.ofertas[0].diff,
                          precioH:resposta.ofertas[0].precioH,
                          precioO:resposta.ofertas[0].precioO,
                          cupon:resposta.ofertas[0].cupon,
                          bitlink:resposta.ofertas[0].bitlink,
                          tienda:resposta.ofertas[0].tienda,
                          color:resposta.ofertas[0].color,
                          tipooferta:resposta.ofertas[0].tipooferta,
                          envio:resposta.ofertas[0].envio,
                          envioemoji:resposta.ofertas[0].envioemoji,
                          garantia:resposta.ofertas[0].garantia,
                          garantiaemoji:resposta.ofertas[0].garantiaemoji,
                          com:resposta.ofertas[0].com,
                          com2:resposta.ofertas[0].com2,
                          estado:resposta.ofertas[0].estado,
                          tid:resposta.ofertas[0].tid,
                          tags:resposta.ofertas[0].tags
                        };

          window.document.title = resposta.ofertas[0].nombrep+" - OXMF.club";
          $('meta[name=description]').attr('content', "Las mejores ofertas de " + resposta.ofertas[0].nombrep + ". Comprar productos de Xiaomi y su ecosistema al mejor precio: Ofertas Xiaomi Fans Club");

          //track view
          var currentUrl = location.href;
          _paq.push(['setReferrerUrl', currentUrl]);
          currentUrl = '' + window.location.hash.substr(1);
          _paq.push(['setCustomUrl', currentUrl]);
          _paq.push(['setDocumentTitle', resposta.ofertas[0].nombrep+" - OXMF.club"]);
          var time = (new Date().getTime()) - self.timetoload;
          _paq.push(['setGenerationTimeMs', time]);
          _paq.push(['trackPageView']);
          //_paq.push(['enableLinkTracking']);

          self.getchart();
          self.relatedprods();
          self.load1=false;
          setTimeout(function(){ 
            $('.descripcion a').attr('target', '_blank');
            $('.coment2 a').attr('target', '_blank');
            $('.descripcion a').attr('rel', 'noreferrer');
            $('.coment2 a').attr('rel', 'noreferrer');
            $('.timeago').timeago('refresh');
          }, 200);

        }, function(err) {
          console.log(err);
          if (self.try==0) {
            self.getdetalles();
            self.try=1;
          }
          self.$emit('snackbar',"Ha habido un error recopilando la oferta (request error) :(","false");
          self.loading=false;
        });
        
      },
      getchart(){
        var self = this;
        this.loading=true;
        this.chart.lim = 5;

        var req = new Request('func/getchart.php?p='+self.shared.openof.Idp , {
          method: "GET",
          mode: "same-origin",
          cache: "no-cache",
          credentials: "include",
          redirect: "follow",
          referrer: "client",
        });

        this.getdata(req).then(function(resposta) {
          if(resposta.result!=="true"){
              throw new Error("Response: "+resposta.msg);
          }
          self.loading=false;

          self.chart.fechas = resposta.fechas;
          self.chart.esph = resposta.esph;
          self.chart.espo = resposta.espo;
          self.chart.ofids = resposta.ofids;

          if(document.getElementById("ofchart")!=null){
            self.updatechart();
          }else{
            self.buildchart();
          }

        }, function(err) {
          self.$emit('snackbar',"Error recopilando la estadística (request error)","false");
          self.loading=false;
        });

      },
      buildchart(){
        var self=this;
        $(".chart-container").append("<canvas id='ofchart' height='150px'></canvas>");
            var ctx = document.getElementById("ofchart").getContext('2d');
            self.chart.config={
                type: 'line',
                data: {
                    labels: self.chart.fechas.slice(-5),
                    datasets: [{
                        label: 'Precio Habitual',
                        data: self.chart.esph.slice(-5),
                        backgroundColor: 'rgba(200, 200, 200, 0.1)',
                        borderColor: 'rgba(200,200,200,.7)',
                        borderWidth: 1
                    },{
                        label: 'Precio Oferta',
                        data: self.chart.espo.slice(-5),
                        backgroundColor: 'rgba(35, 87, 132, 0.2)',
                        borderColor: 'rgba(35, 87, 132,1)',
                        borderWidth: 2
                    }],
                    ofids: self.chart.ofids.slice(-5)
                },
                options: { 
                  legend: { labels: { usePointStyle: true } },
                  scales: { yAxes: [{ ticks: { callback: function(value, index, values) { return value + '€'; } } }] },
                  hover: {
                    onHover: function(e, el) {
                      $("#ofchart").css("cursor", el[0] ? "pointer" : "default");
                    }
                  },
                  maintainAspectRatio: false
                }
            }

            setTimeout(function(){ 
              self.chart.myChart = new Chart(ctx, self.chart.config);
              var canvas = document.getElementById("ofchart");
              canvas.onclick = function(evt) {
                var activePoints = self.chart.myChart.getElementsAtEvent(evt);
                if (activePoints[0]) {
                  var chartData = activePoints[0]['_chart'].config.data;
                  var idx = activePoints[0]['_index'];

                  var _ofid = chartData.ofids[idx];
                  var value = chartData.datasets[0].data[idx];

                  router.push({ name: 'detalles', params: { ido: _ofid }});
                  $(".detalles").animate({ scrollTop: 0 }, 300);
                  //console.log(_ofid);
                }
              };

             }, 600);
            
      },
      updatechart(){
        var self = this;
        self.chart.myChart.data.labels = self.chart.fechas.slice(-(self.chart.lim));
        self.chart.myChart.data.datasets[0].data = self.chart.esph.slice(-(self.chart.lim));
        self.chart.myChart.data.datasets[1].data = self.chart.espo.slice(-(self.chart.lim));
        self.chart.myChart.data.ofids = self.chart.ofids.slice(-(self.chart.lim));
        self.chart.myChart.update(300);
      },
      copylink(){
        var text="https://oxmf.club#/of/"+this.ido;
        var dummy = document.createElement("input");
        document.body.appendChild(dummy);
        dummy.setAttribute('value', text);
        dummy.select();
        try {
          document.execCommand("copy");
          this.$emit('snackbar',"Enlace copiado al portapapeles","true");
        } catch (err) {
          this.$emit('snackbar',"No se puede copiar en este navegador","false");   
        }
        document.body.removeChild(dummy);
      },
      copycupon(cup){
        var text=cup;
        var dummy = document.createElement("input");
        document.body.appendChild(dummy);
        dummy.setAttribute('value', text);
        dummy.select();
        try {
        // copy text
          document.execCommand("copy");
          this.$emit('snackbar',"'"+cup+"' copiado al portapapeles","true");
        } catch (err) {
          this.$emit('snackbar',"No se puede copiar en este navegador","false");
        }
        document.body.removeChild(dummy);
      },
      trackclick(){
        var self=this;
        //console.log("'trackEvent', 'Visitar Oferta', "+self.shared.openof.nombrep+", "+self.shared.openof.Ido+"]")
        _paq.push(['trackLink', self.shared.openof.bitlink, self.shared.openof.nombrep+" "+self.shared.openof.Ido]);
      },
      chchartlim(addsub){
        var self = this;
        if (addsub>0 && this.chart.lim<=self.chart.fechas.length) {
          let fechas = self.chart.fechas.slice(-(self.chart.lim+5), -(self.chart.lim));
          let esphs = self.chart.esph.slice(-(self.chart.lim+5), -(self.chart.lim));
          let espos = self.chart.espo.slice(-(self.chart.lim+5), -(self.chart.lim));
          let _ofids = self.chart.ofids.slice(-(self.chart.lim+5), -(self.chart.lim));
          for (var i = fechas.length-1; i >= 0; i--) {
            self.chart.myChart.data.labels.unshift(fechas[i]);
            self.chart.myChart.data.datasets[0].data.unshift(esphs[i]);
            self.chart.myChart.data.datasets[1].data.unshift(espos[i]);
            self.chart.myChart.data.ofids.unshift(_ofids[i]);
          }
          self.chart.myChart.update(300);
          this.chart.lim += 5;
        }else if(addsub<=0 && this.chart.lim>=5){
          do{
            self.chart.myChart.data.labels.shift();
            self.chart.myChart.data.datasets[0].data.shift();
            self.chart.myChart.data.datasets[1].data.shift();
            self.chart.myChart.data.ofids.shift();
          }while(self.chart.myChart.data.labels.length % 5)
          self.chart.myChart.update(300);
          this.chart.lim -= 5;
        }
      },
      report(x){
        var self = this;
        var postdata = {
          id:this.ido,
          type:x
        }

        var req = new Request('func/report.php' , {
          method: "POST",
          mode: "same-origin",
          cache: "no-cache",
          credentials: "include",
          redirect: "follow",
          referrer: "client",
          headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(postdata)
        });

        this.getdata(req).then(function(resposta) {

          if(resposta.result!=="true"){
              throw new Error("Response: "+resposta.msg);
          }else{
            self.$emit('snackbar',"Reportado, muchas gracias!", "true");
          }

        }, function(err) {
          console.log(err);
          self.$emit('snackbar',"Vaya, ha habido un error al reportar :(","false");
        });
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
        }
        
      },
      relatedprods(){
        var self = this;
        let query = self.shared.openof.tags.split(';').join(' ') + " " + self.shared.openof.nombrep;
        var postdata = { nom : query };

        var req = new Request('func/productsearch.php' , {
          method: "POST",
          mode: "same-origin",
          cache: "no-cache",
          credentials: "include",
          redirect: "follow",
          referrer: "client",
          headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(postdata)
        });
        
        this.getdata(req).then(function(resposta) {
          
          if(resposta.result!=="true"){
              throw new Error("Response: "+resposta.msg);
          }

          var _prod=new Array();
            if (resposta.productos.length<=0) {
              self.relprods=null;
            }else{
              for (var i in resposta.productos) {
                if (resposta.productos[i].nombrep !== self.shared.openof.nombrep) {//si no es el producto abierto
                  _prod.push({
                    Idp:resposta.productos[i].Idp,
                    nombrep:resposta.productos[i].nombrep,
                    foto:resposta.productos[i].foto
                  });
                }
                
              }
              self.relprods=_prod;
            }

        }, function(err) {
          console.log(err);
          
        });
      }
    },
    created: function () {
      
      if (!isNaN(this.$route.params.ido)) {
        this.timetoload = new Date().getTime();
        this.ido=this.$route.params.ido;
        this.url=encodeURIComponent("https://oxmf.club#/of/"+this.ido);
        if(document.getElementById("ofchart")!=null){
          let elem = document.getElementById('ofchart');
          elem.parentNode.removeChild(elem);
        }
        this.relprods=null;

        if (this.$root.tkn!=null) {
          this.getdetalles();
        }
      }
      
    },
    watch: {
      '$route' (to, from) {
        this.relprods=null;
        if (to.path.indexOf("/of/") > -1) {
          if (!isNaN(this.$route.params.ido)) {
            this.timetoload = new Date().getTime();
            this.ido=this.$route.params.ido;
            this.url=encodeURIComponent("https://oxmf.club#/of/"+this.ido);
            if(document.getElementById("ofchart")!=null){
              let elem = document.getElementById('ofchart');
              elem.parentNode.removeChild(elem);
            }
            
            if (this.$root.tkn!=null) {
              this.getdetalles();
            }
          }else{
            router.push({ name: 'ofertas'});
            this.$emit('snackbar',"Error en los parámetros de la URL","false");
          }
        }
      },
      '$root.tkn'(){
        if (this.$root.tkn!=null) {
          this.getdetalles();
        }
      }
    },
    template:`
    <transition name="fade" mode="out-in">
    <md-content class="md-alignment-top-center md-layout md-scrollbar">
      <div class="mainprogress">
        <md-progress-bar md-mode="indeterminate" class="md-accent" v-if="loading"></md-progress-bar>
      </div>
      
      <div class="detallescarddiv md-layout-item md-xlarge-size-75 md-large-size-85 md-medium-size-70 md-small-size-80 md-xsmall-size-100">
        <div v-if="network.fetchfail">
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
              md-label="Error al recuperar ofertas"
              md-description="Algo ha ido mal al obtener los datos">
              <p class="md-caption">Si este error te aparece frecuentemente, puedes informar en <a href="https://t.me/masquefans" target="_blank" rel="noreferrer">t.me/masquefans</a></p>
              <md-button class="md-raised md-primary" @click="$root.retry();">Reintentar</md-button>
            </md-empty-state>
          </div>
        </div>

        
            
        <div class="md-layout">
            <div class="opof1 md-layout-item md-xlarge-size-50 md-large-size-50 md-medium-size-100 md-small-size-100 md-xsmall-size-100">
              <div class="ramjetanimend" v-if="shared.openof.foto != undefined">
                <img :src="'https://oxmf.club/images_s_ago/' + shared.openof.foto" v-if="shared.openof.estado==4">
                <img :src="'https://oxmf.club/images_s/' + shared.openof.foto" v-else>
              </div>
            </div>


            <div class="opof2 md-layout-item md-xlarge-size-50 md-large-size-50 md-medium-size-100 md-small-size-100 md-xsmall-size-100">

              <div class="public">
                Publicada <time class="timeago tmg2" :datetime="shared.openof.fechap">{{shared.openof.fechap}}</time>
                <md-button class="md-icon-button md-accent" v-if="shared.openof.diff>=9" @click="timedialog = true;setTimeout( () => {$('.timeago').timeago('refresh');} , 200);">
                  <md-tooltip md-direction="top">Oferta antigua</md-tooltip>
                  <md-icon>warning</md-icon>
                </md-button>
              </div>
              
              <div class="dettitle">
                <span>{{shared.openof.nombrep}}</span>
                <span class="color" v-if="shared.openof.color!=''">&#47;{{shared.openof.color}}</span>
              </div>
              
              <div class="precios">
                <span class="precioO" v-if="shared.openof.estado!=4">{{shared.openof.precioO}}€</span>
                <div class="precioO" v-else><s>{{shared.openof.precioO}}€</s></div>
                <span class="precioH"><s>{{shared.openof.precioH}}€</s></span>
              </div>
              <div class="md-subheading" v-if="shared.openof.estado==4">AGOTADO</div>
              <div class="md-subheading tienda"><p>en {{shared.openof.tienda}}</p></div>

              <div class="tipoof" v-if="shared.openof.tipooferta!=''">
                <md-chip>
                  <span class="tipoofin">
                    {{shared.openof.tipooferta}}
                  </span>
                  <span class="tipoofcup" v-if="shared.openof.cupon!=''">
                    {{shared.openof.cupon}}
                    <md-button class="md-icon-button md-dense copycupon" @click="copycupon(shared.openof.cupon)" v-if="shared.openof.cupon!=''">
                      <md-tooltip md-direction="top">Copiar</md-tooltip>
                      <md-icon>content_copy</md-icon>
                    </md-button>
                  </span>
                </md-chip>
              </div>
              
              <!--<div class="md-subheading" v-if="shared.openof.com!=''"><b>{{shared.openof.com}}</b></div>-->

              <div class="envgar">
                <span v-if="shared.openof.envio!=''" class="deticon"><md-icon>local_shipping</md-icon> <p>Envío desde {{shared.openof.envio}}</p></span>
                <span v-if="shared.openof.garantia!=''" class="deticon garan"><md-icon>receipt</md-icon> <p>Garantía en {{shared.openof.garantia}}</p></span>
              </div>

              <div v-if="shared.openof.com2!=''" v-html="shared.openof.com2" class="coment2"></div>


              

              

              <div class="buttons">
                <md-button :href="shared.openof.bitlink" target="_blank" rel="noreferrer" class="md-raised md-layout-item md-xlarge-size-40 md-large-size-50 md-medium-size-60 md-small-size-60 md-xsmall-size-100 btnir" v-bind:class="{ 'md-accent': shared.openof.estado!=4 }" v-on:click="trackclick();">Ir a la oferta</md-button>

                <md-button class="md-icon-button md-accent sharebtn" @click="sharedialog=true" v-bind:class="{ 'md-primary': shared.openof.estado!=4 }">
                  <md-tooltip md-direction="top">Compartir</md-tooltip>
                  <md-icon>share</md-icon>
                </md-button>

                <md-button class="md-icon-button md-primary reportbtn" @click="reportdialog=true" v-if="shared.openof.estado!=4">
                  <md-tooltip md-direction="top">Reportar Error</md-tooltip>
                  <md-icon>error_outline</md-icon>
                </md-button>
              </div>
              

              <p>¿Nuevo por aquí? Sigue <a href="javascript:void(0);" @click="$root.tabhp='tab-com';$root.helpdial=true" class="md-accent">nuestros consejos</a></p>
              
            </div>
        </div>

        <div class="md-layout det2">

            <div class="descrip md-layout-item md-xlarge-size-50 md-large-size-50 md-medium-size-100 md-small-size-100 md-xsmall-size-100">
              <div class="det2title md-theme-default">Descripción</div>
              <p class="md-body-1" v-html="shared.openof.descripcion"></p>
            </div>


            <div class="opof2 md-layout-item md-xlarge-size-50 md-large-size-50 md-medium-size-100 md-small-size-100 md-xsmall-size-100">
              <span class="det2title md-theme-default">Evolución de precio</span><br>
              <span v-if="chart.myChart!=null">Últimas {{chart.myChart.data.labels.length}} ofertas publicadas</span>

              <md-button class="md-icon-button md-dense md-primary" @click="chchartlim(1);" :disabled="chart.lim >= chart.fechas.length">
                <md-icon>add</md-icon>
                <md-tooltip md-direction="bottom">Ver más</md-tooltip>
              </md-button>

              <md-button class="md-icon-button md-dense md-primary" @click="chchartlim(0);" :disabled="chart.lim <= 5">
                <md-icon>remove</md-icon>
                <md-tooltip md-direction="bottom">Ver menos</md-tooltip>
              </md-button>
              <div class="chart-container">
                
              </div>

            </div>
        </div>

        <transition name="productresults">
          <div class="productresults detproductresults" v-if="relprods != null">
            <p class="md-caption">Productos relacionados</p>
            <md-content class="md-scrollbar" v-dragscroll v-on:dragscrollstart="disableclick=true" v-on:dragscrollend="setTimeout( function(){disableclick=false;}, 50);">
              <div>
                  <div v-for="prod in relprods" :key="prod.Idp" class="md-layout-item md-xlarge-size-15 md-large-size-15 md-medium-size-30 md-small-size-30 md-xsmall-size-40 detallesofertacard" @click="product(prod.nombrep)">
                    <md-card md-with-hover class="ofcard">
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
              </div>
            </md-content>
          </div>
        </transition> 
      </div>

      
      <md-dialog :md-active.sync="sharedialog" class="detdialog" :md-fullscreen="false">
        <div class="md-subheading">Compartir</div>
        
        <div class="detdialogbtns">
          
          <md-button class="md-icon-button md-primary" v-if="shared.openof.tid!=null" :href="'//telegram.me/share/url?url='+'https://t.me/ofertasxiaomifansclub/'+shared.openof.tid+'&amp;text='+shared.openof.nombrep+' por sólo '+shared.openof.precioO+'€!  Sigue @ofertasxiaomifansclub o visítanos en oxmf.club para más ofertas!'" :data-url="'https://t.me/ofertasxiaomifansclub/'+shared.openof.tid" target="_blank" rel="noreferrer">
            <md-tooltip md-direction="top">Telegram</md-tooltip>
            <img src="img/telegram.png" alt="Telegram" width="30" height="30">
          </md-button>

          <md-button class="md-icon-button md-primary" v-else :href="'//telegram.me/share/url?url='+url+'&amp;text='+shared.openof.nombrep+' por sólo '+shared.openof.precioO+'€!  Sigue @ofertasxiaomifansclub o visítanos en oxmf.club para más ofertas!'" :data-url="'https://t.me/ofertasxiaomifansclub/'+shared.openof.tid" target="_blank" rel="noreferrer">
            <md-tooltip md-direction="top">Telegram</md-tooltip>
            <img src="img/telegram.png" alt="Telegram" width="30" height="30">
          </md-button>
          
          <md-button class="md-icon-button md-primary" :href="'whatsapp://send?text='+shared.openof.nombrep+' por sólo '+shared.openof.precioO+'€!  '+url" data-action="share/whatsapp/share" target="_blank" rel="noreferrer">
            <md-tooltip md-direction="top">Whatsapp</md-tooltip>
            <img src="img/whatsapp.svg" alt="Whatsapp" width="30" height="30">
          </md-button>

          <md-button class="md-icon-button md-primary" :href="'http://www.facebook.com/sharer.php?s=100&amp;p[title]='+shared.openof.nombrep+' por '+shared.openof.precioO+'€!&amp;p[summary]=Esta y muchas otras ofertas en oxmf.club, la plataforma de ofertas de t.me/masquenoticias&amp;p[url]='+url" target="_blank" rel="noreferrer">
            <md-tooltip md-direction="top">Facebook</md-tooltip>
            <img src="img/facebook.png" alt="Facebook" width="30" height="30">
          </md-button>

          <md-button class="md-icon-button md-primary" :href="'http://twitter.com/share?text='+shared.openof.nombrep+' por '+shared.openof.precioO+'€!&amp;url='+url+'&amp;hashtags=oxmf,xiaomi,oferta'" target="_blank" rel="noreferrer">
            <md-tooltip md-direction="top">Twitter</md-tooltip>
            <img src="img/twitter.png" alt="Twitter" width="34" height="34">
          </md-button>
          
          <md-button class="md-icon-button md-primary" @click="copylink()">
            <md-tooltip md-direction="top">Copiar Enlace</md-tooltip>
            <md-icon>content_copy</md-icon>
          </md-button>
        </div>
        <md-dialog-actions>
          <md-button class="md-primary" @click="sharedialog = false">Cerrar</md-button>
        </md-dialog-actions>
      </md-dialog>

      <md-dialog :md-active.sync="timedialog" class="detdialog" :md-fullscreen="false">
        <div class="md-subheading">Oferta antigua</div>
        <div class="detdialogbtns">
          <p>Esta oferta se ha publicado <time class="timeago tmg2" :datetime="shared.openof.fechap">{{shared.openof.fechap}}</time>.</p>
          <p>Algunas ofertas duran poco, por lo que podría ser que ya haya terminado.</p>
        </div>
        <md-dialog-actions>
          <md-button class="md-primary" @click="timedialog = false">Cerrar</md-button>
        </md-dialog-actions>
      </md-dialog>

      <md-dialog :md-active.sync="reportdialog" class="detdialog" :md-fullscreen="false">
        <div class="md-subheading">Reportar Error</div>
        <div class="detdialogbtns">
          <p>Puedes ayudar indicando si encuentras un error o la oferta está agotada.</p>
        </div>
        <md-dialog-actions>
          <md-button @click="reportdialog = false">Cancelar</md-button>
          <md-button class="md-accent" @click="reportdialog = false;report(1)">Oferta Agotada</md-button>
          <md-button class="md-accent" @click="reportdialog = false;report(2)">Error</md-button>
        </md-dialog-actions>
      </md-dialog>
      
    </md-content>
    </transition>
`
});