<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use EasyWeChat\Factory;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\MemberRepository;
use App\Repositories\SettingRepository;
use function response;

/**
 * Class WechatController
 * @package App\Http\Controllers\Api
 */
class WechatController extends Controller
{
    /**
     * @var MemberRepository
     */
    protected $memberRepository;


    /**
     * @var SettingRepository
     */
    protected $settingRepository;

    /**
     * WechatController constructor.
     * @param MemberRepository $memberRepository
     * @param SettingRepository $settingRepository
     */
    public function __construct(MemberRepository $memberRepository, SettingRepository $settingRepository)
    {
        $this->memberRepository = $memberRepository;
        $this->settingRepository = $settingRepository;
    }

    /**
     * 小程序注册或更新用户.
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function onLogin(Request $request)
    {
        //APPID
        $appkey = request('appkey');
        if (!$appkey) {
            return response()->json([
                'code' => '4000',
                'message' => 'Required Appkey'
            ]);
        }
        //APPID 解密
        $decodeID = Hashids::decode(request('appid'));
        if (!$decodeID) {
            return response()->json([
                'code' => '4001',
                'message' => 'Appid Error'
            ]);
        }
        $userID = $decodeID[0];

        //验证code
        $code = request('code');
        if (!$code) {
            return response()->json([
                'code' => '4002',
                'message' => 'Required Code'
            ]);
        }
        //验证encryptedData
        $encryptedData = request('encryptedData');
        if (!$encryptedData) {
            return response()->json([
                'code' => '4003',
                'message' => 'Required EncryptedData'
            ]);
        }
        //验证iv
        $iv = request('iv');
        if (!$iv) {
            return response()->json([
                'code' => '4004',
                'message' => 'Required iv'
            ]);
        }

        //初始化小程序
        $setting = $this->settingRepository->findWhere([
            'user_id' => $userID,
        ])->first();


        //小程序配置信息
        $config = json_decode($setting->mini_program, true);
        $miniProgram = Factory::miniProgram($config);

        $session = $miniProgram->auth->session($code);

        if (!isset($session['session_key'])) {
            return response()->json([
                'code' => '4005',
                'message' => 'UserInfo Get Failed'
            ]);
        }
        //解密用户信息
        $data = $miniProgram->encryptor->decryptData($session['session_key'], $iv, $encryptedData);
        if (!$data) {
            return response()->json([
                'code' => '4006',
                'message' => 'UserInfo Decode Failed'
            ]);
        }

        //判断是否为新用户
        $insert['user_id'] = $userID;
        $insert['nickname'] = $data['nickName'];
        $insert['headimgurl'] = !empty($data['avatarUrl']) ? $data['avatarUrl'] : '';
        $insert['openid'] = $data['openId'];


        $member = $this->memberRepository->updateOrCreate([
            'openid' => $data['openid']
        ], $insert);


        //返回token
        return $this->response->array([
            'code' => 200,
            'message' => '用户注册成功',
            'token' => Auth::guard('api')->login($member),
        ]);
    }

}
