#include "lexeme.h"

// ����������� �� ���������
lexeme::lexeme() {}

// ����������� � �������� ����� �������������� ��� �������� ���������
lexeme::lexeme(string new_name)
{
    name = new_name;
    type = 0;
    is_init.push_back(false);
    dimension = 1;
}

// ����������
lexeme::~lexeme()
{
    is_init.clear();
}
