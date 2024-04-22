domains
	pr=var(symbol);true;false;con(pr,pr);diz(pr,pr);no(pr)
predicates
	nondeterm conversion(pr,pr)
	nondeterm find(pr)
	nondeterm result(pr,pr)
	nondeterm check(pr,pr)
clauses
	result(X,Z):-conversion(X,Y),find(Y),result(Y,Z),!.
	result(X,Z):-conversion(X,Y),check(Y,Z),!.
		
	find(no(con(_,_))).
	find(no(diz(_,_))).
	find(diz(X,Y)):- find(X);find(Y).
	find(con(X,Y)):- find(X);find(Y).

	conversion(no(con(X,Y)),diz(no(A),no(B))):-conversion(X,A),conversion(Y,B),!.
	conversion(no(diz(X,Y)),con(no(A),no(B))):-conversion(X,A),conversion(Y,B),!.
	conversion(no(no(X)),Y):-conversion(X,Y).
	conversion(no(X),no(X)).
	conversion(diz(X,Y),diz(C,D)):-conversion(X,C),conversion(Y,D),!.
	conversion(con(X,Y),con(C,D)):-conversion(X,C),conversion(Y,D),!.
	conversion(X,X).

	check(con(X,Y),con(A,B)):-check(X,A),check(Y,B).
	check(diz(X,Y),diz(A,B)):-check(X,A),check(Y,B).
	check(no(true),false).
	check(no(false),true).
	check(no(X),no(X)).
goal
result(diz(no(con(var("X"),var("Y"))),no(diz(var("C"),var("D")))),Result).