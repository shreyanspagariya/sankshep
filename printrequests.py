fileout = open("requests.sh", "w")

for i in range(1,57):
	if i >= 10:
		s = "0" + str(i)
	else:
		s = "00" + str(i)
	fileout.write("curl -s -H 'Content-Type: application/json' -H " + '"Authorization: Bearer `gcloud auth print-access-token`"' + " https://speech.googleapis.com/v1/speech:recognize -d" +  ''' "{'config': {'encoding':'FLAC','sampleRateHertz': 44100,'languageCode': 'en-US','enableWordTimeOffsets': false},'audio': {'uri':'gs://bamboo-foundation-6245/SPLIT-'''+s+'''.flac'}}" > TEMP/OUT-'''+s+".txt\n")

fileout.close();