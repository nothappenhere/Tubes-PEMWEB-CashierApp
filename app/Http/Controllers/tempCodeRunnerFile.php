user = Auth::user();
        dd($user->id, $user->email, $user->username);