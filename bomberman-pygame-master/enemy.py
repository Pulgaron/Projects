import pygame, character, random , board, greedy
# RFCT NEEDED
class Enemy(character.Character):
	def __init__(self, name, imageName, point):
		character.Character.__init__(self, name, "enemies/"+imageName, point)
		self.instance_of = 'enemy'

	def nextMove(self):
		
		#raiz = Nodo_Greedy(board.board,)
		#raiz.Greedy()
		#print (lista_movimientos)
		return self.movementEnemy(int(random.randrange(0,4)))


		