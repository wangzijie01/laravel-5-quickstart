<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Banner.
 */
class Banner extends Model
{
    /**
     * @var string
     */
    protected $table = 'banners';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'sort', 'status', 'image',
    ];

    /**
     * 状态
     * @return string
     */
    public function getSubscribeLabelAttribute()
    {
        if ($this->status == 0) {
            return '<label class="label label-warning">禁用</label>';
        }
        if ($this->status == 1) {
            return '<label class="label label-primary">显示</label>';
        }

        return '';
    }

    /**
     * 操作按钮.
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return
            $this->getEditButtonAttribute().
            $this->getDeleteButtonAttribute();
    }

    /**
     * 编辑文章.
     * @return string
     */
    protected function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.banner.edit', $this).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    /**
     * 删除文章.
     * @return string
     */
    protected function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.banner.destroy', $this).'"
             data-method="delete"
             data-trans-button-cancel="取消"
             data-trans-button-confirm="删除"
             data-trans-title="你确定要这么做吗?"
             data-trans-text="图片删除后将不能恢复"
             class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="删除"></i></a> ';
    }
}
