<html>
<body>
<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" method="POST" action="/konekt">
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="image" type="file" />
    <input type="submit" value="Send File" />
</form>
</body>
</html>
