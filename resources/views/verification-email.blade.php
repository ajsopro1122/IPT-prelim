<h1>IPT System</h1>

<p>
    Welcome {{$user->name}}!
</p>

<p>
    You've received this email as a result of your registration to our web site.
    Please Click on the verification link to verify your account.
</p>

<p>
    <a href="{{url('/verification/' . $user->id . "/" . $user->remember_token)}}">
        Click here to verify
    </a>
</p>