StandaloneParameterHandler
==========================

Run Incenteev/ParameterHandler without need to run 'composer install'.

Why?
----

  * you want to init your environment but don't want to warm up cache and run other long stuff
  * you may not have composer installed at production, this script doesn't require it
  
Install
-------

    composer require luchaninov/standalone-parameter-handler

Run
---

    bin/parameter-handler
