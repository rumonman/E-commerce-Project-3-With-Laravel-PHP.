<?php

namespace App\Helpers;

use App\User;
use App\Helpers\GravatarHelper;
/**
 * 
 */
class ImageHelper 
{
	
	public static function getUserImage($id)
	{
		$user = User::find($id);
		$avatar_url = "";
		if(!is_null($user)){
			if($user->avatar == NULL){
				if(GravatarHelper::validate_gravatar($user->email)){
                  
                 $avatar_url = GravatarHelper::gravatar_image($user->email, 100);
				}else{
                 $avatar_url = url('frontend/img/defaults/1.png');
				}
			}else{
              $avatar_url = url('frontend/img/users/'.$user->avatar);
			}
		}else{
			//return redirect('/');
		}

		return  $avatar_url;
	}
}