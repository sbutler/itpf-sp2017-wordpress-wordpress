Elastic Beanstalk WordPress
===========================

This is an Elastic Beanstalk application version for WordPress running under
the Elastic Beanstalk environment created in the ITPro Forum workshop. This code
is provided as part of the workshop and will not be regularly updated. You can
use it as a base for your own application package.

To build a new package run `make eb-appver` and it will place a new zip file in
the parent directory.

## Environment Variables

The following Elastic Beanstalk environment variables are used by this
application package.

| Variable              | WP Define         | Description
| --------------------- | ----------------- | -----------
| WP_HOME               | WP_HOME           | Home page URL. Used if not the values `changeme` or blank.
| WP_SITEURL            | WP_SITEURL        | Site URL for WP core files. Used if not the values `changeme` or blank.
| WP_DB_NAME            | DB_NAME           | Database name.
| WP_DB_USER            | DB_USER           | Database user. Do not use the admin user.
| WP_DB_PASSWORD        | DB_PASSWORD       | Database password.
| WP_DB_HOSTNAME        | DB_HOST           | Database hostname.
| WP_AUTH_KEY           | AUTH_KEY          | Cryptographically secure random value.
| WP_SECURE_AUTH_KEY    | SECURE_AUTH_KEY   | Cryptographically secure random value.
| WP_LOGGED_IN_KEY      | LOGGED_IN_KEY     | Cryptographically secure random value.
| WP_NONCE_KEY          | NONCE_KEY         | Cryptographically secure random value.
| WP_AUTH_SALT          | AUTH_SALT         | Cryptographically secure random value.
| WP_SECURE_AUTH_SALT   | SECURE_AUTH_SALT  | Cryptographically secure random value.
| WP_LOGGED_IN_SALT     | LOGGED_IN_SALT    | Cryptographically secure random value.
| WP_NONCE_SALT         | NONCE_SALT        | Cryptographically secure random value.
| EFS_WPCONTENT_ID      |                   | EFS ID to mount under `/mnt/wpcontent`.

## Email

To send email from WordPress, configure the WP Mail SMTP plugin. The Elastic
Beanstalk environment is not configured to send email. If you would like to
use sendmail, then you will need to follow [the instructions for email on Amazon Linux](http://docs.aws.amazon.com/ses/latest/DeveloperGuide/sendmail.html).

## wp-config.php

The configuration file is stored in this package, but takes settings from the
Elastic Beanstalk environment. All automatic updates and file editing is
disabled.

If you need to modify the `wp-config.php` file, ask yourself if the setting is
inherant to the application, or if it might change based on the Elastic
Beanstalk environment configuration. You should try to keep your applications
as generic as possible with respect to the environment they are deployed in.

## htaccess

Some WordPress plugins want to write to the `htaccess` file, and this is a problem
with how Elastic Beanstalk works. To solve this, the `htaccess` file is not
writeable by the webapp and is updated periodically from the EFS share. You can
edit `/mnt/wpcontent/htaccess` and within 5 minutes all of your EC2 instances
will get the update.

The first time this application is deployed it will initialize the `htaccess`
file from `htaccess.dist`.

## W3 Total Cache

The W3 Total Cache (fixed) plugin is provided in this package but it requires
some special configuration. When it asks you to add rules to the htaccess file,
follow the process listed above.

The first time you activate the plugin you will have to rebuild your
environment. This lets Elastic Beanstalk copy W3TC files into `wp-content`, and
also modifies `wp-config.php` to enable caching. Changes to the following
settings will also need a rebuild of the environment to work:

* Plugin activation/deactivation
* Object caching
* Database caching
