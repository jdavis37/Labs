#ifndef QUEUETESTER_H
#define QUEUETESTER_H
#include "Queue.h"
#include <iostream>

class QueueTester: public Queue
{
  private:
    Queue MyQueue;

  public:
    QueueTester(Queue);
    ~QueueTester();

    void Test1(Queue);
    void Test2();
    void Test3();
    void Test4();
    void Test5();
    void Test6();

};
#endif
