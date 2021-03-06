<!DOCTYPE html>
<html lang="es" class="md-scrollbar">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ofertas Xiaomi Fans Club</title>

	<link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
	<link rel="mask-icon" href="/img/safari-pinned-tab.svg" color="#ff165d">
	<link rel="shortcut icon" href="/img/favicon.ico">
	<meta name="msapplication-TileColor" content="#ff165d">
	<meta name="msapplication-config" content="/img/browserconfig.xml">
	<meta name="theme-color" content="#235784">

	<meta name="google-site-verification" content="sumiV-XnzoMoTyCBV4bh3ZcjpjQ6ACnHgORoabbz_10" />

	<meta name="description" content="Las mejores ofertas de productos Xiaomi y todo su ecosistema. Todos los productos Xiaomi, Mijia, Redmi, Yeelight, Roidmi, 1 More, Mitu, Aqara... al mejor precio, recopilados a diario por miembros del staff de @masquefans"/>
	<meta name="keywords" content="xiaomi, ofertas, chollos, descuentos, cupones, deals, mijia, mi"/>
	<link rel="canonical" href="https://oxmf.club" />
	<meta property="og:locale" content="es_ES" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Ofertas Xiaomi Fans Club - Las mejores ofertas de productos Xiaomi" />
	<meta property="og:description" content="Encuentra todas las ofertas de productos Xiaomi y todo el ecosistema. Todos los productos Xiaomi al mejor precio, recopilados a diario por miembros del staff de @masquefans" />
	<meta property="og:url" content="https://oxmf.club" />
	<meta property="og:site_name" content="Ofertas Xiaomi Fans Club"/>
	<meta property="og:image" content="https://oxmf.club/img/logo.png" />
	<meta property="og:image:secure_url" content="https://oxmf.club/img/logo.png" />
	<meta property="og:image:width" content="500" />
	<meta property="og:image:height" content="500" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:description" content="Encuentra todas las ofertas de productos Xiaomi y todo el ecosistema. Todos los productos Xiaomi al mejor precio, recopilados a diario por miembros del staff de @masquefans" />
	<meta name="twitter:title" content="Ofertas Xiaomi Fans Club - Las mejores ofertas de productos Xiaomi" />
	<meta name="twitter:site" content="@oxmfclub" />
	<meta name="twitter:image" content="https://oxmf.club/img/logo.png" />
	<meta name="twitter:creator" content="@oxmfclub" />

	
	<link rel="stylesheet" href="css/vue-material.min.css">
	<link rel="alternate stylesheet" type="text/css"  href="css/vue-material-dark.min.css" title="themed">
	<link rel="stylesheet" type="text/css" href="css/theme.css" title="themel">
	
	<link rel="stylesheet" type="text/css" href="css/estils2.css">
	
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.timeago.js" type="text/javascript"></script>

	<script type="text/javascript">var hash=window.location.hash;</script>
	<script type="text/javascript">
	  var _paq = _paq || [];
	  _paq.push(["setCookieDomain", "*.oxmf.club"]);
	  _paq.push(['trackPageView']);
	  _paq.push(['enableLinkTracking']);
	  (function() {
		var u="//oxmf.club/analytics/piwik/";
		_paq.push(['setTrackerUrl', u+'piwik.php']);
		_paq.push(['setSiteId', '1']);
		var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
		g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
	  })();
	</script>

	
	<link rel="manifest" href="manifest.json">
</head>

