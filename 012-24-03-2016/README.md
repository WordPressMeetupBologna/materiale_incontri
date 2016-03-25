# WordPRess Meetup Bologna serata del 24-03-2016

## Consigli pratici per migliorare il tuo Wordpress
*«Pillole per migliorare le performance con un occhio alla SEO e sicurezza»*

Di cosa abbiamo parlato?
* Cache lato server e client
* Plugin utili per le ottimizzazioni
* Accorgimenti di sicurezza
* Introduzione ad AMP


Plugin Wordpress citati per la cache server e i miglioramenti di performance:
* [Wp Rocket](http://wp-rocket.me/it) (a pagamento)
* [W3 Total Cache](https://it.wordpress.org/plugins/w3-total-cache/)
* [WP Super Cache](https://it.wordpress.org/plugins/wp-super-cache/) 

### Regole utili per l'ottimizzazione:
Le seguenti regole saranno da inserire nel file '.htaccess' del vostro server (probabilmente accessibile da FTP). 


Cache client:
```sh
# Cache Client
<IfModule mod_expires.c>
  # Cache file
	ExpiresActive on
  # Cache Immagini
	ExpiresByType image/png "access plus 2 month"
	ExpiresByType image/gif "access plus 2 month"
	ExpiresByType image/jpeg "access plus 2 month"
  # Cache CSS
	ExpiresByType text/css "access plus 1 weeks"
  # Cache Javascript
	ExpiresByType text/javascript "access plus 2 weeks"
	ExpiresByType application/javascript "access plus 2 weeks"
  # Cache Font
	ExpiresByType application/x-font-ttf "access plus 2 month"
	ExpiresByType application/x-font-woff "access plus 2 month"
  #Default
    ExpiresDefault "access 2 days"
</IfModule>
```

Attivare la compressione dei contenuti (non necessario se si usa 'W3 Total Cache' o 'WP Rocket')
```sh
<IfModule mod_deflate.c>
    <IfModule mod_headers.c>
        Header append Vary User-Agent env=!dont-vary
    </IfModule>
        AddOutputFilterByType DEFLATE text/css text/x-component application/x-javascript application/javascript text/javascript text/x-js text/html text/richtext image/svg+xml text/plain text/xsd text/xsl image/x-icon
    <IfModule mod_mime.c>
        # DEFLATE by extension
        AddOutputFilter DEFLATE js css htm html
    </IfModule>
</IfModule>
```


Regole sicurezza:
```sh
# Block the include-only files.
<IfModule mod_rewrite.c>
  RewriteEngine On
  RewriteBase /
  RewriteRule ^wp-admin/includes/ - [F,L]
  RewriteRule !^wp-includes/ - [S=3]
  RewriteRule ^wp-includes/[^/]+\.php$ - [F,L]
  RewriteRule ^wp-includes/js/tinymce/langs/.+\.php - [F,L]
  RewriteRule ^wp-includes/theme-compat/ - [F,L]
</IfModule>
```
P.s. Nel caso si utilizzi un multisito potrebbe essere necessario commentare la riga `RewriteRule ^wp-includes/[^/]+\.php$ - [F,L]`

Questo pezzo permette di bloccare l'accesso da terze parti al file di configurazione; caldamente consigliato:

```sh
<files wp-config.php>
  order allow,deny
  deny from all
</files>
```

Questa parte permette di mitigare alcuni attacchi XSS/sql injection:

```sh
# Protezione minima
<IfModule mod_rewrite.c>
  Options All -Indexes
  RewriteCond %{QUERY_STRING} (\<|%3C).*script.*(\>|%3E) [NC,OR]
  RewriteCond %{QUERY_STRING} GLOBALS(=|\[|\%[0-9A-Z]{0,2}) [OR]
  RewriteCond %{QUERY_STRING} _REQUEST(=|\[|\%[0-9A-Z]{0,2})
  RewriteRule ^(.*)$ index.php [F,L]
</IfModule>
```
Inoltre la regola `Options All -Indexes` evita che si possano visualizzare i file all'interno di directory del sito (es. visualizzare i file in `wp-content/upload/2016/`) nel caso il server non sia ben configurato.


**Tool per i test:**
* [Pingdom Website Speed Test](http://tools.pingdom.com/fpt/)
* [PageSpeed Insights](https://developers.google.com/speed/pagespeed/insights/) by Google

### Risorse Utili
* [Pagina ufficiale google AMP](https://www.ampproject.org/) e relativo [Github](https://github.com/ampproject/amphtml)
* [Plugin AMP per wordress](https://it.wordpress.org/plugins/amp/)
* [Video](https://www.youtube.com/watch?v=T0IHDmRQPhc) da cui o preso contenuti per le slide