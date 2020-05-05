# Sun* R&D wiki

Built on top of Wikimedia, customized a little bit for Sun* R&D

## Build

To build the docker image:

```sh
docker build . -t <image_name>
```

## Configuration

The site is pre-configured with an existing `LocalSettings.php` file. Some variables (app keys, secret, password .etc)
must be set manually when running the container. The following variables are *required*:

| Name           | Description                          |
|----------------|--------------------------------------|
| `wgSecretKey`  | Wiki secret key                      |
| `wgServer`     | Wiki URL                             |
| `wgGLAppId`    | Google client ID for GoogleLogin     |
| `wgGLSecret`   | Google client secret for GoogleLogin |
| `wgDBpassword` | Database password                    |

These variables are *optional*, though you might want to care about.

| Name           | Default        | Description      |
|----------------|----------------|------------------|
| `wgUpgradeKey` | `null`         | Wiki upgrade key |
| `wgDBtype`     | `mysql`        | DB type          |
| `wgDBserver`   | `mysql`        | DB server host   |
| `wgDBname`     | `sun_rnd_wiki` | DB database      |
| `wgDBuser`     | `sun_rnd_wiki` | DB username      |

Configuration via environment variables is supported (string only).
Any environment variable prefixed with `wg` (e.g. `wgSitename`) will be defined in the `LocalSettings.php` file. e.g

```sh
docker run <image_name> -e wgDBpassword=secret
```

Additionally, you can also add your own config by mounting any file matching the glob pattern `LocalSettings.*.php` into `/var/www/html`.

## First time install

Exec into the container & run the install script to set up database.

```sh
wiki-install <wiki name> <admin user> --pass <admin password>
```
