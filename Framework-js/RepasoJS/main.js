
var nombre = "Holi";
var altura = 34;

var concatenar = nombre + " " + altura

document.write(concatenar);




var coche = {
    modelo: 'Mercedez Benz',
    velocidad: 599,
    antiguedad: 2010,
    mostrarDatos(){
        console.log(this.modelo,this.antiguedad);
    },
    prop: "valor x"
}

document.write("<h1>"+coche.antiguedad+"</h1>");
coche.mostrarDatos();


var saludar = new Promise((resolve, reject) =>{
    setTimeout(() =>{
        let saludo = "hola mundo";
        saludo = false;
        if(saludo){
            resolve(saludo);

        }else{
            reject("No hay saludo");
        }
    }, 2000);
});

saludar.then(resultado => {
    alert(resultado)
})
.catch(e =>{
    alert(e);
})