# Short URL

Created in Code Igniter 4.

## Setup and install the application.

<ol start="1">
<li>
Download XAMPP
<br>
https://www.apachefriends.org/download.html
</li>

<li>Open XAMPP Control Panel</li>

<li>
Go to xampp/htdocs

```
cd xampp/htdocs
```

</li>

<li>
Clone the repository inside htdocs

```
git clone https://github.com/rebzl/url_shorter.git
```

</li>

<li>
Start Mysql and Apache servers.
</li>
</ol>

## How to use the application.

### Main view

-   http://localhost/shortUrl/public/url
-   Description:
    -   Main view of the application.
    -   Use to add new URL to be saved and converted to a short URL.
    -   It will display a form with 2 inputs, URL and NSFW.
    -   If the NSFW is unchecked it will be false by default.
    -   If the user type a valid URL, it will display a short url for the user.
    -   If the user type an invalid URL, it will display an error message.

### Top URL

-   http://localhost/shortUrl/public/url/top
-   It will display the top 100 url
