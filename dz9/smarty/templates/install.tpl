{include file='header.tpl'}
<form method="post">
	<label>Server name:</label>
	<input type="text" name='server_name'>
	<label>User name</label>
	<input type="text" name='username'>
	<label>Password:</label>
	<input type="password" name='password'>
	<label>Database:</label>
	<input type="text" name='database'>
	<input type="submit" value='install' name="install">
</form>
{include file='footer.tpl'}