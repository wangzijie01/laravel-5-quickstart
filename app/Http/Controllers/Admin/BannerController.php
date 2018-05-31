<?php

namespace App\Http\Controllers\Admin;

use function auth;
use function flash;
use App\Models\Banner;
use App\DataTables\BannerDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\BannerRepository;
use App\Http\Requests\Banner\StoreBannerRequest;
use App\Http\Requests\Banner\UpdateSettingRequest;

class BannerController extends Controller
{
    /**
     * @var BannerRepository
     */
    protected $bannerRepository;

    /**
     * BannerController constructor.
     * @param BannerRepository $bannerRepository
     */
    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * @param BannerDataTable $dataTable
     * @return mixed
     */
    public function index(BannerDataTable $dataTable)
    {
        return $dataTable->render('admin.banner.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * @param StoreBannerRequest $request
     * @return \Illuminate\Http\RedirectResponse|void
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(StoreBannerRequest $request)
    {
        $data = $request->all();

        $data['user_id'] = auth()->user()->id;

        $this->bannerRepository->create($data);

        flash('店招创建成功')->success()->important();

        return redirect()->route('admin.banner.index');
    }

    /**
     * @param Banner $banner
     * @return $this
     */
    public function show(Banner $banner)
    {
        return view('admin.banner.show')
            ->with('banner', $banner);
    }

    /**
     * @param Banner $banner
     * @return $this
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit')
            ->with('banner', $banner);
    }

    /**
     * @param UpdateSettingRequest $request
     * @param Banner $banner
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UpdateSettingRequest $request, Banner $banner)
    {
        $data = $request->all();

        $data['user_id'] = auth()->user()->id;

        $this->bannerRepository->update($data, $banner->id);

        flash('店招信息修改成功')->success()->important();

        return redirect()->back();
    }

    /**
     * @param Banner $banner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Banner $banner)
    {
        $this->bannerRepository->delete($banner->id);

        flash('店招删除成功')->success()->important();

        return redirect()->back();
    }
}
