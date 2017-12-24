<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Scopes\MemberScope;
use App\Models\Member;
use App\DataTables\MemberDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\MemberRepository;
use App\Http\Requests\Member\UpdateMemberRequest;
use Illuminate\Support\Facades\Request;

class MemberController extends Controller
{
    /**
     * @var MemberRepository
     */
    protected $memberRepository;

    /**
     * MemberController constructor.
     * @param MemberRepository $memberRepository
     */
    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * @param MemberDataTable $dataTable
     * @return mixed
     */
    public function index(MemberDataTable $dataTable)
    {
        $member = $this->memberRepository->find(1);
        if (request('member_id') || request('inviter_id')) {
            return $dataTable
                ->addScope(new MemberScope())
                ->render('admin.member.index');
        }
        return $dataTable->render('admin.member.index');
    }


    /**
     * @param Member $member
     * @return $this
     */
    public function show(Member $member)
    {
        return view('admin.member.show')
            ->with('member', $member);
    }

    /**
     * @param Member $member
     * @return $this
     */
    public function edit(Member $member)
    {
        return view('admin.member.edit')
            ->with('member', $member);
    }

    /**
     * @param UpdateMemberRequest $request
     * @param Member $member
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $data = [
            'nickname' => request('nickname')
        ];

        $this->memberRepository->update($data, $member->id);


        flash('会员信息修改成功')->success()->important();

        return redirect()->back();
    }

    /**
     * @param Member $member
     */
    public function destroy(Member $member)
    {
        $this->memberRepository->delete($member->id);

        flash('会员删除成功')->success()->important();

        return redirect()->back();
    }
}
