<!DOCTYPE html>
<html>
<head>
<title>Ladda upp bild</title>
<link rel="stylesheet" href="css/green.css">
</head>
<body>
<form action="view/" method="post" enctype="multipart/form-data">
    @csrf
    <div class="selfield">
    <p><label for="imagefile">Välj en fil:</label><br>
    <input type="file" id="imagefile" name="imagefile"><br>
    </p></div>
    <div class="separator"></div>
    <div class="selfield">
    <p>Välj färg för logotyp:<br>
    <input type="radio" id="dark" name="logocolor" value="dark">
    <label for="dark">Mörk</label><br>
    <input type="radio" id="light" name="logocolor" value="light">
    <label for="light">Ljus</label><br></p>
    </div>
    <div class="separator"></div>
    <div class="selfield">
    <p>Anpassa bild till plattform:<br>
    <input type="radio" id="facebook" name="platform" value="facebook">
    <label for="facebook">Facebook</label><br>
    <input type="radio" id="instagram" name="platform" value="instagram">
    <label for="instagram">Instagram</label><br></p>
    </div>
    <div class="separator"></div>
    <div class="selfield">
    <p><input type="submit" value="Skicka filen"><br></p>
    </div>
</form>
</body>
</html>
