# CCMS fork of PDF.js

Contains our customizations. Original [here](https://github.com/mozilla/pdf.js).

Comes with a precompiled build (located in `build/generic-legacy`), and a docker implementation for hosting with a simplistic auth facade.

## Installing the web service

Requires a recent version of docker, and of composer.

```
git clone [this]
cd [this]
cp .env.example .env # And edit to suit
composer install
docker compose up -d
```

Once up and running, the viewer is served up from the `/web/` path of the configured hostname and port. It uses the standard `pauth` and `file` arguments that the prior version did.

## Building the viewer initially

For development purposes, not needed for regular use.

Requires `npm` and `gulp` as per the docs at the main site.

```
export PUPPETEER_SKIP_DOWNLOAD=1
npm i -f
gulp generic-legacy # Build the viewer in build/generic-legacy
composer run-script post-install-cmd # Apply CCMS auth files
```

## Development

### Built-in dev server

There are a couple ways to go about this. The first would be to use the built-in server, by running `gulp server` - this by default puts the app up at 8888, and allows you to live edit the `web` folder. You can drop a PDF somewhere in the project root and then click it in the browser to pull up the viewer. However, there are quirks to this method:

1. The viewer doesn't always display PDF documents (or will eventually display after a few minutes), so this method is better suited for UI than for PDF rendering.
2. Locale objects are swapped into the viewer upstream of this dev server, in the build. So any edits made to the locale (ie, button labels, etc) are not reflected here.

### Using docker

The other method, which is more cumbersome but gives a better representation of production behavior is to use docker - do this by brining up the container at whichever port specified in the `.env` file, and then webroot of the container is pointed at the `build/generic-legacy` folder.

The disadvantantages to this method are:

1. The CCMS auth is best disabled when working with this (it gets replaced in the build so not a huge deal)
2. Any direct edits made must be transposed down into the supporting files to commit - OR - if editing the source directly a build must be created to view results.

#### Disabling CQ auth

To do this, comment out or empty out the contents of the `ccms-auth.php` file - the file itself must still exist however.

#### Viewing PDFs

This is the rough URL structure:

```
http://server:port/web/?view=[URL]
```
Feed in a PDF URL (any URL should work) and the viewer should pull it up.

### Generating a build

Is similar to the initial build, though a few steps can be skipped if node packages remain untouched.

```
gulp generic-legacy # Build the viewer in build/generic-legacy
composer run-script post-install-cmd # Apply CCMS auth files
```

Build files are a part of the repo, so whenever an updated build is created, it should be committed.


