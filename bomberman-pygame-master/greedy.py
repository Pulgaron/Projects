import copy

import math
lista_movimientos = []
class Nodo_Greedy:
	def __init__(self,tablero,enemy):												
		self.tablero = tablero														
		self.enemy = enemy																
		self.hijos = []															
		self.heuristica = None
		self.listaMovimientos = None													

	def nueva_rama(self, tablero_hijo, esfuerzo, listaMovimientos):												
		hijo = Nodo_Greedy(tablero_hijo,self.enemy)
		#Greedy calcula unicamente el esfuerzo en llegar a su objetivo de manera "voraz"													
		hijo.heuristica = esfuerzo 														
		hijo.listaMovimientos = listaMovimientos	
		self.hijos.append(hijo)													

	def get_position(self,objetivo):														
		for fila in range(len(self.tablero)):										
			for columna in range(len(self.tablero[fila])):									
				if self.tablero[fila][columna] == objetivo:										
					return fila,columna		

	def tableros_hijos(self):	
		tablero = self.grafo('4')
		fila, columna = self.get_position(self.enemy)
		tablero_1 = copy.deepcopy(self.tablero)
		tablero_2 = copy.deepcopy(self.tablero)
		tablero_3 = copy.deepcopy(self.tablero)
		tablero_4 = copy.deepcopy(self.tablero)
		#abajo
		if self.tablero[fila+1][columna] != '1':
			tablero_1[fila+1][columna] = self.enemy
			esfuerzo = tablero[fila+1][columna]
			tablero_1[fila][columna] = '0'
			self.nueva_rama(tablero_1,esfuerzo, '0')
		#arriba
		if self.tablero[fila-1][columna] != '1':
			tablero_2[fila-1][columna] = self.enemy
			esfuerzo = tablero[fila-1][columna]
			tablero_2[fila][columna] = '0'
			self.nueva_rama(tablero_2,esfuerzo, '1')
		#derecha
		if self.tablero[fila][columna+1] != '1':
			tablero_3[fila][columna+1] = self.enemy
			esfuerzo = tablero[fila][columna+1]
			tablero_3[fila][columna] = '0'
			self.nueva_rama(tablero_3,esfuerzo, '2')
		#izquierda
		if self.tablero[fila][columna-1] != '1':
			tablero_4[fila][columna-1] = self.enemy
			esfuerzo = tablero[fila][columna-1]
			tablero_4[fila][columna] = '0'
			self.nueva_rama(tablero_4,esfuerzo, '3')											
		
	def tablero_vacio(self):														
		tablero = copy.deepcopy(self.tablero)											
		for fila in range(len(self.tablero)):										
			for columna in range(len(self.tablero[fila])):									
				if tablero[fila][columna] != '1':												
					tablero[fila][columna] = '0'												
		return tablero																

	def grafo(self,objetivo):														
		tablero = self.tablero_vacio()														
		fila,columna = self.get_position(objetivo)													
		tablero[fila][columna] = 0	
		fil, col = self.get_position(self.enemy)
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
						if fila == fil and columna == col:
							bandera = 0										
			contador += 1	
		print(tablero)															
		return tablero 																
	
	def Greedy(self):															
		self.tableros_hijos()															
		for camino in range(len(self.hijos)-1):
			if self.hijos[camino].heuristica<self.hijos[camino+1].heuristica:						
				tablero = self.hijos[camino]													
				self.hijos[camino] = self.hijos[camino+1]
				self.hijos[camino+1] = tablero
		meta=self.get_position('4') 
		posicion_hijo=self.hijos[len(self.hijos)-1].get_position(self.enemy)					
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
		self.hijos[len(self.hijos)-1].Greedy()									


# def main():
	
	
# 	tablero = [ ['1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1'],
# 				['1','5','1','1','1','0','2','1','0','0','0','1','0','0','0','1','4','1','0','1'],
# 				['1','0','1','1','1','0','0','1','0','0','0','1','0','1','0','0','0','1','0','1'],
# 				['1','0','0','0','0','0','0','1','0','1','0','1','0','0','0','1','1','1','2','1'],
# 				['1','0','0','0','0','0','0','1','0','1','0','1','0','0','0','0','0','0','0','1'],
# 				['1','0','1','1','1','0','0','0','0','1','0','0','0','0','0','0','0','0','0','1'],
# 				['1','0','1','1','1','0','0','1','1','1','1','0','0','0','1','1','0','0','0','1'],
# 				['1','0','0','0','0','0','0','1','1','1','1','0','1','0','1','1','0','0','0','1'],
# 				['1','0','0','0','0','0','0','0','1','1','0','0','0','0','1','1','0','0','1','1'],
# 				['1','0','1','1','1','0','0','0','0','0','0','0','0','0','1','1','0','0','0','1'],
# 				['1','2','1','1','1','0','1','0','1','1','0','1','1','0','0','0','0','0','0','1'],		
# 				['1','0','1','6','0','0','0','0','1','1','0','1','1','0','0','1','0','1','1','1'],
# 				['1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1']]
# 	raiz = Nodo_Greedy(tablero,'6')
# 	raiz.Greedy()
# 	print (lista_movimientos)
	
# if __name__ == "__main__":
#     main()

