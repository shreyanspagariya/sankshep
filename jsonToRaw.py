import json
import os

for filename in os.listdir("TEMP/"):
	with open("TEMP/"+filename) as json_data:
		d = json.load(json_data)
		fileout = open("TEMPF/"+filename, "w")
		if "response" in d:
			for alt in d["response"]["results"]:
				fileout.write(alt["alternatives"][0]["transcript"] + ".")
		elif "results" in d:
			for alt in d["results"]:
				fileout.write(alt["alternatives"][0]["transcript"] + ".")
		fileout.close()
