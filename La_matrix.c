#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>

typedef struct cola{
	
	int edad;
	int cont;
	char nombre[20];
	struct cola *siguiente;
}cola;

typedef struct pila{
	
	int id_pila;
	struct pila *siguiente;
	cola *frente;
	cola *fin;
}pila;

typedef struct lista{
	
	int id_lista;
	struct lista *siguiente;
	pila *cima;
}lista;


int insertaBateria(lista **inicio, int n);
int insertaGrupos(pila **cima);
int insertaEnBaterias(lista **inicio, int id_bateria, int var);
int registraEnGrupos(lista **inicio, int id_bateria, int var);
int buscaGrupo(pila **cima, int busca, int var);
int insertaPersonas(cola **frente, cola **fin);
void visualizarLista(lista **inicio);
void visualizaGrupos(pila **cima);
void visualizaPersonas(cola **frente);
int eliminaBateria(lista **inicio, int busca, int var);
void eliminaGrupos(pila **cima);
void eliminaPersonas(cola **frente, cola **fin);
int eliminaBateriaGrupo(lista **inicio, int busca, int var);
int eliminaGrupoID(pila **cima, int busca, int var);
int eliminaBateriaPersonas(lista **incio, int busca, int var);
int eliminaPersonasID(pila **cima, int busca, int var);
int buscaBateria(lista **inicio, int var);
int buscaGrupoRotar(pila **cima, int var);
void rotarPersonas(cola **frente, cola **fin);
void avanzaFin(cola **fin);
int encuentraNEO(lista **inicio, char *neo, int var);
int encuentraNEOgrupos(pila **cima, char *neo, int var);
int encuentraNEOcapsulas(cola **frente, char *neo, int var);
int buscaRepetido(lista *inicio, int n);


int main() {
	
	lista *inicio= NULL;
	int op, id_bateria,num, verifica, resp, busca,reloj=0, aux;
	
	do{
		
		do{
			
			if(reloj==60){
				reloj = 0;
				buscaBateria(&inicio,0);
				system("cls");
				printf("El reloj a marcado 1 hora!!\nSe han rotado los grupos!\n");
				system("pause");
			}
			system("cls");
			printf("\t\t\t\t\t\tSISTEMA LA MATRIX\n\n\n");
			printf("\t\t\t\t\t\tReloj : %d",reloj);
			printf("\n\n\t\t\t\t\t\tQue deseas hacer: \n\n\t\t\t\t\t\t1.-Registrar bateria\n\n\t\t\t\t\t\t2.-Registrar grupos dentro de las baterias\n\n\t\t\t\t\t\t3.-Registrar personas\n\n\t\t\t\t\t\t4.-Visualizar todo\n\n");
			printf("\t\t\t\t\t\t5.-Eliminar bateria\n\n\t\t\t\t\t\t6.-Eliminar grupo\n\n\t\t\t\t\t\t7.-Eliminar personas\n\n\t\t\t\t\t\t8.-Encontrar a NEO\n");
			if(scanf("\t\t\t\t\t\t%d", &op) != 1){
				printf("No se permiten letras ni simbolos.\n\n");
				while(getchar()!='\n');
				system("pause");
			}
			
			if(inicio != NULL){
				if(inicio->cima != NULL){
					if(inicio->cima->fin != NULL) aux = 1;
					else aux = 0;
				}
				else aux = 0;
			}
			else aux = 0;
			
			if(aux == 1){
				reloj = reloj + 10;
			}
			
		}while(op < 1 || op > 8);
		
		switch(op){
			
		case 1:
			system("cls");
			printf("Ingresa el id de la bateria:\n");
			if(scanf("%d",&num) != 1 || num <= 0){
				printf("No se permiten letras ni simbolos y solo numeros mayores a 0\n\n");
				while(getchar()!='\n');
			}
			else{
				verifica = buscaRepetido(inicio, num);
				if(verifica == 1) printf("No puedes repetir el numero!!\n");
				else insertaBateria(&inicio, num);
			} 
			break;
			
		case 2:
			system("cls");
			if(!inicio) printf("No hay baterias registradas!\n");
			else{
				printf("Ingresa el id de la bateria:\n");
				if(scanf("%d", &id_bateria) != 1){
					printf("No se permiten letras ni simbolos.\n\n");
					while(getchar()!='\n');
				}
				else{
					verifica = insertaEnBaterias(&inicio, id_bateria, 0);
					if(verifica == 0) printf("Ese id no esta registrado!\n");
					else printf("Grupo registrado!!");
				}
			}
			break;
			
		case 3:
			system("cls");
			if(!inicio) printf("No hay grupos registrados!!\n");
			else{
				printf("Ingresa el id de la bateria donde deseas insertar:\n");
				if(scanf("%d", &id_bateria) != 1){
					printf("No se permiten letras ni simbolos.\n\n");
					while(getchar()!='\n');
				}
				else{
					verifica = registraEnGrupos(&inicio, id_bateria, 0);
					if(verifica == 0) printf("Ese id no esta registrado!\n");
					else printf("Persona registrada!!");
				}
			}
			break;
			
		case 4:
			system("cls");
			if(!inicio) printf("No hay datos para mostrar!\n");
			else visualizarLista(&inicio);
			break;
			
		case 5:
			system("cls");
			if(!inicio) printf("No hay baterias registradas!\n");
			else{
				printf("Ingresa el id de la bateria a eliminar:\n");
				if(scanf("%d", &busca) != 1){
					printf("No se permiten letras ni simbolos.\n\n");
					while(getchar()!='\n');
				}
				else{
					verifica = eliminaBateria(&inicio, busca, 0);
					if(verifica == 0) printf("Ese id no esta registrado!\n");
					else printf("Bateria eliminada!!");
				}
			}
			break;
			
		case 6:
			system("cls");
			if(!inicio) printf("No hay baterias registradas!\n");
			else{
				printf("Ingresa el id de la bateria donde se encuentra el grupo a eliminar:\n");
				if(scanf("%d", &busca) != 1){
					printf("No se permiten letras ni simbolos.\n\n");
					while(getchar()!='\n');
				}
				else{
					verifica = eliminaBateriaGrupo(&inicio, busca, 0);
					if(verifica == 0) printf("Ese id no esta registrado!\n");
					else printf("Grupo eliminado!!");
				}
			}
			break;
			
		case 7:
			system("cls");
			if(!inicio) printf("No hay baterias registradas!\n");
			else{
				printf("Ingresa el id de la bateria:\n");
				if(scanf("%d", &busca) != 1){
					printf("No se permiten letras ni simbolos.\n\n");
					while(getchar()!='\n');
				}
				else{
					verifica = eliminaBateriaPersonas(&inicio, busca, 0);
					if(verifica == 0) printf("Ese id no esta registrado!\n");
					else printf("Personas eliminadas!!");
				}
			}
			break;
			
		case 8:
			system("cls");
			if(!inicio) printf("EL SISTEMA ESTA VACIO!!\n");
			else{
				
				verifica = encuentraNEO(&inicio, "neo", 0);
				if(verifica == 0) printf("NEO NO SE ENCUENTRA EN EL SISTEMA !\n");
				else printf("HAS ENCONTRADO A NEO!!!");
			}
			break;
		}
		printf("\nDeseas seguir ejecutando el programa?\n\n1.-Si\n2.-No\n");
		scanf("%d", &resp);
	}while(resp == 1);
	return 0;
}

