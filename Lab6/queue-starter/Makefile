QueueDemo: main.o Queue.o QueueTester.o
	g++ -g -Wall -std=c++11 main.o Queue.o QueueTester.o -o QueueDemo

main.o: main.cpp
	g++ -g -std=c++11 -c main.cpp

QueueTester.o: QueueTester.cpp
	g++ -g -std=c++11 -c QueueTester.cpp

leak:
		valgrind --show-leak-kinds=all -v ./QueueDemo

clean:
	rm main.o QueueDemo QueueTester.o 
