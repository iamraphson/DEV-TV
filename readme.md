# DevTV

**[Live Demo](http://dev-tv.herokuapp.com/)**

DevTv is a laravel web application. DevTv is your Video Subscription Platform. Add unlimited videos, posts to your subscription site. Earn re-curring revenue and require users to subscribe to access premium content on your website. With DevTv you can create your own video website. You can add unlimited videos and posts to your site. You can choose to make videos available for free or only to your subscribers.

DevTv is a web application developed with Laravel 5.2.

**[Laravel](https://github.com/laravel/laravel)** is a free, open-source PHP web framework, created by [Taylor Otwell](https://github.com/taylorotwell) and intended for the development of web applications following the model–view–controller (MVC) architectural pattern

Some of the features of Laravel are a modular packaging system with a dedicated dependency manager, different ways for accessing relational databases, utilities that aid in application deployment and maintenance, and its orientation toward syntactic sugar

<h4 align="center">Home Example</h4>
![](https://cloud.githubusercontent.com/assets/3502724/18478310/a7210c42-79c8-11e6-857c-b50401d027fd.png)

<h4 align="center">Login Example</h4>
![](https://cloud.githubusercontent.com/assets/3502724/18478425/172e4b3a-79c9-11e6-80bb-e99d4f18126b.png)

<h4 align="center">Administrator Example</h4>
![](https://cloud.githubusercontent.com/assets/3502724/18478312/a73ac83a-79c8-11e6-89cf-802c476b5517.png)
![](https://cloud.githubusercontent.com/assets/3502724/18478311/a7246b30-79c8-11e6-94cd-97faa0a9cf71.png)
<h4 align="center">View Video Example</h4>
![](https://cloud.githubusercontent.com/assets/3502724/18478314/a73b4012-79c8-11e6-8984-7e2fa651820e.png)

Prerequisites
-------------
- [Mysql](http://www.mysql.com) or [Postgresql](http://www.postgresql.org/)
- [PHP 5.4+](http://php.net/)
- [Laravel 5+](https://laravel.com/)
- Command Line Tools
    - <img src="http://deluge-torrent.org/images/apple-logo.gif" height="17">&nbsp;**Mac OS X:** [Xcode](https://itunes.apple.com/us/app/xcode/id497799835?mt=12) (or **OS X 10.9+**: `xcode-select --install`)
    - <img src="http://dc942d419843af05523b-ff74ae13537a01be6cfec5927837dcfe.r14.cf1.rackcdn.com/wp-content/uploads/windows-8-50x50.jpg" height="17">&nbsp;**Windows:** [Visual Studio](https://www.visualstudio.com/products/visual-studio-community-vs)
    - <img src="https://lh5.googleusercontent.com/-2YS1ceHWyys/AAAAAAAAAAI/AAAAAAAAAAc/0LCb_tsTvmU/s46-c-k/photo.jpg" height="17">&nbsp;**Ubuntu** / <img src="https://upload.wikimedia.org/wikipedia/commons/3/3f/Logo_Linux_Mint.png" height="17">&nbsp;**Linux Mint:** `sudo apt-get install build-essential`
    - <img src="http://i1-news.softpedia-static.com/images/extra/LINUX/small/slw218news1.png" height="17">&nbsp;**Fedora**: `sudo dnf groupinstall "Development Tools"`
    - <img src="https://en.opensuse.org/images/b/be/Logo-geeko_head.png" height="17">&nbsp;**OpenSUSE:** `sudo zypper install --type pattern devel_basis`

Getting Started
---------------

#### Via Cloning The Repository:

```bash
# Get the project
git clone https://github.com/iamraphson/DEV-TV.git

# Change directory
cd DEV-TV

# Rename env.example to .env and fill in all the keys and secrets and also generate a secure key for the app using `php artisan key:generate`

# Install Composer dependencies
composer install

# Run your migrations
php artisan migrate

php artisan serve
```

Obtaining API Keys
------------------
To use any of the included APIs or OAuth authentication methods, you will need
to obtain appropriate credentials: Client ID, Client Secret, or  API Key


<img src="http://www.doit.ba/img/facebook.jpg" width="200">

- Visit [Facebook Developers](https://developers.facebook.com/)
- Click **My Apps**, then select **Add a New App* from the dropdown menu
- Select **Website** platform and enter a new name for your app
- Click on the **Create New Facebook App ID** button
- Choose a **Category** that best describes your app
- Click on **Create App ID** button
- In the upper right corner click on **Skip Quick Star**
- Copy and paste *App ID* and *App Secret* keys into `.env`
 - **Note:** *App ID* is **clientID**, *App Secret* is **clientSecret**
- Click on the *Settings* tab in the left nav, then click on **+ Add Platform**
- Select **Website**
- Enter `http://localhost:3000` under *Site URL*
**Note:** After a successful sign in with Facebook, a user will be redirected back to home page with appended hash `#_=_` in the URL. It is *not* a bug. See this [Stack Overflow](https://stackoverflow.com/questions/7131909/facebook-callback-appends-to-return-url) discussion for ways to handle it.

<hr>

<img src="http://iandouglas.com/presentations/pyconca2012/logos/sendgrid_logo.png" width="200">

- Go to https://sendgrid.com/user/signup
- Sign up and **confirm** your account via the *activation email*
- Then enter your SendGrid *Username* and *Password* into `.env` file

List of Packages
----------------

| Package                         | Description                                                           |
| ------------------------------- | --------------------------------------------------------------------- |
| socialite                       | Sign-in with Facebook, Twitter and Github                             |
| laravel tinymce                 | Tinymce Editor Library                                                |
| stripe php                      | Stripe library                                                        |
| laravel framework               | PHP web framework                                                     |
| laravel disqus                  | Disqus library                                                        |
| carbon                          | DateTime API Library                                                  |
| guzzlehttp                      | Simplified HTTP Request library                                       |


Useful Tools and Resources
--------------------------
- [Laravel Daily](http://laraveldaily.com/) - Awesome laravel tips daily
- [Laravel News](https://laravel-news.com/) - Laravel and PHP tutorials.
- [Laracasts](https://laracasts.com/) - Laravel and PHP tutorials
- [Goodheads](http://goodheads.io) - Laravel, PHP and JS tutorials
- [Favicon Generator](http://realfavicongenerator.net/) - Generate favicons for PC, Android, iOS, Windows 8.

Laravel Eloquent Cheatsheet
-------------------
* [Eloquent Cheatsheet](http://cheats.jesse-obrien.ca/)

Deployment
----------
Once you are ready to deploy your app, you will need to create an account with a cloud platform to host it. These are not the only choices, but they are my top
picks. From my experience, **Heroku** is the easiest to get started with,  deployments and custom domain support on free accounts.

### 1-Step Deployment with Heroku

<img src="http://blog.exadel.com/wp-content/uploads/2013/10/heroku-Logo-1.jpg" width="200">

- Download and install [Heroku Toolbelt](https://toolbelt.heroku.com/)
- In terminal, run `heroku login` and enter your Heroku credentials
- From *your app* directory run `heroku create`
- Create a Procfile in your app root. All this file needs to contain is `web: vendor/bin/heroku-php-nginx public` if you prefer to use nginx. or `web: vendor/bin/heroku-php-apache2 public` if you prefer to use Apache.
- Run `heroku addons:add heroku-postgresql:dev  ` to add a Postgres database to your heroku app from your terminal
- Lastly, do `git push heroku master`.  Done!
- Run artisan commands on heroku like so `heroku run php artisan migrate`

**Note:** To install Heroku add-ons your account must be verified.

---
<img src="http://www.opencloudconf.com/images/openshift_logo.png" width="200">

- Create an account at https://www.openshift.com/
- Create a Laravel application with mysql-5.5 or postgresql-9.2
    - $ rhc app create laravelapp php-5.4 mysql-5.5 --from-code=https://github.com/iamraphson/DEV-TV
- And you are done!

<img src="https://upload.wikimedia.org/wikipedia/commons/f/ff/Windows_Azure_logo.png" width="200">

- Login to [Windows Azure Management Portal](https://manage.windowsazure.com/)
- Click the **+ NEW** button on the bottom left of the portal
- Click **COMPUTE**, then **WEB APP**, then **QUICK CREATE**
- Enter a name for **URL** and select the datacenter **REGION** for your web site
- Click on **CREATE WEB APP** button
- Once the web site status changes to *Running*, click on the name of the web site to access the Dashboard
- At the bottom right of the Quickstart page, select **Set up a deployment from source control**
- Select **Local Git repository** from the list, and then click the arrow
- To enable Git publishing, Azure will ask you to create a user name and password
- Once the Git repository is ready, you will be presented with a **GIT URL**
- Inside your *DEV-TV* directory, run `git remote add azure [Azure Git URL]`
- To push your changes simply run `git push azure master`
 - **Note:** *You will be prompted for the password you created earlier*
- On **Deployments** tab of your Windows Azure Web App, you will see the deployment history


**Note:** Alternative directions, including how to setup the project with a DevOps pipeline are available at [http://ibm.biz/hackstart](http://ibm.biz/hackstart).
A longer version of these instructions with screenshots is available at [http://ibm.biz/hackstart2](http://ibm.biz/hackstart2).
Also, be sure to check out the [Jump-start your hackathon efforts with DevOps Services and Bluemix](https://www.youtube.com/watch?v=twvyqRnutss) video.

## Contributing

Thank you for considering contributing to Dev-TV

## Security Vulnerabilities

If you discover a security vulnerability within Dev-TV, please send an e-mail to Ayeni Olusegun at nsegun5@gmail.com. All security vulnerabilities will be promptly addressed.


## How can I thank you?

Why not star the github repo? I'd love the attention! Why not share the link for this repository on Twitter or HackerNews? Spread the word!

Don't forget to [follow me on twitter](https://twitter.com/iamraphson)!

Thanks!
Ayeni Olusegun.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.