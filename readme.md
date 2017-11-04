# Laravel 5 Quickstart
[![StyleCI](https://styleci.io/repos/109128127/shield?branch=master)](https://styleci.io/repos/109128127) [![Build Status](https://travis-ci.org/niugengyun/laravel-5-quickstart.svg?branch=master)](https://travis-ci.org/niugengyun/laravel-5-quickstart)

## 介绍

项目基于laravel5.5开发，日常开发常用的模块已经写好，不用每次开发都重新写代码。

系统一共内置了三大模块：微信开发的相关、APP接口、基于权限的用户管理模块。

其他功能没有集成，系统后台采用的AdminLTE后台模板。



## 安装

1.**克隆项目**

```bash
git clone https://github.com/niugengyun/laravel-5-quickstart
```

2.**进入项目根目录执行**

```bash
composer update && npm install && npm run dev
```

3.**编辑 `.env`，并配置你的数据库信息**

4.**生成数据库和填充数据**

```bash
php artisan migrate && php artisan db:seed
```



## 用到的包

这些包都已经在项目中集成，没用过的可以在github看文档


- [InfyOmLabs/adminlte-templates](https://github.com/InfyOmLabs/adminlte-templates)
- [hieu-le/active](https://github.com/letrunghieu/active)
- [laravelcollective/html](https://github.com/LaravelCollective/html)
- [overtrue/laravel-filesystem-qiniu](https://github.com/overtrue/laravel-filesystem-qiniu)
- [overtrue/laravel-ueditor](https://github.com/overtrue/laravel-ueditor)
- [overtrue/laravel-wechat](https://github.com/overtrue/laravel-wechat)
- [prettus/l5-repository](https://github.com/andersao/l5-repository)
- [spatie/laravel-permission](https://github.com/spatie/laravel-permission)
- [yajra/laravel-datatables](https://github.com/yajra/laravel-datatables)
- [InfyOmLabs/laravel-generator](https://github.com/InfyOmLabs/laravel-generator)





## 其他包推荐

这些包没有在项目中集成，根据实际需求决定是否需要引入，具体功能进项目主页查看

- [intervention/image](https://github.com/Intervention/image)
- [ixudra/curl](https://github.com/ixudra/curl)
- [league/uri](https://github.com/thephpleague/uri)
- [maatwebsite/excel](https://github.com/Maatwebsite/Laravel-Excel)
- [orzcc/taobao-top-client](https://github.com/orzcc/taobao-top-client)
- [overtrue/laravel-wechat](https://github.com/overtrue/laravel-wechat)
- [sentry/sentry-laravel](https://github.com/getsentry/sentry-laravel)
- [vinkla/hashids](https://github.com/vinkla/laravel-hashids)
- [dingo/api](https://github.com/dingo/api)
- [tymon/jwt-auth](https://github.com/tymondesigns/jwt-auth)