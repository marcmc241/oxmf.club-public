"use strict";
Vue.component('mainfooter', {
    data(){
      return{
        year:2017
      }
    },
    mounted: function () {
      this.year=(new Date()).getFullYear();
    },
    template:`
      <footer>
          <md-card class="footer">
          <p>Oxmf.club es una web de ofertas que ayuda a mantener la comunidad <a href="https://t.me/masquefans" target="_blank" rel="noreferrer">@masquefans</a>, sin ánimo de lucro. Síguenos también en:</p>
          <div class="md-body-2 footermore">
            Telegram:
            <md-chip class="md-primary" md-clickable>
              <a href="https://t.me/ofertasxiaomifansclub" target="_blank" rel="noreferrer">
                <md-tooltip md-direction="top">
                  Ofertas
                </md-tooltip>
                @ofertasxiaomifansclub
              </a>
            </md-chip>
            <md-chip class="md-primary" md-clickable>
              <a href="https://t.me/masquenoticias" target="_blank" rel="noreferrer">
                <md-tooltip md-direction="top">
                  Noticias
                </md-tooltip>
                @masquenoticias
              </a>
            </md-chip>
            <md-chip class="md-primary" md-clickable>
              <a href="https://t.me/masquefans" target="_blank" rel="noreferrer">
                <md-tooltip md-direction="top">
                  Grupo
                </md-tooltip>
                @masquefans
              </a>
            </md-chip>
          </div>
          <div class="md-body-2 footermore">
            Twitter:
            <md-chip class="md-primary" md-clickable>
              <a href="https://twitter.com/oxmfclub" target="_blank" rel="noreferrer">
                <md-tooltip md-direction="top">
                  Ofertas
                </md-tooltip>
                 @oxmfclub
              </a>
            </md-chip>
          </div>
          <div class="md-body-2 footermore">
            Websites:
            <md-chip class="md-accent" md-clickable>
              <a href="https://masqueandroid.com" target="_blank" rel="noreferrer">
                <md-tooltip md-direction="top">
                  Nuevo Foro
                </md-tooltip>
                Masqueandroid
              </a>
            </md-chip>
            <md-chip class="md-primary" md-clickable>
              <a href="https://izadi.xyz/downmi/" target="_blank" rel="noreferrer">
                <md-tooltip md-direction="top">
                  ROMs Xiaomi
                </md-tooltip>
                Downmi
              </a>
            </md-chip>
          </div>
          <br>
          <div class="footerdetails">
            <span>©{{year}} MMC & @masquenoticias staff</span>
            <span><a href="javascript:void(0);" @click="$root.tabppc='tab-pp';$root.fullppcdialog=true;">Política de Privacidad y Cookies</a></span>
            <span><a href="javascript:void(0);" @click="$root.aboutdialog=true;">Contacto/Sugerencias</a></span>
            <span><a href="javascript:void(0);" @click="$root.tabhp='tab-com';$root.helpdial=true">Consejos de compra</a></span>
          </div>
          </md-card>
        </footer>
`
});