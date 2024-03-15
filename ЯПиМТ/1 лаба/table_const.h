#ifndef TABLE_CONST_H_INCLUDED
#define TABLE_CONST_H_INCLUDED

#include <fstream>
#include <string>
#include <set>

using namespace std;

// ����� ���������� ������
template <typename type> class table_const
{
private:
    set<type> table;
public:
    // ����������� �� ���������
    table_const() {}
    // ����������
    ~table_const()
    {
        table.clear();
    }
    // ���������� �������� � �������
    inline void add(type elem)
    {
        table.insert(elem);
    }
    // ������ ������� �� �����
    bool read_file(string name)
    {
        ifstream fs(name.c_str(), ios::in);
        if (!fs.is_open()) return false;
        type elem;
        while (!fs.eof())
        {
            fs >> elem;
            add(elem);
        }
        return true;
    }
    // �������� ���� �� ������� � �������
    bool contains(type elem)
    {
        typename set<type>::iterator it = table.find(elem);
        if (it == table.end()) return false;
        return true;
    }
    // ����� ������ �� ��������
    bool get_num(type elem, int& num)
    {
        if (!contains(elem)) return false;
        num = static_cast<int>(distance(table.begin(), table.find(elem)));
        return true;
    }
    // ����� �������� �� ������
    bool get_val(int num, type& elem)
    {
        if (num < 0 || num >= static_cast<int>(table.size())) return false;
        typename set<type>::iterator it = table.begin();
        for (int i = 0; i < num; i++)
            it++;
        elem = *it;
        return true;
    }
};

#endif // TABLE_CONST_H_INCLUDED
