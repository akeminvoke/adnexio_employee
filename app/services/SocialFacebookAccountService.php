<?php

namespace App\Services;
use App\SocialFacebookAccount;
use App\User;
use App\Profiles;
use Laravel\Socialite\Contracts\User as ProviderUser;
use App\socialFacebookAccoun;

class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $path = base_path().'/public/assets/media/avatars/';

                $profileavatar = $providerUser->getEmail();

                $filename = $path.$profileavatar.".jpg";




                file_put_contents($filename,file_get_contents($providerUser->getAvatar()));

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => md5(rand(1,10000)),
                    'profile_images'=>  $profileavatar,
                ]);
				
				
				$profiles = Profiles::create([
					'user_id' => $user['id']
				]);				
				
				
				
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
