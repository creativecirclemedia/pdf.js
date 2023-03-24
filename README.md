# CCMS fork of PDF.js

Contains our customizations. Original [here](https://github.com/mozilla/pdf.js).

Comes with a precompiled build (located in `build/generic-legacy`), and a docker implementation for hosting with CCMS auth.

### Installing the web service

Requires a recent version of docker, and of composer.

```
git clone [this]
cd [this]
cp .env.example .env # Adn edit to suit
composer install
docker compose up -d
```

Once up and running, the viewer is served up from the `/web/` path of the configured hostname and port. It uses the standard `pauth` and `file` arguments that the prior version did.

### Building the viewer

For development purposes, not needed for regular use.

Requires `npm` and `gulp` as per the docs at the main site.

```
export PUPPETEER_SKIP_DOWNLOAD=1
npm i -f
gulp generic-legacy
```

Places the reader in `build/generic-legacy`.
