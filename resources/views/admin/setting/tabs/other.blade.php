<div class="row">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('commission', '返佣比例', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-10">
                <div class="input-group">
                    {{ Form::text('other[commission]', isset(json_decode($setting->other)->commission) ? json_decode($setting->other)->commission: '', ['class' => 'form-control']) }}
                    <span class="input-group-addon">%</span>
                </div>
                <p class="help-block">这里是比例介绍</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('recharge', '充值返利', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-10">
                <div class="input-group">
                    <span class="input-group-addon">充值</span>
                    {{ Form::text('other[recharge1]', isset(json_decode($setting->other)->recharge1) ? json_decode($setting->other)->recharge1: '', ['class' => 'form-control']) }}
                    <span class="input-group-addon">元，返</span>
                    {{ Form::text('other[recharge2]', isset(json_decode($setting->other)->recharge2) ? json_decode($setting->other)->recharge2: '', ['class' => 'form-control']) }}
                    <span class="input-group-addon">元</span>
                </div>
                <p class="help-block">充值越多返利越多</p>
            </div>
        </div>

    </div>

</div>
