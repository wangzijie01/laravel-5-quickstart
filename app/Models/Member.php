<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Member.
 */
class Member extends Model
{
    /**
     * @var string
     */
    protected $table = 'members';

    /**
     * @var array
     */
    protected $fillable = ['nickname'];

    /**
     * 内关联.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inviter()
    {
        return $this->belongsTo('App\Models\Member', 'inviter_id');
    }

    /**
     * 状态
     * @return string
     */
    public function getSubscribeLabelAttribute()
    {
        if ($this->subscribe == 0) {
            return '<label class="label label-default">未关注</label>';
        }
        if ($this->subscribe == 1) {
            return '<label class="label label-primary">已关注</label>';
        }
        if ($this->subscribe == 2) {
            return '<label class="label label-warning">已取关</label>';
        }

        return '';
    }
    /**
     * 性别
     * @return string
     */
    public function getSexLabelAttribute()
    {
        if ($this->subscribe == 0) {
            return '<label class="label label-warning">未知</label>';
        }
        if ($this->subscribe == 1) {
            return '<label class="label label-primary">男</label>';
        }
        if ($this->subscribe == 2) {
            return '<label class="label label-success">女</label>';
        }

        return '';
    }

    /**
     * 获取会员头像和昵称.
     * @return string
     */
    public function getMemberAvatarAttribute()
    {
        $headimgurl = "<img src='{$this->headimgurl}' width='20' height='20'/>";
        $nickname = "<a href='".route('admin.member.index', ['member_id' => $this])."'>".$this->nickname.'</a>';

        return $headimgurl.'  '.$nickname;
    }

    /**
     * 获取邀请人头像和昵称.
     * @return string
     */
    public function getInviterAvatarAttribute()
    {
        if ($this->inviter == null) {
            return "<label class='label label-success'>无<label>";
        }
        $headimgurl = "<img src='{$this->inviter->headimgurl}' width='20' height='20'/>";
        $nickname = "<a href='".route('admin.member.index', ['inviter_id' => $this->inviter])."'>".$this->inviter->nickname.'</a>';

        return $headimgurl.'  '.$nickname;
    }

    /**
     * 操作按钮.
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
     * 会员详情.
     * @return string
     */
    protected function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.member.show', $this).'" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="查看详情"></i></a> ';
    }

    /**
     * 编辑会员.
     * @return string
     */
    protected function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.member.edit', $this).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    /**
     * 删除用户.
     * @return string
     */
    protected function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.member.destroy', $this).'"
             data-method="delete"
             data-trans-button-cancel="取消"
             data-trans-button-confirm="删除"
             data-trans-title="你确定要这么做吗?"
             data-trans-text="用户删除后将不能恢复"
             class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="删除"></i></a> ';
    }
}
