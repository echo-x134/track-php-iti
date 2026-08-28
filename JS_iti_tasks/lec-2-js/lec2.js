// // -------------task1------------

// function countE() {
//     let str = prompt("Enter string");
//     let cnt = 0;

//     for (let char of str) {
//         if (char === 'e')
//             cnt++;
//     }

//     document.write(cnt);
// }

// countE();



// // -------------task2------------

// function checkPalindrome() {

//     let str = prompt("Enter string");

//     let rev = str.split("").reverse().join("");

//     if (rev === str)
//         document.write("palindrome");
//     else
//         document.write("not palindrome");
// }

// checkPalindrome();




// // -------------task3------------

// function calculate() {

//     let arr = new Array(3);

//     let sum = 0;
//     let mul = 1;
//     let dvd = 1;

//     for (let i = 0; i < 3; i++) {

//         arr[i] = Number(prompt("Enter number"));

//         sum += arr[i];
//         mul *= arr[i];
//         dvd /= arr[i];
//     }

//     document.write("sum : " + sum);
//     document.write("<br>");

//     document.write("multiplication : " + mul);
//     document.write("<br>");

//     document.write("division : " + dvd);
// }

// calculate();



// // -------------task4------------

// function sortArray() {

//     let arr = new Array(5);

//     for (let i = 0; i < 5; i++) {
//         arr[i] = Number(prompt("Enter number"));
//     }

//     document.write("the array : " + arr);
//     document.write("<br>");

//     document.write("the array asc : " + arr.sort((a, b) => a - b));
//     document.write("<br>");

//     document.write("the array desc : " + arr.sort((a, b) => b - a));
// }

// sortArray();



// // -------------task5------------

// function countLetter() {

//     let arr = new Array();

//     let str = prompt("Enter text");
//     let char = prompt("Enter one char");

//     for (let i = 0; i < str.length; i++) {

//         if (str[i] === char) {
//             arr.push(i);
//         }
//     }

//     document.write(arr);
// }

// countLetter();



// // -------------task6------------

// function randomNames() {

//     let arr = ["ahmed", "taha", "abdullah", "ali", "ayman"];

//     let num1 = Math.trunc(Math.random() * arr.length);
//     let num2 = Math.trunc(Math.random() * arr.length);

//     document.write(arr[num1] + " " + arr[num2]);
// }

// randomNames();





// // -------------task7------------

// function circleArea() {

//     let radius = Number(prompt("What is the value of your circle's radius"));

//     let area = Math.PI * radius * radius;

//     alert("Total area of the circle " + area);
// }


// function squareRoot() {

//     let num = Number(prompt("What is the value you want to calculate its square root"));

//     let result = Math.sqrt(num);

//     alert("Square root of " + num + " is " + result);
// }


// function cosAngle() {

//     let angle = Number(prompt("Enter an angle"));

//     let result = Math.cos(angle);

//     alert("Cos " + angle + " = " + result);
// }


// circleArea();
// squareRoot();
// cosAngle();