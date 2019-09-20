import copy
import numpy
import math
lista_movimientos = []
class Nodo_Star:
	def __init__(self,tablero,conejo):												
		self.tablero = tablero														
		self.conejo = conejo																
		self.hijos = []															
		self.movimiento = None
		self.listaMovimientos = None													

	def nueva_rama(self, tablero_hijo, esfuerzo, mover, heuristica):												
		hijo = Nodo_Star(tablero_hijo,self.conejo)
		#Estrella calcula el esfuerzo obtenido con  la aplicación del mapa topologico
		#mas la heuristica de la aplicación de busqueda de manhattan aplicada en get_position													
		hijo.movimiento = esfuerzo + heuristica								
		hijo.listaMovimientos = mover	
		self.hijos.append(hijo)													

	def get_position(self,objetivo,heuristica=""):														
		if objetivo == self.conejo:
			for fila in range(len(self.tablero)):										
				for columna in range(len(self.tablero[fila])):									
					if self.tablero[fila][columna] == objetivo:										
						return fila,columna								
		if objetivo == '2':
			posiciones = []
			conejo_fila, conejo_columna = self.get_position(self.conejo)
			print(conejo_fila,conejo_columna)
			for fila in range(len(self.tablero)):
				for columna in range(len(self.tablero[fila])):
					if self.tablero[fila][columna] == objetivo:
						posiciones.append([fila,columna])
			#Mas cercano!
			closest = []
			for fila in posiciones:
				closest.append(abs(conejo_fila-fila[0])+abs(conejo_columna-fila[1]))
			#print (posiciones[2])
			#print ("Posiciones cerca:",closest)
			aux_closest = copy.deepcopy(closest)
			closest.sort()
			#print (posiciones[aux_closest.index(closest[0])])
			if heuristica == True:
				#Retorno el mejor valor osea la heuristica
				return posiciones[aux_closest.index(closest[0])][0],posiciones[aux_closest.index(closest[0])][1],closest[0]
			else:
				return posiciones[aux_closest.index(closest[0])][0],posiciones[aux_closest.index(closest[0])][1]
												

	def tableros_hijos(self):	
		tablero, heuristica = self.grafo('2')
		fila, columna = self.get_position(self.conejo)
		tablero_1 = copy.deepcopy(self.tablero)
		tablero_2 = copy.deepcopy(self.tablero)
		tablero_3 = copy.deepcopy(self.tablero)
		tablero_4 = copy.deepcopy(self.tablero)
		#abajo
		if self.tablero[fila+1][columna] != '1':
			tablero_1[fila+1][columna] = self.conejo
			esfuerzo = tablero[fila+1][columna]
			tablero_1[fila][columna] = '0'
			self.nueva_rama(tablero_1,esfuerzo, '0',heuristica)
		#arriba
		if self.tablero[fila-1][columna] != '1':
			tablero_2[fila-1][columna] = self.conejo
			esfuerzo = tablero[fila-1][columna]
			tablero_2[fila][columna] = '0'
			self.nueva_rama(tablero_2,esfuerzo, '1',heuristica)
		#derecha
		if self.tablero[fila][columna+1] != '1':
			tablero_3[fila][columna+1] = self.conejo
			esfuerzo = tablero[fila][columna+1]
			tablero_3[fila][columna] = '0'
			self.nueva_rama(tablero_3,esfuerzo, '2',heuristica)
		#izquierda
		if self.tablero[fila][columna-1] != '1':
			tablero_4[fila][columna-1] = self.conejo
			esfuerzo = tablero[fila][columna-1]
			tablero_4[fila][columna] = '0'
			self.nueva_rama(tablero_4,esfuerzo, '3',heuristica)											
		
	def tablero_vacio(self):														
		tablero = copy.deepcopy(self.tablero)											
		for fila in range(len(self.tablero)):										
			for columna in range(len(self.tablero[fila])):									
				if tablero[fila][columna] != '1':												
					tablero[fila][columna] = '0'												
		return tablero																

	def grafo(self,objetivo):														
		tablero = self.tablero_vacio()														
		fila,columna,heuristica = self.get_position(objetivo,True)
		#print ("Heuristica",heuristica)
		tablero[fila][columna] = 0	
		bandera = 1																		
		contador = 0	
		while bandera != 0:		
			bandera = 0				
			for fila in range(len(tablero)):												
				for columna in range(len(tablero[fila])):										
					if tablero[fila][columna] == contador:	
						if fila < len(tablero)-1 and tablero[fila+1][columna] == '0':
							tablero[fila+1][columna] = contador + 1
							bandera += 1
						if fila > 0 and tablero[fila-1][columna] == '0':
							tablero[fila-1][columna] = contador + 1
							bandera += 1
						if columna < len(tablero[fila])-1 and tablero[fila][columna+1] == '0':
							tablero[fila][columna+1] = contador + 1
							bandera += 1
						if columna > 0 and tablero[fila][columna-1] == '0':
							tablero[fila][columna-1] = contador +1
							bandera += 1									
			contador += 1																
		return tablero,heuristica																
	def talar_arbol(self):
		if len(self.hijos) > 0:
			contador = 0
			for hijo in self.hijos:
				if contador == len(self.hijos)-1:
					break
				self.hijos.remove(hijo)
				contador += 1
	def A_star(self):															
		self.tableros_hijos()									
		for camino in range(len(self.hijos)-1):
			if self.hijos[camino].movimiento<self.hijos[camino+1].movimiento:						
				tablero = self.hijos[camino]													
				self.hijos[camino] = self.hijos[camino+1]
				self.hijos[camino+1] = tablero

		#Nuevas función
		self.talar_arbol()

		#for hijo in range(len(self.hijos)):
		#	print ("=====>",self.hijos[hijo].movimiento)
		#print ("=====>",self.hijos[3].movimiento)
		meta=self.get_position('2') 
		posicion_hijo=self.hijos[len(self.hijos)-1].get_position(self.conejo)					
		print (meta, posicion_hijo)
		for linea in self.hijos[len(self.hijos)-1].listaMovimientos:
			lista_movimientos.append(linea)
		for linea in self.hijos[len(self.hijos)-1].tablero:
			print (linea)
		print ()
		if meta == posicion_hijo:		
			print("Comiendo zanahoria!")									
			return True															
		#print ("\n",numpy.array(self.hijos[len(self.hijos)-1].tablero))
		self.hijos[len(self.hijos)-1].A_star()									

