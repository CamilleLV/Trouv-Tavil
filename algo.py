ville = [True, False, False, False, False]

def algo(tab):
	score = -1
	if tab[0]:
		score = 123
		if not tab[1]:
			score -= 55
		if not tab[2]:
			score -= 34
		if not tab[3]:
			score -= 21
		if not tab[4]:
			score -= 13
	return score

print(algo(ville))
