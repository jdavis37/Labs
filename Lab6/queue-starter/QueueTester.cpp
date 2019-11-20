#include "QueueTester.h"

QueueTester::QueueTester()
{
  std::cout << "---------------Beginning Queue Test---------------\n\n";
  std::cout << "-----Please review Report.txt for bug analysis----\n\n";
  TestConstructorEmpty();
  TestConstructorPeek();
  TestEnqueuePeek();
  TestEnqueuePeekMultiple();
  TestEnqueueEmpty();
  TestEnqueueEmptyMultiple();
  TestEnqueuePeekMultiple2();
  TestEnqueueEmptyMultiple2();
  TestDequeueSingleEmpty();
  TestDequeueSinglePeek();
  TestDequeueOnEmpty();
  TestEnqueueDequeueMultiplePeek();
  TestEnqueueDequeueMultipleEmpty();
  TestEnqueueDequeueOBO();
}

QueueTester::~QueueTester()
{}

void QueueTester::PrintResult(bool result)
{
  if(result == true)
  {
    std::cout << "PASSED\n";
  }
  else
  {
    std::cout << "FAILED\n";
  }  
}


void QueueTester::TestConstructorEmpty()
{
  std::cout << "Test Constructor Empty- Empty queue upon instantiation: ";
  Queue TestQ;

  if(TestQ.isEmpty())
  {
    PrintResult(1);
  }
  else
  {
    {
      PrintResult(0);
    }
  }
}


void QueueTester::TestConstructorPeek()
{
  std::cout << "Test Constructor - peekFront throws error on new queue instance: ";
  Queue TestQ;
  try
  {
    std::cout << TestQ.peekFront();
    PrintResult(0);
  }
  catch(const std::exception& e)
  {
    PrintResult(1);
    std::cerr << "\t--> " << e.what() << "\n";    
  }
}

void QueueTester::TestEnqueuePeek()
{
  std::cout << "Test Enqueue Peek - Peek returns correct int when enqueue is called once: ";
  Queue TestQ;
  TestQ.enqueue(1);
  try
  {
    if(TestQ.peekFront() == 1)
    {
      PrintResult(1);
      return;
    }
    PrintResult(0);
  }
  catch(const std::exception& e)
  {
    PrintResult(0);
    std::cerr << "\t--> " << e.what() << '\n';
  }
}

void QueueTester::TestEnqueueEmpty()
{
  std::cout << "Test Enqueue Empty - isEmpty returns false afer a value is enqueued: ";
  Queue TestQ;
  TestQ.enqueue(1);
  if(TestQ.isEmpty())
  {
    PrintResult(0);
    return;
  }
  PrintResult(1); 
}

void QueueTester::TestEnqueuePeekMultiple()
{
  std::cout << "Test Enqueue Peek Multiple - Returns correct value after a series of enqueues: ";
  Queue TestQ;
  for(int i = 0; i < 1000; i++)
  {
    TestQ.enqueue(i);
  }
  try
  {
    if(TestQ.peekFront() != 0)
    {
      PrintResult(0);
      return;
    }
    PrintResult(1);
  }
  catch(const std::exception& e)
  {
    PrintResult(0);
    std::cerr << "\t -->" << e.what() << '\n';
  }  
}

void QueueTester::TestEnqueueEmptyMultiple()
{
  std::cout << "Test Enqueue Empty Multiple - Returns false after a series of inputs: ";
  Queue TestQ;
  for(int i = 0; i < 1000; i++)
  {
    TestQ.enqueue(i);
  }
  if(TestQ.isEmpty())
  {
    PrintResult(0);
    return;
  }
  PrintResult(1);
}

void QueueTester::TestEnqueuePeekMultiple2()
{
  std::cout << "Test Enqueue Peek Multiple 2 - Peek returns correct int after each enqueue: ";
  Queue TestQ;
  for(int i = 0; i < 1000; i++)
  {
    TestQ.enqueue(i);
    try
    {
      if(TestQ.peekFront() != 0)
      {
        PrintResult(0);
        return;
      }      
    }
    catch(const std::exception& e)
    {
      PrintResult(0);
      std::cerr << "\t -->" << e.what() << '\n';
      return;
    }  
  }
  PrintResult(1);
  
}

