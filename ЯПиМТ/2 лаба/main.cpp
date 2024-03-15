#include <iostream>
#include <stdio.h>
#include "TableConst.h"
#include "TableVar.h"
#include "translator.h"

using namespace std;

int main()
{
    
    Translator a;
    a.AnalyzeLexical("files/source.txt","files/tokens.txt","files/errors.txt");
    cout << "\n";
    a.DebugPrint(cout);
    return 0;
}
