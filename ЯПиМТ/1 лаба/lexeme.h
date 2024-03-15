#ifndef LEXEME_H_INCLUDED
#define LEXEME_H_INCLUDED

#include <string>
#include <vector>

using namespace std;

// ����� ��� �������� ��������������� � ��������
class lexeme
{
public:
    // ��� �������������� ��� �������� ���������
    string name;
    // ���, 0 - �� ���������, 1 - int, 2 - float
    int type;
    // ������ ������ "���������������� ��" ����������� dimension
    vector<bool> is_init;
    // ����������� �������, ��� ���������� � �������� - 1.
    int dimension;
    // ����������� �� ���������
    lexeme();
    // ����������� � �������� ����� �������������� ��� �������� ���������
    lexeme(string new_name);
    // ����������
    ~lexeme();
    // �������� ������������
    lexeme& operator = (const lexeme& other)
    {
        if (this != &other)
        {
            name = other.name;
            type = other.type;
            dimension = other.dimension;
            is_init = other.is_init;
        }
        return *this;
    }
};

#endif // LEXEME_H_INCLUDED
