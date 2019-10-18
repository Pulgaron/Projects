import { Component, OnInit, DoCheck, OnDestroy } from '@angular/core';

@Component({
  selector: 'app-peliculas',
  templateUrl: './peliculas.component.html',
  styleUrls: ['./peliculas.component.css']
})
export class PeliculasComponent implements OnInit {

  public titulo: string;
  public peliculas: Array<Any>;

  constructor() { 
    this.titulo = "componente peliculas weon";
    this.peliculas = [
      {title: "Spiderman 4", image: 'https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwif0vHT34rlAhUFPK0KHWxQB-YQjRx6BAgBEAQ&url=https%3A%2F%2Fwww.pinterest.com%2Fpin%2F452330356322776757%2F&psig=AOvVaw2YDFBj9Z_1IG7U5Ga8b8-9&ust=1570558276203837'},
      {title: "Avengers End Game", image: 'https://is3-ssl.mzstatic.com/image/thumb/Video113/v4/6e/47/f6/6e47f680-ac54-21ff-a37a-3aab1a9970b0/DIS_AV_ENDGAME_FINAL_ENGLISH_US_WW_WW_ARTWORK_EN_2000x3000_1OWPBJ00000GQ6.lsr/268x0w.jpg'},
      {title: "Batman vs Superman", image: 'https://f4.bcbits.com/img/a4199412118_10.jpg'},
      {title: "Batman vs Superman", image: 'https://f4.bcbits.com/img/a4199412118_10.jpg'}
    ];

    console.log("constructor lanzado");
  }

  ngOnInit() {
    console.log(this.peliculas);
    console.log("componente cargado");
  }

  ngDoCheck(){
    console.log("Do check lanzado");
  }

  cambiarTitulo(){
    this.titulo = "el titulo ha sido cambiado";
  }

  ngOnDestroy(){
    console.log("el componente se va a eliminar");
  }
}
