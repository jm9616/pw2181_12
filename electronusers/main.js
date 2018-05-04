//Aplicacion general
const app=require('electron').app;
//Uso de las pantallas del sistema
const BrowserWindow=require('electron').BrowserWindow;
//ruta de la carpeta base
const path=require('path');
//URL de las paginas
const url=require('url');
//ECMASCRIPT 6 - JS
let PantallaPrincipal;


function muestraPantallaPrincipal(){
	PantallaPrincipal = new BrowserWindow({width:620,height:825});
	PantallaPrincipal.loadURL(url.format({
		//join: concatenar cadenas
		pathname:path.join(__dirname,'index.html'),
		protocol: 'file',
		slashed: true
	}));
	//PantallaPrincipal.webContents.openDevTools();
	PantallaPrincipal.show();
}
app.on('ready',muestraPantallaPrincipal);



