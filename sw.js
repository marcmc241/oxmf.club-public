var version = "v0:0:36";
var CACHE_NAME = 'oxmf-cache';

var urlsToCache = [
  '/',
  'index.php',
  'index.php/#/',
  'index.php?pwa=1',
  'manifest.json',
  'css/estils2.css',
  'css/theme.css',
  'css/vue-material.min.css',
  'css/vue-material-dark.min.css',
  'css/font/flUhRq6tzZclQEJ-Vdg-IuiaDsNc.woff2',
  'css/font/L0x5DF4xlVMF-BfR8bXMIjhLq38.woff2',
  'css/font/mem5YaGs126MiZpBA-UN_r8OUuhp.woff2',
  'css/font/mem5YaGs126MiZpBA-UN7rgOUuhp.woff2',
  'css/font/mem6YaGs126MiZpBA-UFUK0Zdc0.woff2',
  'css/font/mem8YaGs126MiZpBA-UFVZ0b.woff2',
  'img/android-chrome-192x192.png',
  'img/android-chrome-512x512.png',
  'img/apple-touch-icon.png',
  'img/browserconfig.xml',
  'img/facebook.png',
  'img/favicon.ico',
  'img/favicon-16x16.png',
  'img/favicon-32x32.png',
  'img/logo.png',
  'img/mstile-150x150.png',
  'img/safari-pinned-tab.svg',
  'img/telegram.png',
  'img/twitter.png',
  'img/whatsapp.svg',
  'js/chart.min.js',
  'js/jquery.easing.1.3.js',
  'js/jquery.lazy.min.js',
  'js/jquery.min.js',
  'js/jquery.timeago.js',
  'js/scripts.js',
  'js/validators.min.js',
  'js/vue-dragscroll.min.js',
  'js/vue.min.js',
  'js/vuelidate.min.js',
  'js/vue-material.min.js',
  'js/vue-router.js',
  'js/comp/detalles.js',
  'js/comp/ofertas.js',
  'js/comp/footer.js'
]; 

self.addEventListener('install', function(event) {
  // Perform install steps
  event.waitUntil(
    caches.open(version+CACHE_NAME)//add static assets to cache
      .then(function(cache) {
        //console.log('Opened cache');
        return cache.addAll(urlsToCache);
      })
      .then(function() {
        //console.log('WORKER: install completed');
      })
  );
});

self.addEventListener('fetch', function(event) {//listen to requests and load from cache or from network
  //if (event.request.cache === 'only-if-cached' && event.request.mode !== 'same-origin') return fetch(event.request,{credentials: 'include'});
  //console.log(event.request.url);
  event.respondWith(
    caches.match(event.request)
      .then(function(response) {
        // Cache hit - return response
        if (response) {
          //console.log("---CACHE :"+event.request.url);
          return response;
        }
        //console.log("FETCH :"+event.request.url);
        return fetch(event.request,{credentials: 'include'})//include cookies
      }
    )
  );
});

/*self.addEventListener('activate', function(event) {
  event.waitUntil(
    caches.keys().then(function(cacheNames) {//remove cache on new sw activation, to make a cache refresh if sw changes
      return Promise.all(
        cacheNames.filter(function(cacheName) {
          // Return true if you want to remove this cache,
          // but remember that caches are shared across
          // the whole origin
          return true;
        }).map(function(cacheName) {
          return caches.delete(cacheName);
        })
      );
    })
  );
});*/

self.addEventListener("activate", function(event) {
  /* Just like with the install event, event.waitUntil blocks activate on a promise.
     Activation will fail unless the promise is fulfilled.
  */
  //console.log('WORKER: activate event in progress.');

  event.waitUntil(
    caches
      /* This method returns a promise which will resolve to an array of available
         cache keys.
      */
      .keys()
      .then(function (keys) {
        // We return a promise that settles when all outdated caches are deleted.
        return Promise.all(
          keys
            .filter(function (key) {
              // Filter by keys that don't start with the latest version prefix.
              return !key.startsWith(version);
            })
            .map(function (key) {
              /* Return a promise that's fulfilled
                 when each outdated cache is deleted.
              */
              return caches.delete(key);
            })
        );
      })
      .then(function() {
        //console.log('WORKER: activate completed.');
      })
  );
});

self.addEventListener('push', function(event) {//push recieved
  console.log(JSON.parse(event.data.text()));
  const notificationObject = JSON.parse(event.data.text());

  const title = notificationObject.title;
  const options = {
    body: notificationObject.msg,
    icon: notificationObject.icon,
    badge: notificationObject.badge
  };
  self.notificationURL = notificationObject.url;
  event.waitUntil(self.registration.showNotification(title, options));
});

self.addEventListener('notificationclick', function(event) {
  var notification = event.notification;
  var primaryKey = notification.data.primaryKey;
  var action = event.action;

  if (action === 'close') {
    notification.close();
  } else {
    clients.openWindow('http://oxmf.club');
    notification.close();
  }
});