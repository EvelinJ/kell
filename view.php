<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Kuva kell</title>

        <script>
            function alustaKell() {
                var systeemiKell = new Date();
                var serveriKell = new Date(<?php time() * 1000; ?>);
                var kelladeErinevus = systeemiKell - serveriKell;
				
				document.getElementById('systeem').innerHTML = systeemiKell;
				document.getElementById('server').innerHTML = serveriKell;
				
				//kas on sünkroonis
				var erinevus = document.getElementById('erinevus');
				if (kelladeErinevus == 0) {
					erinevus.innerHTML = "on sünkroonis";
				} else {
					erinevus.innerHTML = "ei ole sünkroonis";
				}
				
				//salvestame muutujatesse tunnid, minutid, sekundid
                var h = systeemiKell.getHours();
                var m = systeemiKell.getMinutes();
                var s = systeemiKell.getSeconds();
				
				var tunnid = serveriKell.getHours();
                var minutid = serveriKell.getMinutes();
                var sekundid = serveriKell.getSeconds();
				
				//lisame nullid minutitele ja sekunditele, kui on 10 väiksemad
                m = lisaNull(m);
                s = lisaNull(s);
				
				minutid = lisaNull(minutid);
                sekundid = lisaNull(sekundid);
				
				//kirjutame viewsse kellaajad
                document.getElementById('systeemiKell').innerHTML = h + ":" + m + ":" + s;
				document.getElementById('serveriKell').innerHTML = tunnid + ":" + minutid + ":" + sekundid;
                
				var t = setTimeout(alustaKell, 500);
            }
            function lisaNull(i) {
               if (i < 10) {i = "0" + i};  // lisab nulli kui < 10
               return i;
            }
            
        </script>
 
    </head>
	
    <body onload="alustaKell()">

        <h1>Kuva kell</h1>
        <div id="kellad">
            <form id="kell">
				<table>
				    <tr>
                        <td>Süsteemi kell:</td>
                        <td>
                            <div id="systeemiKell"></div>
                        </td>
						<td>
                            <div id="systeem"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Serveri kell:</td>
                        <td>
                            <div id="serveriKell"></div>
                        </td>
						<td>
                            <div id="server"></div>
                        </td>
                    </tr>
					<tr>
                        <td>Kellad:</td>
                        <td>
                            <div id="erinevus"></div>
                        </td>
                    </tr>
                </table>
				
            </form>
        </div>
    </body>
</html>
