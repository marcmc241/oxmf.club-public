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
				<noscript><p class="noscript">Esta página necesita JavaScript para mostrarse correctamente. Por favor, permite la ejecución de JavaScript.</p></noscript>
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
								<label for="categoria">Categoría</label>
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
								<label for="envio">Envío</label>
								<md-select v-model="filtro.envios" name="envio" multiple>
								  <md-option v-for="env in envios" :value="env.IdEnvio" :key="env.IdEnvio">{{env.nombre}}</md-option>
								</md-select>
							  </md-field>
							  <md-field>
								<label for="garantia">Garantía</label>
								<md-select v-model="filtro.garantias" name="garantia" multiple>
								  <md-option v-for="gar in garantias" :value="gar.IdGarantia" :key="gar.IdGarantia">{{gar.nombre}}</md-option>
								</md-select>
							  </md-field>
							  <div class="filterprice">
								<span class="block filterpricetext">Precio entre </span>
								<span class="block">
									<md-field class="price">
									  <label>Mínimo</label>
									  <md-input v-model="filtro.min" type="number"></md-input>
									  <md-icon>euro_symbol</md-icon>
									</md-field>
								</span>
								<span class="block filterpricetext">y </span>
								<span class="block">
									<md-field class="price">
									  <label>Máximo</label>
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
					  <span class="md-title">¿Quieres colaborar comprando o recomendando otros productos?</span>
					  <p class="drawerp1">Inserta un link de un producto aquí:</p>
					  <form novalidate class="md-layout" @submit.prevent="validateLink()">
						<md-field :class="getValidationClass('link')">
							<label for="link">Link</label>
							<md-input name="link" id="link" v-model="link" :disabled="sendinglink"></md-input>
							<span class="md-error" v-if="!$v.link.required">Introduce un link</span>
							<span class="md-error" v-else-if="!$v.link.url">Link inválido (ej: https://www.amazon.es/...)</span>
						</md-field>
						
					 </form>
					 <md-button @click="validateLink()" class="md-primary md-raised" :disabled="sendinglink">Generar link</md-button>
					 <md-button class="md-accent" @click="tabhw='tab-gl';howworks=true">¿Cómo funciona?</md-button>
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
					  <p v-if="bitlink!=''"><br>Gracias por tu ayuda! Ahora sólo tienes que comprar a través de este link. Úsalo o compártelo con quien quieras.</p>
					</div>

						<section class="subscription-details js-subscription-details is-invisible">
						  <pre><code class="js-subscription-json"></code></pre>
						  </section>
					<p class="drawerp2">También puedes, antes de comprar, visitar las tiendas colaboradoras a través de estos enlaces:</p>
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
						<p class="md-title">Política de privacidad y cookies</p>
						<br>
						<p>Usamos cookies propias que nos permiten saber cuanta gente entra en la web y también guardar tus preferencias.</p>
						<br>
						<p>Para analíticas usamos Matomo, guardamos de forma anónima qué ofertas miras y qué búsquedas haces para poder saber cuales son los intereses generales sobre las ofertas y productos que publicamos.</p>
						<br>
						<p>Intentamos guardar la mínima información posible y debidamente anonimizada, buscando el mejor equilibrio entre la privacidad de nuestros usuarios y la recopilación de datos relevantes para poder seguir mejorando. Aquí no vendemos datos ni información a terceros y la información es tratada solo de forma general.</p>
						<br>
						<p>Si continuas navegando, estás aceptando nuestra <a href="javascript:void(0);" @click="tabppc='tab-pp';fullppcdialog=true;">Política de Privacidad</a>, y <a href="javascript:void(0);" @click="tabppc='tab-pc';fullppcdialog=true;">Política de Cookies</a>.</p>
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
							<p class="md-subheading" v-if="notifactive==false">Si activas las notificaciones, recibirás una notificación de escritorio cuando salga una oferta nueva, siempre que tengas la página web abierta (aunque sea en segundo plano y estés haciendo otras cosas).</p>
							<br>
							<p class="md-subheading" v-if="notifperm=='default'">La primera vez que las actives tu navegador te preguntará si quieres permitir que esta web te envíe notificaciones.</p>
							<p class="md-subheading" v-if="notifactive==true">Tienes las notificaciones activas, recibirás una notificación cuando salga una oferta nueva, siempre que tengas la página web abierta (aunque sea en segundo plano y estés haciendo otras cosas).</p>
							<p class="md-subheading" v-if="notifperm=='denied'"><b>Has bloqueado las notificaciones desde esta web, no puedes cambiarlo hasta que no las actives. En la mayoría de navegadores de escritorio se cambia pinchando al lado izquierdo de la URL (en el candado).</b></p>
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
					<md-tab md-label="Cómo Funciona" id="tab-hw" class="md-scrollbar">
					  <p>Usando los enlaces a las ofertas de esta página ayudas a seguir adelante a la comunidad de <a href="https://t.me/masquefans" target="_blank" rel="noreferrer">@masquefans</a>, una organización sin ánimo de lucro que ayuda a usuarios de Xiaomi/MIUI con problemas o dudas que puedan tener.</p>
					  <br>
					  <p>Para mantener los servidores, organizar KDDs (reuniones en diferentes puntos de España con fans) y -cuando se puede- hacer sorteos, se necesita dinero, y esta es una forma de obtenerlo sin tener que pedir donaciones o métodos más intrusivos como publicidad.</p>
					  <br>
					  <p>Tenemos colaboraciones con muchas tiendas en las que, si se compra a través de los links de esta página, recibimos una pequeña comisión.</p>
					  <br>
					  <p>Esas comisiones funcionan sobre cualquier producto que compréis, por lo que aunque no compres ningún producto Xiaomi, si vas a hacer una compra, puedes visitar las tiendas des del panel "Colabora+" y igualmente nos ayudarás a seguir adelante. Des de ese mismo panel puedes generar links para compartirlos con familiares/amigos/conocidos para que compren a través de ellos y a la vez colaboren.</p>
					  <br>
					  <p>También hay que recordar que usar estos enlaces no implica ningún gasto extra para tí, al contrario, recopilamos las mejores ofertas para que ahorres lo máximo posible a la vez que colaboras, es lo que se llamaría un win-win. <b>Ganas tú y nos ayudas a nosotros.</b></p>
					  <br>
					  <p>Muchas gracias por tu colaboración! Y esperamos que disfrutes de las ofertas!</p>
					</md-tab>

					<md-tab md-label="Generador de Links" id="tab-gl" class="md-scrollbar">
					  <p>Para colaborar comprando o recomendando productos sólo debes introducir un link en el campo indicado de la pestaña "colabora+"</p>
					  <br>
					  <p>El link tiene que ser completo, por ejemplo: 'https://www.gearbest.com/...' y puede ser de cualquier página de las tiendas que colaboran (las puedes ver en el mismo panel "colabora+"). No sirven los links acortados (bit.ly, amzn.to. goo.gl, etc.).</p>
					  <br>
					  <p>Una vez introducido el link, dale al botón "generar link", esto añadirá la información de afiliado a ese link.</p>
					  <br>
					  <p>Finalmente, comparte el enlace resultante con quien quieras, o guardalo para usarlo más adelante.</p>
					  <br>
					  <p><b>Muchas Gracias por colaborar.</b> Para más info consulta la pestaña '¿Cómo Funciona?' en la parte superior de este cuadro de diálogo.</p>
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
					<md-tab md-label="Política Privacidad" id="tab-pp" class="md-scrollbar">
						<p class="md-headline">Política de Privacidad</p>
						<br>
						<p>A nosotros nos importa la privacidad de las personas que nos visitan, por ello no guardamos ninguna información que pueda identificar directamente a una persona (excepto si la facilita en el formulario de contacto), y nunca compartimos ningún dato con terceros. Además, hacemos todo lo posible para proteger los pocos datos que recopilamos y cumplir con la normativa de la GPDR.</p>
						<br>
						<p>(Y a partir de aquí nos tenemos que poner un poco técnicos porque el tema lo exige).</p>
						<br>
						<p>En esta política de privacidad informamos a los usuarios acerca de los datos personales que recopila esta asociación en la página web y cómo se tratan de acuerdo a la Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y garantía de los derechos digitales y el Reglamento (UE) 2016/679 del Parlamento Europeo y del Consejo de 27 de abril de 2016.</p>
						<br>

						<p class="md-title">Identificación y datos de contacto del responsable</p>
						<br>
						<p>La organización <b>Asociación Mi Fans Club</b>, domiciliada en la Calle Médico Manero Mollá, nº 16 5o Pta 7, (03001), Alicante, con N.I.F.: G42523019, teléfono de contacto: +34 669639498 y correo electrónico info@mifansclub.org. </p>
						<br>
						<p class="md-subheading">Datos que recogemos en la web</p>
						<p>La mayoría de datos recabados no tienen la consideración de datos personales. Aun así, y en cumplimiento de la legislación vigente y con la finalidad de otorgar al usuario la mayor transparencia posible procedemos a indiciar que datos son recabados y para que se usan los mismos.</p>
						<br>
						<p>El único dato de carácter personal que guardamos son las IP, pero de forma anonimizada, sólo guardamos los primeros bits (ej. 192.198.X.X). De forma que es imposible asociarla a una persona.</p>
						<br>
						<p>También guardamos qué ofertas visitas, y datos sobre el rendimiento de la carga de la web. Finalmente guardamos los enlaces que introduces en el formulario de “colabora+” y los datos que introduces en el formulario de contacto son enviados a un grupo privado de Telegram mediante un bot.</p>
						<br>

						<p class="md-title">Finalidades del tratamiento de sus datos personales</p>
						<br>
						<p>Los datos que recabamos son usados para:</p>
						<ul>
							<li>Para saber los intereses generales de los usuarios y poder saber qué productos u ofertas tienen más interés, con el objetivo de mejorar las publicaciones.</li>
							<li>Atender a las solicitudes, sugerencias, quejas e incidencias trasladadas a través del formulario de contacto incorporado en la página web. Los datos introducidos ahí no se usarán para nada más.</li>
							<li>Para saber los enlaces que se introducen en el formulario de “colabora+”, para poder analizar de forma general cuáles son los productos y tiendas más introducidos.</li>
							<li>Tener una visión general de los comportamientos de los navegantes dentro de la web con el fin de detectar posibles ataques informáticos.</li>
							<li>Cumplir con las obligaciones legales que nos resulten directamente aplicables y regulen nuestra actividad.</li>
							<li>Para proteger y ejercer nuestros derechos o responder ante reclamaciones de cualquier índole.</li>
						</ul>
						<br>

						<p class="md-title">Legitimación del tratamiento</p>
						<br>
						<p>La base por la cual se sustenta el tratamiento de los datos de carácter personal por parte de la organización, se encuentra amparada en:</p>
						<br>
						<p>El consentimiento del interesado para:</p>
						<ul>
							<li>Atender a las solicitudes, quejas e incidencias trasladadas a través del formulario de contacto incorporado en la página web.</li>
							<li>Analizar de forma general cuáles son los productos y tiendas más introducidos en el formulario de “colabora+”.</li>
							<li>Usar los datos proporcionados para responder a las solicitudes, sugerencias, quejas e incidencias trasladadas a través del formulario de contacto.</li>
						</ul>
						<p class="md-caption">La negativa a facilitar sus datos personales conllevara la imposibilidad de tratar sus datos con las finalidades mencionadas.</p>
						<br>
						<p>Interés legitimo del responsable del tratamiento:</p>
						<ul>
							<li>Entender el comportamiento del navegante dentro de la web con el fin de detectar posibles ataques informáticos.</li>
							<li>Para proteger y ejercer  nuestros derechos o responder ante posibles reclamaciones.</li>
						</ul>
						<br>
						<p>Obligación legal aplicable al responsable del tratamiento:</p>
						<ul>
							<li>Cumplir con las obligaciones legales que nos resulten directamente aplicables y regulen nuestra actividad.</li>
						</ul>
						<p class="md-caption">En este caso, el interesado no podrá negarse al tratamiento de los datos personales.</p>
						<br>

						<p class="md-title">Plazos o criterios de conservación de los datos</p>
						<br>
						<p>Los datos personales proporcionados se conservarán durante el tiempo necesario para cumplir con las finalidades para los que fueron recopilados inicialmente.</p>
						<br>
						<p>Una vez que los datos dejen de ser necesarios para el tratamiento en cuestión, estos se mantendrán debidamente bloqueados para, en su caso, ponerlos a disposición de las Administraciones y Organismos Públicas competentes, Jueces y Tribunales o el Ministerio Fiscal, de acuerdo al durante el plazo de prescripción de las acciones que pudieran derivarse de la relación mantenida con el cliente y/o los plazos de conservación previstos legalmente.</p>
						<br>

						<p class="md-title">Decisiones automatizadas y elaboración de perfiles</p>
						<br>
						<p>La página web no toma decisiones automatizadas ni elabora perfiles.</p>
						<br>

						<p class="md-title">Destinatarios</p>
						<br>
						<p>Durante el periodo de duración del tratamiento de sus datos personales, la organización podrá ceder sus datos a los siguientes destinatarios:</p>
						<ol>
							<li>Asociación Mi Fans Club.</li>
							<p>Y en caso de que sean requeridos sólo se cederán a:</p>
							<li>Fuerzas y Cuerpos de Seguridad del Estado.</li>
							<li>Jueces y Tribunales.</li>
							<li>En general, autoridades u organismos públicos competentes, cuando el responsable tenga la obligación  legal de facilitar los datos personales.</li>
						</ol>
						<br>

						<p class="md-title">Transferencias internacionales de datos</p>
						<br>
						<p>Los datos son almacenados en Vultr Holdings Corporation, situada en los Países Bajos.</p>
						<br>
						<p>La organización realiza Transferencias Internacionales de Datos que cuentan con un nivel adecuado de protección y todas las garantías necesarias según la normativa en protección de datos puesto que Vultr participa en los marcos de Escudo de la privacidad UE-EE. UU. o Suiza EE. UU.</p>
						<br>

						<p class="md-title">Derechos</p>
						<br>
						<p>Los interesados podrán ejercer en cualquier momento y de forma totalmente gratuita los derechos de acceso, rectificación y supresión, así como solicitar que se limite el tratamiento de sus datos personales, oponerse al mismo, solicitar la portabilidad de estos (siempre que sea técnicamente posible) o retirar el consentimiento prestado.</p>
						<br>
						<p>Para ello podrá emplear el formulario de contacto de la web, enviar un mensaje al correo info@mifansclub.org o bien enviar una carta a: Asociación Mi Fans Club, Calle Médico Manero Mollá, nº 16 5o Pta 7, 03001 Alicante (España). En cualquier caso, se deberá acreditar su identidad para poder proceder, por lo que en las comunicaciones se le pedirán algunos datos.</p>
						<br>
						<p>En caso de que sienta vulnerados sus derechos en lo concerniente a la protección de sus datos personales, especialmente cuando no haya obtenido satisfacción en el ejercicio de sus derechos, puede presentar una reclamación ante la Autoridad de Control en materia de Protección de Datos competente (Agencia Española de Protección de Datos), a través de su sitio web: www.agpd.es.</p>
						<br>

						<p class="md-title">Veracidad de los datos</p>
						<br>
						<p>El interesado garantiza que los datos aportados son verdaderos, exactos, completos y se encuentran actualizados; comprometiéndose a informar de cualquier cambio respecto de los datos que aportara, por los canales habilitados al efecto e indicados en el punto uno de la presente política. Será responsable de cualquier daño o perjuicio, tanto directo como indirecto, que pudiera ocasionar como consecuencia del incumplimiento de la presente obligación.</p>
						<br>
						<p>En el supuesto de que el usuario facilite datos de terceros, declara que cuenta con el consentimiento de los interesados y se compromete a trasladarle la información contenida en esta cláusula, eximiendo a la organización de cualquier responsabilidad derivada por la falta de cumplimiento de la presente obligación.</p>
						<br>
					</md-tab>

					<md-tab md-label="Política Cookies" id="tab-pc" class="md-scrollbar">
						<p class="md-headline">Política de Cookies</p>
						<br>
						<p>El objetivo de esta política es informar a los interesados de las cookies que emplea esta página web, de conformidad con lo establecido en la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y de Comercio Electrónico, y el Reglamento (UE) 2016/679 del Parlamento Europeo y del Consejo de 27 de abril de 2016.</p>
						<br>
						<p class="md-title">Uso de cookies. ¿Qué son las cookies?</p>
						<br>
						<p>Las cookies son ficheros que se descargan en tu Ordenador, Smartphone o Tablet al acceder a determinadas páginas web. La utilización de cookies, ofrece numerosas ventajas en la prestación de servicios de la Sociedad de la Información, puesto que, entre otras: (a) facilita la navegación del usuario en el Sitio Web; (b) facilita al usuario el acceso a los diferentes servicios que ofrece el Sitio Web; (c) evita al usuario volver a configurar características generales predefinidas cada vez que accede al Sitio Web; (d) favorece la mejora del funcionamiento y de los servicios prestados a través del Sitio Web, tras el correspondiente análisis de la información obtenida a través de las cookies instaladas; (e) permiten a un Sitio Web, entre otras cosas, almacenar y recuperar información sobre los hábitos de navegación de un usuario o de su equipo y, dependiendo de la información que contengan y de la forma en que utilice su equipo, pueden utilizarse para reconocer al usuario.</p>
						<br>
						<p>La mayoría de los navegadores aceptan como estándar a las cookies y, con independencia de las mismas, permiten o impiden en los ajustes de seguridad  las cookies temporales o memorizadas.</p>
						<br>
						<p>Ten en cuenta que para poder utilizar y contar con una mejor experiencia de navegación,  es necesario que tengas habilitadas las cookies.</p>
						<br>
						<p>En caso de no querer recibir cookies, por favor, configure su navegador de internet, para que las borre del disco duro de su ordenador, las bloquee o le avise en su caso de instalación de las mismas. Para más información consulta el apartado “Cómo bloquear o eliminar las cookies instaladas”.</p>
						<br>
						
						<p class="md-title">¿Qué tipos de cookies utiliza esta página web?</p>
						<br>
						<p class="md-subheading">Cookies utilizadas en este sitio web</p>
						<p>Siguiendo las directrices de la Agencia Española de Protección de Datos, a continuación detallamos el uso de las cookies que esta página web emplea,  con el fin de proporcionarle la máxima información posible.</p>
						<br>
						<p class="md-subheading">Cookies Propias:</p>
						<p>Son aquéllas que se envían al equipo terminal del usuario desde un equipo o dominio gestionado por el propio editor y desde el que se presta el servicio solicitado por el usuario.</p>
						<br>
						<p>A continuación la lista de las que utilizamos:</p>
						<table cellspacing="0" cellpadding="0">
							<tr>
								<th>Nombre</th>
								<th>Tipo</th>
								<th>Finalidad</th>
								<th>Duración</th>
							</tr>
							<tr>
								<td>ppc</td>
								<td>Boolean</td>
								<td>Indica a la web si has aceptado la política de privacidad y cookies, para no volver a preguntártelo</td>
								<td>1 año</td>
							</tr>
							<tr>
								<td>tkn</td>
								<td>Alfanumérica</td>
								<td>Comprobar si el usuario es legítimo o es un robot</td>
								<td>1 día</td>
							</tr>
							<tr>
								<td>_pk_id.1.XXXX<br>_pk_ses.1.XXXX</td>
								<td>Alfanumérica</td>
								<td>Las cookies que usa nuestro panel de analíticas (Matomo) del que extraemos datos generales de uso de la web. Para más información consulta nuestra Política de Privacidad.</td>
								<td>30 días o menos</td>
							</tr>
						</table>
						<br>
						<p class="md-subheading">Cookies de Terceros:</p>
						<p>Son aquellas que se envían al equipo terminal del usuario desde un equipo o dominio que no es gestionado por el editor, sino por otra entidad que trata los datos obtenidos través de las cookies.</p>
						<br>
						<p>En esta web no usamos ninguna cookie de terceros.</p>
						<br>
						<p class="md-title">Consentimiento</p>
						<br>
						<p>En relación con la utilización de cookies de este sitio web descritos en el apartado anterior, el usuario autoriza y consiente su uso de la siguiente forma: Cuando el usuario accede a cualquier página de la web, verá un aviso donde se indica que la página web de la Asociación Mi Fans Club utiliza cookies, pudiendo el usuario aceptar o rechazar el uso de las mismas a través de la configuración de su navegador. Si el usuario no configura su navegador para que las cookies no se activen, al navegar por el sitio web de la Asociación Mi Fans Club y utilizar sus servicios, el usuario acepta el uso que se hace de las cookies.</p>
						<br>
						<p class="md-title">Cómo bloquear o eliminar las cookies instaladas</p>
						<br>
						<p>Puede usted permitir, bloquear o eliminar las cookies instaladas en su equipo mediante la configuración de las opciones de su navegador. Puede encontrar información sobre cómo hacerlo, en relación con los navegadores más comunes en los links que se incluyen a continuación:</p>
						<ul>
							<li>Internet Explorer: https://support.microsoft.com/es-es/kb/278835</li>
							<li>Microsoft Edge: https://privacy.microsoft.com/es-es/windows-10-microsoft-edge-and-privacy</li>
							<li>Chrome:https://support.google.com/chrome/answer/95647?co=GENIE.Platform%3DDesktop&hl=esttp://support.google.com/chrome/bin/answer.py?hl=es&answer=95647</li>
							<li>Firefox: http://support.mozilla.org/es/kb/Borrar%20cookies</li>
							<li>Safari: http://support.apple.com/kb/ph5042</li>
						</ul>
						<p>Le informamos, no obstante, de la posibilidad de que la desactivación de alguna cookie impida o dificulte la navegación o la prestación de los servicios ofrecidos en la página web.</p>
						<br>
						<p class="md-title">Modificaciones</p>
						<br>
						<p>La presente política de cookies puede verse modificada en función de las exigencias legales establecidas o con la finalidad de adaptar dicha política a las instrucciones dictadas por la Agencia Española de Protección de Datos.</p>
						<br>
						<p>Por esta razón, aconsejamos a los usuarios que  visiten periódicamente nuestra política de cookies.</p>
						<br>
						<p>Cuando se produzcan cambios significativos en esta política, en la medida de nuestras posibilidades, comunicaremos a los usuarios estos cambios mediante un aviso en nuestra página web. </p>
						<br>
						<p>Si tiene dudas acerca de esta política de cookies, puede contactar con la Asociación Mi Fans Club a través del correo electrónico ofertasxiaomifans@gmail.com o el formulario de contacto en la web.</p>
					</md-tab>

					<md-tab md-label="Aviso Legal" id="tab-al" class="md-scrollbar">
						<p class="md-headline">Aviso Legal</p>
						<br>
						<p><b>Resumen:</b> Al usar nuestra página web te comprometes a hacer un buen uso de ella, así como de sus herramientas y formularios. Todos los derechos sobre la propiedad industrial e intelectual de la página web están reservados.</p>
						<br>
						<p>No garantizamos un correcto funcionamiento o la veracidad de los contenidos publicados (aunque nos esforzamos para que sea así), ni somos responsables de las consecuencias que se puedan derivar tanto por problemas internos como por problemas externos o en las webs enlazadas (p. ej. tiendas online). De todos modos, si detectas algún problema/incidencia puedes contactarnos mediante el formulario de contacto o el grupo de Telegram <a href="https://t.me/masquefans" target="_blank" rel="noreferrer">@masquefans</a> e internaremos arreglarlo o ayudarte.</p>
						<br>
						<p class="md-title">Datos identificativos</p>
						<br>
						<p>Usted está visitando la página web https://oxmf.club titularidad de la ASOCIACION MI FANS CLUB con domicilio social en MÉDICO MANERO MOLLA 16 5 PTA 7 03001 ALICANTE, con N.I.F. G42523019, inscrita en el Registro Nacional de Asociaciones en Sección 1 Número Nacional 613651 , y con C.I.F. G42523019 , en adelante EL TITULAR.</p>
						<br>
						<p>Puede contactar con el TITULAR por cualquiera de los siguientes medios:</p>
						<ul>
							<li>Teléfono: 669639498</li>
							<li>Correo electrónico de contacto: info@mifansclub.org</li>
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
						<p>Las presentes condiciones (en adelante Aviso Legal) tiene por finalidad regular el uso de la página web de EL TITULAR que pone a disposición del público.</p>
						<br>
						<p>El acceso y/o uso de esta página web atribuye la condición de USUARIO, que acepta, desde dicho acceso y/o uso, las condiciones generales de uso aquí reflejadas. Las citadas condiciones serán de aplicación independientemente de las condiciones generales de contratación que en su caso resulten de obligado cumplimiento.</p>
						<br>

						<p class="md-title">Uso del portal</p>
						<br>
						<p>https://oxmf.club/ proporciona el acceso a multitud de servicios, información, programas o datos (en adelante, “los contenidos”) en Internet pertenecientes a EL TITULAR o a sus licenciantes a los que el USUARIO puede tener acceso.</p>
						<br>
						<p>El usuario asume la responsabilidad del uso del portal. Dicha responsabilidad se extiende al uso del generador de enlaces y el formulario de contacto. En el formulario el USUARIO será responsable de aportar información veraz y lícita para poder resolver sus dudas/sugerencias/reclamaciones.</p>
						<br>
						<p>El USUARIO se compromete a hacer un uso adecuado de los contenidos y servicios que EL TITULAR ofrece a través de su portal y con carácter enunciativo pero no limitativo, a no emplearlos para:</p>
						<ul>
							<li>Incurrir en actividades ilícitas, ilegales o contrarias a la buena fe y al orden público.</li>
							<li>Provocar daños en los sistemas físicos y lógicos de la Asociación Mi Fans Club o de terceras personas, introducir o difundir en la red virus informáticos o cualesquiera otros sistemas físicos o lógicos que sean susceptibles de provocar los daños anteriormente mencionados.</li>
							<li>Reportar de forma malintencionada y recurrente errores en contenidos publicados que no contengan dichos errores.</li>
							<li>Usar de manera desproporcionada el generador de enlaces afiliados (a partir de 50 solicitudes/día por persona podría considerarse desproporcionado).</li>
							<li>Utilizar el sitio web ni la información que éste contiene con fines comerciales, políticos, publicitarios y para cualquier uso comercial. Esto también incluye no compartir de forma automatizada los contenidos que se publican sin que estos dirijan a nuestra web.</li>
						</ul>
						<br>
						<p class="md-title">Protección de datos</p>
						<br>
						<p>Todo lo relativo a la política de protección de datos se encuentra recogido en la pestaña de política de privacidad.</p>
						<br>

						<p class="md-title">Contenidos: Propiedad intelectual e industrial</p>
						<br>
						<p>EL TITULAR es propietario de todos los derechos de propiedad intelectual e industrial de su página web, así como de los elementos contenidos en la misma (a título enunciativo: imágenes, fotografías, sonido, audio, vídeo, software o textos; marcas o logotipos, combinaciones de colores, estructura y diseño, selección de materiales usados, programas de ordenador necesarios para su funcionamiento, acceso y uso, etc.), titularidad del TITULAR o bien de sus licenciantes.</p>
						<br>
						<p>Todos los derechos reservados. En virtud de lo dispuesto en los artículos 8 y 32.1, párrafo segundo, de la Ley de Propiedad Intelectual, quedan expresamente prohibidas la reproducción, la distribución y la comunicación pública, incluida su modalidad de puesta a disposición, de la totalidad o parte de los contenidos de esta página web, con fines comerciales, en cualquier soporte y por cualquier medio técnico, sin la autorización del TITULAR.</p>
						<br>

						<p class="md-title">Exclusión de garantías y responsabilidad</p>
						<br>
						<p>EL USUARIO reconoce que la utilización de la página web y de sus contenidos y servicios se desarrolla bajo su exclusiva responsabilidad. En concreto, a título meramente enunciativo, EL TITULAR no asume ninguna responsabilidad en los siguientes ámbitos:</p>
						<ol>
							<li>La disponibilidad del funcionamiento de la página web, sus servicios y contenidos y su calidad o interoperabilidad.</li>
							<li>La finalidad para la que la página web sirva a los objetivos del USUARIO.</li>
							<li>La infracción de la legislación vigente por parte del USUARIO o terceros y, en concreto, de los derechos de propiedad intelectual e industrial que sean titularidad de otras personas o entidades.</li>
							<li>La existencia de códigos maliciosos o cualquier otro elemento informático dañino que pudiera causar el sistema informático del USUARIO o de terceros. Corresponde al USUARIO, en todo caso, disponer de herramientas adecuadas para la detección y desinfección de estos elementos.</li>
							<li>El acceso fraudulento a los contenidos o servicios por terceos no autorizados, o, en su caso, la captura, eliminación, alteración, modificación o manipulación de los mensajes y comunicaciones de cualquier clase que dichos terceros pudiera realizar.</li>
							<li>La exactitud, veracidad, actualidad y utilidad de los contenidos y servicios ofrecidos y la utilización posterior que de ellos haga el USUARIO. EL TITULAR empleará todos los esfuerzos y medios razonables para facilitar la información actualizada y fehaciente.</li>
							<li>Los daños producidos a equipos informáticos durante el acceso a la página web y los daños producidos a los USUARIOS cuando tengan su origen en fallos o desconexiones en las redes de telecomunicaciones que interrumpan el servicio.</li>
							<li>Los daños o perjuicios que se deriven de circunstancias acaecidas por caso fortuito o fuerza mayor.</li>
							<li>El TITULAR no se hace responsable del contenido de los mensajes enviados por el USUARIO.</li>
						</ol>
						<br>

						<p class="md-title">Modificación de este aviso legal y duración</p>
						<br>
						<p>EL TITULAR se reserva el derecho de efectuar sin previo aviso las modificaciones que considere oportunas en su portal, pudiendo cambiar, suprimir o añadir tantos contenidos y servicios que se presten a través de la misma, como la forma en la que éstos aparezcan representados o localizados en su portal.</p>
						<br>
						<p>La vigencia de las citadas condiciones irá en función de su exposición y estarán vigentes hasta que sean modificadas por otras debidamente publicadas.</p>
						<br>

						<p class="md-title">Enlaces</p>
						<br>
						<p>En los enlaces o hipervínculos hacia otros sitios de Internet publicados en https://oxmf.club/, EL TITULAR no ejercerá ningún tipo de control sobre dichos sitios y contenidos. En ningún caso EL TITULAR asumirá responsabilidad alguna por los contenidos de algún enlace perteneciente a un sitio web ajeno, ni garantizará la disponibilidad técnica, calidad, fiabilidad, exactitud, amplitud, veracidad, validez y constitucionalidad de cualquier materia o información contenida en ninguno de dichos hipervínculos y otros sitios en Internet. Igualmente, la inclusión de estas conexiones externas no implicará ningún tipo de asociación, fusión o participación con las entidades conectadas. Los problemas que puedan surgir serán responsabilidad de estos sitios ajenos, y en ningún caso del TITULAR.</p>
						<br>

						<p class="md-title">Derechos de exclusión</p>
						<br>
						<p>EL TITULAR ser reserva el derecho a denegar o retirar el acceso a portal y/o los servicios ofrecidos sin necesidad de advertencia previa, a instancia propia o de un tercero, a aquellos usuarios que incumplan el contenido de este aviso legal.</p>
						<br>

						<p class="md-title">Generalidades</p>
						<br>
						<p>EL TITULAR perseguirá el incumplimiento de las presentes condiciones así como cualquier utilización indebida de su portal ejerciendo todas las acciones civiles y penales que le puedan corresponder en derecho.</p>
						<br>

						<p class="md-title">Legislación aplicable y jurisdicción</p>
						<br>
						<p>La relación entre EL TITULAR y EL USUARIO se regirá por la normativa española vigente. Todas las disputas y reclamaciones derivadas de este aviso legal se resolverán por los juzgados y tribunales españoles.</p>
						<br>

						<p class="md-title">Menores de edad</p>
						<br>
						<p>https://oxmf.club/ dirige sus servicios a usuarios mayores de 18 años. Los menores de esta edad no están autorizados a utilizar nuestros servicios y no deberán, por tanto, enviarnos sus datos personales. Informamos de que, si se da tal circunstancia, la Asociación Mi Fans Club no se hace responsable de las posibles consecuencias que pudieran derivarse del incumplimiento del aviso que en esta cláusula se establece. </p>
						
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
					  <p>En base a nuestra experiencia, la forma más segura de comprar por internet es mediante Paypal, que te ofrece una garantía extra en tu compra (en caso que que no llegue, que llegue defectuoso o equivocado, etc.), y es completamente gratuito.</p>
					  <br>
					  <p>Si no quieres usar Paypal, es importante que si pagas con tarjeta bancaria, compres sólo en tiendas que tengan cierta reputación. De todos modos, comprando de este modo tendrás muchas menos posibilidades de recuperar el dinero si no llega el producto de forma correcta.</p>
					  <br>
					  <p>Por otro lado hay tiendas como Amazon en las que no se admite PayPal, en el caso de Amazon es una tienda con mucha reputación.</p>
					</md-tab>

					<md-tab md-label="Envio/Garantía" id="tab-eg" class="md-scrollbar">
						<p class="md-title">Envíos y garantías</p>
					  <p>En esta web puedes encontrar muchas ofertas y te recomendamos que te fijes bien en los plazos de envío y garantía.</p>
					  <br>
					  <p>Para los envíos hay diversos tipos disponibles. Los más rápidos suelen ser los envíos desde España, seguidos por los envíos desde almacenes europeos. Y los más lentos suelen ser los envíos desde almacenes en China y HongKong (de 7 a 60 días laborales, aunque muchas veces suelen llegar entre los 9 y los 15 días).</p>
					  <br>
					  <p>Los envíos dependen mucho de cada tienda y almacén por lo que te recomendamos que revises bien los plazos antes de comprar. Ten en cuenta que al tiempo de envío normalmente se le tiene que añadir cierto tiempo de procesamiento del paquete en el almacén. Los plazos de entrega suelen ser estimados, y dependen en ocasiones de festividades y otros tipos de condiciones. Por lo que si estás pensando en comprar un producto para una fecha en concreto, te aconsejamos que lo hagas con bastante tiempo de antelación.</p>
					  <br>
					  <p>Para la <b>garantía</b> de los productos que compres, si compras en china te suelen indicar que la garantía es de un año, sin embargo esta garantía suele ser muy difícil de tramitar y a la hora de la verdad suele ser inexistente. En este caso si algo va mal pasada una semana de la recepción del paquete normalmente la única opción es buscar una tienda local o alguien que te lo arregle, cubriendo tú los costes.</p>
					  <br>
					  <p>Por otro lado hay los vendedores autorizados de Xiaomi en España, que ofrecen garantía de 2 años en España. Estas tiendas suelen tener los móviles y gadgats más caros. En este caso podemos encontrar Amazon*, Aliexpress*, MediaMarkt y PCcomponentes.</p>
					  <p><small>*Sólo las tiendas autorizadas dentro de estos. En el caso de Aliexpress sólo en Aliexpress plaza.</small></p>
					</md-tab>

					<md-tab md-label="Ofertas" id="tab-of" class="md-scrollbar">
						<p class="md-title">Ofertas y Cupones</p>
					  <p>Por nuestra parte, y sin duda también como compradores, intentamos buscar las mejores ofertas y precios en toda la web, lo que no indica que conozcamos de primera mano todas las tiendas y su gestión.</p>
					  <br>
					  <p>Muchas de las ofertas permanecen cierto tiempo, pero otras duran horas o incluso minutos. En otros casos los cupones tienen un número limitado de usos y según el interés que haya en esa oferta los usos se pueden agotar en poco tiempo, por eso, si no eres rápido, puede ser que ya no puedas conseguirlo al precio de la oferta.</p>
					  <br>
					  <p>Has de saber también, que en caso de dudas, o que busques un producto concreto de los no habituales, estamos a tu disposición y te ayudaremos a encontrar lo que buscas.</p>
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
					<p class="md-subheading">Esta web la ha desarrollado MarcMC, con la colaboración del staff de <a href="https://t.me/masquenoticias" target="_blank" rel="noreferrer">@masquenoticias</a>. Puedes encontrarnos también en el grupo de Telegram <a href="https://t.me/masquefans" target="_blank" rel="noreferrer">@masquefans</a> o bien <a href="https://t.me/marcmc" target="_blank" rel="noreferrer">@marcmc</a>. También puedes contactar enviando un mensaje al equipo de oxmf.club:</p>
					<br>
					<form novalidate @submit.prevent="validateContact()" v-if="sendingmsg!=2">
						<md-field :class="getValidationClass('email')">
							<label for="email">Tu email</label>
							<md-input name="email" id="email" v-model="email" :disabled="sendingmsg==1"></md-input>
							<span class="md-error" v-if="!$v.email.required">Introduce un email</span>
							<span class="md-error" v-else-if="!$v.email.email">Email inválido</span>
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
						
						<p class="md-caption">Los datos aportados se enviarán directamente a un grupo privado de  <a href="https://telegram.org/" target="_blank" rel="noreferrer">Telegram</a>. No serán usados para nada más que para responder a tu petición.</p>
					</form>
					
					<p class="md-subheading" v-if="sendingmsg==2"><b>Mensaje enviado ¡Gracias por contactar!</b></p>

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
					&nbsp;No tienes conexión
				</div>
				<div v-else>
					<md-icon>signal_wifi_4_bar</md-icon>
					&nbsp;Vuelves a tener conexión
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