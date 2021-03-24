<?php
        $questions = array(
            array("1"," Look at this series: 36, 34, 30, 28, 24, … What number should come next?","21","26","23","20"),
            array("2","Every year World Entrepreneurs’ Day is celebrated on 21st August. What day was World Entrepreneurs’ Day in 2001, if it will be Sunday this year (2021)?","Monday","Tuesday","Wednesday","Saturday"),
            array("3","What number should be put in the blank space in the given series?1,2,3,4,1,4,9,16,_,8,27,64","3","4","1","25"),
            array("4","Statement I - Corona has caused a great threat to human beings.
            Statement II - Prices of medical shares increased. 
            ","Statement I and Statement II are true and Statement I is a correct explanation to Statement II.","Statement I and Statement II are true and Statement I is not  a correct explanation to Statement II.","Statement I is true but Statement II is false.","Both Statement I and II are false."),
            array("5","Alex, Chris, Jan, Pat and Sam are sitting around a table in some order. They comprise two couples(without overlap) and one single. Given the following true statements, who is single?
            a.Jan’s partner is next to Pat
            b.Alex’s partner is next to Sam
            c.Chris is sitting immediately between Sam and Alex
            d.Only one couple is sitting next to each other
            e.Alex is sitting next to Jan
            ","Jan","Sam","Alex","Pat"),
            array("6","Arnab is twice as fast as Bhanu, and Bhanu is one-third as fast as Chandu. If together they can complete a work in 30 days, in how many days can Arnab, Bhanu and Chandu do the same work respectively?","50, 180, 60","70, 180, 60","90, 180, 60","80, 180, 60 "),
            array("7","January 1, 2008 is Tuesday. What day of the week lies on January 1, 2009?","Monday","Wednesday","Thursday","Sunday"),
            array("8","Karan, Hari and Kowshik play cricket. The ratio of  runs scored by Karan to Hari and Hari to Kowshik is 5:3. If they score 588 runs altogether. How many runs did Karan score?","150 runs","300 runs","250 runs","200 runs"),
            array("9","Directions : What will come in place of the question mark (?) in the following series?7 13 25 49 97 ?","173","195","183","203"),
            array("10","A Father is 6 times older than his son. After 10 years, the father will be 25 years older than his son. Let the current age of father and son be x and y respectively. Then, find the value of the remainder of x/y.","5","6","10","11"),
            array("11","Who is an entrepreneur?","A person who works for someone who owns a business","A person who decides to create or run a business","A person who buys a successful business","A person who teaches business at a college"),
            array("12","Elon musk is a founder of which company ?","Google","Microsoft","Tesla","Blue Origin"),
            array("13","Youngest  billionaire of india is____","Ritesh agrawal","Nikhil Kamath","mukesh ambani","Virat kohli"),
            array("14","'Always low prices' is the tagline of _______.","Kmart","Wal-Mart","Lowe's","The Home Depot"),
            array("15","Founder of Paytm is_______","Rajat sharma","Vinay shekhar sharma","vijay shekhar sharma","Ratan tata."),
            array("16","Love is blind- Figure of speech of this statement is:","Simile","Personification","Metaphor","Alliteration"),
            array("17","Meaning of coy is ","Scared","Jealous","Unhappy","Shy"),
            array("18","By the time you reach your house, the clothes ____________. Which of the following is the most appropriate?","became wet","would have become wet","would be wet","were wet"),
            array("19","My dad ran ______ on us when we were very young.","away","of","up","out"),
            array("20","What is the meaning of ‘at your wits end’.","not knowing what to do","knowing what to do","competent","both b and c"),

        );
        $total_noof_questions = 30;
        $answer_key = array(
            array("1","1"),
            array("2","3"),
            array("3","3"),
            array("4","1"),
            array("5","4"),
            array("6","3"),
            array("7","3"),
            array("8","2"),
            array("9","4"),
            array("10","3"),
            array("11","2"),
            array("12","3"),
            array("13","2"),
            array("14","2"),
            array("15","3"),
            array("16","2"),
            array("17","4"),
            array("18","2"),
            array("19","4"),
            array("20","1"),
            
        );

        date_default_timezone_set("Asia/Kolkata");
        $marks_of_each_qn = 4;
        $_SESSION['answer_of _questions'] = array();

        $_SESSION['visited_q'] = array();

        $allowed_schools = array("vnit","iiiit");

        $now = time();
        // echo date("d-m-y H:i:s", $now) . "<br>";




?>