void QueueTester::TestEnqueueEmptyMultiple2()
{
  std::cout << "Test Enqueue Empty Multiple - Returns false after each enqueue: ";
  Queue TestQ;
  for(int i = 0; i < 1000; i++)
  {
    TestQ.enqueue(i);
    if(TestQ.isEmpty())
    {
      PrintResult(0);
      return;
    }
  } 
  PrintResult(1);
}

void QueueTester::TestDequeueSingleEmpty()
{
  std::cout << "Test Dequeue Single Empty - Queue is empty after one enqueue and one dequeue: ";
  Queue TestQ;
  TestQ.enqueue(1);
  TestQ.dequeue();
  if(!TestQ.isEmpty())
  {
    PrintResult(0);
    return;
  }
  PrintResult(1);
}

void QueueTester::TestDequeueSinglePeek()
{
  std::cout << "Test Dequeue Single Peek - peekfront() throws error after one enqueue and one dequeue: ";
  Queue TestQ;
  TestQ.enqueue(1);
  TestQ.dequeue();
  try
  {
    if(TestQ.peekFront() >= 0 || TestQ.peekFront() <= 0)
    {
      PrintResult(0);
      return;
    }
  }
  catch(const std::exception& e)
  {
    PrintResult(1);
    std::cerr << "\t --> " << e.what() << '\n';
  }
}

void QueueTester::TestDequeueOnEmpty()
{
  std::cout << "Test Dequeue On Empty - Throw error for dequeueing on empty queue: ";
  Queue TestQ;
  try
  {
    TestQ.dequeue();
    PrintResult(0);
  }
  catch(const std::exception& e)
  {
    PrintResult(1);
    std::cerr << "\t --> " << e.what() << '\n';
  }
}

void QueueTester::TestEnqueueDequeueMultiplePeek()
{
  std::cout << "Test Enqueue Dequeue Multiple Peek - peekFront() returns correct value after enqueueing and dequeueing a series of ints: ";
  Queue TestQ;
  for(int i  = 0; i < 1000; i++)
  {
    TestQ.enqueue(i);
  }
  try
  {
    for(int i = 0; i < 300; i++)
    {
      TestQ.dequeue();
    }
    if(TestQ.peekFront() != 300)
    {
      PrintResult(0);
      return;
    }
    PrintResult(1);
  }
  catch(const std::exception& e)
  {
    PrintResult(0);
    std::cerr << e.what() << '\n';
  }
}

void QueueTester::TestEnqueueDequeueMultipleEmpty()
{
  std::cout << "Test Enqueue Dequeue Multiple Empty - Returns false after a series of enqueus and dequeues: ";
  Queue TestQ;
  for(int i = 0; i < 1000; i++)
  {
    TestQ.enqueue(i);
  }
  try
  {
    for(int i = 0; i < 500; i++)
    {
      TestQ.dequeue();
    }
    if(TestQ.isEmpty())
    {
      PrintResult(0);
      return;
    }
    PrintResult(1);
  }
  catch(const std::exception& e)
  {
    PrintResult(0);
    std::cerr << e.what() << '\n';
  }
  
}

void QueueTester::TestEnqueueDequeueOBO()
{
  std::cout << "Test Enqueue Dequeue OBO - Dequeues in exact reverse order and checks value one by one: ";
  Queue TestQ;
  for(int i = 0; i < 1000; i++)
  {
    TestQ.enqueue(i);
  }
  try
  {
    for(int i = 0; i < 1000; i++)
    {
      if(TestQ.peekFront() != (999-(999-i)))
      {
        PrintResult(0);
        return;
      }
      TestQ.dequeue();
    }
    PrintResult(1);
  }
  catch(const std::exception& e)
  {
    PrintResult(0);
    std::cerr << e.what() << '\n';
    return;
  }
  
}

