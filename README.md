## About App

Everyone has a Facebook account so you know it is imposible to track what we posted. the app provided the 100 photos that you posted of Facebook. You can choose the best 9 photos and add to your own photo collection

The application configured as multitenant application. User only show their photos. I have use Multitenantable traits in the Photo model 



## Tech Pack

- [Laravel 8](https://laravel.com/docs/8.x).
- [TailwindCSS](https://tailwindcss.com/docs).
- MySQL as Database.

## API Documntation 
- [Postman documenter](https://documenter.getpostman.com/view/12479368/UVsHUTjK)


## Packages in the project
- Quickly make outgoing HTTP requests [ Guzzle HTTP client](https://laravel.com/docs/8.x/http-client).



## How to Configure

#### Step 1

* Clone git repo
```shell
:~# git clone https://github.com/chathurakodikara/news-api.git
```
* Go to your folder and open with a code editor (VS code, Sublime text etc)
* Use CMD and run composer install to install php packages
```shell
:~# composer install
```
* Then run npm install for node packages
```shell
:~# npm install && npm run dev
```
* Migrate database 
* I have provided faker for User and Image model. php artisan db:seed will insert the data

```shell
:~# php artisan migrate --seed
```


#### Step 2 - update .env file 

- Feel free to use the sample env file provide with the project
- Create a database and update your .env file
- Create a News API account with https://newsapi.org/
- update .env file with its API key

```shell
:~# NEWS_API_KEY=
```
#### Step 3
its time run the application and enjoy
```shell
:~# php artisan serve
```

### Feel free to reach out to me.
- email: chathura321@gmail.com 
- [GitHub](https://github.com/chathurakodikara/Photo9).


