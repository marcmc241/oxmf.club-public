"use strict";
Vue.component('ofertacard', {
    props: ['off'],
    data(){
      return{
        shared:this.$root.shared,
      }
    },
    computed: {
      getsrc: function () {
        if (this.off.estado==4) {
          return 'https://oxmf.club/images_s_ago/' + this.off.foto;
        }else{
          return 'https://oxmf.club/images_s/' + this.off.foto;
        }
        return this.message.split('').reverse().join('')
      }
    },
    methods:{
      
    },
    template:`
    <md-card md-with-hover v-bind:class="{ agotado: off.estado==4 }">
      
        <md-card-media class="lazy mainofmedia" v-bind:class="'a-img'+off.Ido" v-bind:data-src="getsrc">
          <div class="banderas" v-if="off.envioemoji!=''"><md-tooltip md-direction="bottom">Envio desde {{off.envio}}</md-tooltip><p v-html="'E '+off.envioemoji"></p></div><br>
          <div class="banderas" v-if="off.garantiaemoji!=''"><md-tooltip md-direction="bottom">Garantía en {{off.garantia}}</md-tooltip><p v-html="'G '+off.garantiaemoji"></p></div>
        </md-card-media>

        <md-card-header>
          <div class="md-subhead">{{off.nombrep}}</div>
          <div class="md-title">{{off.precioO}}€</div>
          <div class="md-caption"><time class="timeago" :datetime="off.fechap">{{off.fechap}}</time><span v-if="off.com!=''"> - <b>{{off.com}}</b></span></div>
        </md-card-header>
      
    </md-card>
`
});