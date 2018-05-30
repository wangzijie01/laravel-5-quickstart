<?php

namespace App\Http\Controllers\Admin;

use Exception;
use function dd;
use function auth;
use function flash;
use function request;
use App\Models\Setting;
use Vinkla\Hashids\Facades\Hashids;
use App\Http\Controllers\Controller;
use App\Repositories\SettingRepository;
use App\Http\Requests\Setting\UpdateSettingRequest;

class SettingController extends Controller
{
    /**
     * @var SettingRepository
     */
    protected $settingRepository;

    /**
     * SettingController constructor.
     * @param SettingRepository $settingRepository
     */
    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    /**
     * 设置.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //当前标签
        $tab = request('tab');
        if (! $tab) {
            $tab = 1;
        }
        //设置信息  不存在则创建
        $setting = $this->settingRepository
            ->firstOrCreate([
                'user_id' => auth()->user()->id,
            ]);

        //输出
        return view('admin.setting.index')
            ->with('tab', $tab)
            ->with('setting', $setting);
    }

    /**
     * @param UpdateSettingRequest $request
     * @param Setting $setting
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        switch (request('tab')) {
            case 1: //小程序
                $this->setMiniProgramData();
                break;
            case 2: //公众号
                $this->setWechatData();
                break;
            case 3: //微信支付
                $this->setPaymentData();
                break;
            case 4: //其他
                $this->setOtherData();
                break;
            default:
                break;
        }

        flash('设置保存成功')->success()->important();

        return redirect()->back();
    }

    /**
     * 设置小程序信息.
     */
    private function setMiniProgramData()
    {
        $data = request()->all();
        $miniProgram = [
            'appid' => isset($data['mini_program']['appid']) ? $data['mini_program']['appid'] : '',
            'app_secret' => isset($data['mini_program']['app_secret']) ? $data['mini_program']['app_secret'] : '',
            'url' => isset($data['mini_program']['url']) ? $data['mini_program']['url'] : '',
            'token' => isset($data['mini_program']['token']) ? $data['mini_program']['token'] : '',
            'aes_key' => isset($data['mini_program']['aes_key']) ? $data['mini_program']['aes_key'] : '',
        ];

        $insert['mini_program'] = json_encode($miniProgram);

        try {
            $this->settingRepository->updateOrCreate([
                'user_id' => auth()->user()->id,
            ], $insert);
        } catch (Exception $e) {
            flash($e->getMessage())->error()->important();
        }
    }

    /**
     * 保存公众号信息.
     */
    private function setWechatData()
    {
        $data = request()->all();
        $wechat = [
            'appid' => isset($data['wechat']['appid']) ? $data['wechat']['appid'] : '',
            'app_secret' => isset($data['wechat']['app_secret']) ? $data['wechat']['app_secret'] : '',
        ];

        $insert['wechat'] = json_encode($wechat);
        dd($insert);
        try {
            $this->settingRepository->updateOrCreate([
                'user_id' => auth()->user()->id,
            ], $insert);
        } catch (Exception $e) {
            flash($e->getMessage())->error()->important();
        }
    }

    /**
     * 设置支付信息.
     */
    private function setPaymentData()
    {
        $data = request()->all();

        $payment = [
            'app_id' => isset($data['payment']['app_id']) ? $data['payment']['app_id'] : '',
            'mch_id' => isset($data['payment']['mch_id']) ? $data['payment']['mch_id'] : '',
            'key' => isset($data['payment']['key']) ? $data['payment']['key'] : '',
            'cert_path' => storage_path('apiclient/'.Hashids::encode(session('uuid')).'/apiclient_cert.pem'),
            'key_path' => storage_path('apiclient/'.Hashids::encode(session('uuid')).'/apiclient_key.pem'),
        ];

        $insert['payment'] = json_encode($payment);

        try {
            $this->settingRepository->updateOrCreate([
                'user_id' => auth()->user()->id,
            ], $insert);
        } catch (Exception $e) {
            flash($e->getMessage())->error()->important();
        }
    }

    /**
     * 保存其他信息.
     */
    private function setOtherData()
    {
        $data = request()->all();
        $other = [
            'commission' => isset($data['other']['commission']) ? $data['other']['commission'] : '',
            'recharge1' => isset($data['other']['recharge1']) ? $data['other']['recharge1'] : '',
            'recharge2' => isset($data['other']['recharge2']) ? $data['other']['recharge2'] : '',
        ];

        $insert['other'] = json_encode($other);

        try {
            $this->settingRepository->updateOrCreate([
                'user_id' => auth()->user()->id,
            ], $insert);
        } catch (Exception $e) {
            flash($e->getMessage())->error()->important();
        }
    }
}
