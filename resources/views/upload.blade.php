<!DOCTYPE html>
<html>
<head>
<title>Ladda upp bild</title>
</head>
<body>
<form action="view/" method="post" enctype="multipart/form-data">
    @csrf
    <label for="imagefile">Välj en fil</label>
    <input type="file" id="imagefile" name="imagefile"><br>
    Välj färg för logotyp:<br>
    <input type="radio" id="dark" name="logocolor" value="dark">
    <label for="dark">Mörk</label><br>
    <input type="radio" id="light" name="logocolor" value="light">
    <label for="light">Ljus</label><br>
    Anpassa bild till plattform:<br>
    <input type="radio" id="facebook" name="platform" value="facebook">
    <label for="facebook">Facebook</label><br>
    <input type="radio" id="instagram" name="platform" value="instagram">
    <label for="instagram">Instagram</label><br>
    <input type="submit" name="Skicka fil"><br>
</form>
</body>
</html>
