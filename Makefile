build:
	@docker build -t php-game .

run:
	@docker run --rm -v `pwd`/src:/usr/app/src:Z -v `pwd`/public:/usr/app/public:Z -v `pwd`/psalm.xml:/usr/app/psalm.xml:Z php-game php public/index.php

check:
	@docker run --rm -v `pwd`/src:/usr/app/src:Z -v `pwd`/public:/usr/app/public:Z -v `pwd`/psalm.xml:/usr/app/psalm.xml:Z php-game ./vendor/bin/psalm --show-info=true