"""
mapa = [['1','1','1','1','1','1','1'], 
		['1','0','0','0','0','0','1'],
		['1','0','0','0','0','0','1'],
		['1','0','0','0','0','0','1'],
		['1','0','0','0','0','0','1'],
		['1','0','0','0','0','0','1'],
		['1','0','0','0','0','0','1'],
		['1','0','0','0','0','5','1'],
		['1','2','0','0','0','0','1'],
		['1','1','1','1','1','1','1']]

estrella=Nodo_Star(mapa,'5')
estrella.A_star()
"""
def main():
	
	tablero = [ ['1','1','1','1','1','1','1'], 
				['1','2','0','0','0','0','1'],
				['1','0','0','0','0','0','1'],
				['1','0','0','0','0','0','1'],
				['1','0','0','0','0','0','1'],
				['1','0','2','0','0','0','1'],
				['1','0','1','1','0','0','1'],
				['1','0','0','1','0','5','1'],
				['1','2','0','1','0','0','1'],
				['1','1','1','1','1','1','1']]
	
	tablero = [['1','0','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1'],
				['0','5','0','1','1','2','0','1','0','0','0','1','0','0','0','1','0','1','4','1'],
				['1','0','1','1','1','1','0','1','0','0','0','1','0','1','0','0','1','1','0','1'],
				['1','0','0','0','0','1','0','1','0','1','0','1','0','0','0','1','1','1','2','1'],
				['1','0','0','0','0','0','0','1','0','1','0','1','0','0','0','0','0','0','0','1'],
				['1','0','1','1','1','0','0','0','0','1','0','0','0','0','0','0','0','0','0','1'],
				['1','0','1','1','1','0','0','1','1','1','1','0','0','0','1','1','0','0','0','1'],
				['1','0','0','0','0','0','0','1','1','1','1','0','1','0','1','1','0','0','0','1'],
				['1','0','0','0','0','0','0','0','1','1','0','0','0','0','1','1','0','0','1','1'],
				['1','0','1','1','1','0','0','0','0','0','0','0','0','0','1','1','0','0','0','1'],
				['1','2','1','1','1','0','1','0','1','1','0','1','1','0','0','0','0','0','0','1'],		
				['1','0','1','0','0','0','0','0','1','1','0','1','1','0','0','1','0','1','1','1'],
				['1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1']]
	
	tablero = [ ['1', '0', '0', '5', '1', '2', '0', '1', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '1'],
				['0', '0', '1', '1', '1', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '1', '0', '1', '0', '1'],
				['0', '1', '1', '1', '1', '0', '0', '1', '0', '0', '0', '1', '0', '1', '0', '0', '1', '1', '0', '1'],
				['0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '1', '0', '0', '0', '1', '1', '1', '0', '1'],
				['0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '1'],
				['0', '0', '1', '1', '1', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'],
				['0', '0', '1', '1', '1', '0', '0', '1', '1', '1', '1', '0', '0', '0', '1', '1', '0', '0', '0', '0'],
				['0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '1', '0', '1', '1', '0', '0', '0', '0'],
				['0', '1', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '1', '1', '0', '0', '1', '1'],
				['0', '0', '1', '1', '1', '0', '0', '6', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0'],
				['0', '1', '1', '1', '1', '0', '1', '0', '1', '1', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0'],
				['0', '0', '1', '0', '0', '0', '0', '0', '1', '1', '0', '1', '1', '0', '0', '1', '0', '1', '1', '0'],
				['0', '0', '1', '0', '1', '1', '1', '1', '1', '0', '0', '1', '1', '0', '0', '1', '0', '1', '0', '0']]
	
	raiz = Nodo_Star(tablero,'6')
	raiz.A_star()
	print (lista_movimientos)
	
if __name__ == "__main__":
    main()

