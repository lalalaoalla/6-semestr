domains
    list = symbol*
    l=integer*
    
    number = integer
predicates
    nondeterm leave(integer, list, list, list)
    nondeterm get(integer, list, list, list, symbol)
    nondeterm conc(list, list, list)
    nondeterm length(list, integer)
    
    nondeterm insert(symbol, list, list)
    nondeterm reverse(list, list)
    
    nondeterm sum_list(l, l).


    
    nondeterm multiply_list(l, number, number, number, l)
    nondeterm main(l, number, number, number)
clauses
    length([],0).
    length([_|T],N):- 
        length(T,N1),N=N1+1.
 
    conc([],P,P).
    conc([N|P1],P2,[N|P3]):-
        conc(P1,P2,P3).
 
    leave(_, [], [], []).
    leave(Num, InList, RezList, Result) :-
        get(Num, InList, [], OutList, RezNum),
        length(OutList, Lout),
        Lout >= Num-1,
        conc(RezList, [RezNum], Lout1),
        leave(Num, OutList, Lout1, Result),!.
 
    leave(_, InList, RezList, Result) :-
        conc(RezList, InList, Result).
 
 
    get(1, [Head|Tail], Tail1, NTail, RezNum) :-
        conc(Tail, Tail1, NTail),
        RezNum = Head.
    get(Num, [Head|Tail], Tail1, NTail, RezNum) :-
        NewNum = Num - 1,
        conc(Tail1, [Head], Res),
        get(NewNum, Tail, Res, NTail, RezNum).
        
        
    insert(X, [], [X]).
    insert(X, [Head|Tail], [Head|List]):- insert(X, Tail, List), !.

    reverse([Head], [Head]).
    reverse([Head|Tail], L1):- reverse(Tail, L2), !, insert(Head, L2, L1), !.
    
    
    
    sum_list([], []).
    sum_list([X, Y | Tail], [S| Result]) :-
        sum_list(Tail, Result),
        S=X+Y,
        write(Result).
    
    
    multiply_list([], _, _, _, []).

    multiply_list([X | Tail], Mult1, Mult2, Mult3, [Y | Result]) :-
        multiply_list(Tail, Mult2, Mult3, Mult1, Result),
        Y=X*Mult1.

    main(InputList, Mult1, Mult2, Mult3) :-
        multiply_list(InputList, Mult1, Mult2, Mult3, Result),
        write(Result).
        
        

goal
sum_list([1,2,3,4,5,6,8,9],Result).
