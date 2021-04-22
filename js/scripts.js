"use strict";
jQuery(document).ready(function() {
	$('body').timeago();
});

Vue.use(VueMaterial.default)
Vue.use(VueRouter);
Vue.use(VueDragscroll);

var validationMixin = window.vuelidate.validationMixin;
var { required, url, email } = window.validators;
const routes = [
				{path: '/', name: 'ofertas',  component: ofertasTemplate}
				,{path: '/of/:ido', name: 'detalles',  component: ofertasTemplate, props: true}
				,{path: '/s', name: 'filtrado', component: ofertasTemplate, props: true }
		];

const router = new VueRouter({
				routes: routes,
		});


	new Vue({
		el: '#app',
		router,
		mixins: [validationMixin],
		data: {
			tkn:null,
			navbar:true,
			ppcdialog: false,
			notifdialog: false,
			aboutdialog: false,
			filtroopen: false,
			colaboramas: false,
			snackbar:{
				content:'',
				duration:6000,
				active:false,
				error:false,
			},
			categorias: [],
			tiendas: [],
			envios: [],
			garantias: [],
			searchtips: [],
			filtro:{
				nombre: '',
				categorias: [],
				tiendas:[],
				envios:[],
				garantias:[],
				agotado: true,
				min: '',
				max: '',
			},
			link:'',
			bitlink:'',
			sendinglink: false,
			howworks: false,
			tabhw:'tab-hw',
			helpdial: false,
			tabhp:'tab-com',
			fullppcdialog: false,
			tabppc:'tab-pp',
			loading: false,
			theme:'light',
			notifperm:'disabled',
			notifactive:false,
			shared:{
				ofertas:[],
				prodsearch:null,
				lim:25,
				filterno:false,
				searchactivo:false,
				filtroactivo:false,
				top: true,
				detectscr:true,
				filtrodescription:'',
				didscroll:false,
				scrolldown:false,
				scrollpos:0,
				lastscrollpos:0,
				detalles:false,
				openof:{}
			},
			email:'',
			subject:'',
			message:'',
			sendingmsg:0,
			w960:false,
			w600:false,
			network:{
				error:false,
				snackactive:false,
				fetchfail:false
			},
			pwa:{
				deferredPrompt: null,
				installbtn: false
			},
			promo:{
				active: false,
				dialog: false,
				text: '',
				img: ''
			},
			isChristmas: 0
	},
	validations: {
				link: {
					required,
					url
				},
				email: {
					required,
					email
				},
				subject: {
					required
				},
				message: {
					required
				}
	},
	methods: {
			getdata(request){
				var self=this;
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
			lastoffers() {
				var self = this;
				
				this.loading=true;
				this.shared.searchactivo=false;
				self.shared.prodsearch=null;
				
				var req = new Request('func/getoffers.php?lim='+this.shared.lim , {
					method: "GET", // *GET, POST, PUT, DELETE, etc.
					mode: "same-origin", // no-cors, cors, *same-origin
					cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
					credentials: "include", // include, *same-origin, omit
					redirect: "follow", // manual, *follow, error
					referrer: "client", // no-referrer, *client
				});

				this.getdata(req).then(function(resposta) {
					if(resposta.result!=="true"){
							throw new Error("Response: "+resposta.msg);
					}

					var _ofertas=new Array();
					for (var i in resposta.ofertas) {
						_ofertas.push({
							Ido:resposta.ofertas[i].Ido,
							nombrep:resposta.ofertas[i].nombrep,
							foto:resposta.ofertas[i].foto,
							fechap:resposta.ofertas[i].fechap,
							precioO:resposta.ofertas[i].precioO,
							envio:resposta.ofertas[i].envio,
							envioemoji:resposta.ofertas[i].envioemoji,
							garantia:resposta.ofertas[i].garantia,
							garantiaemoji:resposta.ofertas[i].garantiaemoji,
							com:resposta.ofertas[i].com,
							estado:resposta.ofertas[i].estado
						});
					}

					if (_ofertas.length>0) {
						self.shared.filterno=false;
						self.shared.ofertas=_ofertas;
					}
					self.loading=false;
					self.updatetimelazy();

				}, function(err) {
					console.log(err);
				});
				
			},
			routefilter(ilim){
				
				if ((this.filtro.nombre==''||this.filtro.nombre==null)&&this.filtro.categorias.length==0&&this.filtro.tiendas.length==0&&this.filtro.envios.length==0&&this.filtro.garantias.length==0&&this.filtro.agotado==true&&(this.filtro.min==''||this.filtro.min==undefined)&&(this.filtro.max==''||this.filtro.max==undefined)) {
					router.push({ name: 'ofertas'});//if all values are empty
					return;
				}else{
					var self = this;
					
					let rnom, rcat, rtie, renv, rgar, rmin, rmax, query;
					
					if (this.filtro.nombre!=''||this.filtro.nombre!=null){
						rnom=this.filtro.nombre;
					}
					if(this.filtro.categorias.length!=0){
						rcat=this.filtro.categorias.join('-');
					}
					if(this.filtro.tiendas.length!=0){
						rtie=this.filtro.tiendas.join('-');
					}
					if(this.filtro.envios.length!=0){
						renv=this.filtro.envios.join('-');
					}
					if(this.filtro.garantias.length!=0){
						rgar=this.filtro.garantias.join('-');
					}
					if(this.filtro.min!=''&&this.filtro.min!=null){
						rmin=this.filtro.min;
					}
					if(this.filtro.max!=''&&this.filtro.max!=null){
						rmax=this.filtro.max;
					}

					if (this.filtro.nombre!=''||this.filtro.nombre!=null){
						router.push({ name: 'filtrado', query: { n:rnom, c:rcat, t:rtie, e:renv, g:rgar, mi:rmin, ma:rmax } });
					}else{
						router.push({ name: 'filtrado', query: { c:rcat, t:rtie, e:renv, g:rgar, mi:rmin, ma:rmax } });
					}
					//this.filteroffers(ilim);
				}
			},
			filteroffers(ilim) {
				let self = this;

				this.loading=true;
				this.shared.searchactivo=true;
				if ((this.filtro.nombre==''||this.filtro.nombre==null)&&this.filtro.categorias.length==0&&this.filtro.tiendas.length==0&&this.filtro.envios.length==0&&this.filtro.garantias.length==0&&this.filtro.agotado==true&&(this.filtro.min==''||this.filtro.min==undefined)&&(this.filtro.max==''||this.filtro.max==undefined)) {
					//if all values are empty
					router.push({ name: 'ofertas'});
					return;
				}
				//if all but name is empty
				if (this.filtro.categorias.length!=0 || this.filtro.tiendas.length!=0 || this.filtro.envios.length!=0 || this.filtro.garantias.length!=0 || this.filtro.agotado!=true || (this.filtro.min!='' && this.filtro.min!=undefined) || (this.filtro.max!='' && this.filtro.max!=undefined)) {
					this.shared.filtroactivo=true;
				}else{
					this.shared.filtroactivo=false;
				}
				if (ilim==0) {
					this.shared.lim=25;
					$('html, body').animate({ scrollTop: 0 }, 300);
				}
				var postdata = {
					lim:this.shared.lim,
					nom:this.filtro.nombre,
					cat:this.filtro.categorias,
					tie:this.filtro.tiendas,
					env:this.filtro.envios,
					gar:this.filtro.garantias,
					ago:this.filtro.agotado,
					min:this.filtro.min,
					max:this.filtro.max
				}

				var req = new Request('func/getfiltered.php' , {
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
							self.loading=false;
					}

					var _ofertas=new Array();
					for (var i in resposta.ofertas) {
						_ofertas.push({
							Ido:resposta.ofertas[i].Ido,
							nombrep:resposta.ofertas[i].nombrep,
							foto:resposta.ofertas[i].foto,
							fechap:resposta.ofertas[i].fechap,
							precioO:resposta.ofertas[i].precioO,
							envio:resposta.ofertas[i].envio,
							envioemoji:resposta.ofertas[i].envioemoji,
							garantia:resposta.ofertas[i].garantia,
							garantiaemoji:resposta.ofertas[i].garantiaemoji,
							com:resposta.ofertas[i].com,
							estado:resposta.ofertas[i].estado
						});
					}
					if (_ofertas.length>0) {
						self.shared.filterno=false;
						self.shared.ofertas=_ofertas;
					}else{
						self.shared.filterno=true;
						self.showsnackbar("No hay ofertas con estas características","true");
					}

					if (ilim==1) {//if request comes from increasing limit
						if (self.shared.ofertas[self.shared.ofertas.length-1].Ido==_ofertas[_ofertas.length-1].Ido) {
							self.showsnackbar("No hay más ofertas con estas características","true");
						}
					}else{
						if(self.filtro.nombre=='' || self.filtro.nombre==null){
							
						}else{
							self.search();
						}
					}
					_paq.push(['trackSiteSearch', self.filtro.nombre, /*self.filtro.categorias*/, _ofertas.length]);//matomo

					self.shared.ofertas=_ofertas;
					self.buildfiltdescription();
					self.loading=false;
					self.updatetimelazy();

				}, function(err) {
					console.log(err);
					self.showsnackbar("Vaya, ha habido un error filtrando ofertas :(","false");
					self.loading=false;
				});

			},
			buildfiltdescription(){
				self.shared.filtrodescription="Ofertas ";
				var addy=false;
				if (self.filtro.nombre!=''&&self.filtro.nombre!=null){
					self.shared.filtrodescription+="de productos con '"+self.filtro.nombre+"' ";
				}
				if (self.filtro.categorias.length>0){
					var matches=[];
					for (var i = 0; i < self.filtro.categorias.length; i++) {//foreach item in filtro.categorias
						for(var j = 0; j < self.categorias.length; j++) {//search the name
								if(self.categorias[j].Idc == self.filtro.categorias[i]) {
										matches.push( self.categorias[j].nombrec );
										break;//stop on first match found
								}
						}
					}
					if (matches.length>1) {self.shared.filtrodescription+=" en las categorías "+matches.join(", ")+" ";
					}else{self.shared.filtrodescription+=" en la categoría "+matches.join(", ")+" "}
					addy=true;
				}
				if (self.filtro.tiendas.length>0){
					var matches=[];
					for (var i = 0; i < self.filtro.tiendas.length; i++) {
						for(var j = 0; j < self.tiendas.length; j++) {
								if(self.tiendas[j].Idt == self.filtro.tiendas[i]) {
										matches.push( self.tiendas[j].nombre );
										break;
								}
						}
					}
					if (addy) {self.shared.filtrodescription+="y "}
					addy=true;
					if (matches.length>1) {self.shared.filtrodescription+="en las tiendas "+matches.join(", ")+" ";
					}else{ self.shared.filtrodescription+="en la tienda "+matches.join(", ")+" " }
				}
				if (self.filtro.envios.length>0){
					var matches=[];
					for (var i = 0; i < self.filtro.envios.length; i++) {
						for(var j = 0; j < self.envios.length; j++) {
								if(self.envios[j].IdEnvio == self.filtro.envios[i]) {
										matches.push( self.envios[j].nombre );
										break;
								}
						}
					}
					self.shared.filtrodescription+=" con envío desde "+matches.join(", ")+" ";
					addy=true;
				}
				if (self.filtro.garantias.length>0){
					var matches=[];
					for (var i = 0; i < self.filtro.garantias.length; i++) {
						for(var j = 0; j < self.garantias.length; j++) {
								if(self.garantias[j].IdGarantia == self.filtro.garantias[i]) {
										matches.push( self.garantias[j].nombre );
										break;
								}
						}
					}
					if (addy) {self.shared.filtrodescription+=", "}
					self.shared.filtrodescription+="con garantía en "+matches.join(", ")+" ";
				}
				if (self.filtro.min!=''&&self.filtro.min!=undefined&&self.filtro.max!=''&&self.filtro.max!=undefined) {
					if (addy) {self.shared.filtrodescription+="y "}
					addy=true;
					self.shared.filtrodescription+="con un precio entre "+self.filtro.min+"€ y "+self.filtro.max+"€";
				}else{
					if (self.filtro.min!=''&&self.filtro.min!=undefined){
						if (addy) {self.shared.filtrodescription+="y "}
							addy=true;
						self.shared.filtrodescription+="con un precio superior a "+self.filtro.min+"€ ";
					}
					if (self.filtro.max!=''&&self.filtro.max!=undefined){
						if (addy) {self.shared.filtrodescription+="y "}
						self.shared.filtrodescription+="un precio inferior a "+self.filtro.max+"€ ";
					}
				}
				
				self.shared.filtrodescription = self.shared.filtrodescription.replace(/\s+$/, '');
				self.shared.filtrodescription+=".";
			},
			resetfilter(){
				this.filtro.nombre="";
				this.filtro.categorias=[];
				this.filtro.tiendas=[];
				this.filtro.envios=[];
				this.filtro.garantias=[];
				this.filtro.agotado=true;
				this.filtro.min='';
				this.filtro.max='';
				router.push({ name: 'ofertas'});
			},
			searchchanged(){
				if (this.filtro.nombre==''||this.filtro.nombre==null) {
					if (self.shared.detalles==false) {
						router.push({ name: 'ofertas'});
					}
					$('.searchplaceholder').animate({opacity: ".5"}, 500);
				}else{
					$('.searchplaceholder').animate({opacity: "0"}, 500);
				}
			},
			changesearchtip(){
				if (this.filtro.nombre=="" || this.filtro.nombre==null) {
					let randomItem = this.searchtips[Math.floor(Math.random()*this.searchtips.length)];
					$('.searchplaceholder').animate({opacity: "0"}, 500, function() {
			      $('.searchplaceholder').text(randomItem).animate({opacity: ".5"}, 500);
			    });
				}
			},
			search(){
				var self = this;
				var postdata = { nom : self.filtro.nombre };

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
							self.shared.prodsearch=null;
						}else{
							for (var i in resposta.productos) {
								_prod.push({
									Idp:resposta.productos[i].Idp,
									nombrep:resposta.productos[i].nombrep,
									foto:resposta.productos[i].foto
								});
							}
							self.shared.prodsearch=_prod;
						}

				}, function(err) {
					console.log(err);
					
				});
			},
			maintitle(){
				var self=this;
				
				if (self.$route.path!='/') {
					router.push({ name: 'ofertas'},function() {
						self.shared.scrolldown=false;
						setTimeout(function(){$('html, body').animate({ scrollTop: 0 }, 400, 'easeInOutCubic', function(){self.shared.scrolldown=true; self.lastoffers();}); }, 500);
					});
				}else{

					$('html, body').animate({ scrollTop: 0 }, 1000, 'easeInOutCubic');
				}
			},
			updatetimelazy(){
				setTimeout(function(){ $('.timeago').timeago('refresh'); $('.lazy').lazy({scrollDirection: 'vertical', effect: 'fadeIn'}); }, 100);//refresh timestamps and lazyload
			},
			getValidationClass (fieldName) { //contact dialog validation
				const field = this.$v[fieldName]

				if (field) {
					return {
						'md-invalid': field.$invalid && field.$dirty
					}
				}
			},
			validateLink () { //URL shortener validation
					this.$v.link.$touch();

					if (!this.$v.link.$invalid) {
						this.sendlink();
					}
			},
			validateContact(){ //contact dialog validation
				this.$v.email.$touch();
				this.$v.subject.$touch();
				this.$v.message.$touch();

					if (!this.$v.email.$invalid&&!this.$v.subject.$invalid&&!this.$v.message.$invalid) {
						this.sendmsg();
					}
			},
			sendlink(){ //send URL in the short link generator
				var self = this;
				this.sendinglink=true;
				var postdata = { link : self.link };
				var req = new Request('func/processlink.php' , {
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
						self.showsnackbar(resposta.msg, "false");
						self.sendinglink=false;
						throw new Error("Response: "+resposta.msg);
					}else{
						self.bitlink=resposta.bitlink;
					}
					self.sendinglink=false;

				}, function(err) {
					self.showsnackbar("Error al procesar el link (request error)","false");
					self.sendinglink=false;
				});
			},
			sendmsg(){
				this.sendingmsg=1;
				var self = this;

				var postdata = {
							email:self.email,
							subject:self.subject,
							msg:self.message,
							hitkn:'J3(21=k+fd*9'
						};
				var req = new Request('func/sendmsg.php' , {
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
						self.showsnackbar(resposta.msg, "false");
						self.sendingmsg=0;
						throw new Error("Response: "+resposta.msg);
					}else{
						self.sendingmsg=2;
					}
					self.sendinglink=false;

				}, function(err) {
					self.showsnackbar("Error al enviar el mensaje (request error)","false");
					self.sendingmsg=0;
				});

			},
			copybitlink(){this.copytoclipboard(this.bitlink)},
			copytoclipboard(text){
				var dummy = document.createElement("input");
				document.body.appendChild(dummy);
				dummy.setAttribute('value', text);
				dummy.select();
				
				try {
				// copy text
					document.execCommand("copy");
					this.showsnackbar("Copiado al portapapeles","true");
				} catch (err) {
					this.showsnackbar("No se puede copiar en este navegador","false");   
				}
				document.body.removeChild(dummy);
			},
			changetheme(){
				if (this.theme=='light') {
					this.setActiveStyleSheet('themed');
					if (typeof(Storage) !== "undefined") {
							localStorage.setItem("theme", "dark");
					}
					this.theme='dark';
				}else{
					this.setActiveStyleSheet('themel');
				 if (typeof(Storage) !== "undefined") {
							localStorage.setItem("theme", "light");
					}
					this.theme='light';
				}
			},
			setActiveStyleSheet(title) {
				 var i, a, main;
				 a = document.getElementsByTagName("link");

				 for(i=0; i<a.length; i++) {
					 if(a[i].getAttribute("rel").indexOf("style") != -1 && a[i].getAttribute("title")) {

						 a[i].disabled = true;
						 if(a[i].getAttribute("title") == title) a[i].disabled = false;
					 }
				 }
			},
			showsnackbar(text, result) {
				this.snackbar.content = text;
				if (result=="false") {
					this.snackbar.error=true;
				}else{
					this.snackbar.error=false;
				}
				this.snackbar.active = true;

			},
			increaselim(){
				if (!this.network.error) {//prevent increasing limit if disconnected
					this.shared.lim=this.shared.lim+25;
					if (this.shared.searchactivo==true) {
						this.filteroffers(1);
					}else{
						this.lastoffers();
					}
				}
			},
			onResize(event) {
				var w=Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
				if (w>960) {
					this.w600=false;
					this.w960=false;
				}else if (w>600) {
					this.w600=false;
					this.w960=true;
				}else{
					this.w600=true;
					this.w960=true;
				}
			},
			gotop(){
				$('html, body').animate({ scrollTop: 0 }, 1000, 'easeInOutCubic');
			},
			htmlEntities(str) {
					return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
			},
			getinitdata(){
				var self=this;
				self.categorias=[];
				self.tiendas=[];
				self.envios=[];
				self.garantias=[];
				self.searchtips=[];

				var req = new Request('func/initdata.php' , {
					method: "GET",
					mode: "same-origin",
					cache: "default",
					credentials: "include",
					redirect: "follow",
					referrer: "client"
				});
				
				this.getdata(req).then(function(resposta) {
					
					if(resposta.result!=="true"){
							throw new Error("Response: "+resposta.msg);
					}

					for (var i in resposta.categorias) {
						self.categorias.push({Idc:resposta.categorias[i].Idc,
														nombrec:resposta.categorias[i].nombrec});
					}
					for (var i in resposta.tiendas) {
						self.tiendas.push({Idt:resposta.tiendas[i].Idt,
														nombre:resposta.tiendas[i].nombre,
														mainaff:resposta.tiendas[i].mainaff});
					}
					for (var i in resposta.envios) {
						self.envios.push({IdEnvio:resposta.envios[i].IdEnvio,
														nombre:resposta.envios[i].nombre});
					}
					for (var i in resposta.garantias) {
						self.garantias.push({IdGarantia:resposta.garantias[i].IdGarantia,
														nombre:resposta.garantias[i].nombre});
					}
					self.searchtips = resposta.tips;
					setInterval(()=>{self.changesearchtip()}, 15000);

				}, function(err) {
					console.log(err);
					self.showsnackbar("Ha habido un error al recuperar los datos :(","false");
				});
				
			},
			getinit(){
				var self=this;

				var req = new Request('func/init.php?tk=2' , {
					method: "GET",
					mode: "same-origin",
					cache: "no-cache",
					credentials: "include",
					redirect: "follow",
					referrer: "client"
				});
				
				this.getdata(req).then(function(resposta) {
					
					if(resposta.result!=="true"){
							throw new Error("Response: "+resposta.msg);
					}
					self.tkn = resposta.tkn;
					var exdate = new Date();
					exdate.setDate(exdate.getDate() + 1);//expires in 1 day
					document.cookie = "tkn=" + encodeURIComponent(resposta.tkn) + "; expires=" + exdate.toUTCString();
					if (resposta.hasOwnProperty('promotxt')) {
						self.promo.active = true;
						self.promo.img = resposta.promoimg;
						
						let ind = resposta.promotxt.replace(/<a /g, "<a target='blank' rel='noreferrer'");
						self.promo.text = ind;
					}else{
						self.promo.active = false;
					}
						
					self.initupdaterouter();

				}, function(err) {
					console.log(err);
					self.showsnackbar("Ha habido un error con la conexión :(","false");
				});
					
				
			},
			initupdaterouter(){
				var self=this;
				if(hash.indexOf("/of/") > -1) {
					var _ido = hash.split('/of/')[1];
					if (!isNaN(_ido)) {//if number
						router.push({ name: 'detalles', params: { ido: _ido }});
						self.shared.detalles=true;
						
					}else{
						router.push({ name: 'ofertas'});
						// /of/ with invalid ido
					}
					
				}else if (hash.indexOf("/s") > -1) {
					self.shared.searchactivo=true;
					if (self.$route.query.n!=undefined) {
						self.filtro.nombre= self.htmlEntities(decodeURIComponent(self.$route.query.n));
					}else{
						self.filtro.nombre='';
					}
					if (self.$route.query.c!=undefined) {
						let _incategorias = self.htmlEntities(decodeURIComponent(self.$route.query.c)).split("-");
						if(!_incategorias.some(isNaN)){
							self.filtro.categorias = _incategorias
						}
					}else{
						self.filtro.categorias=[];
					}
					if (self.$route.query.t!=undefined) {
						let _intiendas = self.htmlEntities(decodeURIComponent(self.$route.query.t)).split("-");
						if(!_intiendas.some(isNaN)){
							self.filtro.tiendas = _intiendas
						}
					}else{
						self.filtro.tiendas=[];
					}
					if (self.$route.query.e!=undefined) {
						let _inenvios= self.htmlEntities(decodeURIComponent(self.$route.query.e)).split("-");
						if(!_inenvios.some(isNaN)){
							self.filtro.envios = _inenvios
						}
					}else{
						self.filtro.envios=[];
					}
					if (self.$route.query.g!=undefined) {
						let _ingarantias = self.htmlEntities(decodeURIComponent(self.$route.query.g)).split("-");
						if(!_ingarantias.some(isNaN)){
							self.filtro.garantias = _ingarantias
						}
					}else{
						self.filtro.garantias=[];
					}
					self.filtro.agotado= true;
					if (self.$route.query.min!=undefined) {
						let _inmin = self.htmlEntities(decodeURIComponent(self.$route.query.min));
						if (!isNaN(_inmin)) {
							self.filtro.min = _inmin;
						}
					}else{
						self.filtro.min='';
					}
					if (self.$route.query.max!=undefined) {
						let _inmax= self.htmlEntities(decodeURIComponent(self.$route.query.max));
						if (!isNaN(_inmax)) {
							self.filtro.max = _inmax;
						}
					}else{
						self.filtro.max='';
					}
					self.routefilter(25);
				}else{
					router.push({ name: 'ofertas'});
					this.lastoffers();
					
				}
			},
			allownotif(notify){
				var self=this;
				if ('Notification' in window && 'serviceWorker' in navigator && 'PushManager' in window) {
					
				}else{
					console.warn('Push messaging is not supported'+ ('Notification' in window).toString() + ('serviceWorker' in navigator).toString() +('PushManager' in window).toString());
					this.notifperm='disabled';
					return;
				}
				if (Notification.permission === 'denied') {
					this.notifperm='denied';//notifications blocked
					self.notifactive=false;
					return;

				}else if(Notification.permission === 'granted'){
					this.notifperm='granted';

				}else if(Notification.permission === 'default'){
					this.notifperm='default';

				}
				
				if (notify==true) {//user enables notifications
					if (Notification.permission === 'granted') {
						self.subscribeUser();
					}else{
						Notification.requestPermission(function (permission) {
							if (permission === "granted") {
								self.notifperm='granted';
								self.subscribeUser();
							}
						});
					}
				}else if(notify==false){//user disables notifications
					self.notifactive=false;
					
				}
				
			},
			subscribeUser() {
				var self=this;
				const applicationServerKey = this.urlB64ToUint8Array('BLqckHwkSF2gZkoVmpxzpv22YKsIJBWGNu4DkTsWfnNcMREJTxiLss73_aX3RShIpBvHCxszHA8Ae2tkhr9eryU');
				navigator.serviceWorker.ready.then(function(reg) {

					reg.pushManager.subscribe({
						userVisibleOnly:true,
						applicationServerKey: applicationServerKey
					}).then(function(sub) {
						console.log('Endpoint URL: ', sub.endpoint);
						self.notifactive=true;
						self.updateSubscriptionOnServer(subscription);
					}).catch(function(e) {
						if (Notification.permission === 'denied') {
							console.warn('Permission for notifications was denied');
							this.notifperm='denied';
						} else {
							console.error('Unable to subscribe to push', e);
						}
					});
				})
			 
			},
			urlB64ToUint8Array(base64String) {
				const padding = '='.repeat((4 - base64String.length % 4) % 4);
				const base64 = (base64String + padding)
					.replace(/\-/g, '+')
					.replace(/_/g, '/');

				const rawData = window.atob(base64);
				const outputArray = new Uint8Array(rawData.length);

				for (let i = 0; i < rawData.length; ++i) {
					outputArray[i] = rawData.charCodeAt(i);
				}
				return outputArray;
			},
			unsubscribeUser() {
				var self=this;
				swRegistration.pushManager.getSubscription()
				.then(function(subscription) {
					if (subscription) {
						const key = subscription.getKey('p256dh');
						const token = subscription.getKey('auth');
						fetch('func/pushsubs.php', {
								method: 'post',
								headers: new Headers({
									'Content-Type': 'application/json'
								}),
								body: JSON.stringify({
									endpoint: subscription.endpoint,
									key: key ? btoa(String.fromCharCode.apply(null, new Uint8Array(subscription.getKey('p256dh')))) : null,
									token: token ? btoa(String.fromCharCode.apply(null, new Uint8Array(subscription.getKey('auth')))) : null,
									axn: 'unsubscribe'
								})
						}).then(function(response) {
							return response.text();
						}).then(function(response) {
							console.log(response);
						}).catch(function(err) {
							throw new error('error removing from db');
						});
						return subscription.unsubscribe();
					}
				}).catch(function(error) {
					console.log('Error unsubscribing', error);
				}).then(function() {
					self.updateSubscriptionOnServer(null);

					console.log('User is unsubscribed.');
					self.notifactive=false;

					
				});
			},
			updateSubscriptionOnServer(subscription) {
				// TODO: Send subscription to application server
				if (subscription) {
					const key = subscription.getKey('p256dh');
					const token = subscription.getKey('auth');

					fetch('func/pushsubs.php', {
						method: 'post',
						headers: new Headers({
							'Content-Type': 'application/json'
						}),
						body: JSON.stringify({
							endpoint: subscription.endpoint,
							key: key ? btoa(String.fromCharCode.apply(null, new Uint8Array(subscription.getKey('p256dh')))) : null,
							token: token ? btoa(String.fromCharCode.apply(null, new Uint8Array(subscription.getKey('auth')))) : null,
							axn: 'subscribe'
						})
					}).then(function(response) {
						return response.text();
					}).then(function(response) {
						console.log(response);
					}).catch(function(err) {
						throw new error('error updateSubscriptionOnServer');
					});
				} else {
					//delete subscription
				}
			},
			hasScrolled(){
				var self=this;
				if(self.shared.detectscr==true){
					self.shared.scrollpos = $(window).scrollTop();

					if (self.shared.scrollpos>250) {
						self.shared.top=false;
					}

					if (self.shared.scrollpos<5){
						self.shared.top=true;
					}
				}
				
				
				if (self.w960==true) {//if is on screen less than 960px wide
					if (self.shared.scrollpos > self.shared.lastscrollpos && self.shared.scrollpos > 250){
						//scrolled down past 250px, hide toolbar.
						self.navbar=false;
					}else{
						if(self.shared.scrollpos + $(window).height() < $(document).height()){
							// If did not scroll past the document (possible on mac)...
							self.navbar=true;
						}
					}
				}else{
					self.navbar=true;
				}
				
				self.shared.lastscrollpos=self.shared.scrollpos;
			},
			updateOnlineStatus(status){
				var self=this;
				if (status===false) {
					self.network.error=true;
					self.network.snackactive=true;
				}else{
					self.network.error=false;
					setTimeout(function(){ self.network.snackactive=false; }, 2000);
					if (self.network.fetchfail) {
						self.retry();
					}
				}
			},
			installpwa(){
				self.pwa.installbtn = false;
				// Show the prompt
				self.pwa.deferredPrompt.prompt();
				// Wait for the user to respond to the prompt
				self.pwa.deferredPrompt.userChoice.then((choiceResult) => {
					if (choiceResult.outcome === 'accepted') {
					} else {
						// User dismissed the prompt
					}
					self.pwa.deferredPrompt = null;
				});
			},
			retry(){
				if (!this.network.error) {
					this.getinit();

					this.getinitdata();

				}
			},
			aceptedppc(){
				var self=this;
				let ppcdate = new Date(new Date().setFullYear(new Date().getFullYear() + 1));
				document.cookie = "ppc=true; expires="+ppcdate.toUTCString()+"; path=/";

				this.ppcdialog = false;
				this.shared.scrolldown=false;//prevent scroll on init

				//save user and check promo
				this.getinit();

				//Get init data
				this.getinitdata();

				
				//check notifications permission
				//this.allownotif();
				this.notifperm='disabled';//delete this and uncomment line above when notifications are ready
				
				if (typeof(Storage) !== "undefined") {
						if (localStorage.getItem("theme")!="dark") {
							localStorage.setItem("theme", "light");
						}else{
							this.changetheme();
						}
				}

				if ('serviceWorker' in navigator) {
						navigator.serviceWorker.register('sw.js').then(function(registration) {
							// Registration was successful
							//console.log('ServiceWorker registration successful with scope: ', registration.scope);
							
							/*registration.pushManager.getSubscription().then(function(sub) {//uncomment when notifications are ready
								if (sub === null) {
									self.notifperm='default';
									console.log('Not subscribed to push service!');
								} else {

									if (Notification.permission === 'granted') {
										//user subscribed
										self.notifperm='granted';
										self.notifactive=true;
									}
									
									const key = sub.getKey('p256dh');
									const token = sub.getKey('auth');

									console.log('Subscription object: ', sub);
									console.log('endpoint: ', sub.endpoint);
									console.log('key: ', key ? btoa(String.fromCharCode.apply(null, new Uint8Array(sub.getKey('p256dh')))) : null);
									console.log('token: ', token ? btoa(String.fromCharCode.apply(null, new Uint8Array(sub.getKey('auth')))) : null);

								}
							});*/
						 
							window.addEventListener('beforeinstallprompt', (e) => {
									e.preventDefault();
									// Stash the event so it can be triggered later.
									self.pwa.deferredPrompt = e;
									// Update UI to notify the user they can add to home screen
									self.pwa.installbtn = true;
							});

						}, function(err) {
							// registration failed
							console.log('ServiceWorker registration failed: ', err);
						});
					
				}
				if (!navigator.onLine) {//if offline
					self.updateOnlineStatus(false);
				}
				window.addEventListener('online',  function(){self.updateOnlineStatus(true);} );
				window.addEventListener('offline', function(){self.updateOnlineStatus(false);} );
			},
			getCookie(cname) {
			  var name = cname + "=";
			  var decodedCookie = decodeURIComponent(document.cookie);
			  var ca = decodedCookie.split(';');
			  for(var i = 0; i <ca.length; i++) {
			    var c = ca[i];
			    while (c.charAt(0) == ' ') {
			      c = c.substring(1);
			    }
			    if (c.indexOf(name) == 0) {
			      return c.substring(name.length, c.length);
			    }
			  }
			  return "";
			},
			back(){
				window.history.back();
			}
		},
		created: function () {
			this.onResize();

			let ppcookie = this.getCookie("ppc");
			if (ppcookie != "") {//has accepted cookies already
				this.aceptedppc();
			}else{
				this.ppcdialog = true;
			}
			
		},
		mounted() {
			window.addEventListener('resize', this.onResize);
			self=this;

			let D = new Date();
			let d = D.getDate();
			let m = D.getMonth();
			if( m === 11 ){ 
				if (d <= 25) { this.isChristmas = 1; }
				else{ this.isChristmas = 2; }
			}else if( m === 10 ) {
				if( d >= 10 ){ this.isChristmas = 1; }
			}else if( m === 0 ){
				if( d <= 7 ){ this.isChristmas = 2; }
			}
			self.shared.detectscr=true;

			setTimeout(function(){

				window.onscroll = function () {
					self.shared.didScroll = true;
				};

			}, 500);

			setInterval(function() {
				if (self.shared.didScroll) {
					self.hasScrolled();
					self.shared.didScroll = false;
				}
			}, 250);
		},
		beforeDestroy() {
			window.removeEventListener('resize', this.onResize)
		},
		watch: {
			'$route' (to, from) {
				var self=this;
				if (to.path.indexOf("/of/") > -1) {
					//route to detalles

					if (!isNaN(this.$route.params.ido)) {

						self.shared.detalles=true;
						self.shared.detectscr=false;//no detect scroll for showing/hiding
						self.navbar=true; //unhide navbar if hidden
						self.shared.top=true;//hide top arrow
					}else{
						router.push({ name: 'ofertas'});
						window.document.title = "Ofertas Xiaomi Fans Club";
						this.$emit('snackbar',"Error en los parámetros de la URL","false");
					}
				}else if (to.path.indexOf("/s") > -1) {
					//route to search
					window.document.title = "Ofertas Xiaomi Fans Club";
					if (self.shared.detalles===true) {
						if ($(".detalles").scrollTop() > 200 && self.w600 === true) {//in small screens, if scrolled don't do animation
							var element2 = document.getElementsByClassName('a-img'+self.shared.openof.Ido)[0];
							element2.classList.remove('imghidden');
						}else{
							if (document.getElementsByClassName('a-img'+self.shared.openof.Ido).length > 0 && document.getElementsByClassName('ramjetanimend').length > 0) {
								var element2 = document.getElementsByClassName('a-img'+self.shared.openof.Ido)[0];
								var element1 = document.getElementsByClassName('ramjetanimend')[0];

								element1.classList.remove('imghidden');

								ramjet.transform( element1, element2, {
									easing: ramjet.easeInOut,
									duration: 500,
									done: function () {
										element2.classList.remove('imghidden');
									}
								});

								element2.classList.add('imghidden');
								element1.classList.add('imghidden');
							}
						}
					}
					self.shared.detalles=false;
					this.filtro.nombre= self.htmlEntities(decodeURI(to.query.n));
					if (to.query.c!=undefined) {
						this.filtro.categorias= self.htmlEntities(decodeURI(to.query.c)).split("-");
					}else{
						this.filtro.categorias=[];
					}
					if (to.query.t!=undefined) {
						this.filtro.tiendas= self.htmlEntities(decodeURI(to.query.t)).split("-");
					}else{
						this.filtro.tiendas=[];
					}
					if (to.query.e!=undefined) {
						this.filtro.envios= self.htmlEntities(decodeURI(to.query.e)).split("-");
					}else{
						this.filtro.envios=[];
					}
					if (to.query.g!=undefined) {
						this.filtro.garantias= self.htmlEntities(decodeURI(to.query.g)).split("-");
					}else{
						this.filtro.garantias=[];
					}
					this.filtro.agotado= true;
					if (to.query.min!=undefined) {
						this.filtro.min= self.htmlEntities(decodeURI(to.query.min));
					}
					if (to.query.max!=undefined) {
						this.filtro.max= self.htmlEntities(decodeURI(to.query.max));
					}
					
					self.shared.detectscr=true;//detect scroll

					self.shared.openof = {};
					this.filteroffers();
					setTimeout(function(){ $(".detalles").animate({ scrollTop: 0 }, 0); }, 700);
				}else{
					//route to offers
					window.document.title = "Ofertas Xiaomi Fans Club";
					if (self.shared.ofertas.length < 1) {
						self.lastoffers();
					}
					if (self.shared.detalles===true) {
						if ($(".detalles").scrollTop() > 200 && self.w600 === true) {//in small screens, if scrolled don't do animation
							var element2 = document.getElementsByClassName('a-img'+self.shared.openof.Ido)[0];
							element2.classList.remove('imghidden');
						}else{
							if (document.getElementsByClassName('a-img'+self.shared.openof.Ido).length > 0 && document.getElementsByClassName('ramjetanimend').length > 0) {
								var element2 = document.getElementsByClassName('a-img'+self.shared.openof.Ido)[0];
								var element1 = document.getElementsByClassName('ramjetanimend')[0];


								element1.classList.remove('imghidden');

								ramjet.transform( element1, element2, {
									easing: ramjet.easeInOut,
									duration: 500,
									done: function () {
										element2.classList.remove('imghidden');
									}
								});

								element2.classList.add('imghidden');
								element1.classList.add('imghidden');
							}
						}
						
					}else{
						self.lastoffers(); //if not retuns form detalles (returns from search)
					}
					self.shared.detalles=false;
					self.shared.searchactivo=false;
					self.shared.filtroactivo=false;

					self.shared.detectscr=true;//detect scroll

					self.filtroopen=false;
					self.shared.lim=25;
					self.shared.openof = {};
					setTimeout(function(){ $(".detalles").animate({ scrollTop: 0 }, 0); }, 700);
				}
				setTimeout(function(){ self.updatetimelazy(); }, 300);
			}
		}
	}).$mount('#app');