int buscaRepetido(lista *inicio, int n){
	
	if(!inicio) return 0;
	
	if(inicio->id_lista == n) return 1;
	else return buscaRepetido(inicio->siguiente, n);
	
	return 1;
}

int insertaBateria(lista **inicio, int n){
	
	lista *nuevo = (lista*)malloc(sizeof(lista));
	if(!nuevo){
		printf("Memoria insuficiente!\n");
		return 0;
	}
	
	nuevo->id_lista = n;
	nuevo->siguiente = *inicio;
	*inicio = nuevo;
	(*inicio)->cima = NULL;
	
	printf("Bateria registrada!!\n");
	return 1;
}


int insertaGrupos(pila **cima){
	
	int grupo;
	
	pila *nuevo = (pila*)malloc(sizeof(pila));
	if(!nuevo){
		printf("Memoria insuficiente!\n");
		return 0;
	}
	
	printf("Ingresa el id del grupo a crear:\n");
	if(scanf("%d", &grupo) != 1 || grupo <= 0){
		printf("No se permiten letras ni simbolos y solo numeros mayores a 0\n\n");
		while(getchar()!='\n');
		return 0;
	}
	else{
		
		nuevo->id_pila = grupo;
		nuevo->siguiente = *cima;
		*cima = nuevo;
		(*cima)->frente = NULL;
		(*cima)->fin = NULL;
	}
	
	system("cls");
	return 1;
}

int insertaEnBaterias(lista **inicio, int id_bateria, int var){
	
	if(!(*inicio)) return var;
	
	if((*inicio)->id_lista == id_bateria){
		return insertaGrupos(&(*inicio)->cima);
		return 1;
	} 
	else return insertaEnBaterias(&(*inicio)->siguiente, id_bateria, 0);
	
	return 1;
}


