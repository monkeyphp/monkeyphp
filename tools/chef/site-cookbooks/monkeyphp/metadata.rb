name             'monkeyphp'
maintainer       'David White'
maintainer_email 'david@monkeyphp.com'
license          'All rights reserved'
description      'Installs/Configures monkeyphp'
long_description IO.read(File.join(File.dirname(__FILE__), 'README.md'))
version          '0.1.0'

depends "apache2"
depends "php"
depends "varnish"
depends "java"
depends "ark"
depends "elasticsearch"
depends "redisio"
