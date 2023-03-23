# CCMS fork of PDF.js

Contains our customizations. Original [here](https://github.com/mozilla/pdf.js).

### Building the viewer

Requires `npm` and `gulp` as per the docs at the main site.

```
git clone [this]
cd [this]
export PUPPETEER_SKIP_DOWNLOAD=1
npm i -f
gulp generic-legacy
```

Places the reader in `build/generic-legacy`.
