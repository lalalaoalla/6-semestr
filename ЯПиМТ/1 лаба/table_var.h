#ifndef TABLE_VAR_H_INCLUDED
#define TABLE_VAR_H_INCLUDED

#include <fstream>
#include <string>
#include <vector>
#include "lexeme.h"

using namespace std;

// ����� ���������� ������
class table_var
{
private:
    // ������ �������
    int hashnum;
    // ��������� �� ������ �������
    vector<lexeme>* table;
    // ������� ����
    int get_hash(string name);
    // ������� ������ � �������
    int get_chain(string name);
public:
    // ����������� � �������� ������� �� ���������
    table_var();
    // ����������� � ���������������� �������� �������
    table_var(int new_hashnum);
    // ����������
    ~table_var();
    // ����������� ���� � ������ � �������
    bool get_location(string name, int& hash, int& chain);
    // �������� ���� �� ������� � �������
    inline bool contains(string name);
    // ���������� ������ ����� �������������� ��� �������� ���������
    bool add(string name);
    // ������� ���� �� ���� � ������ � �������
    bool set_type(int hash, int chain, int type);
    // ������� ���� �� ����� �������������� ��� �������� ���������
    bool set_type(string name, int type);
    // ������� ����������� �� ���� � ������ � �������
    bool set_dimension(int hash, int chain, int dimension);
    // ������� ����������� �� ����� �������������� ��� �������� ���������
    bool set_dimension(string name, int dimension);
    // ������� ����� ������������� �� ���� � ������ � �������
    bool set_is_init(int hash, int chain, bool is_init);
    // ������� ����� ������������� �� ����� �������������� ��� �������� ���������
    bool set_is_init(string name, bool is_init);
    // ������� ����� ������������� ��� �������� �� ���� � ������ � �������
    bool set_is_init(int hash, int chain, bool is_init, int init_index);
    // ������� ����� ������������� ��� �������� �� ����� �������������� ��� �������� ���������
    bool set_is_init(string name, bool is_init, int init_index);
    // ��������� ��������� lexeme �� ���� � ������ � �������
    bool get_lexeme(int hash, int chain, lexeme& lexeme);
    // ��������� ��������� lexeme �� ����� �������������� ��� �������� ���������
    bool get_lexeme(string name, lexeme& lexeme);
};

#endif // TABLE_VAR_H_INCLUDED
