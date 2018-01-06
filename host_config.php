<?php

/**
 * Apache virtual host config
 */
return <<<"EOF"
<VirtualHost *:80>
  ServerAdmin admin@localhost
  ServerName ${host}
  DocumentRoot ${document_root}
  <Directory ${document_root}>
      Options Indexes FollowSymLinks
      AllowOverride All
      Require all granted
  </Directory>
  ErrorLog \${APACHE_LOG_DIR}/error.log
  CustomLog \${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF
    ;