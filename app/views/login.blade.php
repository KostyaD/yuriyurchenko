<form action="{{URL::to('login')}}" method="POST">
	<input type="text" name="user">
	<input type="password" name="password">
	<button type="submit">Войти</button>
</form>
@if (Session::has('message'))
    <div class="flash alert">
        <p>{{ Session::get('message') }}</p>
    </div>
@endif