# ![Ripper Upload](https://assets.lol/media/upload-screenshot-1-2023-04-06.png)

A simple **PHP  Script** to upload files like [anonfiles](https://anonfiles.com).

**Very easy to setup, only a PHP server is required.**

## 🔗 Links
- **[Discord](https://ripper.lol/discord.html)**
- **[ripper.lol](https://ripper.lol)**

## 🖥️ Requirements
- PHP (7.4+)

## 📂 Download

[Source Code](https://git.ripper.lol/ripper/Upload)

1. Install Git on your system if you haven't already.
2. Run `git clone https://git.ripper.lol/ripper/Upload.git`

## 🔧 Setup
You must configure the script before using by editing `/include/config.php`

## ⚙️ Configuration

**`SITE_NAME`** - `string` - The name of your site.

**`SITE_URL`** - `string` - The URL to the index of your site.

**`SITE_LOGO`** - `string` - Direct link to your site logo.

**`SITE_DISCORD`** - `string|null` - Your Discord link or `null` to disable.

**`PHP_EXTENSION`** - `true|false` - Should generated links include `.php` for php files?

**`UPLOAD_DIR`** - `string` - Where should uploaded files be stored *(Folder must be in script root)*

**`UPLOAD_MAX_SIZE`** - `int` - Maximum file size in MB.

**`UPLOAD_CHECK_MIME`** - `true|false` - Should file mime type be checked?

**`UPLOAD_CHECK_EXT`** - `true|false` - Should file extension be checked?

**`UPLOAD_ALLOW_MIME`** - `array` - Array of allowed file mime types *(Only used if `UPLOAD_CHECK_MIME` is true)*

**`UPLOAD_ALLOW_EXT`** - `array` - Array of allowed file extensions *(Only used if `UPLOAD_CHECK_EXT` is true)*

**`AD_PLACEMENT`** - `true|false` - Should ads inside index.php be shown?