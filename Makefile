SHELL := /bin/bash

.PHONY: eb-appver

eb-appver:
	zip -r "../wordpress-`date '+%Y%m%d%H%M%S'`" . \
		-x '.git/*' -x '.gitignore' -x '*.swp' -x 'Makefile' \
		-x '.htaccess' \
		-x 'wp-content/cache/*' -x 'wp-content/blogs.dir/*' \
		-x 'wp-content/uploads/*' -x 'wp-content/w3tc-config/*'
