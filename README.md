### アプリケーション名
Wear-Real-App

### アプリケーションの概要
#### 訪日外国人旅行客向けのアウターレンタルサービス
ログイン後のユーザー表紙
![2023-02-10_17h26_41](https://user-images.githubusercontent.com/116773179/218043230-0630a167-17ea-49ab-ad55-18360a045b5d.png)
商品投稿ページ（店側）
![2023-02-10_17h14_32](https://user-images.githubusercontent.com/116773179/218043102-844940bb-8091-463c-903f-d2c973f70858.png)
商品編集ページ（店側）
![2023-02-10_17h19_46](https://user-images.githubusercontent.com/116773179/218042863-07d51cd0-7643-45e5-9197-a6c8a8b78771.png)

### 制作背景
前職が旅行業だったことから訪日外国人観光客に対しより便利に日本を楽しんでもらえるサービスを対案できないかと考えた。街中でも多く外国人観光客を見かけるが、温暖な気候で暮らす人々（台湾、タイ、フィリピン、インドネシア、マレーシアなど）が冬の日本観光に訪れている時に購入したアウターは自国に持って帰っているのだろうかと疑問に思った。フィリピン人の友人に聞くと冬に来日した際にやむ負えず購入したが自国では箪笥の肥やしになっていると話を聞いた。アウターがレンタルできるサービスがあれば、荷物が減り秋～冬の日本観光でお土産などもっとスーツケースが詰められるし、地球環境に優しい取り組みになるのではないかと思いアプリを作成した。

### 使用技術
* HTML
* CSS
* PHP（Laravel）
* MySQL

### 機能一覧
* 登録、ログイン機能
* 登録者へのメール機能
* 商品へのコメント機能
* いいねのカウント機能
* プロフィール機能

##### [admin / 店側]
  * 商品アップ機能
  * 商品編集、商品消去機能
  * ユーザー、商品データ管理機能（ユーザーデータ一覧/商品一覧/タグ追加/ジェンダー追加）
##### [user / ユーザー側]
  * カート機能
  * いいねした商品を一覧できる機能
  * 商品個数・レンタル期間での計算機能、返却日計算機能

### こだわった部分
* adminとuserでページ表示を変えた（Edit/DeleteボタンとRentalボタン）
* カート機能では商品個数×レンタル期間で合計金額が計算できるようにし、返却日も計算して見えるようにした。（次項に画像あり）
* adminではタグの数や投稿データをわかりやすく一覧できるようにした。
![2023-02-10_17h26_41](https://user-images.githubusercontent.com/116773179/218042256-94e5aa32-f935-456b-8ed6-f4c56e94df8c.png)
* 登録者リスト
![2023-02-10_17h13_12](https://user-images.githubusercontent.com/116773179/218043519-81df80aa-9df9-469e-b957-715002a6b258.png)
* 商品リスト
![2023-02-10_17h12_45](https://user-images.githubusercontent.com/116773179/218043447-55a45f83-6b46-438e-8b7a-a4034d142c31.png)
* タグ一覧
![2023-02-10_17h13_01](https://user-images.githubusercontent.com/116773179/218043668-bc35e098-7726-4bca-adaa-004e973b4665.png)
![2023-02-10_17h13_29](https://user-images.githubusercontent.com/116773179/218043775-3fc21064-c9ad-4637-965b-075e1b35991e.png)


### 苦労した部分
カート内の計算式。ループを使い商品ID等のデータを取り出し、ループを使って計算するところが一番時間を使った。
![2023-02-10_17h27_45](https://user-images.githubusercontent.com/116773179/218043864-dc841835-6236-4121-b4a9-981f68592b20.png)
![2023-02-10_17h28_11](https://user-images.githubusercontent.com/116773179/218043377-951f7c7d-dd74-4f69-b45f-1c1df4c80e85.png)

### 今後追加したい機能（現段階でできてない箇所）
計算後の支払い機能





# Project Setup

### versions
```
- PHP:  7.4.22 
- Nginx: 1.18.0
- Mysql: 8.0.26
```

## FOR LINUX/MAC ENVIRONMENT

#### create the project
```
1. $ git clone this repository
2. $ cd project
```

#### setting up the project
```
1. $ cp .env.template .env
2. $ cd backend
3. $ ls -la                               [to check the current files / folders existing inside the ./backend folder]
4. $ sudo rm -rf your_file_or_folder_name [to delete your file/folder]
5. $ cd ..                                [return to the main folder]
5. $ make create-project
6. Edit db info and app_url inside the ./backend/.env file


APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=kredo
DB_USERNAME=kredo
DB_PASSWORD=password

6. $ docker-compose exec app php artisan migrate
```


### check browser
```
web server:     http://localhost/
php my admin:   http://localhost:8888/
```

### executables
```
# up default container
$ docker-compose up -d

# build no cache and force remake container
$ docker-compose build --no-cache --force-rm

# check container
$ docker ps

# stop container
$ docker-compose stop

# remove container
$ docker-compose down

# remove all of container stuff
# docker-compose down --rmi all --volumes

# log for laravel
$ docker-compose logs

# seeding the database
$ docker-compose exec app php artisan db:seed
```



## FOR WINDOWS ENVIRONMENT
### MAKE SURE TO EXECUTE THE COMMANDS UNDER GIT BASH TERMINAL. IF YOU DON'T HAVE GIT BASH IN YOUR SYSTEM, KINDLY REFER TO THIS LINK
```
1. https://git-scm.com/downloads 
2. Select the installer for windows
```
### installation

```
1. git clone this repository
2. cd project
```

#### Prioritize this change. Copy the line of code below and change the infra/mysql/Dockerfile code
```
FROM mysql:8.0.26

COPY ./my.cnf /etc/mysql/conf.d/my.cnf
RUN chmod 644 /etc/mysql/conf.d/my.cnf
```

#### create a project
```
1. mkdir -p ./docker/php/bash/psysh
2. touch ./docker/php/bash/.bash_history
3. cp .env.template .env
4. [unhide ALL FILES AND FOLDERS inside the ./backend and delete it manually]
5. winpty docker-compose up --build -d
6. winpty docker-compose exec app composer create-project --prefer-dist laravel/laravel . "8.*"
```
### project setup
```
1. cp backend/.env.example backend/.env
2. winpty docker-compose exec app composer install
3. winpty docker-compose exec app php artisan key:generate

# modify this to your ./backend/.env file 
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=kredo
DB_USERNAME=kredo
DB_PASSWORD=password


4. winpty docker-compose exec app php artisan config:cache
5. winpty docker-compose exec app php artisan storage:link
6. winpty docker-compose exec app chown www-data storage/ -R
7. winpty docker-compose exec app php artisan migrate
```

#### executables

```
# up default container
winpty docker-compose up -d

# build no cache and force remake container
winpty docker-compose build --no-cache --force-rm

# check container
winpty docker ps

# stop container
winpty docker-compose stop

# remove container
winpty docker-compose down

# remove all of container stuff
winpty docker-compose down --rmi all --volumes

# log for laravel
winpty docker-compose logs

# seeding the database
winpty docker-compose exec app php artisan db:seed
```


## FYI
#### laravel storage log errors  / laravel storage permission
```
# [LINUX/MAC]
$ docker-compose exec app chown www-data storage/ -R
$ docker-compose exec app chmod -R 777 storage/

------------------

# [WINDOWS]
winpty docker-compose exec app chown www-data storage/ -R
winpty docker-compose exec app chmod -R 777 storage/
```
