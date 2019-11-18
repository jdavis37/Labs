#ifndef QUEUETESTER_H
#define QUEUETESTER_H
#include "Queue.h"
#include <iostream>

class QueueTester: public Queue
{
  private:
    Queue MyQueue;

  public:
    QueueTester();
    ~QueueTester();

    void PrintResult(bool result);
    void TestConstructorEmpty();
    void TestConstructorPeek();
    void TestEnqueuePeek();
    void TestEnqueueEmpty();
    void TestEnqueueEmptyMultiple();
    void TestEnqueuePeekMultiple();
    void TestEnqueuePeekMultiple2();
    void TestEnqueueEmptyMultiple2();
    void TestDequeueSingleEmpty();
    void TestDequeueSinglePeek();
    void TestDequeueOnEmpty();
    void TestEnqueueDequeueMultiplePeek();
    void TestEnqueueDequeueMultipleEmpty();
    void TestEnqueueDequeueOBO();
};
#endif
