<h2 align="center">Laravel 5 QuickStart<h5>
<p align="center">
<a href="https://styleci.io/repos/109128127"><img src="https://styleci.io/repos/109128127/shield?branch=master" alt="StyleCI"></a>
<a href="https://travis-ci.org/niugengyun/laravel-5-quickstart"><img src="https://travis-ci.org/niugengyun/laravel-5-quickstart.svg?branch=master" alt="Build Status"></a>
</p>

<p align="center">
    <b>快读搭建你的laravel项目</b>
</p>

## 环境要求

1. PHP >= 7.1.3
2. **[Composer](https://getcomposer.org/)**
3. PHP openssl 扩展
4. PHP fileinfo 扩展

## 介绍

这是一个laravel脚手架，常用模块已经写好，包括：

权限管理、基于token验证的接口、小程序用户注册、公众号接入、文章管理等模块


## 安装

1.**克隆项目**

```bash
git clone https://github.com/niugengyun/laravel-5-quickstart
```

2.**执行命令**

```bash
composer update && npm install && npm run dev
```

3.**编辑 `.env`，并配置相关信息**

4.**生成数据库和填充数据**

```bash
php artisan migrate && php artisan db:seed
```
5.**配置jwt-auth**

```bash
php artisan jwt:secret
```

## 用到的包

- [InfyOmLabs/adminlte-templates](https://github.com/InfyOmLabs/adminlte-templates)
- [laravelcollective/html](https://github.com/LaravelCollective/html)
- [overtrue/laravel-filesystem-qiniu](https://github.com/overtrue/laravel-filesystem-qiniu)
- [overtrue/laravel-ueditor](https://github.com/overtrue/laravel-ueditor)
- [overtrue/laravel-wechat](https://github.com/overtrue/laravel-wechat)
- [prettus/l5-repository](https://github.com/andersao/l5-repository)
- [spatie/laravel-permission](https://github.com/spatie/laravel-permission)
- [yajra/laravel-datatables](https://github.com/yajra/laravel-datatables)
- [fxcosta/laravel-chartjs](https://github.com/fxcosta/laravel-chartjs)
- [vinkla/hashids](https://github.com/vinkla/laravel-hashids)
- [tymon/jwt-auth](https://github.com/tymondesigns/jwt-auth)

## 推荐包

- [intervention/image](https://github.com/Intervention/image)
- [ixudra/curl](https://github.com/ixudra/curl)
- [league/uri](https://github.com/thephpleague/uri)
- [maatwebsite/excel](https://github.com/Maatwebsite/Laravel-Excel)
- [orzcc/taobao-top-client](https://github.com/orzcc/taobao-top-client)
- [sentry/sentry-laravel](https://github.com/getsentry/sentry-laravel)


