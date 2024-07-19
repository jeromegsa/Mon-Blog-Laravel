<form action="/register" method="POST">
    <input type="text" name="name" placeholder="votre nom" />
    @error('name')
        <div>{{ $message }}</div>
    @enderror
    <input type="email" name="email" placeholder="votre mail" />
    @error('email')
        <div>{{ $message }}</div>
    @enderror
    <input type="password" name="password">
    @error('password')
        <div>{{ $message }}</div>
    @enderror
    <input type="password" name="password_confirmation">
    <input type="submit" value="Se connecter" name="btn">
    @csrf
    {{ csrf_field() }}
</form>
