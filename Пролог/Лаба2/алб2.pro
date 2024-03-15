predicates
nondeterm flight(integer,symbol,symbol,symbol,symbol,symbol,symbol,integer)
nondeterm min_price_ticket(integer,symbol,symbol,symbol,symbol,symbol,symbol,integer)
nondeterm min_price(integer)
clauses
flight(1,"Novosibirsk","Ust-Kut","efeef","8:00","10:00","23.09.2024",5600).
flight(3,"Novosibirsk","Ust-Kut","An-24","10:00","12:00","23.09.2024",4000).
flight(2,"Moscow","Novosibirsk","efeef","9:00","17:00","24.09.2024",5000).
flight(4,"Komsomolsk-na-Amure","Habarovsk","concord","8:00","10:00","23.09.2024",2500).
flight(5,"Habarovsk","Komsomolsk-na-Amure","concord","10:00","12:00","23.09.2024",4000).
flight(6,"Ust-Kut","Alimovka","concord","9:00","10:30","24.09.2024",10000).
flight(7,"Alimovka","Kirensk","concord","8:00","08:45","23.09.2024",2500).
flight(8,"Kirensk","Ust-Kut","concord","10:00","12:00","23.09.2024",6000).
flight(9,"Ust-Kut","Kirensk","concord","9:00","10:45","24.09.2024",5999).
flight(10,"Ust-Kut","Kirensk","concord","9:15","11:00","24.09.2024",4600).
flight(11,"Ust-Kut","Alimovka","concord","9:30","11:00","24.09.2024",4600).
flight(12,"Ust-Kut","Kirensk","concord","10:15","12:00","24.09.2024",4596).
min_price(Price):-flight(_,_,_,_,_,_,_, Prices), Pri
min_price_ticket(Number, From,In, Type, Dtime, Atime,Date,Min_price):-flight(Number,From, In, Type,Dtime,Atime,Day,Price), Min_price>=Price,Date=Day.
goal
/*min_price_ticket(N,"Ust-Kut","Alimovka",T,D,A,"23.09.2024",5000).*/
/*min_price_ticket(N,"Ust-Kut","Alimovka",T,D,A,"24.09.2024",5000).*/
/*min_price_ticket(N,"Ust-Kut","Komsomolsk-na-Amure",T,D,A,"23.09.2024",5000).*/
/*min_price_ticket(N,"Ust-Kut","Kirensk",T,D,A,"24.09.2024",5000).*/
min_price_ticket(N,F,I,T,D,A,"24.09.2024",5000).