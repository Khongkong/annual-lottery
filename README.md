# 2020 尾牙抽獎後端 API

> 一個拿來尾牙抽獎的 API 們，使用 Laravel 7.0 做開發

## 運行環境需求

符合 [Laravel Server Requirements](https://laravel.com/docs/7.x/installation#server-requirements) 即可達到運行需求 

### 其他運行必須

- `composer` 進行相關套件的下載
- 生成需要的環境檔：`cp .env.example .env`
- 生成key：`php artisan key:generate`

### 本機運行

`php artisan serve` 即可運行。當然也可以用 docker 運行。

## Swagger 文件

使用 `zircote/swagger-php` 與 `darkaonline/l5-swagger` 撰寫 API 文件

- `php artisan l5-swagger:generate` 即可在 `storage/api-docs/` 產生 swagger json 文件；
- 靜態頁面於 `http://localhost:8000/api/documentation`。

## 測試相關

- code-sniffing 可下 `./vendor/bin/phpcs` 相關設定檔於 [`phpcs.xml`](/phpcs.xml)；
- 測試可下 `./vendor/bin/phpunit`

## Built With

- [Laravel](http://laravel.com) - The web framework

## 開發者

- **Harbor Liu** 