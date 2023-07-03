<h1>Welcome To The Dash</h1>


<div class="profile-info" style="display: flex;flex-direction:column;">
    <p>{{$info->username}}</p>
    <p>{{$info->email}}</p>
    <p><a href="{{url('/logout')}}">Logout</a></p>
</div>