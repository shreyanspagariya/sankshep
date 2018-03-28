import cv2

for i in range(1,57):
	if i >= 10:
		s = "0" + str(i)
	else:
		s = "00" + str(i)
	vidcap = cv2.VideoCapture("TEMPV/SPLIT-" + s + ".mkv")
	framecount = vidcap.get(cv2.cv.CV_CAP_PROP_FRAME_COUNT)
	count = 0
	success,image = vidcap.read()
	success = True
	while count < framecount-50:
  		success,image = vidcap.read()
		count += 1
	cv2.imwrite("TEMPI/FRAME-" + s + ".jpg", image)