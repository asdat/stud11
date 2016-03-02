<?php
// вычисление n чисел Фибоначчи числа через цикл for
function fibo($number){
	// если < 0, то пустой массив
    if($number<0){
        return array();
	// пусть 0ой элемент - это 1
    }elseif($number==0){
        return array(1);
	// первым элементов тоже будет 1
    }elseif($number==1){
        return array(1,1);
    }else{
		// если элементов надо больше 2
		// задаем начальную пару
        $fibo=array(1,1);
		// перебираем циклом до n
        for($i=2;$i<=$number;$i++){
			// вычисляем значение на основе предыдущей пары
            $fibo[]=$fibo[$i-2]+$fibo[$i-1];
        }
		// возвращаем результат
        return $fibo;
    }
}
// факториал через рекурсию
function fact_rec($number){
	// если меньше 0, то вернем null
    if($number<0){
        return null;
	// если 0, то вернем 1
    }elseif($number==0){
        return 1;
	// во всех остальных случаях умножаем на функцию, которая считает факториал от числа меньшего на 1 от заданного
    }else{
        return $number*fact_rec($number-1);
    }
}
// факториал через while
function fact_while($number){
	// начальное значение
	$fact=1;
    while($number>0){
		// умножаем результат на последнее значение
        $fact*=$number;
		// уменьшаем исходное значение на 1
        $number-=1;
    }
    return $fact;
}
echo 'вычисляем факториал через рекурсию';
echo '<br/>';
echo 'факторил 3! - ';
var_dump(fact_while(3));
echo '<br/>';
echo 'факторил 1! - ';
var_dump(fact_while(1));
echo '<br/>';
echo 'факторил 5! - ';
var_dump(fact_while(5));
echo '<br/>';
echo 'факторил 0! - ';
var_dump(fact_while(0));
echo '<br/>';
echo '<br/>';


echo 'вычисляем факториал через while';
echo '<br/>';
echo 'факторил 3! - ';
var_dump(fact_while(3));
echo '<br/>';
echo 'факторил 1! - ';
var_dump(fact_while(1));
echo '<br/>';
echo 'факторил 5! - ';
var_dump(fact_while(5));
echo '<br/>';
echo 'факторил 0! - ';
var_dump(fact_while(0));
echo '<br/>';
echo '<br/>';


echo '0ое число - ';
var_dump(fibo(0));
echo '<br/>';
echo '1ое число - ';
var_dump(fibo(1));
echo '<br/>';
echo '2ое число - ';
var_dump(fibo(2));
echo '<br/>';
echo '3ое число - ';
var_dump(fibo(3));
echo '<br/>';
echo 'случайное из диапазона от 4 до 50 - ';
$count=rand(4,50);
var_dump(fibo($count));
echo '<br/>';
echo '<br/>';