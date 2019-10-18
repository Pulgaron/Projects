//importar modulos del router del angular

import {ModuleWithProviders} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';


//importar componentes a los cuales les quiero hgacer una pagina exclusiva

import {HomeComponent} from './components/home/home.component';
import {BlogComponent} from './components/blog/blog.component';
import {FormularioComponent} from './components/formulario/formulario.component';
import {PaginaComponent} from './components/pagina/pagina.component';
import {PeliculasComponent} from './components/peliculas/peliculas.component';
import {ErrorComponent} from './components/error/error.component';
// array de rutas 

const appRoutes: Routes = [

    {path: '', component: HomeComponent},
    {path: 'home', component: HomeComponent},
    {path: 'blog', component: BlogComponent},
    {path: 'formulario', component: FormularioComponent},
    {path: 'peliculas', component: PeliculasComponent},
    {path: 'pagina-de-prueba', component: PaginaComponent},
    {path: 'pagina-de-prueba/:nombre/:apellido', component: PaginaComponent},
    {path: '**', component: ErrorComponent }
];

//exportar el modulo de rutas

export var appRoutingProviders: any[] = [];
export var routing: ModuleWithProviders = RouterModule.forRoot(appRoutes);