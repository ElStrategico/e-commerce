<?php

namespace App\Http\Controllers\API\v1;

use App\Models\UserAvatar;
use App\Http\Controllers\Controller;
use App\Http\Requests\UploadAvatarRequest;

class AvatarController extends Controller
{
    public function upload(UploadAvatarRequest $request)
    {
        return UserAvatar::upload($request->file('avatar'));
    }
}