int registraEnGrupos(lista **inicio, int id_bateria, int var){
	
	int grupo;
	
	if(!(*inicio)) return var;
	
	if((*inicio)->id_lista == id_bateria){
		
		printf("Ingresa el id de grupo donde deseas insertar:\n");
		if(scanf("%d", &grupo) != 1){
			printf("No se permiten letras ni simbolos.\n\n");
			while(getchar()!='\n');
			return 0;
		}
		
		return buscaGrupo(&(*inicio)->cima, grupo, 0);
	}
	else return registraEnGrupos(&(*inicio)->siguiente, id_bateria, 0);
	
	return 1;
}


int buscaGrupo(pila **cima, int busca, int var){
	
	if(!(*cima)) return var;
	
	if((*cima)->id_pila == busca){
		
		return insertaPersonas(&(*cima)->frente, &(*cima)->fin);
		return 1;
	}
	else return buscaGrupo(&(*cima)->siguiente, busca, var);
	
	return 1;
}


int insertaPersonas(cola **frente, cola **fin){
	
	int age, temp = 0;
	char name[20];
	
	cola *nuevo = (cola*)malloc(sizeof(cola));
	if(!nuevo){
		printf("Memoria insuficiente!\n");
		return 0;
	}
	
	cola *aux = *frente;
	cola *aux2;
	cola *atras;
	
	do{
		if(temp == 1) printf("Ingrese una edad mayor a 0 y menor a 71\n\n");
		
		printf("Ingresa la edad de la persona:\n");
		if(scanf("%d", &age) != 1){
			printf("No se permiten letras ni simbolos.\n\n");
			while(getchar()!='\n');
			return 0;
		}
		else if(age < 0 || age > 70) temp = 1;
	}while(age <= 0 || age >70);
	
	printf("Ingresa el nombre de la persona:\n");
	while(getchar() != '\n');
	scanf("%[^\n]s", name);
	
	nuevo->edad = age;
	strcpy(nuevo->nombre, name);
	
	while((aux != NULL) && (aux->edad <= age) && (aux != aux2)){
		atras = aux;
		aux2 = *frente;
		aux = aux->siguiente;
	}
	
	if(aux == aux2){
		
		atras->siguiente = nuevo;
		*fin = (*fin)->siguiente; 
		(*fin)->siguiente = *frente;
	}
	else if(*fin == NULL){
		
		*frente = nuevo;
		*fin = nuevo;
		nuevo->siguiente = NULL;
	}
	else if(*frente == aux){
		
		*frente = nuevo;
		nuevo->siguiente = aux;
		(*fin)->siguiente = *frente;
	}
	else{
		
		if(*fin == atras){
			atras->siguiente = nuevo;
			nuevo->siguiente = *frente;
			*fin = (*fin)->siguiente;
		}
		else if(*fin == aux){
			
			atras->siguiente = nuevo;
			nuevo->siguiente = aux;
		}
		else{
			
			atras->siguiente = nuevo;
			nuevo->siguiente = aux;
		}
	}
	
	return 1;
}

void visualizarLista(lista **inicio){
	
	if(!(*inicio)) return;
	
	printf("Bateria: [%d]\n", (*inicio)->id_lista);
	
	visualizaGrupos(&(*inicio)->cima);
	
	visualizarLista(&(*inicio)->siguiente);
}

void visualizaGrupos(pila **cima){
	
	if(!(*cima)) return;
	
	printf("\t[Grupo: [%d]\n", (*cima)->id_pila);
	
	visualizaPersonas(&(*cima)->frente);
	
	visualizaGrupos(&(*cima)->siguiente);
}

void visualizaPersonas(cola **frente){
	
	cola *actual = *frente;
	cola *temporal;
	
	if(!(*frente)) return;
	else{
		
		do{
			
			if(actual->siguiente == NULL){
				printf("\t\tNombre: [%s]\tEdad: [%d]\n", actual->nombre, actual->edad);
				temporal = *frente;
			} 
			else{
				temporal = *frente;
				printf("\t\tNombre: [%s]\tEdad: [%d]\n", actual->nombre, actual->edad);
				actual = actual->siguiente;
			}
		}while(actual != temporal);
	}
}


int eliminaBateria(lista **inicio, int busca, int var){
	
	lista *aux;
	
	if(!(*inicio)) return var;
	
	if((*inicio)->id_lista == busca){
		
		eliminaGrupos(&(*inicio)->cima);
		
		aux = *inicio;
		*inicio = (*inicio)->siguiente;
		free(aux);
		return 1;
	}
	else return eliminaBateria(&(*inicio)->siguiente, busca, 0);
	
	return 1;
}


void eliminaGrupos(pila **cima){
	
	pila *aux;
	
	if(!(*cima)) return;
	else if((*cima)->siguiente == NULL){
		
		eliminaPersonas(&(*cima)->frente, &(*cima)->fin);
		aux = *cima;
		*cima = NULL;
		free(aux);
	}
	else{
		
		eliminaPersonas(&(*cima)->frente, &(*cima)->fin);
		aux = *cima;
		*cima = (*cima)->siguiente;
		free(aux);
		eliminaGrupos(&(*cima)->siguiente);
	}
	
	eliminaGrupos(&(*cima));
}

