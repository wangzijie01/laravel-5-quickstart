<?php

namespace App\Http\Controllers\Api;

use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Transformers\UserTransformer;

/**
 * Class UserController.
 */
class UserController extends Controller
{
    use Helpers;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * 返回所有用户 每页10条
     * @return \Dingo\Api\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->paginate(10, [
            'id',
            'name',
            'email',
            'remember_token',
            'created_at',
            'updated_at',
        ]);

        return $this->response->paginator($users, new UserTransformer());
    }
}
