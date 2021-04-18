## Installation

For local development use [DDEV](https://github.com/drud/ddev)

Requirements on local machine:
- PHP 7.3 (Make sure have same version `php --version`, otherwise `composer install` might fail)
- Composer 2.x
- Docker
- mkcert [Installation quite](https://ddev.readthedocs.io/en/stable/#installationupgrade-script-linux-and-macos)

```sh
composer install
ddev start
```

Now you should have Elasticsearch and Drupal ready to start.


### Quick-start

Import site, Search API and Elasticsearch configurations by running Drush command:
```
ddev exec drush @es site-install --existing-config --account-pass=123 -y
```

Then login at https://drupal-elasticsearch.ddev.site with username `admin` and password `123`


### Elasticsearch

Make sure the Elasticsearch service is up and running by `curl http://drupal-elasticsearch.ddev.site:9200`

```
curl http://drupal-elasticsearch.ddev.site:9200/elasticsearch_index_db_elasticsearch/_search\?pretty
```

Tools to help development
`docker run -p 3030:3030 -d appbaseio/mirage`
`docker run -p 1358:1358 -d appbaseio/dejavu`

### Generate demo content

Demo content can be created with command:
`ddev exec drush en demo_content`

### Run PHPUnit tests

`ddev exec phpunit -c core modules/contrib/elasticsearch_connector`

### SOLR

Install site with Solr.

```
ddev exec drush @solr site-install --existing-config --account-pass=123 -y --sites-subdir=solr
```

Adding Solr server on Drupal Search API UI is not currently working.
`http://drupal-elasticsearch-solr.ddev.site/admin/config/search/search-api/add-server` will throw an fatal error.