void eliminaPersonas(cola **frente, cola **fin){
	
	cola *aux;
	
	if(!(*frente))return;
	else if(*fin != *frente){
		aux = *frente;
		*frente = (*frente)->siguiente;
		(*fin)->siguiente = *frente;
		free(aux);
	}
	else{
		aux = *frente;
		*frente = NULL;
		*fin = NULL;
		free(aux);
	}

	eliminaPersonas(&(*frente), &(*fin));
}


int eliminaBateriaGrupo(lista **inicio, int busca, int var){
	
	int verifica, busca2;
	
	if(!(*inicio)) return var;
	
	if((*inicio)->id_lista == busca){
		
		printf("Ingresa el id del grupo a eliminar: \n");
		if(scanf("%d", &busca2) != 1){
			printf("No se permiten letras ni simbolos.\n\n");
			while(getchar()!='\n');
		}
		verifica = eliminaGrupoID(&(*inicio)->cima, busca2, 0);
		if(verifica == 0) return var;
		else return 1;
	}
	else return eliminaBateriaGrupo(&(*inicio)->siguiente, busca, 0);
	
	return 1;
}

int eliminaGrupoID(pila **cima, int busca, int var){
	
	pila *aux;
	
	if(!(*cima)) return var;
	
	if((*cima)->id_pila == busca){
		
		eliminaPersonas(&(*cima)->frente, &(*cima)->fin);
		
		aux = *cima;
		*cima = (*cima)->siguiente;
		free(aux);
		return 1;
	}
	else return eliminaGrupoID(&(*cima)->siguiente, busca, 0);
	
	return 1;
}


int eliminaBateriaPersonas(lista **inicio, int busca, int var){
	
	int verifica, busca2;
	
	if(!(*inicio)) return var;
	
	if((*inicio)->id_lista == busca){
		
		printf("Ingresa el id del grupo: \n");
		if(scanf("%d", &busca2) != 1){
			printf("No se permiten letras ni simbolos.\n\n");
			while(getchar()!='\n');
		}
		verifica = eliminaPersonasID(&(*inicio)->cima, busca2, 0);
		if(verifica == 0) return var;
		else return 1;
	}
	else return eliminaBateriaGrupo(&(*inicio)->siguiente, busca, 0);
}


int eliminaPersonasID(pila **cima, int busca, int var){
	
	if(!(*cima)) return var;
	
	if((*cima)->id_pila == busca){
		
		eliminaPersonas(&(*cima)->frente, &(*cima)->fin);
		return 1;
	}
	else return eliminaPersonasID(&(*cima)->siguiente, busca, 0);
}


int buscaBateria(lista **inicio, int var){
	
	if(!(*inicio)) return var;
	
	buscaGrupoRotar(&(*inicio)->cima, 0);
	
	return buscaBateria(&(*inicio)->siguiente, 0);
}


int buscaGrupoRotar(pila **cima, int var){
	
	if(!(*cima)) return var;
	
	rotarPersonas(&(*cima)->frente, &(*cima)->fin);
	
	return buscaGrupoRotar(&(*cima)->siguiente, 0);
	
	return 1;
}


void rotarPersonas(cola **frente, cola **fin){
	
	if(*frente != *fin){
		
		*frente = *fin;
		
		avanzaFin(&(*fin));
		if((*fin)->siguiente == *frente) return;
		else avanzaFin(&(*fin));
	}
	else return;
}

void avanzaFin(cola **fin){
	
	*fin = (*fin)->siguiente;
	return;
}


int encuentraNEO(lista **inicio, char *neo, int var){
	
	int verifica;
	if(!(*inicio)) return var;
	
	verifica = encuentraNEOgrupos(&(*inicio)->cima, neo, 0);
	if(verifica == 1) return 1;
	else return encuentraNEO(&(*inicio)->siguiente, neo, 0);
	
	return 1;
}


int encuentraNEOgrupos(pila **cima, char *neo, int var){
	
	int verifica;
	if(!(*cima)) return var;
	
	verifica = encuentraNEOcapsulas(&(*cima)->frente, neo, 0);
	if(verifica == 1) return 1;
	else return encuentraNEOgrupos(&(*cima)->siguiente, neo, 0);
}

int encuentraNEOcapsulas(cola **frente, char *neo, int var){
	
	if(!(*frente)) return var;
	
	if(strcmp(neo, (*frente)->nombre) == 0) return 1;
	else return encuentraNEOcapsulas(&(*frente)->siguiente, neo, 0);
}
