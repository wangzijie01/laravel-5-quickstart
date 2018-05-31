<?php

namespace App\Http\Controllers\Api;

use function auth;
use function response;
use App\Http\Controllers\Controller;
use App\Repositories\MemberRepository;

class LoginController extends Controller
{
    /**
     * @var MemberRepository
     */
    protected $memberRepository;

    /**
     * LoginController constructor.
     * @param MemberRepository $memberRepository
     */
    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * jwt-auth 登录演示
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = $this->memberRepository->find(1);
        $token = auth()->guard('api')->login($member);

        return response()->json([
            'code' => 1001,
            'message' => 'Login Success',
            'token' => $token,
        ]);
    }
}