<body>
	<div id="app" v-cloak>
				<noscript><p class="noscript">Esta p??gina necesita JavaScript para mostrarse correctamente. Por favor, permite la ejecuci??n de JavaScript.</p></noscript>
				<transition name="toolbar">
					<md-toolbar class="md-primary" :class="{ christmas: (isChristmas!=0) }" v-if="navbar">
						<div class="md-toolbar-row md-layout">
							<div class="md-toolbar-section-start md-layout-item md-xlarge-size-30 md-large-size-30 md-medium-size-35 md-small-size-50 md-xsmall-size-50">
								<transition name="btnback">
									<span  @click="back()" class="btnback pointer" v-if="shared.detalles">
										<md-button class="md-icon-button">
										   <md-icon>arrow_back</md-icon>
										</md-button>
									    </span>
									</span>
								</transition>
								<span @click="maintitle()" class="pointer">
									<md-avatar>
										<img src="img/android-chrome-192x192.png" alt="OXMF.club">
									</md-avatar>
								</span>
								<span>
									<h1 class="md-title pointer" @click="maintitle()"><abbr title="Ofertas Xiaomi Fans Club">OXMF.club</abbr><img id="christmaslogo" class="md-xsmall-hide" :src="'img/snow/christmas'+isChristmas+'.png'" v-if="isChristmas!=0"></h1>
								</span>
							</div>
							<div class="md-layout-item md-xlarge-size-40 md-large-size-40 md-medium-size-35 md-small-hide">
								<form novalidate @submit.prevent="routefilter(0);" class="md-layout">
									<span class="md-layout-item tbfiltbtn">
										<md-button class="md-icon-button" v-bind:class="{ 'md-accent md-raised': shared.filtroactivo}" @click="filtroopen=true;">
										  <md-icon>filter_list</md-icon>
										  <md-tooltip md-direction="bottom">Filtrar</md-tooltip>
										</md-button>
									</span>
									<span class="md-layout-item md-xlarge-size-85 md-large-size-80 md-medium-size-70 md-small-size-60 md-xsmall-size-50">
										<md-autocomplete
										  v-model="filtro.nombre"
										  md-layout="box"
										  :md-options="[]"
										  @md-changed="searchchanged()">
										  <label class="searchplaceholder">Buscar</label>
										</md-autocomplete>
									</span>
									<span class="md-layout-item">
										<md-button class="md-icon-button" @click="routefilter(0);">
										   <md-icon>search</md-icon>
										   <md-tooltip md-direction="bottom">Buscar</md-tooltip>
										</md-button>
									</span>
								</form>
							</div>
							<div class="md-toolbar-section-end md-layout-item md-xlarge-size-30 md-large-size-30 md-medium-size-30 md-small-size-50 md-xsmall-size-50">
								
									<span v-if="notifperm!='disabled'">
									<md-button @click="notifdialog=true;" class="md-icon-button" v-if="notifactive==true">
										<md-tooltip md-direction="bottom">Notificaciones</md-tooltip>
										<md-icon>notifications_active</md-icon>
									</md-button>
									<md-button @click="notifdialog=true;" class="md-icon-button" v-else-if="notifactive==false">
										<md-tooltip md-direction="bottom">Notificaciones</md-tooltip>
										<md-icon>notifications_off</md-icon>
									</md-button>
									</span>

									<md-button @click="installpwa()" class="md-icon-button" v-if="pwa.installbtn">
										<md-tooltip md-direction="bottom">Instalar App</md-tooltip>
										<md-icon>get_app</md-icon>
									</md-button>

									<md-button @click="changetheme()" class="md-icon-button" v-if="theme=='light'">
										<md-tooltip md-direction="bottom">Cambiar tema</md-tooltip>
										<md-icon>brightness_high</md-icon>
									</md-button>
									<md-button @click="changetheme()" class="md-icon-button" v-if="theme=='dark'">
										<md-tooltip md-direction="bottom">Cambiar tema</md-tooltip>
										<md-icon>brightness_2</md-icon>
									</md-button>

									<md-button @click="colaboramas = !colaboramas" class="md-icon-button" v-if="w600===true">
										<md-icon>add</md-icon>
									</md-button>
									<md-button @click="colaboramas = !colaboramas" v-if="w600===false">Colabora+</md-button>
							</div>
						</div>
						
						<div class="md-toolbar-row md-layout" v-if="w960">
							<div class="md-layout-item"></div>
							<form novalidate @submit.prevent="routefilter(0);" class="md-layout md-layout-item md-medium-size-60 md-small-size-80 md-xsmall-size-100">
								<span class="md-layout-item tbfiltbtn">
									<md-button class="md-icon-button" v-bind:class="{ 'md-accent md-raised': shared.filtroactivo}" @click="filtroopen=true;">
									  <md-icon>filter_list</md-icon>
									  <md-tooltip md-direction="bottom">Filtrar</md-tooltip>
									</md-button>
								</span>
								<span class="md-layout-item md-xlarge-size-90 md-large-size-90 md-medium-size-90 md-small-size-80 md-xsmall-size-70">
									<md-autocomplete
									  v-model="filtro.nombre"
									  md-layout="box"
									  :md-options="[]"
									  @md-changed="searchchanged()">
									  <label class="searchplaceholder">Buscar</label>
									</md-autocomplete>
								</span>
								<span class="md-layout-item">
									<md-button class="md-icon-button" @click="routefilter(0);">
									   <md-icon>search</md-icon>
									   <md-tooltip md-direction="bottom">Buscar</md-tooltip>
									</md-button>
								</span>
							</form>
							<div class="md-layout-item"></div>
						 </div>
						
					</md-toolbar>
				</transition>
				<md-drawer class="md-scrollbar" :md-active.sync="filtroopen">
					<div class="closefil">
						<md-button class="md-icon-button md-dense" @click="filtroopen=false">
						  <md-icon>close</md-icon>
						</md-button>
					</div>
					<div class="filterdiv">
						<p class="md-title">Filtrar Ofertas</p>
						<form novalidate @submit.prevent="routefilter(0);filtroopen=false">
							
							  <md-field>
								<label for="categoria">Categor??a</label>
								<md-select v-model="filtro.categorias" name="categoria" multiple>
								  <md-option v-for="cat in categorias" :value="cat.Idc" :key="cat.Idc">{{cat.nombrec}}</md-option>
								</md-select>
							  </md-field>
							  <md-field>
								<label for="tienda">Tiendas</label>
								<md-select v-model="filtro.tiendas" name="tienda" multiple>
								  <md-option v-for="tien in tiendas" :value="tien.Idt" :key="tien.Idt">{{tien.nombre}}</md-option>
								</md-select>
							  </md-field>
							  <md-field>
								<label for="envio">Env??o</label>
								<md-select v-model="filtro.envios" name="envio" multiple>
								  <md-option v-for="env in envios" :value="env.IdEnvio" :key="env.IdEnvio">{{env.nombre}}</md-option>
								</md-select>
							  </md-field>
							  <md-field>
								<label for="garantia">Garant??a</label>
								<md-select v-model="filtro.garantias" name="garantia" multiple>
								  <md-option v-for="gar in garantias" :value="gar.IdGarantia" :key="gar.IdGarantia">{{gar.nombre}}</md-option>
								</md-select>
							  </md-field>
							  <div class="filterprice">
								<span class="block filterpricetext">Precio entre </span>
								<span class="block">
									<md-field class="price">
									  <label>M??nimo</label>
									  <md-input v-model="filtro.min" type="number"></md-input>
									  <md-icon>euro_symbol</md-icon>
									</md-field>
								</span>
								<span class="block filterpricetext">y </span>
								<span class="block">
									<md-field class="price">
									  <label>M??ximo</label>
									  <md-input v-model="filtro.max" type="number"></md-input>
									  <md-icon>euro_symbol</md-icon>
									</md-field>
								</span>
							  </div>
							  <!--<md-switch v-model="filtro.agotado" class="md-primary">Agotadas</md-switch>-->
							  <br>
							  <div class="filtroactions">
								<md-button class="md-accent" @click="resetfilter();">Reiniciar</md-button>
								<md-button type="submit" class="md-raised md-primary">Aplicar Filtro</md-button>
							  </div>
						  
				  </div>
				</md-drawer>

				<md-drawer class="md-right md-scrollbar" :md-active.sync="colaboramas">
					<div class="closecol">
						<md-button class="md-icon-button md-dense" @click="colaboramas=false">
						  <md-icon>close</md-icon>
						</md-button>
					</div>
					<div class="drawerlink">
					  <span class="md-title">??Quieres colaborar comprando o recomendando otros productos?</span>
					  <p class="drawerp1">Inserta un link de un producto aqu??:</p>
					  <form novalidate class="md-layout" @submit.prevent="validateLink()">
						<md-field :class="getValidationClass('link')">
							<label for="link">Link</label>
							<md-input name="link" id="link" v-model="link" :disabled="sendinglink"></md-input>
							<span class="md-error" v-if="!$v.link.required">Introduce un link</span>
							<span class="md-error" v-else-if="!$v.link.url">Link inv??lido (ej: https://www.amazon.es/...)</span>
						</md-field>
						
					 </form>
					 <md-button @click="validateLink()" class="md-primary md-raised" :disabled="sendinglink">Generar link</md-button>
					 <md-button class="md-accent" @click="tabhw='tab-gl';howworks=true">??C??mo funciona?</md-button>
					 <md-progress-bar md-mode="indeterminate" v-if="sendinglink"></md-progress-bar>
					  <div v-if="bitlink!=''" class="md-subheading" >
						<br>
						<p id="bitlink" class="block">{{bitlink}}</p>
						<md-button class="md-icon-button md-accent" @click="copybitlink()">
							<md-tooltip md-direction="top">Copiar</md-tooltip>
							<md-icon>content_copy</md-icon>
						</md-button>
						<md-button class="md-icon-button md-accent" :href="bitlink" target="_blank" rel="noreferrer">
							<md-tooltip md-direction="top">Abrir</md-tooltip>
							<md-icon>open_in_new</md-icon>
						</md-button>
					  </div>
					  <p v-if="bitlink!=''"><br>Gracias por tu ayuda! Ahora s??lo tienes que comprar a trav??s de este link. ??salo o comp??rtelo con quien quieras.</p>
					</div>

						<section class="subscription-details js-subscription-details is-invisible">
						  <pre><code class="js-subscription-json"></code></pre>
						  </section>
					<p class="drawerp2">Tambi??n puedes, antes de comprar, visitar las tiendas colaboradoras a trav??s de estos enlaces:</p>
				  <md-list>
						<md-list-item v-for="tie in tiendas" :href='tie.mainaff' target='_blank' rel='noreferrer'>
							<md-icon>store</md-icon>
							<span class='md-list-item-text'>{{tie.nombre}}</span>
							</md-list-item>
					</md-list>
				</md-drawer>
			  
			<md-content id="content" class="md-scrollbar md-layout">
				
				<md-progress-bar id="loader" class="md-accent" v-if="loading" md-mode="indeterminate" v-bind:class="{ 'loadertop': !navbar }"></md-progress-bar>
				
				
				<router-view v-on:snackbar="showsnackbar"></router-view>
				
				

				<md-dialog :md-active.sync="ppcdialog" class="textdialog" :md-close-on-esc="false" :md-click-outside-to-close="false">
					<md-dialog-content>
						<p class="md-title">Pol??tica de privacidad y cookies</p>
						<br>
						<p>Usamos cookies propias que nos permiten saber cuanta gente entra en la web y tambi??n guardar tus preferencias.</p>
						<br>
						<p>Para anal??ticas usamos Matomo, guardamos de forma an??nima qu?? ofertas miras y qu?? b??squedas haces para poder saber cuales son los intereses generales sobre las ofertas y productos que publicamos.</p>
						<br>
						<p>Intentamos guardar la m??nima informaci??n posible y debidamente anonimizada, buscando el mejor equilibrio entre la privacidad de nuestros usuarios y la recopilaci??n de datos relevantes para poder seguir mejorando. Aqu?? no vendemos datos ni informaci??n a terceros y la informaci??n es tratada solo de forma general.</p>
						<br>
						<p>Si continuas navegando, est??s aceptando nuestra <a href="javascript:void(0);" @click="tabppc='tab-pp';fullppcdialog=true;">Pol??tica de Privacidad</a>, y <a href="javascript:void(0);" @click="tabppc='tab-pc';fullppcdialog=true;">Pol??tica de Cookies</a>.</p>
						<br>
						<p class="md-caption">El equipo de Ofertas Xiaomi Fans Club</p>
					</md-dialog-content>
					<md-dialog-actions>
					  <md-button class="md-primary md-raised" @click="aceptedppc()">Aceptar</md-button>
					</md-dialog-actions>
			  </md-dialog>

				<md-dialog :md-active.sync="notifdialog" :md-fullscreen="false">
					<md-dialog-content>
							<p class="md-title">Notificaciones</p>
							<p class="md-subheading" v-if="notifactive==false">Si activas las notificaciones, recibir??s una notificaci??n de escritorio cuando salga una oferta nueva, siempre que tengas la p??gina web abierta (aunque sea en segundo plano y est??s haciendo otras cosas).</p>
							<br>
							<p class="md-subheading" v-if="notifperm=='default'">La primera vez que las actives tu navegador te preguntar?? si quieres permitir que esta web te env??e notificaciones.</p>
							<p class="md-subheading" v-if="notifactive==true">Tienes las notificaciones activas, recibir??s una notificaci??n cuando salga una oferta nueva, siempre que tengas la p??gina web abierta (aunque sea en segundo plano y est??s haciendo otras cosas).</p>
							<p class="md-subheading" v-if="notifperm=='denied'"><b>Has bloqueado las notificaciones desde esta web, no puedes cambiarlo hasta que no las actives. En la mayor??a de navegadores de escritorio se cambia pinchando al lado izquierdo de la URL (en el candado).</b></p>
					</md-dialog-content>
					<md-dialog-actions>
						<div v-if="notifactive==true"><md-button class="md-accent" @click="allownotif(false);notifdialog=false" v-if="notifperm!='denied'">Desactivar</md-button></div>
						<md-button class="md-primary" @click="notifdialog=false">Cancelar</md-button>
						<div v-if="notifactive==false"><md-button class="md-primary md-raised" @click="allownotif(true);notifdialog=false" v-if="notifperm!='denied'">Activar</md-button></div>
					</md-dialog-actions>
				</md-dialog>

				<md-dialog :md-active.sync="howworks" class="textdialog">
				  <div class="md-layout">
				  <md-tabs md-dynamic-height :md-active-tab="tabhw" class="md-primary md-scrollbar">
					<md-tab md-label="C??mo Funciona" id="tab-hw" class="md-scrollbar">
					  <p>Usando los enlaces a las ofertas de esta p??gina ayudas a seguir adelante a la comunidad de <a href="https://t.me/masquefans" target="_blank" rel="noreferrer">@masquefans</a>, una organizaci??n sin ??nimo de lucro que ayuda a usuarios de Xiaomi/MIUI con problemas o dudas que puedan tener.</p>
					  <br>
					  <p>Para mantener los servidores, organizar KDDs (reuniones en diferentes puntos de Espa??a con fans) y -cuando se puede- hacer sorteos, se necesita dinero, y esta es una forma de obtenerlo sin tener que pedir donaciones o m??todos m??s intrusivos como publicidad.</p>
					  <br>
					  <p>Tenemos colaboraciones con muchas tiendas en las que, si se compra a trav??s de los links de esta p??gina, recibimos una peque??a comisi??n.</p>
					  <br>
					  <p>Esas comisiones funcionan sobre cualquier producto que compr??is, por lo que aunque no compres ning??n producto Xiaomi, si vas a hacer una compra, puedes visitar las tiendas des del panel "Colabora+" y igualmente nos ayudar??s a seguir adelante. Des de ese mismo panel puedes generar links para compartirlos con familiares/amigos/conocidos para que compren a trav??s de ellos y a la vez colaboren.</p>
					  <br>
					  <p>Tambi??n hay que recordar que usar estos enlaces no implica ning??n gasto extra para t??, al contrario, recopilamos las mejores ofertas para que ahorres lo m??ximo posible a la vez que colaboras, es lo que se llamar??a un win-win. <b>Ganas t?? y nos ayudas a nosotros.</b></p>
					  <br>
					  <p>Muchas gracias por tu colaboraci??n! Y esperamos que disfrutes de las ofertas!</p>
					</md-tab>

					<md-tab md-label="Generador de Links" id="tab-gl" class="md-scrollbar">
					  <p>Para colaborar comprando o recomendando productos s??lo debes introducir un link en el campo indicado de la pesta??a "colabora+"</p>
					  <br>
					  <p>El link tiene que ser completo, por ejemplo: 'https://www.gearbest.com/...' y puede ser de cualquier p??gina de las tiendas que colaboran (las puedes ver en el mismo panel "colabora+"). No sirven los links acortados (bit.ly, amzn.to. goo.gl, etc.).</p>
					  <br>
					  <p>Una vez introducido el link, dale al bot??n "generar link", esto a??adir?? la informaci??n de afiliado a ese link.</p>
					  <br>
					  <p>Finalmente, comparte el enlace resultante con quien quieras, o guardalo para usarlo m??s adelante.</p>
					  <br>
					  <p><b>Muchas Gracias por colaborar.</b> Para m??s info consulta la pesta??a '??C??mo Funciona?' en la parte superior de este cuadro de di??logo.</p>
					</md-tab>
				  </md-tabs>
				</div>
				<md-dialog-actions>
				  <md-button class="md-primary" @click="howworks = false">Cerrar</md-button>
				</md-dialog-actions>
			  </md-dialog>

				<md-dialog :md-active.sync="fullppcdialog" class="textdialog fullppcdialog">
				  <div class="md-layout">
				  <md-tabs md-dynamic-height :md-active-tab="tabppc" class="md-primary">
					<md-tab md-label="Pol??tica Privacidad" id="tab-pp" class="md-scrollbar">
						<p class="md-headline">Pol??tica de Privacidad</p>
						<br>
						<p>A nosotros nos importa la privacidad de las personas que nos visitan, por ello no guardamos ninguna informaci??n que pueda identificar directamente a una persona (excepto si la facilita en el formulario de contacto), y nunca compartimos ning??n dato con terceros. Adem??s, hacemos todo lo posible para proteger los pocos datos que recopilamos y cumplir con la normativa de la GPDR.</p>
						<br>
						<p>(Y a partir de aqu?? nos tenemos que poner un poco t??cnicos porque el tema lo exige).</p>
						<br>
						<p>En esta pol??tica de privacidad informamos a los usuarios acerca de los datos personales que recopila esta asociaci??n en la p??gina web y c??mo se tratan de acuerdo a la Ley Org??nica 3/2018, de 5 de diciembre, de Protecci??n de Datos Personales y garant??a de los derechos digitales y el Reglamento (UE) 2016/679 del Parlamento Europeo y del Consejo de 27 de abril de 2016.</p>
						<br>

						<p class="md-title">Identificaci??n y datos de contacto del responsable</p>
						<br>
						<p>La organizaci??n <b>Asociaci??n Mi Fans Club</b>, domiciliada en la Calle M??dico Manero Moll??, n?? 16 5o Pta 7, (03001), Alicante, con N.I.F.: G42523019, tel??fono de contacto: +34 669639498 y correo electr??nico info@mifansclub.org. </p>
						<br>
						<p class="md-subheading">Datos que recogemos en la web</p>
						<p>La mayor??a de datos recabados no tienen la consideraci??n de datos personales. Aun as??, y en cumplimiento de la legislaci??n vigente y con la finalidad de otorgar al usuario la mayor transparencia posible procedemos a indiciar que datos son recabados y para que se usan los mismos.</p>
						<br>
						<p>El ??nico dato de car??cter personal que guardamos son las IP, pero de forma anonimizada, s??lo guardamos los primeros bits (ej. 192.198.X.X). De forma que es imposible asociarla a una persona.</p>
						<br>
						<p>Tambi??n guardamos qu?? ofertas visitas, y datos sobre el rendimiento de la carga de la web. Finalmente guardamos los enlaces que introduces en el formulario de ???colabora+??? y los datos que introduces en el formulario de contacto son enviados a un grupo privado de Telegram mediante un bot.</p>
						<br>

						<p class="md-title">Finalidades del tratamiento de sus datos personales</p>
						<br>
						<p>Los datos que recabamos son usados para:</p>
						<ul>
							<li>Para saber los intereses generales de los usuarios y poder saber qu?? productos u ofertas tienen m??s inter??s, con el objetivo de mejorar las publicaciones.</li>
							<li>Atender a las solicitudes, sugerencias, quejas e incidencias trasladadas a trav??s del formulario de contacto incorporado en la p??gina web. Los datos introducidos ah?? no se usar??n para nada m??s.</li>
							<li>Para saber los enlaces que se introducen en el formulario de ???colabora+???, para poder analizar de forma general cu??les son los productos y tiendas m??s introducidos.</li>
							<li>Tener una visi??n general de los comportamientos de los navegantes dentro de la web con el fin de detectar posibles ataques inform??ticos.</li>
							<li>Cumplir con las obligaciones legales que nos resulten directamente aplicables y regulen nuestra actividad.</li>
							<li>Para proteger y ejercer nuestros derechos o responder ante reclamaciones de cualquier ??ndole.</li>
						</ul>
						<br>

						<p class="md-title">Legitimaci??n del tratamiento</p>
						<br>
						<p>La base por la cual se sustenta el tratamiento de los datos de car??cter personal por parte de la organizaci??n, se encuentra amparada en:</p>
						<br>
						<p>El consentimiento del interesado para:</p>
						<ul>
							<li>Atender a las solicitudes, quejas e incidencias trasladadas a trav??s del formulario de contacto incorporado en la p??gina web.</li>
							<li>Analizar de forma general cu??les son los productos y tiendas m??s introducidos en el formulario de ???colabora+???.</li>
							<li>Usar los datos proporcionados para responder a las solicitudes, sugerencias, quejas e incidencias trasladadas a trav??s del formulario de contacto.</li>
						</ul>
						<p class="md-caption">La negativa a facilitar sus datos personales conllevara la imposibilidad de tratar sus datos con las finalidades mencionadas.</p>
						<br>
						<p>Inter??s legitimo del responsable del tratamiento:</p>
						<ul>
							<li>Entender el comportamiento del navegante dentro de la web con el fin de detectar posibles ataques inform??ticos.</li>
							<li>Para proteger y ejercer  nuestros derechos o responder ante posibles reclamaciones.</li>
						</ul>
						<br>
						<p>Obligaci??n legal aplicable al responsable del tratamiento:</p>
						<ul>
							<li>Cumplir con las obligaciones legales que nos resulten directamente aplicables y regulen nuestra actividad.</li>
						</ul>
						<p class="md-caption">En este caso, el interesado no podr?? negarse al tratamiento de los datos personales.</p>
						<br>

						<p class="md-title">Plazos o criterios de conservaci??n de los datos</p>
						<br>
						<p>Los datos personales proporcionados se conservar??n durante el tiempo necesario para cumplir con las finalidades para los que fueron recopilados inicialmente.</p>
						<br>
						<p>Una vez que los datos dejen de ser necesarios para el tratamiento en cuesti??n, estos se mantendr??n debidamente bloqueados para, en su caso, ponerlos a disposici??n de las Administraciones y Organismos P??blicas competentes, Jueces y Tribunales o el Ministerio Fiscal, de acuerdo al durante el plazo de prescripci??n de las acciones que pudieran derivarse de la relaci??n mantenida con el cliente y/o los plazos de conservaci??n previstos legalmente.</p>
						<br>

						<p class="md-title">Decisiones automatizadas y elaboraci??n de perfiles</p>
						<br>
						<p>La p??gina web no toma decisiones automatizadas ni elabora perfiles.</p>
						<br>

						<p class="md-title">Destinatarios</p>
						<br>
						<p>Durante el periodo de duraci??n del tratamiento de sus datos personales, la organizaci??n podr?? ceder sus datos a los siguientes destinatarios:</p>
						<ol>
							<li>Asociaci??n Mi Fans Club.</li>
							<p>Y en caso de que sean requeridos s??lo se ceder??n a:</p>
							<li>Fuerzas y Cuerpos de Seguridad del Estado.</li>
							<li>Jueces y Tribunales.</li>
							<li>En general, autoridades u organismos p??blicos competentes, cuando el responsable tenga la obligaci??n  legal de facilitar los datos personales.</li>
						</ol>
						<br>

						<p class="md-title">Transferencias internacionales de datos</p>
						<br>
						<p>Los datos son almacenados en Vultr Holdings Corporation, situada en los Pa??ses Bajos.</p>
						<br>
						<p>La organizaci??n realiza Transferencias Internacionales de Datos que cuentan con un nivel adecuado de protecci??n y todas las garant??as necesarias seg??n la normativa en protecci??n de datos puesto que Vultr participa en los marcos de Escudo de la privacidad UE-EE. UU. o Suiza EE. UU.</p>
						<br>

						<p class="md-title">Derechos</p>
						<br>
						<p>Los interesados podr??n ejercer en cualquier momento y de forma totalmente gratuita los derechos de acceso, rectificaci??n y supresi??n, as?? como solicitar que se limite el tratamiento de sus datos personales, oponerse al mismo, solicitar la portabilidad de estos (siempre que sea t??cnicamente posible) o retirar el consentimiento prestado.</p>
						<br>
						<p>Para ello podr?? emplear el formulario de contacto de la web, enviar un mensaje al correo info@mifansclub.org o bien enviar una carta a: Asociaci??n Mi Fans Club, Calle M??dico Manero Moll??, n?? 16 5o Pta 7, 03001 Alicante (Espa??a). En cualquier caso, se deber?? acreditar su identidad para poder proceder, por lo que en las comunicaciones se le pedir??n algunos datos.</p>
						<br>
						<p>En caso de que sienta vulnerados sus derechos en lo concerniente a la protecci??n de sus datos personales, especialmente cuando no haya obtenido satisfacci??n en el ejercicio de sus derechos, puede presentar una reclamaci??n ante la Autoridad de Control en materia de Protecci??n de Datos competente (Agencia Espa??ola de Protecci??n de Datos), a trav??s de su sitio web: www.agpd.es.</p>
						<br>

						<p class="md-title">Veracidad de los datos</p>
						<br>
						<p>El interesado garantiza que los datos aportados son verdaderos, exactos, completos y se encuentran actualizados; comprometi??ndose a informar de cualquier cambio respecto de los datos que aportara, por los canales habilitados al efecto e indicados en el punto uno de la presente pol??tica. Ser?? responsable de cualquier da??o o perjuicio, tanto directo como indirecto, que pudiera ocasionar como consecuencia del incumplimiento de la presente obligaci??n.</p>
						<br>
						<p>En el supuesto de que el usuario facilite datos de terceros, declara que cuenta con el consentimiento de los interesados y se compromete a trasladarle la informaci??n contenida en esta cl??usula, eximiendo a la organizaci??n de cualquier responsabilidad derivada por la falta de cumplimiento de la presente obligaci??n.</p>
						<br>
					</md-tab>

					<md-tab md-label="Pol??tica Cookies" id="tab-pc" class="md-scrollbar">
						<p class="md-headline">Pol??tica de Cookies</p>
						<br>
						<p>El objetivo de esta pol??tica es informar a los interesados de las cookies que emplea esta p??gina web, de conformidad con lo establecido en la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Informaci??n y de Comercio Electr??nico, y el Reglamento (UE) 2016/679 del Parlamento Europeo y del Consejo de 27 de abril de 2016.</p>
						<br>
						<p class="md-title">Uso de cookies. ??Qu?? son las cookies?</p>
						<br>
						<p>Las cookies son ficheros que se descargan en tu Ordenador, Smartphone o Tablet al acceder a determinadas p??ginas web. La utilizaci??n de cookies, ofrece numerosas ventajas en la prestaci??n de servicios de la Sociedad de la Informaci??n, puesto que, entre otras: (a) facilita la navegaci??n del usuario en el Sitio Web; (b) facilita al usuario el acceso a los diferentes servicios que ofrece el Sitio Web; (c) evita al usuario volver a configurar caracter??sticas generales predefinidas cada vez que accede al Sitio Web; (d) favorece la mejora del funcionamiento y de los servicios prestados a trav??s del Sitio Web, tras el correspondiente an??lisis de la informaci??n obtenida a trav??s de las cookies instaladas; (e) permiten a un Sitio Web, entre otras cosas, almacenar y recuperar informaci??n sobre los h??bitos de navegaci??n de un usuario o de su equipo y, dependiendo de la informaci??n que contengan y de la forma en que utilice su equipo, pueden utilizarse para reconocer al usuario.</p>
						<br>
						<p>La mayor??a de los navegadores aceptan como est??ndar a las cookies y, con independencia de las mismas, permiten o impiden en los ajustes de seguridad  las cookies temporales o memorizadas.</p>
						<br>
						<p>Ten en cuenta que para poder utilizar y contar con una mejor experiencia de navegaci??n,  es necesario que tengas habilitadas las cookies.</p>
						<br>
						<p>En caso de no querer recibir cookies, por favor, configure su navegador de internet, para que las borre del disco duro de su ordenador, las bloquee o le avise en su caso de instalaci??n de las mismas. Para m??s informaci??n consulta el apartado ???C??mo bloquear o eliminar las cookies instaladas???.</p>
						<br>
						
						<p class="md-title">??Qu?? tipos de cookies utiliza esta p??gina web?</p>
						<br>
						<p class="md-subheading">Cookies utilizadas en este sitio web</p>
						<p>Siguiendo las directrices de la Agencia Espa??ola de Protecci??n de Datos, a continuaci??n detallamos el uso de las cookies que esta p??gina web emplea,  con el fin de proporcionarle la m??xima informaci??n posible.</p>
						<br>
						<p class="md-subheading">Cookies Propias:</p>
						<p>Son aqu??llas que se env??an al equipo terminal del usuario desde un equipo o dominio gestionado por el propio editor y desde el que se presta el servicio solicitado por el usuario.</p>
						<br>
						<p>A continuaci??n la lista de las que utilizamos:</p>
						<table cellspacing="0" cellpadding="0">
							<tr>
								<th>Nombre</th>
								<th>Tipo</th>
								<th>Finalidad</th>
								<th>Duraci??n</th>
							</tr>
							<tr>
								<td>ppc</td>
								<td>Boolean</td>
								<td>Indica a la web si has aceptado la pol??tica de privacidad y cookies, para no volver a pregunt??rtelo</td>
								<td>1 a??o</td>
							</tr>
							<tr>
								<td>tkn</td>
								<td>Alfanum??rica</td>
								<td>Comprobar si el usuario es leg??timo o es un robot</td>
								<td>1 d??a</td>
							</tr>
							<tr>
								<td>_pk_id.1.XXXX<br>_pk_ses.1.XXXX</td>
								<td>Alfanum??rica</td>
								<td>Las cookies que usa nuestro panel de anal??ticas (Matomo) del que extraemos datos generales de uso de la web. Para m??s informaci??n consulta nuestra Pol??tica de Privacidad.</td>
								<td>30 d??as o menos</td>
							</tr>
						</table>
						<br>
						<p class="md-subheading">Cookies de Terceros:</p>
						<p>Son aquellas que se env??an al equipo terminal del usuario desde un equipo o dominio que no es gestionado por el editor, sino por otra entidad que trata los datos obtenidos trav??s de las cookies.</p>
						<br>
						<p>En esta web no usamos ninguna cookie de terceros.</p>
						<br>
						<p class="md-title">Consentimiento</p>
						<br>
						<p>En relaci??n con la utilizaci??n de cookies de este sitio web descritos en el apartado anterior, el usuario autoriza y consiente su uso de la siguiente forma: Cuando el usuario accede a cualquier p??gina de la web, ver?? un aviso donde se indica que la p??gina web de la Asociaci??n Mi Fans Club utiliza cookies, pudiendo el usuario aceptar o rechazar el uso de las mismas a trav??s de la configuraci??n de su navegador. Si el usuario no configura su navegador para que las cookies no se activen, al navegar por el sitio web de la Asociaci??n Mi Fans Club y utilizar sus servicios, el usuario acepta el uso que se hace de las cookies.</p>
						<br>
						<p class="md-title">C??mo bloquear o eliminar las cookies instaladas</p>
						<br>
						<p>Puede usted permitir, bloquear o eliminar las cookies instaladas en su equipo mediante la configuraci??n de las opciones de su navegador. Puede encontrar informaci??n sobre c??mo hacerlo, en relaci??n con los navegadores m??s comunes en los links que se incluyen a continuaci??n:</p>
						<ul>
							<li>Internet Explorer: https://support.microsoft.com/es-es/kb/278835</li>
							<li>Microsoft Edge: https://privacy.microsoft.com/es-es/windows-10-microsoft-edge-and-privacy</li>
							<li>Chrome:https://support.google.com/chrome/answer/95647?co=GENIE.Platform%3DDesktop&hl=esttp://support.google.com/chrome/bin/answer.py?hl=es&answer=95647</li>
							<li>Firefox: http://support.mozilla.org/es/kb/Borrar%20cookies</li>
							<li>Safari: http://support.apple.com/kb/ph5042</li>
						</ul>
						<p>Le informamos, no obstante, de la posibilidad de que la desactivaci??n de alguna cookie impida o dificulte la navegaci??n o la prestaci??n de los servicios ofrecidos en la p??gina web.</p>
						<br>
						<p class="md-title">Modificaciones</p>
						<br>
						<p>La presente pol??tica de cookies puede verse modificada en funci??n de las exigencias legales establecidas o con la finalidad de adaptar dicha pol??tica a las instrucciones dictadas por la Agencia Espa??ola de Protecci??n de Datos.</p>
						<br>
						<p>Por esta raz??n, aconsejamos a los usuarios que  visiten peri??dicamente nuestra pol??tica de cookies.</p>
						<br>
						<p>Cuando se produzcan cambios significativos en esta pol??tica, en la medida de nuestras posibilidades, comunicaremos a los usuarios estos cambios mediante un aviso en nuestra p??gina web. </p>
						<br>
						<p>Si tiene dudas acerca de esta pol??tica de cookies, puede contactar con la Asociaci??n Mi Fans Club a trav??s del correo electr??nico ofertasxiaomifans@gmail.com o el formulario de contacto en la web.</p>
					</md-tab>

					<md-tab md-label="Aviso Legal" id="tab-al" class="md-scrollbar">
						<p class="md-headline">Aviso Legal</p>
						<br>
						<p><b>Resumen:</b> Al usar nuestra p??gina web te comprometes a hacer un buen uso de ella, as?? como de sus herramientas y formularios. Todos los derechos sobre la propiedad industrial e intelectual de la p??gina web est??n reservados.</p>
						<br>
						<p>No garantizamos un correcto funcionamiento o la veracidad de los contenidos publicados (aunque nos esforzamos para que sea as??), ni somos responsables de las consecuencias que se puedan derivar tanto por problemas internos como por problemas externos o en las webs enlazadas (p. ej. tiendas online). De todos modos, si detectas alg??n problema/incidencia puedes contactarnos mediante el formulario de contacto o el grupo de Telegram <a href="https://t.me/masquefans" target="_blank" rel="noreferrer">@masquefans</a> e internaremos arreglarlo o ayudarte.</p>
						<br>
						<p class="md-title">Datos identificativos</p>
						<br>
						<p>Usted est?? visitando la p??gina web https://oxmf.club titularidad de la ASOCIACION MI FANS CLUB con domicilio social en M??DICO MANERO MOLLA 16 5 PTA 7 03001 ALICANTE, con N.I.F. G42523019, inscrita en el Registro Nacional de Asociaciones en Secci??n 1 N??mero Nacional 613651 , y con C.I.F. G42523019 , en adelante EL TITULAR.</p>
						<br>
						<p>Puede contactar con el TITULAR por cualquiera de los siguientes medios:</p>
						<ul>
							<li>Tel??fono: 669639498</li>
							<li>Correo electr??nico de contacto: info@mifansclub.org</li>
						</ul>
						<br>
						<p class="md-title">Hospedaje web</p>
						<br>
						<p>Vultr.com<br>
						14 Cliffwood Ave <br>
						Suite 300, Metropark South <br>
						Matawan, NJ 07747 <br>
						Forma de contacto: https://www.vultr.com/company/contact/
						</p>
						<br>
						<p class="md-title">Usuarios</p>
						<br>
						<p>Las presentes condiciones (en adelante Aviso Legal) tiene por finalidad regular el uso de la p??gina web de EL TITULAR que pone a disposici??n del p??blico.</p>
						<br>
						<p>El acceso y/o uso de esta p??gina web atribuye la condici??n de USUARIO, que acepta, desde dicho acceso y/o uso, las condiciones generales de uso aqu?? reflejadas. Las citadas condiciones ser??n de aplicaci??n independientemente de las condiciones generales de contrataci??n que en su caso resulten de obligado cumplimiento.</p>
						<br>

						<p class="md-title">Uso del portal</p>
						<br>
						<p>https://oxmf.club/ proporciona el acceso a multitud de servicios, informaci??n, programas o datos (en adelante, ???los contenidos???) en Internet pertenecientes a EL TITULAR o a sus licenciantes a los que el USUARIO puede tener acceso.</p>
						<br>
						<p>El usuario asume la responsabilidad del uso del portal. Dicha responsabilidad se extiende al uso del generador de enlaces y el formulario de contacto. En el formulario el USUARIO ser?? responsable de aportar informaci??n veraz y l??cita para poder resolver sus dudas/sugerencias/reclamaciones.</p>
						<br>
						<p>El USUARIO se compromete a hacer un uso adecuado de los contenidos y servicios que EL TITULAR ofrece a trav??s de su portal y con car??cter enunciativo pero no limitativo, a no emplearlos para:</p>
						<ul>
							<li>Incurrir en actividades il??citas, ilegales o contrarias a la buena fe y al orden p??blico.</li>
							<li>Provocar da??os en los sistemas f??sicos y l??gicos de la Asociaci??n Mi Fans Club o de terceras personas, introducir o difundir en la red virus inform??ticos o cualesquiera otros sistemas f??sicos o l??gicos que sean susceptibles de provocar los da??os anteriormente mencionados.</li>
							<li>Reportar de forma malintencionada y recurrente errores en contenidos publicados que no contengan dichos errores.</li>
							<li>Usar de manera desproporcionada el generador de enlaces afiliados (a partir de 50 solicitudes/d??a por persona podr??a considerarse desproporcionado).</li>
							<li>Utilizar el sitio web ni la informaci??n que ??ste contiene con fines comerciales, pol??ticos, publicitarios y para cualquier uso comercial. Esto tambi??n incluye no compartir de forma automatizada los contenidos que se publican sin que estos dirijan a nuestra web.</li>
						</ul>
						<br>
						<p class="md-title">Protecci??n de datos</p>
						<br>
						<p>Todo lo relativo a la pol??tica de protecci??n de datos se encuentra recogido en la pesta??a de pol??tica de privacidad.</p>
						<br>

						<p class="md-title">Contenidos: Propiedad intelectual e industrial</p>
						<br>
						<p>EL TITULAR es propietario de todos los derechos de propiedad intelectual e industrial de su p??gina web, as?? como de los elementos contenidos en la misma (a t??tulo enunciativo: im??genes, fotograf??as, sonido, audio, v??deo, software o textos; marcas o logotipos, combinaciones de colores, estructura y dise??o, selecci??n de materiales usados, programas de ordenador necesarios para su funcionamiento, acceso y uso, etc.), titularidad del TITULAR o bien de sus licenciantes.</p>
						<br>
						<p>Todos los derechos reservados. En virtud de lo dispuesto en los art??culos 8 y 32.1, p??rrafo segundo, de la Ley de Propiedad Intelectual, quedan expresamente prohibidas la reproducci??n, la distribuci??n y la comunicaci??n p??blica, incluida su modalidad de puesta a disposici??n, de la totalidad o parte de los contenidos de esta p??gina web, con fines comerciales, en cualquier soporte y por cualquier medio t??cnico, sin la autorizaci??n del TITULAR.</p>
						<br>

						<p class="md-title">Exclusi??n de garant??as y responsabilidad</p>
						<br>
						<p>EL USUARIO reconoce que la utilizaci??n de la p??gina web y de sus contenidos y servicios se desarrolla bajo su exclusiva responsabilidad. En concreto, a t??tulo meramente enunciativo, EL TITULAR no asume ninguna responsabilidad en los siguientes ??mbitos:</p>
						<ol>
							<li>La disponibilidad del funcionamiento de la p??gina web, sus servicios y contenidos y su calidad o interoperabilidad.</li>
							<li>La finalidad para la que la p??gina web sirva a los objetivos del USUARIO.</li>
							<li>La infracci??n de la legislaci??n vigente por parte del USUARIO o terceros y, en concreto, de los derechos de propiedad intelectual e industrial que sean titularidad de otras personas o entidades.</li>
							<li>La existencia de c??digos maliciosos o cualquier otro elemento inform??tico da??ino que pudiera causar el sistema inform??tico del USUARIO o de terceros. Corresponde al USUARIO, en todo caso, disponer de herramientas adecuadas para la detecci??n y desinfecci??n de estos elementos.</li>
							<li>El acceso fraudulento a los contenidos o servicios por terceos no autorizados, o, en su caso, la captura, eliminaci??n, alteraci??n, modificaci??n o manipulaci??n de los mensajes y comunicaciones de cualquier clase que dichos terceros pudiera realizar.</li>
							<li>La exactitud, veracidad, actualidad y utilidad de los contenidos y servicios ofrecidos y la utilizaci??n posterior que de ellos haga el USUARIO. EL TITULAR emplear?? todos los esfuerzos y medios razonables para facilitar la informaci??n actualizada y fehaciente.</li>
							<li>Los da??os producidos a equipos inform??ticos durante el acceso a la p??gina web y los da??os producidos a los USUARIOS cuando tengan su origen en fallos o desconexiones en las redes de telecomunicaciones que interrumpan el servicio.</li>
							<li>Los da??os o perjuicios que se deriven de circunstancias acaecidas por caso fortuito o fuerza mayor.</li>
							<li>El TITULAR no se hace responsable del contenido de los mensajes enviados por el USUARIO.</li>
						</ol>
						<br>

						<p class="md-title">Modificaci??n de este aviso legal y duraci??n</p>
						<br>
						<p>EL TITULAR se reserva el derecho de efectuar sin previo aviso las modificaciones que considere oportunas en su portal, pudiendo cambiar, suprimir o a??adir tantos contenidos y servicios que se presten a trav??s de la misma, como la forma en la que ??stos aparezcan representados o localizados en su portal.</p>
						<br>
						<p>La vigencia de las citadas condiciones ir?? en funci??n de su exposici??n y estar??n vigentes hasta que sean modificadas por otras debidamente publicadas.</p>
						<br>

						<p class="md-title">Enlaces</p>
						<br>
						<p>En los enlaces o hiperv??nculos hacia otros sitios de Internet publicados en https://oxmf.club/, EL TITULAR no ejercer?? ning??n tipo de control sobre dichos sitios y contenidos. En ning??n caso EL TITULAR asumir?? responsabilidad alguna por los contenidos de alg??n enlace perteneciente a un sitio web ajeno, ni garantizar?? la disponibilidad t??cnica, calidad, fiabilidad, exactitud, amplitud, veracidad, validez y constitucionalidad de cualquier materia o informaci??n contenida en ninguno de dichos hiperv??nculos y otros sitios en Internet. Igualmente, la inclusi??n de estas conexiones externas no implicar?? ning??n tipo de asociaci??n, fusi??n o participaci??n con las entidades conectadas. Los problemas que puedan surgir ser??n responsabilidad de estos sitios ajenos, y en ning??n caso del TITULAR.</p>
						<br>

						<p class="md-title">Derechos de exclusi??n</p>
						<br>
						<p>EL TITULAR ser reserva el derecho a denegar o retirar el acceso a portal y/o los servicios ofrecidos sin necesidad de advertencia previa, a instancia propia o de un tercero, a aquellos usuarios que incumplan el contenido de este aviso legal.</p>
						<br>

						<p class="md-title">Generalidades</p>
						<br>
						<p>EL TITULAR perseguir?? el incumplimiento de las presentes condiciones as?? como cualquier utilizaci??n indebida de su portal ejerciendo todas las acciones civiles y penales que le puedan corresponder en derecho.</p>
						<br>

						<p class="md-title">Legislaci??n aplicable y jurisdicci??n</p>
						<br>
						<p>La relaci??n entre EL TITULAR y EL USUARIO se regir?? por la normativa espa??ola vigente. Todas las disputas y reclamaciones derivadas de este aviso legal se resolver??n por los juzgados y tribunales espa??oles.</p>
						<br>

						<p class="md-title">Menores de edad</p>
						<br>
						<p>https://oxmf.club/ dirige sus servicios a usuarios mayores de 18 a??os. Los menores de esta edad no est??n autorizados a utilizar nuestros servicios y no deber??n, por tanto, enviarnos sus datos personales. Informamos de que, si se da tal circunstancia, la Asociaci??n Mi Fans Club no se hace responsable de las posibles consecuencias que pudieran derivarse del incumplimiento del aviso que en esta cl??usula se establece. </p>
						
					</md-tab>
				  </md-tabs>
				</div>
				<md-dialog-actions>
				  <md-button class="md-primary" @click="fullppcdialog = false">Cerrar</md-button>
				</md-dialog-actions>
			  </md-dialog>

			  <md-dialog :md-active.sync="helpdial" class="textdialog consejosdialog">
				  <div class="md-layout">
				  <md-tabs md-dynamic-height :md-active-tab="tabhp" class="md-primary">
					<md-tab md-label="Comprar" id="tab-com" class="md-scrollbar">
					  <p class="md-title">Comprar de forma segura</p>
					  <p>En base a nuestra experiencia, la forma m??s segura de comprar por internet es mediante Paypal, que te ofrece una garant??a extra en tu compra (en caso que que no llegue, que llegue defectuoso o equivocado, etc.), y es completamente gratuito.</p>
					  <br>
					  <p>Si no quieres usar Paypal, es importante que si pagas con tarjeta bancaria, compres s??lo en tiendas que tengan cierta reputaci??n. De todos modos, comprando de este modo tendr??s muchas menos posibilidades de recuperar el dinero si no llega el producto de forma correcta.</p>
					  <br>
					  <p>Por otro lado hay tiendas como Amazon en las que no se admite PayPal, en el caso de Amazon es una tienda con mucha reputaci??n.</p>
					</md-tab>

					<md-tab md-label="Envio/Garant??a" id="tab-eg" class="md-scrollbar">
						<p class="md-title">Env??os y garant??as</p>
					  <p>En esta web puedes encontrar muchas ofertas y te recomendamos que te fijes bien en los plazos de env??o y garant??a.</p>
					  <br>
					  <p>Para los env??os hay diversos tipos disponibles. Los m??s r??pidos suelen ser los env??os desde Espa??a, seguidos por los env??os desde almacenes europeos. Y los m??s lentos suelen ser los env??os desde almacenes en China y HongKong (de 7 a 60 d??as laborales, aunque muchas veces suelen llegar entre los 9 y los 15 d??as).</p>
					  <br>
					  <p>Los env??os dependen mucho de cada tienda y almac??n por lo que te recomendamos que revises bien los plazos antes de comprar. Ten en cuenta que al tiempo de env??o normalmente se le tiene que a??adir cierto tiempo de procesamiento del paquete en el almac??n. Los plazos de entrega suelen ser estimados, y dependen en ocasiones de festividades y otros tipos de condiciones. Por lo que si est??s pensando en comprar un producto para una fecha en concreto, te aconsejamos que lo hagas con bastante tiempo de antelaci??n.</p>
					  <br>
					  <p>Para la <b>garant??a</b> de los productos que compres, si compras en china te suelen indicar que la garant??a es de un a??o, sin embargo esta garant??a suele ser muy dif??cil de tramitar y a la hora de la verdad suele ser inexistente. En este caso si algo va mal pasada una semana de la recepci??n del paquete normalmente la ??nica opci??n es buscar una tienda local o alguien que te lo arregle, cubriendo t?? los costes.</p>
					  <br>
					  <p>Por otro lado hay los vendedores autorizados de Xiaomi en Espa??a, que ofrecen garant??a de 2 a??os en Espa??a. Estas tiendas suelen tener los m??viles y gadgats m??s caros. En este caso podemos encontrar Amazon*, Aliexpress*, MediaMarkt y PCcomponentes.</p>
					  <p><small>*S??lo las tiendas autorizadas dentro de estos. En el caso de Aliexpress s??lo en Aliexpress plaza.</small></p>
					</md-tab>

					<md-tab md-label="Ofertas" id="tab-of" class="md-scrollbar">
						<p class="md-title">Ofertas y Cupones</p>
					  <p>Por nuestra parte, y sin duda tambi??n como compradores, intentamos buscar las mejores ofertas y precios en toda la web, lo que no indica que conozcamos de primera mano todas las tiendas y su gesti??n.</p>
					  <br>
					  <p>Muchas de las ofertas permanecen cierto tiempo, pero otras duran horas o incluso minutos. En otros casos los cupones tienen un n??mero limitado de usos y seg??n el inter??s que haya en esa oferta los usos se pueden agotar en poco tiempo, por eso, si no eres r??pido, puede ser que ya no puedas conseguirlo al precio de la oferta.</p>
					  <br>
					  <p>Has de saber tambi??n, que en caso de dudas, o que busques un producto concreto de los no habituales, estamos a tu disposici??n y te ayudaremos a encontrar lo que buscas.</p>
					  <br>
					  <p>Si tienes dudas sobre cualquier oferta, hay alguna oferta reciente que encuentres agotada, o quieres que te ayudemos en cualquier otro tema relacionado con las ofertas nos puedes encontrar en Telegram <a href="https://t.me/masquefans" target="_blank" rel="noreferrer">@masquefans</a>.</p>
					  <br>
					</md-tab>
				  </md-tabs>
				</div>
				<md-dialog-actions>
				  <md-button class="md-primary" @click="helpdial = false">Cerrar</md-button>
				</md-dialog-actions>
			  </md-dialog>
			  <md-dialog :md-active.sync="aboutdialog" >
				<div class="sendmsgprogress">
					<md-progress-bar md-mode="indeterminate" v-if="sendingmsg==1"></md-progress-bar>
				</div>
				
					
				<md-dialog-title>Contacta</md-dialog-title>
				
				<md-dialog-content class="md-scrollbar">
					<p class="md-subheading">Esta web la ha desarrollado MarcMC, con la colaboraci??n del staff de <a href="https://t.me/masquenoticias" target="_blank" rel="noreferrer">@masquenoticias</a>. Puedes encontrarnos tambi??n en el grupo de Telegram <a href="https://t.me/masquefans" target="_blank" rel="noreferrer">@masquefans</a> o bien <a href="https://t.me/marcmc" target="_blank" rel="noreferrer">@marcmc</a>. Tambi??n puedes contactar enviando un mensaje al equipo de oxmf.club:</p>
					<br>
					<form novalidate @submit.prevent="validateContact()" v-if="sendingmsg!=2">
						<md-field :class="getValidationClass('email')">
							<label for="email">Tu email</label>
							<md-input name="email" id="email" v-model="email" :disabled="sendingmsg==1"></md-input>
							<span class="md-error" v-if="!$v.email.required">Introduce un email</span>
							<span class="md-error" v-else-if="!$v.email.email">Email inv??lido</span>
						</md-field>
						<md-field :class="getValidationClass('subject')">
							<label for="subject">Asunto</label>
							<md-input name="subject" id="subject" v-model="subject" :disabled="sendingmsg==1"></md-input>
							<span class="md-error" v-if="!$v.subject.required">Introduce un asunto</span>
						</md-field>
						<md-field :class="getValidationClass('message')">
							<label for="message">Mensaje</label>
							<md-textarea name="message" id="message" v-model="message" :disabled="sendingmsg==1"></md-textarea>
							<span class="md-error" v-if="!$v.message.required">Escribe un mensaje</span>
						</md-field>
						
						<p class="md-caption">Los datos aportados se enviar??n directamente a un grupo privado de  <a href="https://telegram.org/" target="_blank" rel="noreferrer">Telegram</a>. No ser??n usados para nada m??s que para responder a tu petici??n.</p>
					</form>
					
					<p class="md-subheading" v-if="sendingmsg==2"><b>Mensaje enviado ??Gracias por contactar!</b></p>

				</md-dialog-content>
				<md-dialog-actions>
					<md-button class="md-primary" @click="aboutdialog=false">Cerrar</md-button>
					<md-button @click="validateContact()" class="md-primary md-raised" :disabled="sendingmsg==1" v-if="sendingmsg!=2">Enviar</md-button>
				</md-dialog-actions>
					
			   </md-dialog>



			   <md-dialog :md-active.sync="promo.dialog" class="promodialog">
				<div class="md-scrollbar">
				<img v-bind:src="promo.img" class="promodialogimg">
				<div v-html="promo.text"></div>

				<p class="md-caption">El equipo de Ofertas Xiaomi Fans Club</p>
				<md-dialog-actions>
					<md-button class="md-primary" @click="promo.dialog=false;helpdial=true">Consejos de compra</md-button>
					<md-button class="md-primary" @click="promo.dialog=false">Cerrar</md-button>
				</md-dialog-actions>
				</div>
			   </md-dialog>

				

			</md-content>
		<md-snackbar md-position="center" v-bind:class="{ error: snackbar.error }" :md-duration="snackbar.duration" :md-active.sync="snackbar.active" md-persistent><span>{{snackbar.content}}</span></md-snackbar>

		<transition name="netstatus">
			<div id="netstatus" v-bind:class="network.error ? 'neterr' : 'netgood'" v-if="network.snackactive">
				<div v-if="network.error">
					<md-icon>signal_wifi_off</md-icon>
					&nbsp;No tienes conexi??n
				</div>
				<div v-else>
					<md-icon>signal_wifi_4_bar</md-icon>
					&nbsp;Vuelves a tener conexi??n
				</div>
			</div>
		</transition>
	</div>
	
	<script src="js/vue.min.js"></script>
	<script src="js/vue-material.min.js"></script>
	<script src="js/vue-router.js"></script>
	<script src="js/vue-dragscroll.min.js"></script>

	<script src="js/vuelidate.min.js"></script>
	<script src="js/validators.min.js"></script>
	<script src="js/chart.min.js" defer></script>

	<script src="js/comp/ofertas.js"></script>
	<script src="js/comp/detalles.js"></script>
	<script src="js/comp/footer.js"></script>
	<script src="js/comp/ofertacard.js"></script>

	<script src="js/jquery.lazy.min.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/jquery.easing.1.3.js" defer></script>
	<script src="js/ramjet.js"></script>
	
</body>
</html>