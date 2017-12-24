<h2 align="center">Laravel 5 Quickstart<h5>
<p align="center">
<a href="https://styleci.io/repos/109128127"><img src="https://styleci.io/repos/109128127/shield?branch=master" alt="StyleCI"></a>
<a href="https://travis-ci.org/niugengyun/laravel-5-quickstart"><img src="https://travis-ci.org/niugengyun/laravel-5-quickstart.svg?branch=master" alt="Build Status"></a>
<a href='https://coveralls.io/github/niugengyun/laravel-5-quickstart?branch=master'><img src='https://coveralls.io/repos/github/niugengyun/laravel-5-quickstart/badge.svg?branch=master' alt='Coverage Status' /></a>
<a href='https://www.versioneye.com/user/projects/59fdec8415f0d7004ef73040'><img src='https://www.versioneye.com/user/projects/59fdec8415f0d7004ef73040/badge.svg?style=flat-square' alt="Dependency Status" /></a>
<a href="https://packagist.org/packages/niugengyun/laravel-5-quickstart"><img src="https://poser.pugx.org/niugengyun/laravel-5-quickstart/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/niugengyun/laravel-5-quickstart"><img src="https://poser.pugx.org/niugengyun/laravel-5-quickstart/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/niugengyun/laravel-5-quickstart"><img src="https://poser.pugx.org/niugengyun/laravel-5-quickstart/license.svg" alt="License"></a>
</p>

<p align="center">
    <b>希望能帮助你少写点代码</b>
</p>

## Requirement

1. PHP >= 7.0
2. **[Composer](https://getcomposer.org/)**
3. PHP openssl 扩展
4. PHP fileinfo 扩展

## Introduction

1. 项目基于laravel5.5开发，目的为了快速开发一个新项目。

2. 内置了三大模块：微信开发、Api接口、权限管理。

3. 其他功能没有集成，系统后台采用的AdminLTE后台模板。



## Installation

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

## Documentation

待完善

## Used Packages

- [InfyOmLabs/adminlte-templates](https://github.com/InfyOmLabs/adminlte-templates)
- [laravelcollective/html](https://github.com/LaravelCollective/html)
- [overtrue/laravel-filesystem-qiniu](https://github.com/overtrue/laravel-filesystem-qiniu)
- [overtrue/laravel-ueditor](https://github.com/overtrue/laravel-ueditor)
- [overtrue/laravel-wechat](https://github.com/overtrue/laravel-wechat)
- [prettus/l5-repository](https://github.com/andersao/l5-repository)
- [spatie/laravel-permission](https://github.com/spatie/laravel-permission)
- [yajra/laravel-datatables](https://github.com/yajra/laravel-datatables)
- [dingo/api](https://github.com/dingo/api)


## Recommend Packages

- [intervention/image](https://github.com/Intervention/image)
- [ixudra/curl](https://github.com/ixudra/curl)
- [league/uri](https://github.com/thephpleague/uri)
- [maatwebsite/excel](https://github.com/Maatwebsite/Laravel-Excel)
- [orzcc/taobao-top-client](https://github.com/orzcc/taobao-top-client)
- [sentry/sentry-laravel](https://github.com/getsentry/sentry-laravel)
- [vinkla/hashids](https://github.com/vinkla/laravel-hashids)
- [tymon/jwt-auth](https://github.com/tymondesigns/jwt-auth)


## License

MIT