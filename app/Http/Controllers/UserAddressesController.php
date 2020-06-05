<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddressRequest;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class UserAddressesController extends Controller
{

    /**
     * 用户地址列表
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view(
            'user_addresses.index',
            [
                'addresses' => $request->user()->addresses,
            ]
        );
    }

    /**
     * 创建用户地址
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view(
            'user_addresses.create_and_edit',
            [
                'address' => new UserAddress(),
            ]
        );
    }

    /**
     * 插入用户地址
     *
     * @param UserAddressRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserAddressRequest $request)
    {
        $request->user()->addresses()->create(
            $request->only(
                [
                    'province',
                    'city',
                    'district',
                    'address',
                    'zip',
                    'contact_name',
                    'contact_phone',
                ]
            )
        );

        return redirect()->route('user_addresses.index');
    }

    /**
     * 编辑用户地址
     *
     * @param UserAddress $userAddress
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(UserAddress $userAddress)
    {
        $this->authorize('own', $userAddress);

        return view('user_addresses.create_and_edit', ['address' => $userAddress]);
    }

    /**
     * 修改用户地址
     *
     * @param UserAddressRequest $request
     * @param UserAddress $address
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UserAddressRequest $request, UserAddress $userAddress)
    {
        $this->authorize('own', $userAddress);

        $userAddress->update(
            $request->only(
                [
                    'province',
                    'city',
                    'district',
                    'address',
                    'zip',
                    'contact_name',
                    'contact_phone',
                ]
            )
        );

        return redirect()->route('user_addresses.index');
    }

    /**
     * 删除用户地址
     *
     * @param UserAddress $userAddress
     * @return array
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(UserAddress $userAddress)
    {

        $this->authorize('own', $userAddress);

        $userAddress->delete();

        return [];
    }
}
