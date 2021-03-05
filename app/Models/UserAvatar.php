<?php


namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class UserAvatar
{
    const AVATAR_NAME_LENGTH = 10;
    const UPLOAD_DIRECTORY = 'uploads/avatars';

    private static function getFullPath($fileName)
    {
        return '/' . self::UPLOAD_DIRECTORY . '/' . $fileName;
    }

    public static function upload(UploadedFile $uploadedFile)
    {
        $fileName = Str::random(self::AVATAR_NAME_LENGTH);
        $fileName .= '.' . $uploadedFile->extension();

        $uploadedFile->move(public_path(self::UPLOAD_DIRECTORY), $fileName);

        /* @var User $user */
        $user = User::find(auth()->id());
        //$user = MockUser::get();
        $user->avatar = self::getFullPath($fileName);
        $user->save();

        return self::getFullPath($fileName);
    }

}
