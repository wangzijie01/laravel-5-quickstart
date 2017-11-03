<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,
        HasRoles;

    /**
     * @var string
     */
    protected $guard_name = 'web'; // or whatever guard you want to use

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 获取当前用户所属角色
     * @return string
     */
    public function getRoleNameAttribute()
    {
        $roles = $this->getRoleNames(); // Returns a collection
        $string = "";
        foreach($roles as $role){
            $string .= "<label class='label label-success'>{$role}</label>";
        }
        if($string == ""){
            $string = "<label class='label label-info'>无</label>";
        }
        return $string;
    }
    /**
     * 操作按钮
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return
            $this->getShowButtonAttribute().
            $this->getEditButtonAttribute().
            $this->getDeleteButtonAttribute();
    }

    /**
     * 用户详情
     * @return string
     */
    protected function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.user.show', $this).'" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="查看详情"></i></a> ';
    }

    /**
     * 编辑用户
     * @return string
     */
    protected function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.user.edit', $this).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    /**
     * 删除用户
     * @return string
     */
    protected function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.user.destroy', $this).'"
             data-method="delete"
             data-trans-button-cancel="取消"
             data-trans-button-confirm="删除"
             data-trans-title="你确定要这么做吗?"
             data-trans-text="用户删除后将不成恢复"
             class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="删除"></i></a> ';
    }
}
