
<form action="/login" method="POST">
    <input type="email" name="email" placeholder="votre mail" />
    <input type="password" name="password"/>
    <input type="submit" value="Se connecter" name="btn">
    @csrf
    {{ csrf_field() }}
</form>


