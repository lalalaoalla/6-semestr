domains
num, price = integer
city_name, time1,time2,type, day = symbol
time=time(time1,time2)
predicates
nondeterm flight(num,city_name,city_name,type,time,day,price)
nondeterm day_connect(city_name,city_name,time,day,price)
nondeterm min_price_ticket(city_name,city_name,price)
clauses
flight(1,"Alimovka", "Irkutsk", "AN-24",time("8:00","10:00"),"24.09.2024",6000).
flight(2,"Kirensk", "Irkutsk", "AN-24",time("9:30","10:00"),"24.09.2024",5000).
flight(3,"Alimovka", "Kirensk", "AN-24",time("7:30","9:00"),"24.09.2024",400).
flight(4,"Kirensk", "Irkutsk", "AN-24",time("8:30","9:00"),"24.09.2024",5000).


day_connect(City1,City2,time(Time1, Time2),Day, Price):- flight(_, City1, City2,_,time(Time1,Time2),Day,Price).
day_connect(City1,City2,time(Time1, Time4), Day, Price):- flight(_, City1, City3,_,time(Time1,Time2),Day,Price1), day_connect(City3,City2,time(Time3,Time4), Day, Price2),Time3>Time2,Price=Price1+Price2.
min_price_ticket(City1, City2,Min_price):-day_connect(City1,City2,_,_, Price), Price>=Min_price.
goal
min_price_ticket("Alimovka","Irkutsk",M).