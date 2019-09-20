class Coche{
    constructor(modelo, velocidad, antiguedad){
        this.modelo = modelo;
        this.velocidad = velocidad;
        this.antiguedad = antiguedad;
    }

    aumentarVelocidad(){
        this.velocidad += 1;
    }

    reducirVelocidad(){
        this.velocidad -= 1;
    }
}

var coche1 = new Coche("BMW", 200, 2010);
var coche2 = new Coche("AUDI", 100, 2011);
document.write(coche1.velocidad);

coche1.aumentarVelocidad();
coche1.aumentarVelocidad();
coche1.aumentarVelocidad();
coche1.aumentarVelocidad();
document.write(coche1.velocidad);


class Autobus extends Coche{
    constructor(modelo, velocidad, antiguedad){
        super(modelo, velocidad, antiguedad);
    }
}

var autobus1 = new Autobus('pegasus', 200, 2019);
console.log(Autobus.antiguedad);