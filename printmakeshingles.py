fileout = open("makeshingles.sh", "w")

for i in range(1,57):
	if i >= 10:
		s = "0" + str(i)
	else:
		s = "00" + str(i)
	fileout.write("./a.out TEMPF/OUT-" + s + ".txt TEMPK/KEYWORDS-" + s + ".txt\n")

fileout.close()