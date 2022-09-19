<!DOCTYPE html>
<html>
<head>
<title>Ladda upp bild</title>
<style>
    input [type=submit] {
        background-color: LightGreen;
        padding: 10px 10px;
    }

    p {
        color: LightGreen;
        margin: 0px;
    }
    div.selfield {
        border-width: 8px;
        border-style: solid;
        border-color: Gold;
        border-radius: 16px;
        width: 300px;
        padding: 16px;
    }
    div.separator {
        width: 300px;
        height: 16px;
        border-width: 0px 8px;
        border-style: hidden;
        padding: 0px 16px;
        background-image: linear-gradient(to right,
                                    transparent 0%,
                                    transparent calc(50% - 5px),
                                    Gold  calc(50% - 4px),
                                    Gold calc(50% + 4px),
                                    transparent calc(50% + 5px),
                                    transparent 100%);
    }


</style>
</head>
<body style="background-color:DarkGreen;" >
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
